<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pc_build extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the pc_build
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function hardwares()
    {
        return $this->belongsToMany(hardware::class);
    }



}
