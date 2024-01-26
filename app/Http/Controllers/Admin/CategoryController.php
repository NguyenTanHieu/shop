<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::simplePaginate(10);
        return view('admin.category.index', compact('categories'));
    }
    // public function test()
    // {
    //     try {
    //         Category::create([
    //             'name' => 'Dát3',
    //             'status' => 0
    //         ]);
    //         return true;
    //     } catch (\Throwable $th) {
    //         return false;
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd( $request->all());

        $request->validate([
            'name' => 'required|min:4|max:150|unique:categories',
            'status' => 'required'
        ]);

        $data = $request->only('name', 'status');

        if (Category::create($data)) {
            return redirect()->route('category.index')->with('ok', 'Create new Category successfully');
        }

        return redirect()->back()->with('no', 'Something error, please try again');
    }




    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:categories,name,' . $category->id,
            'status' => 'required'
        ]);
     
        $data = $request->only('name', 'status');
     
        if ($category->update($data)) {
            return redirect()->route('category.index')->with('ok', 'Update Category successfully');
        }
    
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('category.index')->with('ok', 'Delete Category successfully');
        }
    
        return redirect()->back()->with('no', 'Something error, please try again');
    }
}
