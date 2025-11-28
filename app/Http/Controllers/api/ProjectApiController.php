<?php

namespace App\Http\Controllers\api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class ProjectApiController extends Controller
{
     public function index(request $request)
    {
       $token = $request->token;

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'API token required'
            ], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid token'
            ], 401);
        }

        // Jika perlu akses user
        $user = $accessToken->tokenable;

        // LOAD DATA
        $projects = Project::with(['category', 'skills'])->get();

        return response()->json([
            'status' => 'ok',
            'message' => 'Projects loaded',
            'count' => $projects->count(),
            'data' => $projects
        ]);

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image'=>'nullable|url',
            'link'=>'nullable|url',
            'category_id'=>'nullable|exists:categories,id',
            'skills'=>'nullable|array'
        ]);

        $project = Project::create($data);

        if(isset($data['skills'])){
            $project->skills()->attach($data['skills']);
        }

        $project->load(['category','skills']);

        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        $project->load(['category','skills']);
        return response()->json($project);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image'=>'nullable|url',
            'link'=>'nullable|url',
            'category_id'=>'nullable|exists:categories,id',
            'skills'=>'nullable|array'
        ]);

        $project->update($data);

        if(isset($data['skills'])){
            $project->skills()->sync($data['skills']);
        }

        $project->load(['category','skills']);
        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->skills()->detach();
        $project->delete();

        return response()->json(['message'=>'Project deleted']);
    }
}
