<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralConfigs extends Model
{
    protected $table = 'general-configs';
    protected $fillable = [
        'id',
        'matinh',
        'tentinh',
        'donviquanly',
        'diachitruso',
        'dienthoai',
        'fax',
        'email',
        'thutruong',
        'ketoan',
        'nguoilapbieu',
        'setting',
        'muctrocapchuan'
    ];
}
