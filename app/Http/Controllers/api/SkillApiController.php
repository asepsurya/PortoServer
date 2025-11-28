<?php

namespace App\Http\Controllers\api;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillApiController extends Controller
{
   public function index()
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

        $skills = Skill::with('projects')->get();
        return response()->json($skills);
    }

    public function show(Skill $skill)
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

        $skill->load('projects');
        return response()->json($skill);
    }
}
