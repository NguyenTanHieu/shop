<?php

// PostController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $data=Post::orderBy('post_id','DESC')->paginate(20);
         
        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $cats = CategoryPost::orderBy('created_at', 'DESC')->get();
        return view('admin.post.create', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150',
            'status' => 'required',
            'img' => 'required',
          
        ]);
        $data = $request->only('name', 'slug', 'image', 'status', 'description');
        $slug = Str::slug($request->name);
        $data['slug'] = $slug;
        $imag_name= $request->img->hashName();
        $request->img->move(public_path('uploads/post'), $imag_name);
        $data['image'] =  $imag_name;
        if($post=Post::create($data)){
            $post->cats()->attach($request->cats);
            return redirect()->route('post.index')->with('ok','Create new Product successfully');
        }
        return redirect()->back()->with('no','Something error, please try again');
    
    }

    public function edit(Post $post)
    {
        $cats = CategoryPost::orderBy('created_at', 'DESC')->get();
        return view('admin.post.edit', compact('post', 'cats'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|min:4|max:150',
            'status' => 'required',
            'img' => 'nullable|image', // Đặt trường 'img' là tùy chọn và kiểm tra xem đó có phải là một hình ảnh không
        ]);
    
        $data = $request->only('name', 'slug', 'image', 'status', 'description');
    
        if ($request->has('img')) {
            $img_name = $post->image;
            $image_path = public_path('uploads/post') . '/' . $img_name;
    
            if (file_exists($image_path)) {
                unlink($image_path);
            }
    
            $imag_name = $request->img->hashName();
            $request->img->move(public_path('uploads/post'), $imag_name);
            $data['image'] = $imag_name;
        }
    
        if ($post->update($data)) {
            $post->cats()->detach();
            $post->cats()->attach($request->cats);
    
            return redirect()->route('post.index')->with('ok', 'Cập nhật sản phẩm thành công');
        }
    
return redirect()->back()->with('no','Something error, please try again');
}
    public function destroy(Post $post)
    {
        // Detach categories before deleting the post
        $post->cats()->detach();

        $post->delete();

        return redirect()->route('post.index');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
