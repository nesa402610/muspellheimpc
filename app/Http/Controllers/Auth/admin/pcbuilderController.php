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
        $storeP->global_category = 1;
        $storeP->category_id = 2;
        $storeP->brand_id = 2;
        $storeP->save();
        $request->file('image')->storeAs('products_img', $storeP->slug . '_pcbuild'. '.' . $ext, 'public');


        $store = new pc_build();
        $store->tier = $request->input('tier');
        $store->product_id = $storeP->id;
        $store->visibility = $request->input('visibility');
        $store->CPU_id = $request->input('hardware_CPU_id');
        $store->GPU1_id = $request->input('hardware_GPU1_id');
        $store->GPU2_id = $request->input('hardware_GPU2_id');
        $store->MotherBoard_id = $request->input('hardware_MotherBoard_id');
        $store->RAM_id = $request->input('hardware_RAM_id');
        $store->SPU_id = $request->input('hardware_SPU_id');
        $store->CPU_cooler_id = $request->input('hardware_CPU_cooler_id');
        $store->HDD1_id = $request->input('hardware_HDD1_id');
        $store->HDD2_id = $request->input('hardware_HDD2_id');
        $store->HDD3_id = $request->input('hardware_HDD3_id');
        $store->HDD4_id = $request->input('hardware_HDD4_id');
        $store->SSD1_id = $request->input('hardware_SSD1_id');
        $store->SSD2_id = $request->input('hardware_SSD2_id');
        $store->SSD3_id = $request->input('hardware_SSD3_id');
        $store->SSD4_id = $request->input('hardware_SSD4_id');
        $store->PCI1_id = $request->input('hardware_PCI1_id');
        $store->PCI2_id = $request->input('hardware_PCI2_id');
        $store->PCI3_id = $request->input('hardware_PCI3_id');
        $store->OS_name = $request->input('hardware_OS_name');
        $store->case = $request->input('hardware_case');
        $store->height = $request->input('hardware_height');
        $store->width = $request->input('hardware_width');
        $store->length = $request->input('hardware_lenght');
        $store->weight = $request->input('hardware_weight');


        $store->save();

        // $build = pc_build::find($store->id);

        // foreach ($request->input('hardware') as $unit => $value) {
        //     if ($value != 0) {
        //         $build->hardwares()->attach($value);
        //         // dump($value);
        //     }
        // }


        // $build->hardwares()->attach($request->input('hardware'));
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
        $storeP->visibility = $request->input('visibility');
        $storeP->CPU_id = $request->input('hardware_CPU_id');
        $storeP->GPU1_id = $request->input('hardware_GPU1_id');
        $storeP->GPU2_id = $request->input('hardware_GPU2_id');
        $storeP->MotherBoard_id = $request->input('hardware_MotherBoard_id');
        $storeP->RAM_id = $request->input('hardware_RAM_id');
        $storeP->SPU_id = $request->input('hardware_SPU_id');
        $storeP->CPU_cooler_id = $request->input('hardware_CPU_cooler_id');
        $storeP->HDD1_id = $request->input('hardware_HDD1_id');
        $storeP->HDD2_id = $request->input('hardware_HDD2_id');
        $storeP->HDD3_id = $request->input('hardware_HDD3_id');
        $storeP->HDD4_id = $request->input('hardware_HDD4_id');
        $storeP->SSD1_id = $request->input('hardware_SSD1_id');
        $storeP->SSD2_id = $request->input('hardware_SSD2_id');
        $storeP->SSD3_id = $request->input('hardware_SSD3_id');
        $storeP->SSD4_id = $request->input('hardware_SSD4_id');
        $storeP->PCI1_id = $request->input('hardware_PCI1_id');
        $storeP->PCI2_id = $request->input('hardware_PCI2_id');
        $storeP->PCI3_id = $request->input('hardware_PCI3_id');
        $storeP->OS_name = $request->input('hardware_OS_name');
        $storeP->case = $request->input('hardware_case');
        $storeP->height = $request->input('hardware_height');
        $storeP->width = $request->input('hardware_width');
        $storeP->length = $request->input('hardware_lenght');
        $storeP->weight = $request->input('hardware_weight');



        $storeP->product->name = $request->input('name');
        $storeP->product->description = $request->input('description');
        $storeP->product->quantity = $request->input('quantity');
        $storeP->product->price = $request->input('price');
        $storeP->product->realese_date = $request->input('realese_date');
        $storeP->product->visibility = $request->input('visibility');

        // $storeP->product->global_category = $request->input('global_category');
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
