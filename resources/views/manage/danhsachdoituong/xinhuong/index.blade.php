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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function getIdTraLai(id){
            document.getElementById("idtralai").value=id;
        }
        function getIdChuyen(id){
            document.getElementById("idchuyen").value=id;
        }
        function getIdXinHuong(id){
            document.getElementById("idxinhuong").value=id;
        }
        function getIdDungTC(id){
            document.getElementById("iddungtc").value=id;
        }
        function getIdDiChuyen(id){
            document.getElementById("iddichuyen").value=id;
        }
        function getIdThayDoiTc(id){
            document.getElementById("idthaydoi").value=id;
        }
        function ClickXinHuong(){
            if($('textarea[id="ndxinhuong"]').val() == '') {
                toastr.error("Bạn cần nhập nội dung xin hưởng", "Lỗi!!!");
                $("#frm_xinhuong").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_xinhuong").unbind('submit').submit();
            }
        }
        function ClickDungTc(){
            if($('#lydodunghuong').val() == ''){
                toastr.error("Bạn cần nhập lý do dừng hưởng", "Lỗi!!!");
                $("#frm_dungtc").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_dungtc").unbind('submit').submit();
            }
        }
        function ClickDiChuyen(){
            if($('#nddichuyen').val() == ''){
                toastr.error("Bạn cần nhập thông tin di chuyển", "Lỗi!!!");
                $("#frm_dichuyen").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_dichuyen").unbind('submit').submit();
            }
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }

        function ClickThayDoiTc(){
            $('#frm_thaydoitc').submit();
        }

        function ShowLyDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: 'ajax/lydodttx',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#lydo').replaceWith(data.message);
                    }
                }
            })
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Danh sách đối tượng chi trả<small>&nbsp;thường xuyên xin hưởng</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                @if(session('admin')->level == 'X')
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        @if(can('dttx','create'))
                        <a href="{{url('danhsachdoituongxinhuongtctx/'.$trocap.'/create')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
                        @endif
                    </div>
                </div>
                @endif
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
                                @if($tt->trangthaihoso == 'Chờ duyệt')
                                    <td style="text-align: center"><span class="label label-sm label-warning">Chờ duyệt</span></td>
                                @elseif($tt->trangthaihoso == 'Bị trả lại')
                                    <td style="text-align: center"><span class="label label-sm label-danger">Bị trả lại</span></td>
                                @else
                                    <td style="text-align: center"><span class="label label-sm label-info">Chờ chuyển </span></td>
                                @endif
                                <td>
                                    <a href="{{url('danhsachdoituongxinhuongtctx/'.$tt->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if(canEdit($tt->trangthaihoso))
                                        @if(can('dttx','edit'))
                                        <a href="{{url('danhsachdoituongxinhuongtctx/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        @endif
                                        @if($tt->trangthaihoso == 'Chờ chuyển')
                                            @if(can('dttx','forward'))
                                            <button type="button" onclick="getIdXinHuong('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#xinhuong-modal" data-toggle="modal"><i class="fa fa-mail-forward"></i>&nbsp;
                                                Xin hưởng</button>
                                            @endif
                                        @endif
                                        @if($tt->trangthaihoso == 'Bị trả lại')
                                            @if(can('dttx','forward'))
                                                <button type="button" onclick="getIdXinHuong('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#xinhuong-modal" data-toggle="modal"><i class="fa fa-mail-forward"></i>&nbsp;
                                                    Xin hưởng</button>
                                            @endif
                                                <button type="button" data-target="#lydo-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="ShowLyDo('{{$tt->id}}}')" ><i class="fa fa-search"></i>&nbsp;Lý do trả lại</button>
                                        @endif
                                        @if($tt->trangthaihoso == 'Chờ chuyển')
                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
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
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongxinhuongtctx/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="xinhuong-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongtx/xinhuong','id' => 'frm_xinhuong'])!!}
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

    <div class="modal fade" id="lydo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Lý do bị trả lại?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Lý do trả lại</b></label>
                        <div id="lydo"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="stop-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongtx/dungtc','id' => 'frm_dungtc'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý dừng trợ cấp đối tượng?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Phân loại dừng trợ cấp</b></label>
                        {!! Form::select(
                        'pldunghuong',
                        array(
                        'Mất' => 'Mất',
                        'Chuyển ngoại tỉnh' => 'Chuyển ngoại tỉnh'
                        ),null,
                        array('id' => 'pldunghuong', 'class' => 'form-control'))
                        !!}
                    </div>
                    <div class="form-group">
                        <label><b>Lý do dừng trợ cấp</b></label>
                        <textarea id="lydodunghuong" class="form-control required" name="lydodunghuong" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <input type="hidden" name="iddungtc" id="iddungtc">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDungTc()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="dichuyen-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongtx/dichuyen','id' => 'frm_dichuyen'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý dừng trợ cấp đối tượng?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Thông tin di chuyển</b></label>
                        <textarea id="nddichuyen" class="form-control required" name="nddichuyen" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label><b>Di chuyển đến huyện</b></label>
                        <select id="mahuyendichuyen" name="mahuyendichuyen" class="form-control">
                            @foreach ($huyens as $huyen)
                                <option {{ ($huyen->mahuyen == $mahuyen) ? 'selected' : '' }} value="{{ $huyen->mahuyen }}">{{ $huyen->tenhuyen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label><b>Di chuyển đến xã</b></label>
                        <select id="maxadichuyen"  name="maxadichuyen" class="form-control">
                            @foreach ($xas as $xa)
                                @if($maxa != $xa->maxa)
                                <option value="{{ $xa->maxa }}">{{ $xa->tenxa }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden" name="iddichuyen" id="iddichuyen">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDiChuyen()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="thaydoi-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'danhsachdoituongtx/thaydoitc','id' => 'frm_thaydoitc'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý thay đổi trợ cấp đối tượng?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Phân loại thay đổi trợ cấp</b></label>
                        {!! Form::select(
                        'plthaydoi',
                        array(
                        'Thay đổi mức trợ cấp' => 'Thay đổi mức trợ cấp',
                        'Thay đổi loại trợ cấp' => 'Thay đổi loại trợ cấp'
                        ),null,
                        array('id' => 'plthaydoi', 'class' => 'form-control'))
                        !!}
                    </div>
                    <div class="form-group" id="pltcm">

                    </div>
                </div>
                <input type="hidden" name="idthaydoi" id="idthaydoi">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickThayDoiTc()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script>
        $(function(){
            $('#select_trocap,#select_huyen,#select_xa').change(function() {
                var current_path_url = '/danhsachdoituongxinhuongtctx?';
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