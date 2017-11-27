@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin mẫu biểu tờ khai <small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box ">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'maubieutokhai/'. $model->id, 'class'=>'horizontal-form','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    {!!Form::text('tieude', null, array('id' => 'tieude','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>
                                    {!!Form::text('noidung', null , array('id' => 'noidung','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày ban hành</label>
                                    {!!Form::text('ngaybanhanh',null, array('id' => 'ngaybanhanh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày áp dụng </label>
                                    {!!Form::text('ngayapdung',null, array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if($model->file != '')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File hiện tại<span class="require">*</span></label>
                                    <a href="{{ url('file/maubieutokhai/'.$model->file)}}" target="_blank">{{$model->file}}</a>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm<span class="require">*</span></label>
                                    {!!Form::file('file', array('id'=>'file','class' => 'passvalid'))!!}
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('maubieutokhai')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_districts").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop