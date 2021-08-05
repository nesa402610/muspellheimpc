<?php

namespace App\Http\Controllers\auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\cart;
use App\Models\brand;
use App\Models\hardware;
use App\Models\pc_build;


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

}
