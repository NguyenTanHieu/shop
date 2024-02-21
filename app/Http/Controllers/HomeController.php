<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Post;
use App\Models\Product;
use App\Models\TagPost;
use App\Models\TagProduct;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(12)->get();
        $topBanner = Banner::getbanner()->first();
        $posts = Post::limit(12)->get();
        return view('home.index', compact('topBanner', 'products', 'posts'));
    }

    public function about()
    {
        return view('home.about');
    }


    public function contact()
    {
        return view('home.contact');
    }
    public function category(Category $cat)
    {
        // $products = Product::where('category_id',$cat->id)->get();
        $products = $cat->products()->paginate(4);
        $news_products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        // dd($cat);
        return view('home.category', compact('cat', 'products', 'news_products'));
    }
    public function favorite($product_id)
    {
        $data = [
            'product_id' => $product_id,
            'customer_id' => auth('cus')->id(),
        ];
        $favorited = Favorite::where(['product_id' => $product_id, 'customer_id' => auth('cus')->id()])->first();
        if ($favorited) {
            $favorited->delete();
            return redirect()->back()->with('ok', 'Bỏ yêu thích sản phẩm thành công');
        } else {
            Favorite::create($data);
            return redirect()->back()->with('ok', 'Bạn đã yêu thích sản phẩm');
        }
    }




    public function product(Product $product)
    {

        $products = Product::where('category_id', $product->category_id)->limit(4)->get();
        return view('home.product', compact('product', 'products'));
    }
    public function tag(TagProduct $tag)
    {

        $tags = TagProduct::limit(12)->get(); // Lấy danh sách các tag
        $products = $tag->products()->paginate(12); // Lấy sản phẩm liên quan đến tag

        return view('home.tag', compact('tag', 'products', 'tags'));
    }
    // public function tagPost(TagPost $tag)
    // {

    //     $tags = TagPost::limit(12)->get(); // Lấy danh sách các tag
    //     $post = $tagP->products()->paginate(12); // Lấy sản phẩm liên quan đến tag

    //     return view('home.tag', compact('tag', 'products', 'tags'));
    // }
    public function category_Post(CategoryPost $catp)
    {
        // $products = Product::where('category_id',$cat->id)->get();
        $posts = $catp->posts()->paginate(9);

        return view('home.blog.category_post', compact('catp', 'posts'));
    }
    public function post(Post $post)
    {

        $post_id = $post->post_id;
        $comments = Comment::where(['blog_id' => $post_id, 'reply_id' => null])->get();
        $posts = Post::limit(12)->get();
        return view('home.blog.post', compact('post', 'posts', 'comments'));
    }

    public function ajaxSearch()
    {
        $data = Product::search()->get();
        return view('home.ajaxSearch', compact('data'));
    }
    public function sortProducts(Request $request)
    {

        $request_data = $request->all();
        try {
            $products = Product::where('category_id', $request_data['category_id'])
                ->orderBy("price", $request_data['sort'])->paginate(4);

            return response()->json([
                'status' => 200,
                'html' => view('home.ajax.sort-product', compact('products'))->render(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'err' => $th
            ]);
        }
    }
}
