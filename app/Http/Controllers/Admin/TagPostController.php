<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TagPost;
use Illuminate\Http\Request;

class TagPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagPosts =  TagPost::simplePaginate(10);
        return view('admin.tag_post.index', compact('tagPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagPosts = TagPost::orderBy('created_at', 'DESC')->get();
        return view('admin.tag_post.create', compact('tagPosts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:tags_post',
            'status' => 'required'
        ]);

        $data = $request->only('name', 'status');
        if (TagPost::create($data)) {

           return redirect()->route('tag_post.index')->with('ok', 'Create new Tag successfully');

        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagPost $tag_post)
    {
        return view('admin.tag_post.edit', compact('tag_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagPost $tag_post)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:tags_product,name,' . $tag_post->post_id,
            'status' => 'required'
        ]);

        $data = $request->only('name', 'status');

        if ($tag_post->update($data)) {
            return redirect()->route('tag_post.index')->with('ok', 'Update Tag successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagPost $tag_post)
    {
       
        if ($tag_post->delete()) {
            return redirect()->route('tag_post.index')->with('ok', 'Delete Tag successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }
}
