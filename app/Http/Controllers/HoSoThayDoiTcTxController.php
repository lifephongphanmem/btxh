<?php

namespace App\Http\Controllers;

use App\DmTroCapTx;
use App\DsDoiTuongTx;
use App\HoSoThayDoiTcTx;
use App\PlTroCapTx;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoSoThayDoiTcTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = HoSoThayDoiTcTx::whereMonth('ngayyc', $inputs['thang'])
                ->whereYear('ngayyc',  $inputs['nam']);
            if(session('admin')->level == 'X')
                $model= $model->where('maxa',session('admin')->maxa);
            elseif(session('admin')->level =='H')
                $model = $model->where('mahuyen',session('admin')->mahuyen);

            $model = $model->get();
            foreach($model as $tt){
                $modelpltc = PlTroCapTx::where('maloai',$tt->pltrocapm)->first();
                $modeldmtc = DmTroCapTx::where('matrocap',$tt->matrocapm)->first();
                $tt->tttctd = $modelpltc->tenloai.'-'.$modeldmtc->noidung.'-'.$modeldmtc->chitiet.'- Hệ số: '.$tt->hesom.'- Số tiền: '.number_format($tt->sotientcm);
            }


            return view('manage.hosothaydoitc.doituongtx.index')
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('model',$model)
                ->with('pageTitle','Danh sách hồ sơ thay đổi trợ cấp');
        }else
            return view('errors.notlogin');
    }

    public function show(){

    }

    public function duyet(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idduyet'];
            $inputs['trangthaihoso'] = 'Đã duyệt';
            $inputs['ngayhuong'] = getDateToDb($inputs['ngayhuong']);
            $model = HoSoThayDoiTcTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $modelhs->pltrocap = $model->pltrocapm;
                $modelhs->matrocap = $model->matrocapm;
                $modelhs->heso = $model->hesom;
                $modelhs->sotientc = $model->sotientcm;
                $modelhs->ngayhuong = $inputs['ngayhuong'];
                $modelhs->qdhuong = $inputs['qdhuong'];
                $modelhs->trangthaihoso = 'Đã duyệt';
                $modelhs->save();
            }
            return redirect('hosothaydoitctx');
        } else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtralai'];
            $inputs['trangthaihoso'] = 'Bị trả lại';
            $model = HoSoThayDoiTcTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $modelhs->trangthaihoso = 'Đã duyệt';
                $modelhs->save();
            }
            return redirect('hosothaydoitctx');
        } else
            return view('errors.notlogin');
    }

    public function lydo(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $model = HoSoThayDoiTcTx::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div id="lydo" style="color: blue">'.$model->lydotralai.'</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
}
