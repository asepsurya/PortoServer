<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
{
     public function index()
    {
        $categories = Category::with('projects')->get();
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        $category->load('projects');
        return response()->json($category);
    }
}
