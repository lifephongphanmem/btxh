@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin xã phường<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'towns', 'id' => 'create_towns', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quận huyện<span class="require">*</span></label>
                                        <select id="mahuyen" name="mahuyen" class="form-control">
                                            @foreach($listhuyen as $tthuyen )
                                                <option value="{{$tthuyen->mahuyen}}">{{$tthuyen->tenhuyen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã xã<span class="require">*</span></label>
                                        {!!Form::text('maxa', null, array('id' => 'maxa','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên xã<span class="require">*</span></label>
                                        {!!Form::text('tenxa', null, array('id' => 'tenxa','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ</label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại</label>
                                        {!!Form::text('dienthoai', null , array('id' => 'dienthoai','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số fax</label>
                                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!!Form::text('email', null , array('id' => 'email','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Username<span class="require">*</span></label>
                                        {!!Form::text('username', null , array('id' => 'username','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mật khẩu<span class="require">*</span></label>
                                        {!!Form::text('password', null, array('id' => 'password','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('towns')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_towns").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        $('#maxa').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkmaxa',
                data: {
                    _token: CSRF_TOKEN,
                    maxa:$(this).val()
                },
                success: function (respond) {
                    if(respond != 'ok'){
                        toastr.error("Bạn cần nhập lại mã xã", "Mã xã nhập vào đã tồn tại!!!");
                        $('#maxa').val('');
                        $('#max').focus();
                    }else
                        toastr.success("Mã xã sử dụng được!", "Thành công!");
                }

            });
        });

        $('#username').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/checkuser',
                data: {
                    _token: CSRF_TOKEN,
                    username:$(this).val()
                },
                success: function (respond) {
                    if(respond != 'ok'){
                        toastr.error("Bạn cần nhập lại username", "Username nhập vào đã tồn tại!!!");
                        $('#username').val('');
                        $('#username').focus();
                    }else
                        toastr.success("Username sử dụng được!", "Thành công!");
                }

            });
        });

    </script>
@stop