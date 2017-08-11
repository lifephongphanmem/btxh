<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TcDoiTuongTx extends Model
{
    protected $table = 'tcdoituongtx';
    protected $fillable = [
        'id',
        'matinh',
        'mahuyen',
        'maxa',
        'trangthai',
        'thang',
        'nam',
        'tengoitc',
        'pltrocap',
        'matrocap',
        'ghichu',
    ];
}
