<?php

namespace App\Http\Controllers\Media;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    public function index(){
        $images = Images::all();
        return view('backend.media.index',compact('images'));
    }
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:2048', // max 2MB
        'title' => 'nullable|string|max:255',
        'link' => 'nullable|url',
    ]);

    $path = $request->file('image')->store('gallery', 'public');

    Images::create([
        'title' => $request->title,
        'image' => $path,
        'link' => $request->link,
    ]);

    return redirect()->back()->with('success', 'Image uploaded successfully!');
}
public function drop(request $request){
 $request->validate([
        'images.*' => 'required|image',
    ]);

    $uploaded = [];

    if($request->hasFile('images')) {
        foreach($request->file('images') as $file) {
            // Simpan file ke storage
            $path = $file->store('uploads', 'public');

            // Simpan ke database
            $image = Images::create([
                'image' => $path
            ]);

            $uploaded[] = $image->image; // atau $image->id jika mau pakai id
        }
    }

    return response()->json([
        'success' => true,
        'images' => $uploaded
    ]);
}

}
