<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsController extends Controller
{
   public function index(){
       if (Session::has('admin')) {
           return view('reports.bcth.index')
               ->with('pageTitle','Báo cáo tổng hợp');
       } else
           return view('errors.notlogin');
   }

    public function hsxhbtxh(){
        if (Session::has('admin')) {
            return view('reports.bcth.hsxhbtxh')
                ->with('pageTitle','Danh sách hồ sơ xin hưởng trợ cấp xã hội');
        } else
            return view('errors.notlogin');
    }

    public function hscqdbtxh(){
        if (Session::has('admin')) {
            return view('reports.bcth.hscqdbtxh')
                ->with('pageTitle','Danh sách hồ sơ có quyết định hưởng trợ cấp xã hội');
        } else
            return view('errors.notlogin');
    }

    public function hsdctc(){
        if (Session::has('admin')) {
            return view('reports.bcth.hsdctc')
                ->with('pageTitle','Danh sách hồ sơ điều chỉnh trợ cấp');
        } else
            return view('errors.notlogin');
    }

    public function dscttcht(){
        if (Session::has('admin')) {
            return view('reports.bcth.dscttcht')
                ->with('pageTitle','Danh sách chi trả trợ cấp hàng tháng');
        } else
            return view('errors.notlogin');
    }
}
