<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryPostController extends Controller
{
    public function index()
    {
        $categories = CategoryPost::simplePaginate(10);
        return view('admin.category_post.index', compact('categories'));
    }

    public function create()
    {
        $categories = CategoryPost::orderBy('created_at', 'DESC')->get();
        return view('admin.category_post.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:categories',
            'status' => 'required'
        ]);

        $data = $request->only('name','slug', 'status');
        $slug = Str::slug($request->name);
        $data ['slug'] = $slug;
        if (CategoryPost::create($data)) {
            return redirect()->route('category_post.index')->with('ok', 'Create new Category successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function edit(CategoryPost $category_post)
    {
        return view('admin.category_post.edit', compact('category_post'));
    }

    public function update(Request $request, CategoryPost $category_post)
    {
       
        $request->validate([
            'name' => 'required|min:4|max:150|unique:categories,name,' . $category_post->id,
            'status' => 'required'
        ]);
     
        $data = $request->only('name', 'status');
     
        if ($category_post->update($data)) {
           
            return redirect()->route('category_post.index')->with('ok', 'Update Category successfully');
        }
    
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function destroy(CategoryPost $category_post)
    {
        if ($category_post->delete()) {
            return redirect()->route('category_post.index')->with('ok', 'Delete Category successfully');
        }
    
        return redirect()->back()->with('no', 'Something error, please try again');
    }
}