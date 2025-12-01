<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function store(request $request){
        $request->validate([
        'name' => 'required|string|unique:categories,name'
        ]);
        $category = Category::create(['name' => $request->name]);
        return response()->json($category); // return id & name
    }
}
