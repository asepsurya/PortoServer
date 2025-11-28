<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\api\SkillApiController;
use App\Http\Controllers\api\ProjectApiController;
use App\Http\Controllers\api\CategoryApiController;
use App\Http\Controllers\api\TokenUser;


Route::middleware('auth:sanctum')->group(function () {
   
});

Route::apiResource('categories', CategoryApiController::class)->only(['index','show']);
Route::apiResource('skills', SkillApiController::class)->only(['index','show']);

Route::get('/projects', [ProjectApiController::class, 'index']);
Route::middleware('auth:sanctum')->get('tokens', [TokenUser::class, 'tokens']);
