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
        function getIdXinHuong(id){
            document.getElementById("idxinhuong").value=id;
        }
        function ClickXinHuong(){
            if($('#ndxinhuong').val() == ''){
                toastr.error("Bạn cần nhập nội dung xin hưởng", "Lỗi!!!");
                $("#frm_xinhuong").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_xinhuong").unbind('submit').submit();
            }
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh sách đối tượng thường xuyên<small>&nbsp;chờ nhận</small>
    </h3>
    <!-- END PAGE HEADER-->
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
                    <div class="row mbm">
                        <div class="col-md-6">
                            <!--select id="select_trocap" class="form-control">
                                <option value="NXH" {{$trocap == 'NXH' ? 'selected' : ''}}>Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý</option>
                                <option value="CD" {{$trocap == 'CD' ? 'selected' : ''}}>Đối tượng BTXH tại cộng đồng do xã, phường quản lý</option>
                                <option value="CS" {{$trocap == 'CS' ? 'selected' : ''}}>Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội</option>
                            </select-->
                            {!! Form::select(
                            'select_trocap',
                            $modelpltrocap, $trocap,
                            array('id' => 'select_trocap', 'class' => 'form-control'))
                            !!}
                        </div>
                        @if(session('admin')->level == 'T')
                            <div class="col-md-3">
                                <select id="select_huyen" class="form-control">
                                    @foreach ($huyens as $huyen)
                                        <option {{ ($huyen->mahuyen == $mahuyen) ? 'selected' : '' }} value="{{ $huyen->mahuyen }}">{{ $huyen->tenhuyen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if(count($xas) > 0 && (session('admin')->level == 'T' || session('admin')->level == 'H'))
                            <div class="col-md-3">
                                @if(count($xas) > 0)
                                    <select id="select_xa" class="form-control">
                                        <option value="all">--Chọn xã phường--</option>
                                        @foreach ($xas as $xa)
                                            <option {{ ($xa->maxa == $maxa) ? 'selected' : '' }} value="{{ $xa->maxa }}">{{ $xa->tenxa }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">

                        </div>
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th style="text-align: center" width="2%">STT</th>
                                <th style="text-align: center" width="10%">Ảnh đại diện</th>
                                <th style="text-align: center;width: 20%" >Họ và tên</th>
                                <th style="text-align: center; width: 10% ">Ngày sinh</th>
                                <th style="text-align: center" width="5%">Giới tính</th>
                                <th style="text-align: center ; width: 10%">Hiện trạng</th>
                                <th style="text-align: center; width: 10%" >Ngày hưởng<br>Ngày dừng trợ cấp</th>
                                <th style="text-align: center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $key=>$tt)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td align="center" style="vertical-align: middle">
                                        <a href="{{url('danhsachdoituongtx/'.$tt->id)}}">
                                            <img src="{{ url('images/avatar/doituongtx/'.$tt->avatar)}}" width="96">
                                        </a>
                                    </td>
                                    <td class="active"><b style="color: blue">{{$tt->hoten}}</b><br><u>Mã hồ sơ:</u> {{$tt->mahoso}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngaysinh)}}</td>
                                    <td style="text-align: center">{{$tt->gioitinh}}</td>
                                    <td>{{$tt->trangthaihuong}}</td>
                                    <td style="text-align: center">{{getDayVn($tt->ngayhuong)}} {{$tt->ngaydunghuong != '' ? '- '.getDayVn($tt->ngaydunghuong) : ''}}</td>
                                    <td>
                                        <a href="{{url('danhsachdoituongtx/'.$tt->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
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
    <script>
        $(function(){

            $('#select_trocap,#select_huyen,#select_xa').change(function() {
                var current_path_url = '/danhsachdoituongtxchodichuyen?';
                var trocap = '&trocap='+$('#select_trocap').val();
                if($(this).attr('id') == 'select_huyen'){
                    $('#select_xa').val('all');
                }
                var maxa = '';
                if($('#select_xa').length > 0 ){
                    var maxa = '&maxa='+$('#select_xa').val();
                }
                var mahuyen = '';
                if($('#select_huyen').length > 0 ){
                    var mahuyen = '&mahuyen='+$('#select_huyen').val();
                }
                var url = current_path_url+trocap+mahuyen+maxa;
                window.location.href = url;
            });
        })


    </script>

@stop