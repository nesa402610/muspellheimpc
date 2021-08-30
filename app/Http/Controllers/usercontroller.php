<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\cart;
use App\Models\cart_product;

use DB;

use Auth;

class usercontroller extends Controller
{
    public function update__userinfo (request $request)
    {
        $user = user::find(auth::user()->id);
        $user->adress = $request->input('adress');
        $user->save();
        return redirect()->back();
    }

    public function userprofile()
    {

        $orders = cart::where('phone', auth::user()->phone)->get();

        // foreach ($orders as $order) {
        //     // $a = $order->orders();
        //     // dd($order);
        //     // dump($order->orders());
        // }

        // dump($order->orders());
        // dump($ordersALL);
        // $orders = cart::where('user_id', auth::user()->id)->get();
        // foreach ($carts as $cart_id) {
        //     $cart = cart::find($cart_id->id);
        // }
        // $test = cart::orders();
        // dump($cart);
        // dd(cart::orders());
        // dump($order_items);
        // $orders = cart::findorFail(31);
        // $cartProducts = cart::find()
        // dd(12);
        return view('auth.userprofile', compact('orders'));
    }
}
