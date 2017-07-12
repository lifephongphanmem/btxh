<?php

namespace App\Http\Controllers;

use App\Districts;
use App\DmTroCapTx;
use App\DsDoiTuongTx;
use App\PlTroCapTx;
use App\Towns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DsDoiTuongTxController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if (session('admin')->level == 'T') {
                $huyendf = Districts::first()->mahuyen;
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $huyendf;
                $xadf = Towns:: where('mahuyen', $huyen)->first()->maxa;
                if (isset($inputs['maxa'])) {
                    if ($inputs['maxa'] == "all")
                        $xa = $xadf;
                    else
                        $xa = $inputs['maxa'];
                } else {
                    $xa = $xadf;
                }

            } elseif (session('admin')->level == 'H') {
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->mahuyen;
                $xadf = Towns:: where('mahuyen', $huyen)->first()->maxa;
                $xa = isset($inputs['maxa']) ? $inputs['maxa'] : $xadf;
            } else {
                $huyen = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->mahuyen;
                $xa = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
            }
            $trocap = isset($inputs['trocap']) ? $inputs['trocap'] : 'CD';

            $huyens = listHuyen();
            $xas = array();
            if ($huyen != 'all') {
                $xas = listXa($huyen);
            }
            $model = DsDoiTuongTx::where('pltrocap',$trocap);
            if($huyen != 'all' && $huyen != ''){
                $model = $model->where('mahuyen', $huyen);
            }
            if($xa != 'all' && $xa != ''){
                $model = $model->where('maxa', $xa);
            }else{
                $model = $model->where('maxa', $xa);
            }
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = $model->where('trangthaihoso', '<>', 'Chờ chuyển')
                    ->where('trangthaihoso', '<>', 'Bị trả lại');
            }
            $model = $model->get();

            return view('manage.danhsachdoituong.thuongxuyen.index')
                ->with('huyens', $huyens)
                ->with('xas', $xas)
                ->with('mahuyen', $huyen)
                ->with('maxa', $xa)
                ->with('trocap', $trocap)
                ->with('model',$model)
                ->with('pageTitle', 'Danh sách đối tượng trợ cấp thường xuyên');
        }else
            return view('errors.notlogin');
    }

    public function create($trocap)
    {
        if (Session::has('admin')) {
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
            $selectloaidt = DmTroCapTx::where('pltrocap', $trocap)->get();
            $selectnoidungtc = $this->getNoiDungTcTx($trocap);
            $selectchitiettc = $this->getChiTietTcTx($selectnoidungtc);

            $loaitrocapdf = $selectloaidt->first()->matrocap;
            $loaitrocap = PlTroCapTx::where('maloai', $trocap)->first();
            return view('manage.danhsachdoituong.thuongxuyen.create')
                ->with('action', 'create')
                ->with('huyens', $huyens)
                ->with('mahuyen', $huyendf)
                ->with('xas', $xas)
                ->with('maxa', $xadf)
                ->with('trocap', $trocap)
                ->with('loaitrocap', $loaitrocap)
                ->with('selectloaidt', $selectloaidt)
                ->with('selectnoidungtc',$selectnoidungtc)
                ->with('selectchitiettc',$selectchitiettc)
                ->with('loaitrocapdf',$loaitrocapdf)
                ->with('trocap',$trocap)
                ->with('pageTitle', 'Thêm mới đối tượng trợ cấp thường xuyên');
        } else
            return view('errors.notlogin');
    }

    public function getNoiDungTcTx($trocap){
        $model = DmTroCapTx::where('pltrocap',$trocap)->groupby('noidung')->select('noidung')->geT();
        $options = array();

        foreach ($model as $tt) {

            $options[] = $tt->noidung;
        }
        return $options;
    }

    public function getChiTietTcTx($noidung){
        $model = DmTroCapTx::where('noidung',$noidung)->get();
        $options = array();

        foreach ($model as $tt) {

            $options[$tt->matrocap] = $tt->chitiet.'- Hệ số: '.$tt->heso;
        }
        return $options;
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['matinh'] = getmatinh();
            $inputs['ttthaotac'] = session('admin')->name .'('.session('admin')->username.')'.'- Thêm mới';
            $inputs['mahoso'] = getmatinh().$inputs['mahuyen'].$inputs['maxa'].'TX'.$this->getIdForCreateBTXH();
            $inputs['ngaysinh'] = getDateToDb($inputs['ngaysinh']);
            $inputs['ngayhuong'] = getDateToDb($inputs['ngayhuong']);
            $inputs['ngaydunghuong'] = getDateToDb($inputs['ngaydunghuong']);
            if(session('admin')->level == 'T')
                $inputs['trangthaihoso'] = 'Đã duyệt';
            else
                $inputs['trangthaihoso'] = 'Chờ chuyển';
            $model = new DsDoiTuongTx();
            $model->create($inputs);
            return redirect('danhsachdoituongtx?&trocap='.$inputs['pltrocap']);
        } else
            return view('errors.notlogin');
    }

    public function getIdForCreateBTXH() {

        $maxid = DsDoiTuongTx::max('id');

        return $maxid + 1;
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = DsDoiTuongTx::find($id);
            $huyens = Districts::all();
            $xas = Towns::where('mahuyen', $model->mahuyen)->get();
            $huyendf = $model->mahuyen;
            $xadf = $model->maxa;
            $selectnoidungtc = $this->getNoiDungTcTx($model->pltrocap);
            $selectchitiettc = $this->getChiTietTcTx($selectnoidungtc);

            $tttrocap = DmTroCapTx::where('matrocap',$model->matrocap)->first();
            $loaitrocap = PlTroCapTx::where('maloai', $model->pltrocap)->first();
            return view('manage.danhsachdoituong.thuongxuyen.edit')
                ->with('action', 'edit')
                ->with('huyens', $huyens)
                ->with('mahuyen', $huyendf)
                ->with('xas', $xas)
                ->with('maxa', $xadf)
                ->with('selectnoidungtc',$selectnoidungtc)
                ->with('selectchitiettc',$selectchitiettc)
                ->with('loaitrocap',$loaitrocap)
                ->with('model',$model)
                ->with('tttrocap',$tttrocap)
                ->with('pageTitle', 'Chỉnh sửa đối tượng trợ cấp thường xuyên');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['matinh'] = getmatinh();
            $inputs['ttthaotac'] = session('admin')->name .'('.session('admin')->username.')'.'- Cập nhật';
            $inputs['ngaysinh'] = getDateToDb($inputs['ngaysinh']);
            $inputs['ngayhuong'] = getDateToDb($inputs['ngayhuong']);
            $inputs['ngaydunghuong'] = getDateToDb($inputs['ngaydunghuong']);
            $model = DsDoiTuongTx::find($id);
            $model->update($inputs);
            return redirect('danhsachdoituongtx?&trocap='.$inputs['pltrocap']);
        } else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = DsDoiTuongTx::find($id);
            $huyen = Districts::where('mahuyen',$model->mahuyen)->first()->tenhuyen;
            $xa = Towns::where('maxa',$model->maxa)->first()->tenxa;
            $loaitc = DmTroCapTx::where('matrocap',$model->matrocap)->first();
            $loaidt = PlTroCapTx::where('maloai',$model->pltrocap)->first()->tenloai;

            return view('manage.danhsachdoituong.thuongxuyen.show')
                ->with('model',$model)
                ->with('dvql',$xa.'- '.$huyen)
                ->with('loaitc',$loaitc)
                ->with('loaidt',$loaidt)
                ->with('pageTitle', 'Thông tin đối tượng trợ cấp thường xuyên');
        } else
            return view('errors.notlogin');
    }
}
