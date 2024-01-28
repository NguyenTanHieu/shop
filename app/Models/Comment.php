<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
  
    protected $table = 'comment_blog';
    protected $fillable = ['customer_id', 'relay_id', 'blog_id', 'status', 'content'];
    

    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function replies(){
        return $this->hasMany(Comment::class,'reply_id','id');
    }
}
