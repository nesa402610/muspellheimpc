<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\brand;
use App\Models\hardware;
use App\Models\accessory;
use App\Models\pc_build;
use App\Models\category;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = brand::get();
        $categories = category::get();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ext = $request->file('image')->extension();
        $request->file('image')->storeAs('products_img', $request->input('name') . '_image'. '.' . $ext, 'public');

        $product = new product();
        $product->name = $request->input('name');
        $product->slug = str::slug($request->input('name'));
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->quantity = $request->input('quantity');
        $product->image = $request->input('name') . '_image' . '.' . $ext;
        $product->realese_date = $request->input('date');
        $product->visibility = $request->input('visibility');
        $product->global_category = $request->input('g_cat');
        $product->save();

        // $product->code = $request->input('code');
        // $product->visibility = $request->input('visibility');
        if ($request->input('g_cat') == 1) {
            $pc = new pc_build();
            $pc->product_id = $product->id;
            $pc->visibility = $request->input('visibility');
            $pc->tier = 0;
            $pc->save();
        } elseif ($request->input('g_cat') == 2) {
            $hw = new hardware();
            $hw->product_id = $product->id;
            $hw->category_id = $product->category_id;
            $hw->brand_id = $product->brand_id;
            $hw->visibility = $request->input('visibility');
            $hw->save();
        } else {
            $ass = new accessory();
            $ass->product_id = $product->id;
            $ass->category_id = $product->category_id;
            $ass->brand_id = $product->brand_id;
            $pass->visibility = $request->input('visibility');
            $ass->save();
        }


        // $hw->product_id = $product->id;



        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $brands = brand::get();
        $categories = category::get();
        return view('admin.products.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->name = $request->input('name');
        $product->slug = str::slug($request->input('name'));
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->quantity = $request->input('quantity');
        // $product->code = $request->input('code');
        $product->global_category = $request->input('global_category');
        $product->visibility = $request->input('visibility');

        $product->save();



        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->visibility = 0;

        $product->save();

        return redirect()->route('products.index');
    }

    public function vis_change(product $product)
    {
        if ($product->visibility === 0) {
            $product->visibility = 1;
        } else {
            $product->visibility = 0;
        }
        $product->save();

        return redirect()->back();
    }
}
