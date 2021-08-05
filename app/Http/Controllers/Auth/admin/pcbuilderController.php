<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use App\Models\pc_build;
use App\Models\product;
use App\Models\hardware;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class pcbuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pc_builds = pc_build::paginate(15);
        $paginate = $pc_builds;
        // $hardwares = $pc_builds->hardwares()->get()->take(6);

        // dd($hardwares);
        return view('admin.builder.index', compact('pc_builds', 'paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hardwares = hardware::get();
        return view('admin.builder.create', compact('hardwares'));
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


        $storeP = new product();
        $storeP->name = $request->input('name');
        $storeP->slug = str::slug($request->input('name'));
        $storeP->description = $request->input('description');
        $storeP->quantity = $request->input('quantity');
        $storeP->price = $request->input('price');
        $storeP->image = $storeP->slug . '_pcbuild' . '.' . $ext;
        $storeP->realese_date = $request->input('realese_date');
        $storeP->visibility = $request->input('visibility');
        $storeP->global_category = $request->input('global_category');
        $storeP->category_id = 1;
        $storeP->brand_id = 1;
        $storeP->save();
        $request->file('image')->storeAs('products_img', $storeP->slug . '_pcbuild'. '.' . $ext, 'public');


        $store = new pc_build();
        $store->tier = $request->input('tier');
        $store->product_id = $storeP->id;
        $store->visibility = $request->input('visibility');
        $store->save();

        $build = pc_build::find($store->id);
        $build->hardwares()->attach($request->input('hardware'));

        // $HW = new hardware($request->input('hardware'));
        // $build = pc_build::find($store)->hardwares()->saveMany($HW);
        // hardware::create($request->input('hardware'))->pc_builds()->attach($store->id);

        // dd($HW);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pc_build  $pc_build
     * @return \Illuminate\Http\Response
     */
    public function show(pc_build $pc_build)
    {
        // $pc_build = pc_build::find   (8);
        // dd($pc_build);
        return view('Routes.viewProduct.buildShow', compact('pc_build'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pc_build  $pc_build
     * @return \Illuminate\Http\Response
     */
    public function edit($pcbuilders, pc_build $build)
    {
        $build = pc_build::find($pcbuilders);
        $hardwares = hardware::get();
        return view('admin.builder.edit', compact('hardwares', 'build'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pc_build  $pc_build
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pc_build $pc_build, $pcbuilders)
    {




        // dd($pcbuilders);
        $storeP = pc_build::find($pcbuilders);
        $storeP->product->slug = str::slug($request->input('name'));
        // dd($request->file('image'));
        if ($request->file('image') != '') {
            // dd(2);
            $ext = $request->file('image')->extension();
            $request->file('image')->storeAs('products_img', $storeP->product->slug . '_pcbuild'. '.' . $ext, 'public');
            $storeP->product->image = $storeP->product->slug . '_pcbuild' . '.' . $ext;


        }
        // dd(1);
        $storeP->tier = $request->input('tier');
        $storeP->product->name = $request->input('name');
        $storeP->product->description = $request->input('description');
        $storeP->product->quantity = $request->input('quantity');
        $storeP->product->price = $request->input('price');
        $storeP->product->realese_date = $request->input('realese_date');
        $storeP->product->visibility = $request->input('visibility');
        $storeP->product->global_category = $request->input('global_category');
        $storeP->product->category_id = 1;
        $storeP->product->brand_id = 1;
        $storeP->product->save();
        $storeP->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pc_build  $pc_build
     * @return \Illuminate\Http\Response
     */
    public function destroy(pc_build $pc_build)
    {

    }
    public function hide(pc_build $pc_build)
    {
        // dd($pc_build);
        $pc_build->visibility = 0;
        $pc_build->save();
        $pc_build->product->visibility = 0;
        $pc_build->product->save();
        return redirect()->back();
    }
    public function restore(pc_build $pc_build)
    {
        $pc_build->visibility = 1;
        $pc_build->save();
        $pc_build->product->visibility = 1;
        $pc_build->product->save();

        return redirect()->back();
    }
}
