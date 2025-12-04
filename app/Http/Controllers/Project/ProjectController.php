<?php

namespace App\Http\Controllers\Project;



use App\Models\Images;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
     public function index(){
        $projects = Project::orderBy('created_at', 'desc')->paginate(25);
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
        'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        'image_cropped' => 'nullable'
    ]);

    $imagePath = null;

    // Jika ada hasil crop
 if ($request->image_cropped) {

    $fileName = 'project_' . time() . '.jpg';

    // Hapus prefix base64
    $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $request->image_cropped);
    $imageData = base64_decode($base64);

    if ($imageData !== false) {

        // Pastikan folder ada
        Storage::disk('public')->makeDirectory('projects');

        // Simpan file
        Storage::disk('public')->put("projects/{$fileName}", $imageData);

        $imagePath = "projects/{$fileName}";
    }
}
// Jika ada file upload baru
if ($request->hasFile('image')) {
    // Hapus gambar lama
    if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
        unlink(storage_path('app/public/' . $project->image));
    }
    $imagePath = $request->file('image')->store('projects', 'public');
}

    Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
        'slug' => $request->slug,
        'link' => $request->link,
        'category_id' => json_encode($request->category_id),
        'auth' => auth()->id(),
        'status' => $request->status ?? '0',
    ]);

    return back()->with('success', 'Project berhasil disimpan!');

}
  public function edit($slug){
        $categories = Category::all();
         $images = Images::all();
        $project = Project::where('slug',$slug)->first();
           
        return view('backend.projek.edit', compact('categories','project','images','slug'));
    }
    
public function update(Request $request, $slug)
{
  $project = Project::where('slug', $request->slug_old)->first();

$request->validate([
    'title' => 'required',
    'category_id' => 'required',
    'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'image_cropped' => 'nullable',
]);

$imagePath = $project->image; // default: tetap pakai gambar lama

// Jika ada file upload baru
if ($request->hasFile('image')) {
    // Hapus gambar lama
    if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
        unlink(storage_path('app/public/' . $project->image));
    }
    $imagePath = $request->file('image')->store('projects', 'public');
}

// Jika ada hasil crop base64
if ($request->image_cropped) {
    $fileName = 'project_' . time() . '.jpg';
    $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $request->image_cropped);
    $imageData = base64_decode($base64);

    if ($imageData !== false) {
        // Pastikan folder ada
        Storage::disk('public')->makeDirectory('projects');
        // Simpan file crop
        Storage::disk('public')->put("projects/{$fileName}", $imageData);

        // Hapus gambar lama jika ada
        if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
            unlink(storage_path('app/public/' . $project->image));
        }

        $imagePath = "projects/{$fileName}";
    }
}

// Optional: replace relative storage path di deskripsi menjadi absolute URL
$description = $request->description;
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
    'auth' => auth()->id(),
    'status' => $request->status ?? '1',
]);

return redirect()->route('project.edit', $project->slug)->with('success', 'Project berhasil diupdate!');

}

public function destroy($slug)
{
    // Ambil project berdasarkan slug
    $project = Project::where('slug', $slug)->firstOrFail();

    // Hapus gambar jika ada
    if ($project->image && \Storage::exists('public/' . $project->image)) {
        Storage::delete('public/' . $project->image);
    }

    // Hapus record dari database
    $project->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()
        ->back()
        ->with('success', 'Project berhasil dihapus!');
}
public function deleteMultiple(Request $request)
{
    $ids = $request->projects;
    if($ids){
        Project::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Project berhasil dihapus.');
    }
    return redirect()->back()->with('error', 'Tidak ada project yang dipilih.');
}
public function publish(Project $project) {
    $project->status = 1; // dipublikasikan
    $project->save();
    return back()->with('success', 'Project berhasil dipublikasikan.');
}

public function draft(Project $project) {
    $project->status = 0; // draft
    $project->save();
    return back()->with('success', 'Project berhasil diubah menjadi draft.');
}



}
