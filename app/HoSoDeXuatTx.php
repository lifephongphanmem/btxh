<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoDeXuatTx extends Model
{
    protected $table = 'hosodexuattx';
    protected $fillable = [
        'id',
        'ngaydexuat',
        'mahoso',
        'hoten',
        'ngaysinh',
        'diachi',
        'pldexuat',
        'nddexuat',
        'trangthai',
        'lydo',
        'ngayhuong',
        'qdhuong',
        'sosotc'
    ];
}
