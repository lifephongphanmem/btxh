<?php

namespace App\Http\Controllers;

use App\MauBieuToKhai;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MauBieuToKhaiController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = MauBieuToKhai::whereYear('ngayapdung',  $inputs['nam'])->get();

            return view('ttqdtokhai.index')
                ->with('nam',$inputs['nam'])
                ->with('model',$model)
                ->with('pageTitle','Mẫu biểu tờ khai');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            return view('ttqdtokhai.create')
                ->with('pageTitle','Thêm mới mẫu biểu tờ khai');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            if(isset($inputs['file'])){
                $file = $request->file('file');
                $inputs['file'] = changeNameFile($inputs['tieude']).'_'.changeNameFile($file->getClientOriginalName());
                $file->move(public_path().'/file/maubieutokhai/',$inputs['file']);
            }
            $model = new MauBieuToKhai();
            $model->create($inputs);
            return redirect('maubieutokhai');
        }else
            return view('errors.notlogin');

    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = MauBieuToKhai::find($id);
            return view('ttqdtokhai.edit')
                ->with('model',$model)
                ->with('pageTitle','Mẫu biểu tờ khai chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = MauBieuToKhai::find($id);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            if(isset($inputs['file'])){
                $file = $request->file('file');
                $inputs['file'] = changeNameFile($inputs['tieude']).'_'.changeNameFile($file->getClientOriginalName());
                $file->move(public_path().'/file/maubieutokhai/',$inputs['file']);
            }
            $model->update($inputs);
            return redirect('maubieutokhai');

        }else
            return view('errors.notlogin');
    }
}
