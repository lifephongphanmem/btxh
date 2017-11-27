<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoXinHuongTx extends Model
{
    protected $table = 'hosoxinhuongtx';
    protected $fillable = [
        'id',
        'ngayxinhuong',
        'mahoso',
        'hoten',
        'ngaysinh',
        'diachi',
        'ndxinhuong',
        'trangthaihoso',
        'lydotralai',
        'ngayhuong',
        'qdhuong',
        'sosotc',
        'plxinhuong',
        'maxa',
        'mahuyen',
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
