<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perhitungan_perbandingan extends Model
{
    protected $table = 'perhitungan_perbandingan';
    protected $fillable = [
        'id_pilihan', 'id_perhitungan', 'cluster', 'value'
    ];
}
