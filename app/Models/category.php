<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function hardwares()
    {
        return $this->hasMany(hardware::class);
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }




    public function totalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->products as $hardware) {
            $totalQuantity += $hardware->quantity;
        }
        return $totalQuantity;
    }
}
