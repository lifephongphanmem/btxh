<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DsDoiTuongTx extends Model
{
    protected $table = 'dsdoituongtx';
    protected $fillable = [
        'id',
        'matinh',
        'mahuyen',
        'maxa',
        'trangthaihoso',
        'lydotralai',
        'ttthaotac',

        'mahoso',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'dantoc',
        'quequan',
        'diachi',
        'socmnd',
        'bhyt',
        'noikhambenh',

        'ttquyetdinh',
        'trangthaihuong',
        'sosotc',
        'pltrocap',
        'matrocap',
        'heso',
        'sotientc',
        'ngayhuong',
        'ngaydunghuong',
        'lydodunghuong',

        'ipt1',
        'ipf1',
        'ipt2',
        'ipf2',
        'ipt3',
        'ipf3',
        'ipt4',
        'ipf4',
        'ipt5',
        'ipf5',
        'ipt6',
        'ipf6',
        'ipt7',
        'ipf7',
        'ipt8',
        'ipf8',
        'ipt9',
        'ipf9',
        'ipt10',
        'ipf10',
    ];
}