<?php

namespace App\Http\Controllers;

use App\TcDoiTuongTx;
use App\TcDoiTuongTxCt;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TcDoiTuongTxCtController extends Controller
{
    public function truylinh(Request $request){
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

            $model = TcDoiTuongTxCt::where('id',$inputs['id'])
                ->first();
            ($model->thangtl != null)? $thangtl = $model->thangtl : $thangtl = 0;
            ($model->sotientl != null)? $sotientl = $model->sotientl : $sotientl = 0;

            $result['message'] = '<div class="modal-body" id="truylinh">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label><b>Số tháng truy lĩnh</b></label>';
            $result['message'] .= '<input type="text" style="text-align: right" id="thangtl" name="thangtl" class="form-control" data-mask="fdecimal" value="' . $thangtl . '" autofocus>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label><b>Số tiền truy lĩnh</b></label>';
            $result['message'] .= '<input type="text" style="text-align: right" id="sotientl" name="sotientl" class="form-control" data-mask="fdecimal" value="'.$sotientl.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idtruylinh" name="idtruylinh" value="'.$model->id.'">';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function updatetruylinh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idtruylinh'];
            $inputs['thangtl'] = getMoneyToDb($inputs['thangtl']);
            $inputs['sotientl'] = getMoneyToDb($inputs['sotientl']);
            $model = TcDoiTuongTxCt::find($id);
            $model->update($inputs);
            $idtc = TcDoiTuongTx::where('matrocap',$model->matrocap)->first()->id;

            return redirect('trocapdoituongtx/'.$idtc);
        }else
            return view('errors.notlogin');
    }

    public function duyet(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idduyet'];
            $inputs['hientrang'] = 'Đã lĩnh';
            $model = TcDoiTuongTxCt::find($id);
            $model->update($inputs);
            $idtc = TcDoiTuongTx::where('matrocap',$model->matrocap)->first()->id;

            return redirect('trocapdoituongtx/'.$idtc);
        }else
            return view('errors.notlogin');
    }

    public function thongtin(Request $request){
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

            $model = TcDoiTuongTxCt::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="modal-body" id="thongtin">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Họ và tên:</b> '.$model->hoten.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Năm sinh:</b> '.$model->namsinh.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Địa chỉ: </b> '.$model->diachi.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Quyết định hưởng:</b> '.$model->qdhuong.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Nội dung chi tiết:</b> '.$model->noidung.'-'.$model->chitiet.'- Hệ số: '.$model->heso.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số tiền trợ cấp:</b> '.number_format($model->sotientc).'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số tháng truy lĩnh:</b> '.$model->thangtl.'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số tiền truy lĩnh:</b> '.number_format($model->sotientl).'</label>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';



            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idtruylinh" name="idtruylinh" value="'.$model->id.'">';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
}
