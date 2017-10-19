<?php

namespace App\Http\Controllers;

use App\ConNuoi;
use App\Districts;
use App\DmTroCapTx;
use App\KetHon;
use App\KhaiSinh;
use App\KhaiTu;
use App\SoHoTich;
use App\TcDoiTuongTx;
use App\Towns;
use App\TTHonNhan;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    public function checkuser(Request $request){
        $input = $request->all();
        $usercheck = $input['username'];

        $model = Users::where('username', $usercheck)
            ->first();
        if (isset($model)) {
            echo 'cancel';
        } else {
            echo 'ok';
        }
    }

    public function checkmahuyen(Request $request){
        $input = $request->all();
        $mahuyencheck = $input['mahuyen'];

        $model = Districts::where('mahuyen', $mahuyencheck)
            ->first();
        if (isset($model)) {
            echo 'cancel';
        } else {
            echo 'ok';
        }
    }

    public function checkmaxa(Request $request){
        $input = $request->all();
        $maxacheck = $input['maxa'];

        $model = Towns::where('maxa', $maxacheck)
            ->first();
        if (isset($model)) {
            echo 'cancel';
        } else {
            echo 'ok';
        }
    }

    public function getXas(Request $request){
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

        $inputs = $request->all();

        if(isset($inputs['mahuyen'])){
            $xas = Towns::where('mahuyen', $inputs['mahuyen'])->get();
            $result['message'] = '<select name="maxa" id="maxa" class="form-control">';
            if(count($xas) > 0){
                foreach($xas as $xa){
                    $result['message'] .= '<option value="'.$xa->maxa.'">'.$xa->tenxa.'</option>';
                }
            }
            $result['message'] .= '</select>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function getChiTietTc(Request $request){
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

        $inputs = $request->all();

        if(isset($inputs['noidung'])){
            $chitiets = DmTroCapTx::where('noidung',$inputs['noidung'])->get();
            $result['message'] = '<select name="select_chitiet" id="select_chitiet" class="form-control">';
            if(count($chitiets) > 0){
                foreach($chitiets as $chitiet){
                    $result['message'] .= '<option value="'.$chitiet->matrocap.'">'.$chitiet->chitiet.'- Hệ số: '.$chitiet->heso.'</option>';
                }
            }
            $result['message'] .= '</select>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function addTcTx(Request $request){
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

        $inputs = $request->all();

        if(isset($inputs['matrocap'])){
            $tttrocap = DmTroCapTx::where('matrocap',$inputs['matrocap'])->first();

            $muctcchuan = getGeneralConfigs()['muctrocapchuan'];
            $sotien = $tttrocap->heso * $muctcchuan;

            $result['message'] = '<div id="tttrocap">';
            $result['message'] .='<div class="row">';
            $result['message'] .='<div class="col-md-12">';
            $result['message'] .='<div class="form-group">';
            $result['message'] .='<label class="col-sm-2 control-label">Nội dung</label>';
            $result['message'] .='<div class="col-sm-10" style="color: blue;font-size: 15px">'.$tttrocap->noidung.'</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .='<div class="row">';
            $result['message'] .='<div class="col-md-12">';
            $result['message'] .='<div class="form-group">';
            $result['message'] .='<label class="col-sm-2 control-label">Chi tiết</label>';
            $result['message'] .='<div class="col-sm-10" style="color: blue;margin: auto; font-size: 15px" >'.$tttrocap->chitiet.'</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .='<div class="row">';
            $result['message'] .='<div class="col-md-6">';
            $result['message'] .='<div class="form-group">';
            $result['message'] .='<label class="col-sm-4 control-label">Hệ số</label>';
            $result['message'] .='<div class="col-sm-8"><input type="text" class="form-control" name="heso" id="heso" value="'.$tttrocap->heso.'" readonly></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .='<div class="col-md-6">';
            $result['message'] .='<div class="form-group">';
            $result['message'] .='<label class="col-sm-4 control-label">Số tiền</label>';
            $result['message'] .='<div class="col-sm-8"><input type="text" style="text-align: right" class="form-control" name="sotientc" id="sotientc" value="'.number_format($sotien).'" readonly></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="matrocap" name="matrocap" value="'.$tttrocap->matrocap.'">';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function checktcdoituongtx(Request $request){
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

        $inputs = $request->all();
        $model = TcDoiTuongTx::where('thang',$inputs['thang'])
            ->where('nam',$inputs['nam'])
            ->where('mahuyen',$inputs['mahuyen'])
            ->where('maxa',$inputs['maxa'])
            ->where('pltrocap',$inputs['pltrocap'])
            ->first();
        if(count($model)>0){
            $result['status'] = 'error';
        }else
            $result['status'] = 'success';

        die(json_encode($result));
    }

    public function getXasDiChuyen(Request $request){
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

        $inputs = $request->all();

        if(isset($inputs['mahuyen'])){
            $xas = Towns::where('mahuyen', '=', $inputs['mahuyen'])->get();
            $result['message'] = '<select id="maxadichuyen" name="maxadichuyen" class="form-control">';
            if(count($xas) > 0){
                foreach($xas as $xa){
                    $result['message'] .= '<option value="'.$xa->maxa.'">'.$xa->tenxa.'</option>';
                }
                $result['message'] .= '</select>';
                $result['status'] = 'success';
            }
        }

        die(json_encode($result));
    }

}
