@extends('main')

@section('custom-style')
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop

@section('custom-script')
    <!-- END PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{url('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/admin/pages/scripts/form-wizard.js')}}"></script>
    <script src="{{url('js/jquery.inputmask.bundle.min.js')}}"></script>

    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
            TableManaged.init();
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            FormWizard.init();
        });
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
@stop

@section('content')
<h3 class="page-title">
    {{$loaitrocap->tenloai}} <small> chỉnh sửa</small>
</h3>
<div class="row">
    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'danhsachdoituongtx/'. $model->id, 'class'=>'horizontal-form']) !!}
    <input type="hidden" name="pltrocap" id="pltrocap" value="{{$model->pltrocap}}">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-body form" id="form_wizard">
                <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                        <li><a href="#tab1" data-toggle="tab" class="step">
                                    <span class="badge badge-default">
                                    1 </span>
                                <p class="description">Thông tin hồ sơ</p>
                            </a>
                        </li>
                        <li><a href="#tab2" data-toggle="tab" class="step">
                                <span class="badge badge-default">
                                    2 </span>
                                <p class="description">Thông tin trợ cấp</p></a>
                        </li>
                        <li><a href="#tab3" data-toggle="tab" class="step">
                                 <span class="badge badge-default">
                                    3 </span>
                                <p class="description">Thông tin đính kèm</p></a>
                        </li>
                    </ul>
                    <div id="bar" class="progress progress-striped" role="progressbar">
                        <div class="progress-bar progress-bar-blue">
                        </div>
                    </div>
                    <div class="tab-content">
                        @include('manage.danhsachdoituong.thuongxuyen.include.tthoso')
                        @include('manage.danhsachdoituong.thuongxuyen.include.tttrocap')
                        @include('manage.danhsachdoituong.thuongxuyen.include.ttdinhkem')
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-1" style="text-align: left">
                            <button type="button" name="previous" value="Previous" class="btn default button-previous">
                                <i class="fa fa-arrow-circle-o-left mrx"></i>&nbsp;Trước
                            </button>
                        </div>
                        <div class="col-md-offset-8 col-md-1" style="text-align: right">
                            <button id="btnnext" type="button" name="next" value="Next" class="btn blue button-next">
                                Tiếp&nbsp;<i class="fa fa-arrow-circle-o-right mlx"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center">
            <a href="{{url('danhsachdoituongtx?&trocap='.$model->pltrocap)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
        </div>
    </div>
    {!! Form::close() !!}
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
    <script>
        function validateForm(){

            var str = '',strb1='',strb2='';
            var ok = true;

            if($('#hoten').val()==''){
                strb1 += ' - Họ và tên đối tượng ký\n';
                ok = false;
            }
            if($('#ngaysinh').val()==''){
                strb1 += ' - Ngày sinh đối tượng\n';
                ok = false;
            }
            if($('#diachi').val()==''){
                strb1 += '  - Địa chỉ đối tượng \n';
                ok = false;
            }


            if($('#ngayhuong').val()==''){
                strb2 += ' - Ngày bắt đầu hưởng trợ cấp \n';
                ok = false;
            }
            if($('#matrocap').val()==''){
                strb2 += '  - Phân loại trợ cấp  \n';
                ok = false;
            }

            //Kết quả
            if ( ok == false){
                if(strb1!='')
                    str+='Bước 1: Thông tin hồ sơ \n '+strb1 ;
                if(strb2!='')
                    str+='Bước 2: Thông tin trợ cấp \n '+strb2 ;

                alert('Thông tin không được để trống \n' + str );
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else{
                $("form").unbind('submit').submit();
            }

        }
    </script>
@stop