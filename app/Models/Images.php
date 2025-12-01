<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Images extends Model
{
   
    protected $fillable = ['title', 'image', 'link'];

    // Optional helper untuk URL image
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default.png');
    }

    // Optional delete file helper
    public function deleteImage()
    {
        if ($this->image && Storage::exists($this->image)) {
            Storage::delete($this->image);
        }
    }
}
