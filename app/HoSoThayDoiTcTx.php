<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoThayDoiTcTx extends Model
{
    protected $table = 'hosothaydoitctx';
    protected $fillable = [
        'id',
        'ngayyc',
        'mahoso',
        'hoten',
        'ngaysinh',
        'diachi',
        'plthaydoi',
        'noidungthaydoi',
        'pltrocapm',
        'matrocapm',
        'hesom',
        'sotientcm',

        'trangthaihoso',
        'lydotralai',
        'ngayhuong',
        'qdhuong',
        'maxa',
        'mahuyen',
    ];
}
