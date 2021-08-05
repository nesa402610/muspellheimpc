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
        // $a = cart::where('phone', auth::user()->phone)->get();
        // foreach ($a as $b) {
        //    $c = $b->cart_product()->get();
        //     dd($c);
        // }
        // dd($a);
        // $carts = cart::where('phone', auth::user()->phone)->get();

        // dd($cartID);
        $orders = cart::where('email', auth::user()->email)->where('phone', auth::user()->phone)->get();
        // dd(cart::cart_product());
        // $cartProducts = cart::find()
        return view('auth.userprofile', compact('orders'));
    }
}
