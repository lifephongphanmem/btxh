<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DmTroCapTx;
use App\DsDoiTuongTx;
use App\HoSoXinHuongTx;
use App\PlTroCapTx;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoSoXinHuongTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = HoSoXinHuongTx::whereMonth('ngayxinhuong', $inputs['thang'])
                ->whereYear('ngayxinhuong',  $inputs['nam']);
            if(session('admin')->level == 'X')
                $model= $model->where('maxa',session('admin')->maxa);
            elseif(session('admin')->level =='H')
                $model = $model->where('mahuyen',session('admin')->mahuyen);

            $model = $model->get();


            return view('manage.hosoxinhuong.doituongtx.index')
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('model',$model)
                ->with('pageTitle','Danh sách hồ sơ xin hưởng');
        }else
            return view('errors.notlogin');
    }

    public function create(){

    }

    public function show($mahoso){
        if (Session::has('admin')) {
            $model = DsDoiTuongTx::where('mahoso',$mahoso)->first();
            $huyen = Districts::where('mahuyen',$model->mahuyen)->first()->tenhuyen;
            $xa = Towns::where('maxa',$model->maxa)->first()->tenxa;
            $loaitc = DmTroCapTx::where('matrocap',$model->matrocap)->first();
            $loaidt = PlTroCapTx::where('maloai',$model->pltrocap)->first()->tenloai;

            return view('manage.hosoxinhuong.doituongtx.show')
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
            $inputs['ngayhuong'] = getDateToDb($inputs['ngayhuong']);
            $model = HoSoXinHuongTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $inputs['trangthaihuong'] = 'Đang hưởng';
                $modelhs->update($inputs);
            }
            return redirect('hosoxinhuongtx');
        } else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtralai'];
            $inputs['trangthaihoso'] = 'Bị trả lại';
            $model = HoSoXinHuongTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $modelhs->update($inputs);
            }
            return redirect('hosoxinhuongtx');
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
            $model = HoSoXinHuongTx::where('id',$inputs['id'])
                ->first();
            $result['message'] = '<div id="lydo" style="color: blue">'.$model->lydotralai.'</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function nhanhs(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idnhanhs'];
            $inputs['trangthaihoso'] = 'Đã duyệt';
            $model = HoSoXinHuongTx::find($id);
            if($model->update($inputs)){
                $modelhs = DsDoiTuongTx::where('mahoso',$model->mahoso)->first();
                $inputs['trangthaihoso'] = 'Đã duyệt';
                $modelhs->update($inputs);
            }
            return redirect('hosoxinhuongtx');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = HoSoXinHuongTx::find($id);
            return view('manage.hosoxinhuong.doituongtx.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin in quyết định');

        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {

            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $model = HoSoXinHuongTx::find($id);
            $model->update($inputs);
            return redirect('hosoxinhuongtx');

        } else
            return view('errors.notlogin');
    }
}
