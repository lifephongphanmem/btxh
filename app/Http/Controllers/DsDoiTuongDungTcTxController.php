<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DsDoiTuongTx;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DsDoiTuongDungTcTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if (session('admin')->level == 'T') {
                $huyendf = Districts::first()->mahuyen;
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $huyendf;
                $xadf = Towns:: where('mahuyen', $huyen)->first()->maxa;
                if (isset($inputs['maxa'])) {
                    if ($inputs['maxa'] == "all")
                        $xa = $xadf;
                    else
                        $xa = $inputs['maxa'];
                } else {
                    $xa = $xadf;
                }

            } elseif (session('admin')->level == 'H') {
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->mahuyen;
                $xadf = Towns:: where('mahuyen', $huyen)->first()->maxa;
                $xa = isset($inputs['maxa']) ? $inputs['maxa'] : $xadf;
            } else {
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->mahuyen;
                $xa = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
            }
            $trocap = isset($inputs['trocap']) ? $inputs['trocap'] : 'CD';

            $huyens = listHuyen();
            $xas = array();
            if ($huyen != 'all') {
                $xas = listXa($huyen);
            }
            $model = DsDoiTuongTx::where('pltrocap',$trocap);
            if($huyen != 'all' && $huyen != ''){
                $model = $model->where('mahuyen', $huyen);
            }
            if($xa != 'all' && $xa != ''){
                $model = $model->where('maxa', $xa);
            }else{
                $model = $model->where('maxa', $xa);
            }
            //Loại các TH hs bị chuyển đi, dừng hưởng
            $model = $model->where('trangthaihoso','Dừng hưởng');
            $model = $model->get();


            return view('manage.danhsachdoituong.dungtc.index')
                ->with('huyens', $huyens)
                ->with('xas', $xas)
                ->with('mahuyen', $huyen)
                ->with('maxa', $xa)
                ->with('trocap', $trocap)
                ->with('model',$model)
                ->with('pageTitle', 'Danh sách đối tượng dừng trợ cấp thường xuyên');
        }else
            return view('errors.notlogin');
    }
}
