<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(product_images::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function pc_buildsCPU()
    {
        return $this->Many(pc_build::class, 'CPU_id');
    }

    public function pc_build()
    {
        return $this->hasOne(pc_build::class, 'product_id');
    }


    public function hardware()
    {
        return $this->hasOne(hardware::class);
    }
    public function accessories()
    {
        return $this->hasMany(accessory::class);
    }






    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }



    // public function accessories()
    // {
    //     return $this->belongsToMany(accessory::class);
    // }

    public function getPriceForQuantity()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->quantity * $this->price;
        }
        return $this->price;
    }


}
