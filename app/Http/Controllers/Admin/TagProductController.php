<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class TagProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags =  TagProduct::simplePaginate(10);
        return view('admin.tag_product.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = TagProduct::orderBy('created_at', 'DESC')->get();
        return view('admin.tag_product.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:tags_product',
            'status' => 'required'
        ]);

        $data = $request->only('name', 'status');
       
     
        if (TagProduct::create($data)) {

           return redirect()->route('tag_product.index')->with('ok', 'Create new Tag successfully');

        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagProduct $tag_product)
    {
        return view('admin.tag_product.edit', compact('tag_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagProduct $tag_product)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:tags_product,name,' . $tag_product->id,
            'status' => 'required'
        ]);

        $data = $request->only('name', 'status');

        if ($tag_product->update($data)) {
            return redirect()->route('tag_product.index')->with('ok', 'Update Tag successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagProduct $tag_product)
    {
       
        if ($tag_product->delete()) {
            return redirect()->route('tag_product.index')->with('ok', 'Delete Tag successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }
}
