<?php

namespace App\Http\Controllers\Project;


use App\Models\Images;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
     public function index(){
        $projects = Project::orderBy('created_at', 'desc')->get();
        
        return view('backend.projek.index',compact('projects'));
    }
    public function add(){
        $categories = Category::all();
        $images = Images::all();
        return view('backend.projek.add', compact('categories','images'));
    }
    public function store(Request $request)
{
  
    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
        'image' => 'image|mimes:jpg,png,jpeg,webp|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('projects', 'public');
    }

    $project = Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
        'slug' => $request->slug,
        'link' => $request->link,
        'category_id' => json_encode($request->category_id),

    ]);
  
    return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
}
  public function edit($slug){
        $categories = Category::all();
         $images = Images::all();
        $project = Project::where('slug',$slug)->first();
        return view('backend.projek.edit', compact('categories','project','images','slug'));
    }
    
public function update(Request $request, $slug)
{
    $project = Project::where('slug',$request->slug_old)->first();

    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Upload image baru jika ada
    if ($request->hasFile('image')) {

        // HAPUS GAMBAR LAMA JIKA ADA
        if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
            unlink(storage_path('app/public/' . $project->image));
        }

        $imagePath = $request->file('image')->store('projects', 'public');
    } else {
        $imagePath = $project->image;
    }
    // Optional: replace relative storage path di deskripsi menjadi absolute URL
   $description = $request->description;

    // Ganti src="/storage/..." jadi full URL
    $description = preg_replace_callback(
        '/src="\/storage\/([^"]+)"/i',
        function ($matches) {
            return 'src="' . asset('storage/' . $matches[1]) . '"';
        },
        $description
    );
    // UPDATE DATA
    $project->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $description,
        'image' => $imagePath,
        'link' => $request->link,
         'category_id' => json_encode($request->category_id),
    ]);

    return redirect()->route('project.edit',$project->slug)->with('success', 'Project berhasil diupdate!');
}

}
