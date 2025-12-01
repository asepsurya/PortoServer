<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['category','skills'])->paginate(10);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $skills = Skill::all();
        return view('projects.create', compact('categories','skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('projects.index')->with('success','Project created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $categories = Category::all();
        $skills = Skill::all();
        return view('projects.edit', compact('project','categories','skills'));
    }

    /**
     * Update the specified resource in storage.
     */
  
 
}
