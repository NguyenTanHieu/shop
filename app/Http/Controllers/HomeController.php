<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\Product;
use App\Models\TagProduct;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){ 
        $products = Product::limit(12)->get();
        $topBanner = Banner::getbanner()->first();
        return view('home.index', compact('topBanner', 'products'));
    }
    
    public function about(){ 
        return view('home.about');
    }
    public function category(Category $cat){
        // $products = Product::where('category_id',$cat->id)->get();
        $products=$cat->products()->paginate(9);
        $news_products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('home.category',compact('cat','products','news_products'));
    }
    public function product(Product $product){

        $products = Product::where('category_id',$product->catgory_id)->limit(12)->get();
        return view('home.product',compact('product','products'));
    }
    public function tag(TagProduct $tag)
    {
        
        $tags = TagProduct::limit(12)->get(); // Lấy danh sách các tag
        $products = $tag->products()->paginate(12); // Lấy sản phẩm liên quan đến tag
   
        return view('home.tag', compact('tag', 'products', 'tags'));
    }
    public function category_Post(CategoryPost $catp){
        // $products = Product::where('category_id',$cat->id)->get();
        $posts=$catp->posts()->paginate(9);
      
        return view('home.blog.category_post',compact('catp','posts'));
    }
    public function post(Post $post){

        $posts = Post::limit(12)->get();
        return view('home.blog.post',compact('post','posts'));
    }
}
