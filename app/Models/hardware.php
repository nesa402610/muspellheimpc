<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hardware extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function pc_builds()
    {
        return $this->belongsToMany(pc_build::class);
    }

}
