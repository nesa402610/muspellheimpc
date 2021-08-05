<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\hardware;
use App\Models\brand;
use App\Models\category;

use Illuminate\Http\Request;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardwares = hardware::get();
        return view('admin.hardwares.index', compact('hardwares'));
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
        return view('admin.hardwares.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $storeHW = new hardware();
        $storeHW->product_id = product::create()->id;
        $storeHW->name = $request->input('name');
        $storeHW->description = $request->input('description');
        $storeHW->price = $request->input('price');
        $storeHW->quantity = $request->input('quantity');
        $storeHW->image = $request->input('image');
        $storeHW->realese_date = $request->input('realese_date');
        $storeHW->category_id = $request->input('category');
        $storeHW->brand_id = $request->input('brand');
        $storeHW->save();

        return redirect()->route('hardwares.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function show(hardware $hardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function edit(hardware $hardware)
    {
        dd($hardware);
        $brands = brand::get();
        $categories = category::get();
        return view('admin.hardwares.edit', compact('hardware', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hardware $hardware)
    {
        $hardware->name = $request->input('name');
        $hardware->price = $request->input('price');
        $hardware->quantity = $request->input('quantity');
        $hardware->category_id = $request->input('category');
        $hardware->brand_id = $request->input('brand');
        $hardware->save();

        return redirect()->route('hardwares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function destroy(hardware $hardware)
    {
        $hardware->delete();

        return back();
    }
}
