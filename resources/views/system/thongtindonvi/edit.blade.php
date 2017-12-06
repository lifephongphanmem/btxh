@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin đơn vị quản lý<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtindonvi/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tthethong']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên đơn vị<span class="require">*</span></label>
                                    @if(session('admin')->level == 'X')
                                        {!!Form::text('tenxa', null, array('id' => 'tenxa','class' => 'form-control required'))!!}
                                    @else
                                        {!!Form::text('tenhuyen', null, array('id' => 'tenhuyen','class' => 'form-control required'))!!}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                    {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số điện thoại<span class="require">*</span></label>
                                    {!!Form::text('dienthoai', null, array('id' => 'dienthoai','class' => 'form-control'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số fax<span class="require">*</span></label>
                                    {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thủ trưởng đơn vị<span class="require">*</span></label>
                                    {!!Form::text('thutruong', null, array('id' => 'thutruong','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kế toán<span class="require">*</span></label>
                                    {!!Form::text('ketoan', null, array('id' => 'ketoan','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Người lập biểu<span class="require">*</span></label>
                                    {!!Form::text('nguoithuchien', null, array('id' => 'nguoithuchienb','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Chức vụ ký<span class="require">*</span></label>
                                    {!!Form::text('chucvuky', null, array('id' => 'chucvuky','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Họ tên ngời ký<span class="require">*</span></label>
                                    {!!Form::text('hotennguoiky', null, array('id' => 'hotennguoiky','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('thongtindonvi')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tthethong").validate({
                rules: {
                    name :"required"
                },
                messages: {
                    name :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('includes.script.create-header-scripts')
@stop