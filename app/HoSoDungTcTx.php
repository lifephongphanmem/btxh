<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoDungTcTx extends Model
{
    protected $table = 'hosodungtctx';
    protected $fillable = [
        'id',
        'ngayxindung',
        'mahoso',
        'hoten',
        'ngaysinh',
        'diachi',
        'nddungtc',
        'trangthaihoso',
        'lydotralai',
        'ngaydunghuong',
        'qddunghuong',
        'lydodunghuong',
        'pldunghuong',
        'mahuyen',
        'maxa',
        'pltrocap',
        'matrocap',
        'sotientc',
        'donviqd',
        'diadanhqd',
        'ngayqd',
        'cancuqd',
        'xettheototrinh',
        'chucdanhkyqd',
        'chucdanhqd',
        'soqd'
    ];
}
