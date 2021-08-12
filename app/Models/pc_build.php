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
    public function CPU()
    {
        return $this->belongsTo(product::class, 'CPU_id');
    }
    public function GPU1()
    {
        return $this->belongsTo(product::class, 'GPU1_id');
    }
    public function GPU2()
    {
        return $this->belongsTo(product::class, 'GPU2_id');
    }
    public function RAM()
    {
        return $this->belongsTo(product::class, 'RAM_id');
    }
    public function MB()
    {
        return $this->belongsTo(product::class, 'MotherBoard_id');
    }
    public function SSD1()
    {
        return $this->belongsTo(product::class, 'SSD1_id');
    }
    public function SSD2()
    {
        return $this->belongsTo(product::class, 'SSD2_id');
    }
    public function SSD3()
    {
        return $this->belongsTo(product::class, 'SSD3_id');
    }
    public function SSD4()
    {
        return $this->belongsTo(product::class, 'SSD4_id');
    }
    public function HDD1()
    {
        return $this->belongsTo(product::class, 'HDD1_id');
    }
    public function HDD2()
    {
        return $this->belongsTo(product::class, 'HDD2_id');
    }
    public function HDD3()
    {
        return $this->belongsTo(product::class, 'HDD3_id');
    }
    public function HDD4()
    {
        return $this->belongsTo(product::class, 'HDD4_id');
    }
    public function SPU()
    {
        return $this->belongsTo(product::class, 'SPU_id');
    }

    public function hardwares()
    {
        return $this->belongsToMany(hardware::class);
    }



}
