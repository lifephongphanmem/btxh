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
        function InputMask(){
            //$(function(){
            // Input Mask
            if($.isFunction($.fn.inputmask))
            {
                $("[data-mask]").each(function(i, el)
                {
                    var $this = $(el),
                            mask = $this.data('mask').toString(),
                            opts = {
                                numericInput: attrDefault($this, 'numeric', false),
                                radixPoint: attrDefault($this, 'radixPoint', ''),
                                rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                            },
                            placeholder = attrDefault($this, 'placeholder', ''),
                            is_regex = attrDefault($this, 'isRegex', '');


                    if(placeholder.length)
                    {
                        opts[placeholder] = placeholder;
                    }

                    switch(mask.toLowerCase())
                    {
                        case "phone":
                            mask = "(999) 999-9999";
                            break;

                        case "currency":
                        case "rcurrency":

                            var sign = attrDefault($this, 'sign', '$');;

                            mask = "999,999,999.99";

                            if($this.data('mask').toLowerCase() == 'rcurrency')
                            {
                                mask += ' ' + sign;
                            }
                            else
                            {
                                mask = sign + ' ' + mask;
                            }

                            opts.numericInput = true;
                            opts.rightAlignNumerics = false;
                            opts.radixPoint = '.';
                            break;

                        case "email":
                            mask = 'Regex';
                            opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                            break;

                        case "fdecimal":
                            mask = 'decimal';
                            $.extend(opts, {
                                autoGroup		: true,
                                groupSize		: 3,
                                radixPoint		: attrDefault($this, 'rad', '.'),
                                groupSeparator	: attrDefault($this, 'dec', ',')
                            });
                    }

                    if(is_regex)
                    {
                        opts.regex = mask;
                        mask = 'Regex';
                    }

                    $this.inputmask(mask, opts);
                });
            }
            //});
        }
        function getId(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/trocapdoituongtxtc/thongtin',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#thongtin').replaceWith(data.message);
                    }
                    else
                        toastr.error("Không thể xem được thông tin trợ cấp!", "Lỗi!");
                }
            })
        }
        function getIdTruyLinh(id){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/trocapdoituongtxtc/truylinh',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#truylinh').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể truy lĩnh trợ cấp!", "Lỗi!");
                }
            })
        }
        function getIdDuyet(id){
            document.getElementById("idduyet").value=id;
        }
        function ClickTruyLinh(){
            $('#frm_truylinh').submit();
        }
        function ClickDuyet(){
            $('#frm_duyet').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh sách chi trả trợ cấp đối tượng<small>&nbsp;thường xuyên</small>
    </h3>
    <h5 class="col-lg-12" style="font-weight: 200;color: blue">
        Gói trợ cấp: <b>{{$modeltc->tengoitc}}</b> trong đợt chi trả: <b>tháng {{$modeltc->thang}} năm {{$modeltc->nam}}</b>
    </h5>
    <h5 class="col-lg-12" style="font-weight: 200;color: blue">
        Loại trợ cấp: <b>{{$loaitc}}</b> tại <b>{{$modeltc->tenhuyen}}- {{$modeltc->tenxa}}</b>
    </h5>
    <h5 class="col-lg-12" style="font-weight: 200;color: blue">
       Có <b>{{$modeltc->slhs}}</b> hồ sơ. Số tiền chi trả: <b>{{number_format($modeltc->tstien)}} VNĐ</b>. Số tiền truy lĩnh: <b>{{number_format($modeltc->truylinh)}} VNĐ</b>
        - Đã lĩnh: <b>{{$modeltc->hsdl}}</b> hồ sơ. Số tiền đã lĩnh: <b>{{number_format($modeltc->tsdalinh)}} VNĐ</b>. Số tiền đã truy lĩnh: <b>{{number_format($modeltc->datruylinh)}} VNĐ </b>
    </h5>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <!--div class="portlet-title">
                </div-->

                <div class="portlet-body">
                    <div class="portlet-body">
                        <!--div class="table-toolbar">

                        </div-->
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Họ và tên</th>
                            <th style="text-align: center" >Địa chỉ</th>
                            <th style="text-align: center; ">Năm<br> sinh</th>
                            <th style="text-align: center; ">Hệ số</th>
                            <th style="text-align: center; ">Số tiền</th>
                            <th style="text-align: center; ">Số tháng <br>truy lĩnh</th>
                            <th style="text-align: center; ">Số tiền <br>truy lĩnh</th>
                            <th style="text-align: center; ">Số tiền <br>thực lĩnh</th>
                            <th style="text-align: center ; width: 5%">Trạng thái</th>
                            <th style="text-align: center;width:25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="text-align: left" class="active">{{$tt->hoten}}</td>
                                <td style="text-align: left">{{$tt->diachi}}</td>
                                <td style="text-align: center">{{$tt->namsinh}}</td>
                                <td style="text-align: center">{{$tt->heso}}</td>
                                <td style="text-align: center">{{number_format($tt->sotientc)}}</td>
                                <td style="text-align: center">{{$tt->thangtl}}</td>
                                <td style="text-align: center">{{number_format($tt->sotientl)}}</td>
                                <td style="text-align: center">{{number_format($tt->thuclinh)}}</td>
                                @if($tt->hientrang == 'Đã lĩnh')
                                    <td style="text-align: center"><span class="label label-sm label-success">Đã lĩnh</span></td>
                                @else
                                    <td style="text-align: center"><span class="label label-sm label-warning">Chờ lĩnh</span></td>
                                @endif
                                <td>
                                    <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#thongtin-modal" data-toggle="modal"><i class="fa fa-eye"></i>&nbsp;
                                        Xem chi tiết</button>
                                    @if($tt->hientrang == 'Chờ lĩnh')
                                        <button type="button" onclick="getIdTruyLinh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#truylinh-modal" data-toggle="modal"><i class="fa fa-money"></i>&nbsp;
                                            Truy lĩnh</button>
                                        @if($modeltc->trangthai == 'Đã duyệt')
                                            <button type="button" onclick="getIdDuyet('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#duyet-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                                               Chi trả</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->

    </div>
    <div class="clearfix"></div>
    <div class="modal fade bs-modal-lg" id="thongtin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thông tin chi trả trợ cấp đối tượng</h4>
                </div>
                <div class="modal-body" id="thongtin">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="truylinh-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'trocapdoituongtxct/truylinh','id' => 'frm_truylinh'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Truy lĩnh trợ cấp đối tượng?</h4>
                </div>
                <div class="modal-body" id="truylinh">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickTruyLinh()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="duyet-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'trocapdoituongtxct/duyet','id' => 'frm_duyet'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Xác nhận chi trả trợ cấp?</h4>
                </div>
                <input type="hidden" name="idduyet" id="idduyet">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickDuyet()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')

@stop