<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DmTroCapTx;
use App\DsDoiTuongTx;
use App\PlTroCapTx;
use App\TcDoiTuongTx;
use App\TcDoiTuongTxCt;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TcDoiTuongTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['trocap'] = isset($inputs['trocap']) ? $inputs['trocap'] : 'CD';
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = TcDoiTuongTx::where('pltrocap',$inputs['trocap'])
                    ->where('thang',$inputs['thang'])
                    ->where('nam',$inputs['nam']);
            if(session('admin')->level == 'H' || session('admin') == 'X'){
                $model = $model->where('mahuyen', session('admin')->mahuyen);
                if(session('admin')->level == 'X'){
                    $model = $model->where('maxa',session('admin')->maxa)
                        ->where('trangthai','Duyệt');
                }
            }

            $model = $model->get();
            $model = getXaHuyen($model);
            return view('manage.trocap.doituongtx.index')
                ->with('model',$model)
                ->with('trocap',$inputs['trocap'])
                ->with('thang',$inputs['thang'])
                ->with('nam',$inputs['nam'])
                ->with('pageTitle','Trợ cấp đối tượng thường xuyên');
        }else
            return view('errors.notlogin');

    }

    public function create($trocap){
        if (Session::has('admin')) {
            $nams = getSelectNam();
            $nam = date('Y');
            $thang = date('m');
            if (session('admin')->level == 'T') {
                $huyens = Districts::all();
                $huyendf = Districts::first()->mahuyen;
                $xas = Towns::where('mahuyen', $huyendf)
                    ->get();
                $xadf = $xas->first()->maxa;
            } elseif (session('admin')->level == 'H') {
                $huyens = Districts::all();
                $huyendf = Districts::where('mahuyen', session('admin')->mahuyen)->first()->mahuyen;
                $xas = Towns::where('mahuyen', $huyendf)
                    ->get();
                $xadf = $xas->first()->maxa;
            } else {
                $huyens = Districts::all();
                $huyendf = Districts::where('mahuyen', session('admin')->mahuyen)->first()->mahuyen;
                $xas = Towns::where('mahuyen', $huyendf)
                    ->get();
                $xadf = $xas->where('maxa', session('admin')->maxa)->first()->maxa;
            }
            return view('manage.trocap.doituongtx.create')
                ->with('action','create')
                ->with('trocap',$trocap)
                ->with('nams',$nams)
                ->with('nam',$nam)
                ->with('thang',$thang)
                ->with('huyens', $huyens)
                ->with('mahuyen', $huyendf)
                ->with('xas', $xas)
                ->with('maxa', $xadf)
                ->with('pageTitle','Chi trả trợ cấp đối tượng thường xuyên thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $check = TcDoiTuongTx::where('thang',$inputs['thang'])
                ->where('nam',$inputs['nam'])
                ->where('mahuyen',$inputs['mahuyen'])
                ->where('maxa',$inputs['maxa'])
                ->where('pltrocap',$inputs['pltrocap'])
                ->first();
            if(count($check) == 0) {
                $inputs['matinh'] = getmatinh();
                $inputs['trangthai'] = 'Chờ duyệt';
                $inputs['matrocap'] = getmatinh() . $inputs['mahuyen'] . $inputs['maxa'] . 'TCTX' . $inputs['thang'] . $inputs['nam'].$inputs['pltrocap'];
                $model = new TcDoiTuongTx();
                if($model->create($inputs)){
                    $ngayxd = $inputs['nam'].'-'.$inputs['thang'].'-01';
                    $modeldt = DsDoiTuongTx::where('trangthaihoso','Đã duyệt')
                        ->where('pltrocap',$inputs['pltrocap'])
                        ->where('trangthaihuong','Đang hưởng')
                        ->where('mahuyen',$inputs['mahuyen'])
                        ->where('maxa',$inputs['maxa'])
                        ->whereDate('ngayhuong','<=',$ngayxd)
                        ->get();
                    foreach($modeldt as $dt){
                        $tttc = DmTroCapTx::where('matrocap',$dt->matrocap)->first();
                        $dt->noidung = $tttc->noidung;
                        $dt->chitiet = $tttc->chitiet;

                        $adddt = new TcDoiTuongTxCt();
                        $adddt->matrocap = $inputs['matrocap'];
                        $adddt->mahoso = $dt->mahoso;
                        $adddt->hoten = $dt->hoten;
                        $adddt->diachi = $dt->diachi;
                        $adddt->namsinh = date('Y',strtotime($dt->ngaysinh));
                        $adddt->qdhuong = $dt->qdhuong;
                        $adddt->noidung = $dt->noidung;
                        $adddt->chitiet = $dt->chitiet;
                        $adddt->heso = $dt->heso;
                        $adddt->sotientc = $dt->sotientc;
                        $adddt->hientrang = 'Chờ lĩnh';
                        $adddt->save();
                    }
                }
            }

            return redirect('trocapdoituongtx?&trocap='.$inputs['pltrocap'].'&thang='.$inputs['thang'].'&nam='.$inputs['nam']);


        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $nams = getSelectNam();
            $model = TcDoiTuongTx::find($id);
            $xa = Towns::where('maxa',$model->maxa)->first();
            $huyen = Districts::where('mahuyen',$model->mahuyen)->first();
            $model->tenxa = $xa->tenxa;
            $model->tenhuyen = $huyen->tenhuyen;
            $trocap = $model->pltrocap;
            $nam =$model->nam;
            $thang = $model->thang;

            return view('manage.trocap.doituongtx.edit')
                ->with('action','update')
                ->with('model',$model)
                ->with('trocap',$trocap)
                ->with('nams',$nams)
                ->with('nam',$nam)
                ->with('thang',$thang)
                ->with('pageTitle','Chi trả trợ cấp đối tượng thường xuyên thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = TcDoiTuongTx::find($id);
            $model->update($inputs);
            $pltrocap = $model->pltrocap;
            $thang = $model->thang;
            $nam = $model->nam;
            return redirect('trocapdoituongtx?&trocap='.$pltrocap.'&thang='.$thang.'&nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function duyet(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idduyet'];
            $model = TcDoiTuongTx::find($id);
            $model->trangthai = 'Đã duyệt';
            $model->save();
            $pltrocap = $model->pltrocap;
            $thang = $model->thang;
            $nam = $model->nam;
            return redirect('trocapdoituongtx?&trocap='.$pltrocap.'&thang='.$thang.'&nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $modeltc = TcDoiTuongTx::find($id);
            $loaitc = PlTroCapTx::where('maloai',$modeltc->pltrocap)->first()->tenloai;
            $huyen = Districts::where('mahuyen',$modeltc->mahuyen)->first();
            $xa = Towns::where('maxa',$modeltc->maxa)->first();
            $modeltc->tenhuyen = $huyen->tenhuyen;
            $modeltc->tenxa = $xa->tenxa;
            $model = TcDoiTuongTxCt::where('matrocap',$modeltc->matrocap)
                ->get();
            $modeltc->slhs = count($model);
            $modeltc->tstien = $model->sum('sotientc');
            $modeltc->truylinh = $model->sum('sotientl');
            $modeltc->hsdl = count($model->where('trangthai','Đã lĩnh'));
            $modeltc->tsdalinh = $model->where('trangthai','Đã lĩnh')->sum('sotientc');
            $modeltc->datruylinh = $model->where('trangthai','Đã lĩnh')->sum('sotientl');
            foreach($model as $tt){
                $tt->thuclinh = $tt->sotientc - $tt->sotientl;
            }
            return view('manage.trocap.doituongtx.show')
                ->with('modeltc',$modeltc)
                ->with('loaitc',$loaitc)
                ->with('model',$model)
                ->with('pageTitle','Danh sách đối tượng trợ cấp thường xuyên');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = TcDoiTuongTx::find($id);
            if(count($model)>0) {
                $pltrocap = $model->pltrocap;
                $thang = $model->thang;
                $nam = $model->nam;
                if ($model->delete()){
                    $modelct = TcDoiTuongTxCt::where('matrocap', $model->matrocap)
                        ->get();
                    if (count($modelct) > 0)
                        $modelct->delete();
                }
                return redirect('trocapdoituongtx?&trocap=' . $pltrocap . '&thang=' . $thang . '&nam=' . $nam);
            }else
                return redirect('trocapdoituongtx');
        }else
            return view('errors.notlogin');
    }
}
