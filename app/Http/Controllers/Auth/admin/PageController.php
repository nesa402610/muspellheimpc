<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use App\Models\accessory;
use Illuminate\Http\Request;

use App\Models\cart;
use App\Models\brand;
use App\Models\hardware;
use App\Models\pc_build;
use App\Models\product;

use Storage;


class pagecontroller extends Controller
{

    public function home()
    {
    }

    public function order($id, request $request)
    {
        $order = cart::find($id);
        // dd(auth::user()->isAdmin);
        return view('admin.orders.order', compact('order'));
    }

    public function orders()
    {
        // dd(auth()->user()->isAdmin);
        $orders = cart::where('status', 1)->get();

        return view('admin.orders.orders', compact('orders'));
    }

    public function endProccessing($id)
    {
        // dd($id);
        $order = cart::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('admin.orders');
    }

    public function test()
    {
        $hardware = hardware::first();
        dump($hardware->brand->name);
    }

    public function TestPage()
    {
        // $images = Storage::disk('public')->allfiles();
        $dir = Storage::disk('public')->alldirectories();
        foreach ($dir as $d) {
            $images = storage::disk('public')->allfiles($d);
        }
        return view('admin.test', compact('images', 'dir'));
    }
    public function TestPageDelete($image)
    {
        // dd($image);
        storage::disk('public')->delete($image);
        return redirect()->back();
    }


    public function search(Request $request)
    {
        // dd($request->input('search'));
        $q = $request->input('search');
        $p = product::where('name', 'LIKE', '%' . $q . '%')->get();
        // dump($p);


        // dump($hw);
        // dd();
        // $pc = pc_build::where('name', 'LIKE', '%' . $q . '%')->get();
        // dd($data);

        return view('Routes.Header.search', compact('p'));
    }
}
