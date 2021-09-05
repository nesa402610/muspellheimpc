<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required'
        ]);

        $ext = $request->file('image')->extension();
        $request->file('image')->storeAs('category_img', str::slug($request->input('name')) . '_image'. '.' . $ext, 'public');

        $store = new category();
        $store->name = $request->input('name');
        $store->visibility = $request->input('visibility');
        $store->slug = str::slug($request->input('name'));
        $store->image = str::slug($request->input('name')) . '_image' . '.' . $ext;
        $store->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (!is_null($request->file('image'))) {
            $ext = $request->file('image')->extension();
            $request->file('image')->storeAs('category_img', str::slug($request->input('name')) . '_image'. '.' . $ext, 'public');
            $category->image = str::slug($request->input('name')) . '_image' . '.' . $ext;
        }

        // dd(str::slug($request->input('name')));
        $category->name = $request->input('name');
        $category->visibility = $request->input('visibility');
        $category->slug = str::slug($request->input('name'));

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
