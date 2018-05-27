<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perhitungan_pilihan extends Model
{
    protected $table = 'perhitungan_pilihan';
    protected $fillable = [
        'id_pilihan', 'id_perhitungan'
    ];
}
