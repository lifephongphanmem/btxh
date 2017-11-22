<?php

namespace App\Http\Controllers;

use App\CongDan;
use App\Districts;
use App\DmDvQl;
use App\DnDvLt;
use App\DnDvLtReg;
use App\DonViDvVt;
use App\DonViDvVtReg;
use App\DsDoiTuongTx;
use App\GeneralConfigs;
use App\KhaiSinh;
use App\Register;
use App\Towns;
use App\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'sa')
                return redirect('cau_hinh_he_thong');
            else {
                if(session('admin')->level == 'T'){
                    $hosotx = DsDoiTuongTx::count();
                }elseif(session('admin')->level =='H'){
                    $hosotx = DsDoiTuongTx::where('mahuyen',session('admin')->mahuyen)
                    ->count();
                }else{
                    $hosotx = DsDoiTuongTx::where('mahuyen',session('admin')->mahuyen)
                        ->where('maxa',session('admin')->maxa)
                        ->count();
                }
                $array = '';
                $array['hosotx'] = $hosotx;



                return view('dashboard')
                    ->with('sl',$array)
                    ->with('pageTitle', 'Tổng quan');
            }
        }else
            return view('welcome');

    }



    public function forgotpassword(){

        return view('system.users.forgotpassword.index')
            ->with('pageTitle','Quên mật khẩu???');
    }

    public function forgotpasswordw(Request $request){

        $input = $request->all();

        $model = Users::where('username',$input['username'])->first();

        if(isset($model)){
            if($model->emailxt == $input['emailxt'] && $model->question == $input['question']  && $model->answer == $input['answer']){
                $model->password = 'e10adc3949ba59abbe56e057f20f883e';
                $model->save();
                return view('errors.forgotpass-success');
            }else
                return view('errors.forgotpass-errors');
        }else
            return view('errors.forgotpass-errors');

    }

    public function thongtindonvi(){
        if (Session::has('admin')) {
            if(session('admin')->level == 'H'){
                $model = Districts::where('mahuyen',session('admin')->mahuyen)
                    ->first();
            }else{
                $model = Towns::where('maxa',session('admin')->maxa)
                    ->first();
            }
            return view('system.thongtindonvi.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin đơn vị');
        }else
            return view('errors.notlogin');
    }

    public function thongtindonviedit($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'H'){
                $model = Districts::find($id);
            }else{
                $model = Towns::find($id);
            }
            return view('system.thongtindonvi.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin đơn vị chỉnh sửa');
        }else
            return view('errors.notlogin');
    }
    public function thongtindonviupdate(Request $request,$id){
        if (Session::has('admin')) {
            $input = $request->all();
            if(session('admin')->level == 'H'){
                $model = Districts::find($id);
            }else{
                $model = Towns::find($id);
            }
            $model->update($input);
            return redirect('thongtindonvi');
        }else
            return view('errors.notlogin');
    }
}
