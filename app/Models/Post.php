<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $fillable = ['name', 'slug', 'image', 'status', 'description'];
    
    public function cats()
    {
        return $this->belongsToMany(CategoryPost::class, 'pivot_categories_post', 'post_id', 'category_post_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'post_id');
    }
    public function tags()
{
    return $this->belongsToMany(TagPost::class, 'pivot_tags_post', 'post_id', 'tag_post_id');
}
}
