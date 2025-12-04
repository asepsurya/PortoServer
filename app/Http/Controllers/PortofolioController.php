<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class PortofolioController extends Controller
{
    public function porto(){
      
     $category = request('category');

        // ambil seluruh data lalu filter manual (cara lama kamu)
        $allProjects = Project::all()->filter(function ($item) use ($category) {
            if (!$category) return true;

            $arr = json_decode($item->category_id, true);
            return in_array($category, $arr);
        });

        // urutkan (misal: terbaru)
        $allProjects = $allProjects->sortByDesc('created_at');

        // === PAGINATION MANUAL ===
        $page = request()->get('page', 1);
        $perPage = 6;

        $project = new LengthAwarePaginator(
            $allProjects->forPage($page, $perPage),
            $allProjects->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $categories = Category::all();

        return view('portofolio', compact('project', 'categories'));

    }
      public function detail($slug){
       $project = Project::where('slug', $slug)->firstOrFail();

        $projectKey = 'project_viewed_' . $project->id;

        if (!session()->has($projectKey)) {
            $project->increment('views');
            session()->put($projectKey, true);
            session()->save();
        }
        return view('detailblog',compact('project'));
    }
  

}
