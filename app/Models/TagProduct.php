<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagProduct extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];
    protected $table = 'tags_product';
    public function products()
    {
        return $this->belongsToMany(Product::class, 'pivot_tags_product', 'tag_id', 'product_id');
    }
}
