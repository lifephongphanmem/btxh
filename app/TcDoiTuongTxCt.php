<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TcDoiTuongTxCt extends Model
{
    protected $table = 'tcdoituongtxct';
    protected $fillable = [
        'id',
        'matrocap',
        'mahoso',
        'hoten',
        'diachi',
        'namsinh',
        'qdhuong',
        'noidung',
        'chitiet',
        'heso',
        'sotientc',
        'tltungay',
        'tldenngay',
        'thangtl',
        'sotientl',
        'hientrang',
    ];
}
