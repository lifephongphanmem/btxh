<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DsDoiTuongTx;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DsDoiTuongTxHController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $model = DsDoiTuongTx::where('mahoso',$input['mahoso'])->first();
            $huyen = Districts::where('mahuyen',$model->mahuyen)->first()->tenhuyen;
            $xa = Towns::where('maxa',$model->maxa)->first()->tenxa;
            $model->dvql = $xa.'- '.$huyen;

            return view('manage.danhsachdoituong.thuongxuyen.history.index')
                ->with('model',$model)
                ->with('pageTitle','Lịch sử hồ sơ');

        }else
            return view('errors.notlogin');
    }
}
