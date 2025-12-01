<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function porto(){
      
        $category = request('category');

        $project = Project::all()->filter(function ($item) use ($category) {
            if (!$category) return true;

            $arr = json_decode($item->category_id, true);
            return in_array($category, $arr);
        });

        $categories = Category::all();

        return view('portofolio', compact('project', 'categories'));

    }
      public function detail($slug){
        $project = Project::where('slug',$slug)->first();
        return view('detailblog',compact('project'));
    }
  

}
