@extends('main')

@section('custom-style')
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });

    </script>
    <script>
        jQuery(function($){
            $('#select_noidung').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/getChiTietTc',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        noidung: $("#select_noidung option:selected" ).text(),
                        pltrocap : $('#pltrocapm').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success')
                            $('#select_chitiet').replaceWith(data.message);
                    }
                });
            });
        });
    </script>
    <script>
        function addtc(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/addTcTxTd',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    matrocap: $('#select_chitiet').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Nhập trợ cấp cho đối tượng thành công!");
                        $('#ndtcmoi').replaceWith(data.message);
                        $('#modal-addtc').modal("hide");

                    }
                }
            })
        }
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Thông tin thay đổi trợ cấp<small> đối tượng thường xuyên</small>
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
                    {!! Form::open(['url'=>'thaydoitctx', 'id' => 'create_thaydoitctx', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <input type="hidden" value="{{$value['pltrocapm']}}" id="pltrocapm" name="pltrocapm">
                    <div class="form-body">
                        <div class="row">
                            {!! Form::hidden('mahoso',$value['mahoso'],array('id' => 'mahoso', 'class' => 'form-control','readonly'))!!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên đối tượng</label>
                                    {!!Form::text('hoten', $value['hoten'] , array('id' => 'hoten','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày sinh</label>
                                    {!!Form::text('ngaysinh',date('d/m/Y',strtotime($value['ngaysinh'])), array('id' => 'ngaysinh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required','readonly'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    {!!Form::text('diachi', $value['diachi'], array('id' => 'diachi','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phân loại thay đổi<span class="require">*</span></label>
                                    {!! Form::select(
                                    'plthaydoi',
                                    array(
                                    'Thay đổi mức trợ cấp' => 'Thay đổi mức trợ cấp',
                                    'Thay đổi loại trợ cấp' => 'Thay đổi loại trợ cấp'
                                    ),$value['plthaydoi'],
                                    array('id' => 'plthaydoi', 'class' => 'form-control','readonly'))
                                    !!}
                                </div>
                            </div>
                        </div>
                        @if($value['plthaydoi'] == 'Thay đổi mức trợ cấp')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung<span class="require">*</span></label>
                                    <label style="color: blue" class="form-control">{{$value['noidung']}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Chi tiết<span class="require">*</span></label>
                                    <label style="color: blue" class="form-control">{{$value['chitiet']}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Hệ số<span class="require">*</span></label>
                                    <input type="text" style="color:blue;" class="form-control" id="hesom" name="hesom" value="{{$value['heso']}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số tiền trợ cấp mới<span class="require">*</span></label>
                                    {!!Form::text('sotientcm', number_format($value['sotientc']) , array('id' => 'sotientcm','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                            <input type="hidden" value="{{$value['matrocap']}}" id="matrocapm" name="matrocapm">

                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a data-target="#modal-addtc" data-toggle="modal">Chọn loại đối tượng trợ cấp</a>
                                </div>
                            </div>
                        </div>
                        <div id="ndtcmoi">
                            <input type="hidden" id="matrocapm" name="matrocapm">
                        </div>
                        @endif
                        <input type="hidden" name="maxa" id="maxa" value="{{$value['maxa']}}">
                        <input type="hidden" name="mahuyen" id="mahuyen" value="{{$value['mahuyen']}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung thay đổi<span class="require">*</span></label>
                                    {!!Form::text('noidungthaydoi', null, array('id' => 'noidungthaydoi','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('danhsachdoituongtx')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <div class="modal fade bs-modal-lg" id="modal-addtc" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chọn loại đối tượng trợ cấp</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="selGender" class="control-label"><b>Nội dung</b><span class="require">*</span></label>
                                <div>
                                    {!! Form::select(
                                    'select_noidung',
                                    $selectnoidungtc
                                    ,null,
                                    array('id' => 'select_noidung', 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="selGender" class="control-label"><b>Chi tiết</b><span class="require">*</span></label>
                                <div>
                                    {!! Form::select(
                                    'select_chitiet',
                                    $selectchitiettc
                                    ,null,
                                    array('id' => 'select_chitiet', 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                        <button type="button" class="btn btn-primary" onclick="addtc()">Đồng ý</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript">
        function validateForm(){

            var str = '';
            var ok = true;

            if($('#matrocapm').val()==''){
                str += '  - Chọn loại trợ cấp <br>';
                ok = false;
            }
            if($('#noidungthaydoi').val()==''){
                str+= ' - Nội dung thay đổi <br>';
                ok = false;
            }

            //Kết quả
            if ( ok == false){
                toastr.error('Thông tin không được để trống <br>' + str );
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else{
                $("form").unbind('submit').submit();
            }

        }
    </script>
    @include('includes.script.create-header-scripts')
@stop