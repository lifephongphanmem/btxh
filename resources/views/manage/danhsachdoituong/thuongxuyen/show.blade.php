@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
        Thông tin <small>{{$loaidt}}</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <!--div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">

                    </div>
                </div-->
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table id="user" class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td style="width:280; text-align: center" rowspan="5">
                                        <img src="{{ url('images/avatar/no-image.png')}}">
                                    </td>
                                    <td><b>Đơn vị quản lý:</b> {{$dvql}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Họ và tên:</b> {{$model->hoten}}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Mã hồ sơ:</b> {{$model->mahoso}}</td>
                                </tr>
                                <tr>
                                   <td><b>Ngày sinh:</b> {{getDayVn($model->ngaysinh)}}</td>
                                </tr>
                                <tr>
                                    <td><b>Giới tính:</b> {{$model->gioitinh}}</td>
                                </tr>
                                <tr>
                                    <td><b>Địa chỉ</b></td>
                                    <td>{{$model->diachi}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Bảo hiểm y tế- Nơi khám chữa bệnh</b>
                                    </td>
                                    <td>{{$model->bhyt}}- {{$model->noikhambenh}}</td>
                                </tr>
                                <tr>
                                    <td><b>Thông tin quyết định trợ cấp</b></td>
                                    <td>{{$model->ttquyetdinh}}</td>
                                </tr>
                                <tr>
                                    <td><b>Sổ trợ cấp</b></td>
                                    <td>{{$model->sosotc}}</td>
                                </tr>
                                <tr>
                                    <td><b>Trạng thái hưởng</b></td>
                                    <td>{{$model->trangthaihuong}}</td>
                                </tr>
                                <tr>
                                    <td><b>Ngày bắt đâu-kết thúc hưởng</b></td>
                                    <td>{{getDayVn($model->ngayhuong)}} - {{$model->trangthaihuong=='Dừng hưởng' ? getDayVn($model->ngaydunghuong) : ''}}</td>
                                </tr>
                                @if($model->trangthaihuong == 'Dừng hưởng')
                                <tr>
                                    <td><b>Lý do dừng hưởng</b></td>
                                    <td>{{$model->lydodunghuong}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td><b>Loại trợ cấp</b></td>
                                    <td>{{$loaitc->noidung}} {{$loaitc->chitiet != '' ? '- '.$loaitc->chitiet : ''}}- <b>Hệ số: {{$loaitc->heso}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('danhsachdoituongtx?&trocap='.$model->pltrocap)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <a href="" class="btn btn-default"><i class="fa fa-search"></i>&nbsp;Lịch sử</a>
            </div>
        </div>
    </div>
@stop