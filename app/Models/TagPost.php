<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];
    protected $table = 'tags_post';
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'pivot_tags_post', 'tag_post_id', 'post_id');
    }
}
