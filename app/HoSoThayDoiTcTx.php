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
        'gioitinh',
        'diachi',
        'plthaydoi',
        'noidungthaydoi',

        'pltrocap',
        'matrocap',
        'heso',
        'sotientc',
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
