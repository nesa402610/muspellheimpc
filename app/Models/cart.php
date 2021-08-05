<?php

namespace App\Models;

use Validator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Mail;
use App\Mail\OrderShipped;
use App\Mail\orderconfirmed;

class cart extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(product::class)->withPivot('quantity');
    }

    public function GetFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForQuantity();
        }
        return $sum;
    }

    public function saveOrder($name, $email, $phone, $adress)
    {


        request()->validate([
            'name' => 'required|max:30',
            'email' => 'required|min:8|max:30|email',
            'phone' => 'required|regex:/^([\+7, 7, 8])[0-9]{10}$/'
        ]);

        if ($this->status == 0) {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->adress = $adress;
            $this->status = 1;
            $this->save();
            session()->forget('cart_id');
            Mail::to('muspellheimPc@yandex.ru')->send(new orderconfirmed($name));
            Mail::to($email)->send(new orderconfirmed($name));
            return true;

        } else {
            session()->forget('cart_id');
            return false;
        }
    }

    public function waitingFor()
    {
        return $this->where('status', 1)->get();
    }
}
