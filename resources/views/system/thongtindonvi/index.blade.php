@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')
    <h3 class="page-title">
        Thông tin <small>đơn vị</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="{{url('thongtindonvi/'.$model->id.'/edit')}}" class="btn btn-default btn-sm">
                            <i class="fa fa-edit"></i>&nbsp;Chỉnh sửa </a>

                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td style="width:15%">
                                <b>Tên đơn vị</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{session('admin')->levle == 'H' ? $model->tenhuyen : $model->tenxa}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Địa chỉ</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->diachi}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Điện thoại</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->dienthoai}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Số fax</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->fax}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Thủ trưởng</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->thutruong}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Kế toán</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->ketoan}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">
                                <b>Người lập biểu</b>
                            </td>
                            <td style="width:35%">
                                <span class="text-muted">{{$model->nguoithuchien}}
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop