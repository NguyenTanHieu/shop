<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $append= ['favorited'];
      
    protected $fillable = ['name','slug','price','sale_price','image','category_id','description','status'];
    

    public function cat(){
       return $this->hasOne(Category::class , 'id','category_id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class , 'product_id','id');
     }
     public function getFavoritedAttribute(){
      $favorited = Favorite::where(['product_id'=>$this->id,'customer_id'=>auth('cus')->id()])->first();
      return $favorited ? true :false;
}
public function tags()
{
    return $this->belongsToMany(TagProduct::class, 'pivot_tags_product', 'product_id', 'tag_id');
}
public function scopeSearch($query){
    if(request('key')){
        $key = request('key');
        $query = $query->where('name','like','%'.$key.'%');
    }
    if(request('cat_id')){
        $query = $query->where('category_id',request('cat_id'));
    }
    return $query;
}
}
