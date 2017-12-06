<?php

namespace App\Http\Controllers;

use App\DmTroCapTx;
use App\HoSoThayDoiTcTx;
use App\HoSoXinHuongTx;
use App\PlTroCapTx;
use App\TcDoiTuongTx;
use App\TcDoiTuongTxCt;
use App\Towns;
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

    public function hsxhbtxh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if($inputs['select_thang'] == 'all')
                $model = HoSoXinHuongTx::whereYear('ngayxinhuong',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            else
                $model =  $model = HoSoXinHuongTx::whereMonth('ngayxinhuong', $inputs['select_thang'])
                    ->whereYear('ngayxinhuong',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            $model = $model->get();
            foreach($model as $tt){
                $modelpltc = PlTroCapTx::where('maloai',$tt->pltrocap)->first();
                $modeldmtc = DmTroCapTx::where('matrocap',$tt->matrocap)->first();
                $tt->tttctd = $modelpltc->tenloai.'-'.$modeldmtc->noidung.'-'.$modeldmtc->chitiet;
                $tt->heso = $modeldmtc->heso;
            }

            $modeldv = Towns::where('maxa',session('admin')->maxa)->first();
            return view('reports.bcth.hsxhbtxh')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('thang',$inputs['select_thang'])
                ->with('nam',$inputs['select_nam'])
                ->with('pageTitle','Danh sách hồ sơ xin hưởng trợ cấp xã hội');
        } else
            return view('errors.notlogin');
    }

    public function hscqdbtxh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if($inputs['select_thang'] == 'all')
                $model = HoSoXinHuongTx::whereYear('ngayxinhuong',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            else
                $model =  $model = HoSoXinHuongTx::whereMonth('ngayxinhuong', $inputs['select_thang'])
                    ->whereYear('ngayxinhuong',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            $model = $model->where('trangthaihoso','Đã duyệt')->get();
            foreach($model as $tt){
                $modelpltc = PlTroCapTx::where('maloai',$tt->pltrocap)->first();
                $modeldmtc = DmTroCapTx::where('matrocap',$tt->matrocap)->first();
                $tt->tttctd = $modelpltc->tenloai.'-'.$modeldmtc->noidung.'-'.$modeldmtc->chitiet;
                $tt->heso = $modeldmtc->heso;
            }

            $modeldv = Towns::where('maxa',session('admin')->maxa)->first();
            return view('reports.bcth.hscqdbtxh')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('thang',$inputs['select_thang'])
                ->with('nam',$inputs['select_nam'])
                ->with('pageTitle','Danh sách hồ sơ có quyết định hưởng trợ cấp xã hội');
        } else
            return view('errors.notlogin');
    }

    public function hsdctc(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if($inputs['select_thang'] == 'all')
                $model = HoSoThayDoiTcTx::whereYear('ngayyc',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            else
                $model = HoSoThayDoiTcTx::whereMonth('ngayyc', $inputs['select_thang'])
                    ->whereYear('ngayyc',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            $model = $model->where('trangthaihoso','Đã duyệt')->get();
            foreach($model as $tt){
                $modelpltc = PlTroCapTx::where('maloai',$tt->pltrocap)->first();
                $modeldmtc = DmTroCapTx::where('matrocap',$tt->matrocap)->first();
                $tt->tttctd = $modelpltc->tenloai.'-'.$modeldmtc->noidung.'-'.$modeldmtc->chitiet;
                $modelpltcm = PlTroCapTx::where('maloai',$tt->pltrocapm)->first();
                $modeldmtcm = DmTroCapTx::where('matrocap',$tt->matrocapm)->first();
                $tt->tttctdm = $modelpltcm->tenloai.'-'.$modeldmtcm->noidung.'-'.$modeldmtcm->chitiet;
            }

            $modeldv = Towns::where('maxa',session('admin')->maxa)->first();
            return view('reports.bcth.hsdctc')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('thang',$inputs['select_thang'])
                ->with('nam',$inputs['select_nam'])
                ->with('pageTitle','Danh sách hồ sơ điều chỉnh trợ cấp');
        } else
            return view('errors.notlogin');
    }

    public function dscttcht(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if($inputs['select_thang'] == 'all')
                $model = TcDoiTuongTx::where('nam',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            else
                $model = TcDoiTuongTx::where('thang', $inputs['select_thang'])
                    ->where('nam',  $inputs['select_nam'])
                    ->where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen);
            $model = $model->where('trangthai','Đã duyệt')->first();
            $modelct = TcDoiTuongTxCt::where('matrocap',$model->matrocap)
                ->get();
            $modeldv = Towns::where('maxa',session('admin')->maxa)->first();
            return view('reports.bcth.dscttcht')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modeldv',$modeldv)
                ->with('thang',$inputs['select_thang'])
                ->with('nam',$inputs['select_nam'])
                ->with('pageTitle','Danh sách chi trả trợ cấp hàng tháng');
        } else
            return view('errors.notlogin');
    }
}
