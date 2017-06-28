<?php

namespace App\Http\Controllers;

use App\CongDan;
use App\DmDvQl;
use App\DnDvLt;
use App\DnDvLtReg;
use App\DonViDvVt;
use App\DonViDvVtReg;
use App\GeneralConfigs;
use App\KhaiSinh;
use App\Register;
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
            else
                return view('dashboard')
                    ->with('pageTitle','Tổng quan');
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
}
