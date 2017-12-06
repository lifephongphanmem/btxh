@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Lịch sử<small>&nbsp;hồ sơ</small>
    </h3>
    <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="user" class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td style="text-align: center" rowspan="6" class="col-md-3">
                                        <img src="{{ url('/images/avatar/doituongtx/'.$model->avatar)}}">
                                    </td>
                                    <td><b>Đơn vị quản lý:</b> {{$model->dvql}}</td>
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
                                    <td><b>Địa chỉ: </b>{{$model->diachi}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--div class="portlet-title">
                        <div class="caption">
                        </div>
                        <div class="actions">

                        </div>
                    </div-->
                    <div class="portlet-body">


                        <div class="portlet-body">
                            <div class="table-toolbar">

                            </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center; width: 20%">Thời gian thao tác</th>
                                <th style="text-align: center;" >Hành động</th>
                                <th style="text-align: center;width: 15%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->

    <div class="clearfix"></div>

@stop