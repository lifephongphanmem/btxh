<?php

namespace App\Http\Controllers;

use App\Districts;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoSoDeXuatTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            return view('manage.hosodexuat.doituongtx.index')
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('pageTitle','Danh sách hồ sơ đề xuất');
        }else
            return view('errors.notlogin');
    }

    public function create(){

    }
}
