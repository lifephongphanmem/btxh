<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DmTroCapTx;
use App\DsDoiTuongTx;
use App\HoSoDiChuyenNtTx;
use App\PlTroCapTx;
use App\Towns;
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
            foreach($model as $tt){
                $modelhuyen = Districts::where('mahuyen',$tt->mahuyendichuyen)->first();
                $modelxa = Towns::where('maxa',$tt->maxadichuyen)->first();
                $tt->noidichuyen = $modelxa->tenxa.'-'.$modelhuyen->tenhuyen;
            }

            return view('manage.hosodichuyennt.doituongtx.index')
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('model',$model)
                ->with('pageTitle','Danh sách hồ sơ di chuyển nội tỉnh');
        }else
            return view('errors.notlogin');
    }

    public function show($mahoso){
        if (Session::has('admin')) {
            $model = DsDoiTuongTx::where('mahoso',$mahoso)->first();
            $huyen = Districts::where('mahuyen',$model->mahuyen)->first()->tenhuyen;
            $xa = Towns::where('maxa',$model->maxa)->first()->tenxa;
            $loaitc = DmTroCapTx::where('matrocap',$model->matrocap)->first();
            $loaidt = PlTroCapTx::where('maloai',$model->pltrocap)->first()->tenloai;

            return view('manage.hosodungtc.doituongtx.show')
                ->with('model',$model)
                ->with('dvql',$xa.'- '.$huyen)
                ->with('loaitc',$loaitc)
                ->with('loaidt',$loaidt)
                ->with('attachments',$this->getAttachments($model))
                ->with('pageTitle', 'Thông tin đối tượng trợ cấp thường xuyên');
        } else
            return view('errors.notlogin');
    }

    public function getAttachments($model) {

        $attachments = array();

        $attachment = array();

        for ($i = 1; $i <= 10; $i++) {
            $ipf = 'ipf' . $i;
            if ($model->$ipf != null) {
                $ipt = 'ipt' . $i;
                $attachment['ipt'] = $model->$ipt;
                $attachment['ipf'] = $model->$ipf;
                $attachments[] = $attachment;
            }
        }
        return $attachments;
    }

    public function duyet(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idduyet'];
            $inputs['trangthaihoso'] = 'Đã duyệt';
            $model = HoSoDiChuyenNtTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $inputs['trangthaihoso'] = 'Chờ nhận di chuyển';
                $inputs['maxa'] = $model->maxadichuyen;
                $inputs['mahuyen'] = $model->mahuyendichuyen;
                $modelhs->update($inputs);
            }
            return redirect('hosodichuyennttx');
        } else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtralai'];
            $inputs['trangthaihoso'] = 'Bị trả lại';
            $model = HoSoDiChuyenNtTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $inputs['trangthaihuong'] = 'Đang hưởng';
                $inputs['trangthaihoso'] = 'Đã duyệt';
                $modelhs->update($inputs);
            }
            return redirect('hosodichuyennttx');
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
            $model = HoSoDiChuyenNtTx::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div id="lydo" style="color: blue">'.$model->lydotralai.'</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
}
