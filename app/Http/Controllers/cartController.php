<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cart;

use Mail;
use App\Mail\OrderShipped;
use App\Mail\orderconfirmed;

use Auth;

class cartController extends Controller
{

    public function confirmation()
    {
        $cart_id = session('cart_id');
        if(is_null($cart_id)){
            return redirect()->back();
        }
        $cart = Cart::find($cart_id);

        return view('confirmation', compact('cart'));
    }
    public function confirm(Request $request)
    {
        $cart_id = session('cart_id');
        if(!is_null($cart_id)){
            $cart = Cart::findOrFail($cart_id);
        }
        $cart = Cart::find($cart_id);
        $success = $cart->saveOrder($request->name, $request->email, $request->phone, $request->adress);

        // dd($request->name);

        if ($success == true) {
            session()->flash('success','Заказ принят в обработку!');
        } else {
            session()->flash('fail','Произошла ошибка!');

        }



        return redirect('/');

    }

    public function cart()
    {
        $cart = false;
        $cart_id = session('cart_id');
        if(!is_null($cart_id)){
            $cart = Cart::findOrFail($cart_id);
        }
        return view('cart', compact('cart'));
    }


    public function add($id)
    {
        $cart_id = session('cart_id');
        if(is_null($cart_id)) {
            $cart = Cart::create();
            session(['cart_id' => $cart->id]);
        } else {
            $cart = Cart::find($cart_id);
        }

        if($cart->products->contains($id)) {
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            $pivotRow->quantity++;
            $pivotRow->update();
        } else {
            $cart->products()->attach($id);
        }

        if (Auth::check()) {
            $cart->user_id = Auth::id();
            $cart->save();
        }
        // return redirect()->back()->with('cart.item.added');
        return redirect()->back()->with('cart.item.added', '');
    }

    public function minus($id)
    {
        $cart_id = session('cart_id');
        if(is_null($cart_id)) {
            return redirect('cart');
        }
        $cart = Cart::find($cart_id);

        if($cart->products->contains($id)) {
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            if ($pivotRow->quantity < 2) {
                $cart->products()->detach($id);
            } else {
                $pivotRow->quantity--;
                $pivotRow->update();
            }
        }
        return redirect('cart');
    }

    public function remove($id)
    {
        $cart_id = session('cart_id');
        // if(is_null($cart_id)) {
        //     return redirect('cart');
        // }
        $cart = Cart::find($cart_id);

        if($cart->products->contains($id)) {
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            $cart->products()->detach($id);
            return redirect('cart');
        }

    }













    // public function add(Request $request, $id)
    // {
    //     $cart_id = $request->cookie('cart_id');
    //     $quantity = $request->input('quantity') ?? 1;
    //     if (empty($cart_id)) {
    //         // если корзина еще не существует — создаем объект
    //         $cart = Cart::create();
    //         // получаем идентификатор, чтобы записать в cookie
    //         $cart_id = $cart->id;
    //
    //     } else {
    //         // корзина уже существует, получаем объект корзины
    //         $cart = Cart::findOrFail($cart_id);
    //         // обновляем поле `updated_at` таблицы `carts`
    //         $cart->touch();
    //         dd($cart_id);
    //
    //     }
    //
    //     if ($cart->pc_builds->contains($id)) {
    //         // если такой товар есть в корзине — изменяем кол-во
    //         $pivotRow = $cart->pc_builds()->where('pc_build_id', $id)->first()->pivot;
    //         $quantity = $pivotRow->quantity + $quantity;
    //         $pivotRow->update(['quantity' => $quantity]);
    //
    //     } else {
    //         // если такого товара нет в корзине — добавляем его
    //         $cart->pc_builds()->attach($id, ['quantity' => $quantity]);
    //     }
    //     return back()->withCookie(cookie('cart_id', $cart_id, 525600));
    //
    // }
    //
    // public function cart(Request $request)
    // {
    //     $cart_id = $request->cookie('cart_id');
    //     // dd($cart_id = $request->cookie('cart_id'));
    //     if (!empty($cart_id)) {
    //         $pc_builds = Cart::findOrFail($cart_id)->pc_builds;
    //         return view('cart', compact('pc_builds'));
    //     } else {
    //         abort(404);
    //     }
    // }



    //
    //
    // public function plus(Request $request, $id) {
    //     $cart_id = $request->cookie('cart_id');
    //     if (empty($cart_id)) {
    //         abort(404);
    //     }
    //     $this->change($cart_id, $id, 1);
    //     // выполняем редирект обратно на страницу корзины
    //     return redirect()
    //         ->route('cart')
    //         ->withCookie(cookie('cart_id', $cart_id, 525600));
    // }
    //
    // public function minus(Request $request, $id) {
    // $cart_id = $request->cookie('cart_id');
    // if (empty($cart_id)) {
    //     abort(404);
    // }
    // $this->change($cart_id, $id, -1);
    // // выполняем редирект обратно на страницу корзины
    // return redirect()
    //     ->route('cart')
    //     ->withCookie(cookie('cart_id', $cart_id, 525600));
    // }
    //
    // private function change($cart_id, $pc_build_id, $count = 0) {
    //     if ($count == 0) {
    //         return;
    //     }
    //     $cart = cart::findOrFail($cart_id);
    //     // если товар есть в корзине — изменяем кол-во
    //     if ($cart->pc_builds->contains($pc_build_id)) {
    //         $pivotRow = $cart->pc_builds()->where('pc_build_id', $pc_build_id)->first()->pivot;
    //         $quantity = $pivotRow->quantity + $count;
    //         if ($quantity > 0) {
    //             // обновляем кол-во товара $pc_build_id в корзине
    //             $pivotRow->update(['quantity' => $quantity]);
    //             // обновляем поле `updated_at` таблицы `carts`
    //             $cart->touch();
    //         } else {
    //             // кол-во равно нулю — удаляем товар из корзины
    //             $pivotRow->delete();
    //         }
    //     }
    // }



    // private $cart;
    //
    //    public function __construct() {
    //        $this->getcart();
    //    }
    //
    //    /**
    //     * Показывает корзину покупателя
    //     */
    //    public function cart() {
    //        $pc_builds = $this->cart->pc_builds;
    //        return view('cart', compact('pc_builds'));
    //    }
    //
    //    /**
    //     * Форма оформления заказа
    //     */
    //    public function checkout() {
    //        return view('cart.checkout');
    //    }
    //
    //    /**
    //     * Добавляет товар с идентификатором $id в корзину
    //     */
    //    public function add(Request $request, $id) {
    //        $quantity = $request->input('quantity') ?? 1;
    //        $this->cart->increase($id, $quantity);
    //        // dd($this);s
    //        // выполняем редирект обратно на ту страницу,
    //        // где была нажата кнопка «В корзину»
    //        return back();
    //    }
    //
    //    /**
    //     * Увеличивает кол-во товара $id в корзине на единицу
    //     */
    //    public function plus($id) {
    //        $this->cart->increase($id);
    //        // выполняем редирект обратно на страницу корзины
    //        return redirect()->route('cart');
    //    }
    //
    //    /**
    //     * Уменьшает кол-во товара $id в корзине на единицу
    //     */
    //    public function minus($id) {
    //        $this->cart->decrease($id);
    //        // выполняем редирект обратно на страницу корзины
    //        return redirect()->route('cart');
    //    }
    //    public function remove($id) {
    //     $this->cart->remove($id);
    //     // выполняем редирект обратно на страницу корзины
    //     return redirect()->route('cart');
    //     }
    //
    // /**
    //  * Полностью очищает содержимое корзины покупателя
    //  */
    // public function clear() {
    //     $this->cart->delete();
    //     // выполняем редирект обратно на страницу корзины
    //     return redirect()->route('cart');
    // }
    //
    //    /**
    //     * Возвращает объект корзины; если не найден — создает новый
    //     */
    //    private function getcart() {
    //        $cart_id = request()->cookie('cart_id');
    //        // dd($cart_id = request()->cookie('cart_id'));
    //        if (!empty($cart_id)) {
    //            try {
    //                $this->cart = cart::findOrFail($cart_id);
    //                // dd(1);
    //            } catch (ModelNotFoundException $e) {
    //                $this->cart = cart::create();
    //                // dd(2);
    //
    //            }
    //        } else {
    //            $this->cart = cart::create();
    //            // dd(3);
    //        }
    //        Cookie::queue('cart_id', $this->cart->id, 525600);
    //         dump(cookie::get('cart_id'));
    //         dump($this->cart->id);
    //         dump(request()->cookie('cart_id'));
    //         dump(cart::findOrFail($cart_id));
    //    }








}
