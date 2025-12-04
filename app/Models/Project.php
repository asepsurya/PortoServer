<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
    'category_id' => 'array',
];


    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
        'link',
        'category_id',
        'auth',
        'views',
        'status',
    ];

    public function category() {
            $ids = is_array($this->category_id) ? $this->category_id : json_decode($this->category_id, true);
            return Category::whereIn('id', $ids ?? [])->get();
    }
    

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }
 
    
     public function user()
    {
        return $this->belongsTo(User::class, 'auth', 'id'); // 'satuan' = field di stok_items
    }
    
}
