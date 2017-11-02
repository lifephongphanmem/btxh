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
                            <select id="select_trocap" class="form-control">
                                <option value="NXH" {{$trocap == 'NXH' ? 'selected' : ''}}>Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý</option>
                                <option value="CD" {{$trocap == 'CD' ? 'selected' : ''}}>Đối tượng BTXH tại cộng đồng do xã, phường quản lý</option>
                                <option value="CS" {{$trocap == 'CS' ? 'selected' : ''}}>Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội</option>
                            </select>
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
                                <th style="text-align: center ; width: 5%">Trạng thái</th>
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
                                    @if($tt->trangthaihoso == 'Chờ nhận di chuyển')
                                        <td style="text-align: center"><span class="label label-sm label-success">Chờ nhận di chuyển</span></td>
                                    @else
                                        <td style="text-align: center"><span class="label label-sm label-warning">Chờ duyệt nhận di chuyển</span></td>
                                    @endif
                                    <td>
                                        <a href="{{url('danhsachdoituongtx/'.$tt->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                        @if(can('dttx','forward'))
                                            @if($tt->trangthaihoso == 'Chờ nhận di chuyển')
                                        <button type="button" onclick="getIdXinHuong('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#xinhuong-modal" data-toggle="modal"><i class="fa fa-mail-forward"></i>&nbsp;
                                            Xin hưởng</button>
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
    <div class="modal fade" id="xinhuong-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongtxchonhan/xinhuong','id' => 'frm_xinhuong'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý chuyển hồ sơ xin hưởng lên cấp trên?</h4>
                </div>
                <div class="modal-body" id="ttnhanhsedit">
                    <!--div class="form-group">
                        <label><b>Ngày chuyển</b></label>
                        {!!Form::text('ngayxinhuong',date('d/m/Y'), array('id' => 'ngayxinhuong','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div-->
                    <div class="form-group">
                        <label><b>Nội dung xin hưởng</b></label>
                        <textarea id="ndxinhuong" class="form-control required" name="ndxinhuong" cols="30" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="idxinhuong" id="idxinhuong">
                    <div class="modal-footer">
                        <button type="submit" class="btn blue" onclick="ClickXinHuong()">Đồng ý</button>
                        <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

    <script>
        $(function(){

            $('#select_trocap,#select_huyen,#select_xa').change(function() {
                var current_path_url = '/danhsachdoituongtxchonhan?';
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