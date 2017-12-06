<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DsDoiTuongTx;
use App\HoSoXinHuongTx;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DanhSachDoiTuongTxChoNhanController extends Controller
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
            $model = $model->where('trangthaihoso','Chờ nhận di chuyển')
                ->OrWhere('trangthaihoso','Chờ duyệt nhận di chuyển');
            $model = $model->get();
            $modelpltrocap = getpldoituong();

            return view('manage.danhsachdoituong.chonhan.index')
                ->with('huyens', $huyens)
                ->with('xas', $xas)
                ->with('mahuyen', $huyen)
                ->with('maxa', $xa)
                ->with('trocap', $trocap)
                ->with('model',$model)
                ->with('modelpltrocap',$modelpltrocap)
                ->with('pageTitle', 'Danh sách đối tượng thường xuyên chờ nhận');
        }else
            return view('errors.notlogin');
    }

    public function xinhuong(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idxinhuong'];
            $model = DsDoiTuongTx::find($id);
            $inputs['trangthaihoso'] = 'Chờ duyệt nhận di chuyển';
            if($model->save()){
                $modelxh = new HoSoXinHuongTx();
                $modelxh->ngayxinhuong = date('Y-m-d');
                $modelxh->mahoso = $model->mahoso;
                $modelxh->hoten = $model->hoten;
                $modelxh->ngaysinh = $model->ngaysinh;
                $modelxh->diachi = $model->diachi;
                $modelxh->ndxinhuong = $inputs['ndxinhuong'];
                $modelxh->trangthaihoso = 'Chờ duyệt';
                $modelxh->plxinhuong = 'Chuyển đến';
                $modelxh->maxa = $model->maxa;
                $modelxh->mahuyen = $model->mahuyen;
                $modelxh->save();
            }
            return redirect('danhsachdoituongtxchonhan');
        } else
            return view('errors.notlogin');
    }
}
