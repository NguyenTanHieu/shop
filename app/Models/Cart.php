<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    // protected $primaryKey = 'cart_id';
    // protected $fillable = ['user_id','product_id','quantity_cart', 'cart_id'];
    
    // public function product(){
    //     return $this->belongsTo(Product::class, 'product_id','id');
    // }
    public $timestamps = false;
    protected $fillable = ['customer_id','product_id','price', 'quantity'];

    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
 
}
