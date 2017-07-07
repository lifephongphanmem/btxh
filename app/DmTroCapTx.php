<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmTroCapTx extends Model
{
    protected $table = 'dmtrocaptx';
    protected $fillable = [
        'id',
        'pltrocap',
        'ttqd',
        'dieu',
        'khoan',
        'matrocap',
        'noidung',
        'chitiet',
        'heso',
        'ghichu',
    ];
}
