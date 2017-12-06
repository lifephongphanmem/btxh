<?php

namespace App\Http\Controllers;

use App\DmTroCapTx;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmTroCapTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $trocap = isset($inputs['trocap']) ? $inputs['trocap'] : 'NXH';
            $model = DmTroCapTx::where('pltrocap',$trocap)
                ->get();
            $modelpltrocap = getpldoituong();

            return view('system.dmtrocap.thuongxuyen.index')
                -> with('model', $model)
                ->with('trocap',$trocap)
                ->with('modelpltrocap',$modelpltrocap)
                -> with('pageTitle','Danh mục trợ cấp thường xuyên');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {

            return view('system.dmtrocap.thuongxuyen.create')
                -> with('pageTitle','Thêm mới danh mục trợ cấp thường xuyên');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {

            $inputs = $request->all();
            $inputs['matrocap'] = $inputs['pltrocap'].getdate()[0];
            $model = new DmTroCapTx();
            $model->create($inputs);
            return redirect('dmtrocaptx?&trocap='.$inputs['pltrocap']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {

            $model = DmTroCapTx::find($id);
            return view('system.dmtrocap.thuongxuyen.edit')
                ->with('model',$model)
                -> with('pageTitle','Chỉnh sửa danh mục đối tượng chi trả thường xuyên');

        }else
            return view('errors.notlogin');
    }

    public function update($id,Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DmTroCapTx::find($id);
            $model->update($inputs);

            return redirect('dmtrocaptx?&trocap='.$inputs['pltrocap']);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DmTroCapTx::find($id);
            $pltrocap = $model->pltrocap;
            $model->delete();
            return redirect('dmtrocaptx?&trocap='.$pltrocap);

        }else
            return view('errors.notlogin');
    }
}
