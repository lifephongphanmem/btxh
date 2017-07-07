<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlTroCapTx extends Model
{
    protected $table = 'pltrocaptx';
    protected $fillable = [
        'id',
        'maloai',
        'tenloai',
        'mota',
    ];
}
