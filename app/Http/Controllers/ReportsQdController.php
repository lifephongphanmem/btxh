<?php

namespace App\Http\Controllers;

use App\DmTroCapTx;
use App\HoSoDungTcTx;
use App\HoSoXinHuongTx;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsQdController extends Controller
{
    public function qdxinhuong($id){
        if (Session::has('admin')) {
            $model = HoSoXinHuongTx::find($id);
            $modeltc = DmTroCapTx::where('pltrocap',$model->pltrocap)
                ->where('matrocap',$model->matrocap)->first();
            return view('reports.quyetdinh.xinhuong.qdhuong')
                ->with('model',$model)
                ->with('modeltc',$modeltc)
                ->with('pageTitle','Quyết định hưởng trợ cấp');
        } else
            return view('errors.notlogin');
    }

    public function qddungtc($id){
        if (Session::has('admin')) {
            $model = HoSoDungTcTx::find($id);
            $modeltc = DmTroCapTx::where('pltrocap',$model->pltrocap)
                ->where('matrocap',$model->matrocap)->first();
            return view('reports.quyetdinh.xinhuong.qddungtc')
                ->with('model',$model)
                ->with('modeltc',$modeltc)
                ->with('pageTitle','Quyết định dừng hưởng trợ cấp');
        } else
            return view('errors.notlogin');
    }
}
