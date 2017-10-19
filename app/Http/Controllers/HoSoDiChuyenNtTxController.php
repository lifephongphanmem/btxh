<?php

namespace App\Http\Controllers;

use App\HoSoDiChuyenNtTx;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoSoDiChuyenNtTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = HoSoDiChuyenNtTx::whereMonth('ngayyc', $inputs['thang'])
                ->whereYear('ngayyc',  $inputs['nam']);
            if(session('admin')->level == 'X')
                $model = $model->where('maxa',session('admin')->maxa);
            elseif(session('admin')->level == 'H')
                $model = $model->where('mahuyen',session('admin')->mahuyen);

            $model = $model->get();

            return view('manage.hosodichuyennt.doituongtx.index')
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('model',$model)
                ->with('pageTitle','Danh sách hồ sơ di chuyển nội tỉnh');
        }else
            return view('errors.notlogin');
    }
}
