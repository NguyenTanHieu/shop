<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'categories_post';
    protected $fillable = ['name', 'slug', 'status'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'pivot_categories_post', 'category_post_id', 'post_id');
    }
}