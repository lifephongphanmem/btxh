<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauBieuToKhai extends Model
{
    protected $table = 'maubieutokhai';
    protected $fillable = [
        'id',
        'tieude',
        'noidung',
        'ngaybanhanh',
        'ngayapdung',
        'file',
    ];
}
