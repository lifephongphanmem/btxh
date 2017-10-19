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
        'sosotc'
    ];
}
