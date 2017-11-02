<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoDiChuyenNtTx extends Model
{
    protected $table = 'hosodichuyennttx';
    protected $fillable = [
        'id',
        'ngayyc',
        'mahoso',
        'hoten',
        'ngaysinh',
        'diachi',
        'nddichuyen',
        'maxadichuyen',
        'mahuyendichuyen',
        'maxa',
        'mahuyen',
        'trangthaihoso',
        'ttqd',
        'lydotralai'
    ];
}
