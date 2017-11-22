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
        function getIdTraLai(id){
            document.getElementById("idtralai").value=id;
        }
        function getIdDuyet(id){
            document.getElementById("idduyet").value=id;
        }
        function getIdNhanHs(id){
            document.getElementById("idnhanhs").value=id;
        }
        function ClickDuyet(){
            if($('#qdhuong').val() == '' || $('#sosotc').val() == '' || $('#ngayhuong').val() == ''){
                toastr.error("Bạn cần nhập thông tin hồ sơ", "Lỗi!!!");
                $("#frm_duyet").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_duyet").unbind('submit').submit();
            }
        }
        function ClickTraLai(){
            if($('#lydotralai').val() == ''){
                toastr.error("Bạn cần nhập lý do trả lại hồ sơ", "Lỗi!!!");
                $("#frm_tralai").submit(function (e){
                    e.preventDefault();
                });
            }else{
                $("#frm_tralai").unbind('submit').submit();
            }
        }
        function ShowLyDo(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: 'ajax/lydotlxhtc',
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
        Danh sách hồ sơ đối tượng thường xuyên <small>&nbsp;xin hưởng</small>
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
                    <div class="row">
                        <div class="col-md-2">
                            <select name="select_thang" id="select_thang" class="form-control">
                                <option value="01" {{$thang == '01' ? 'selected' : ''}}>Tháng 01</option>
                                <option value="02" {{$thang == '02' ? 'selected' : ''}}>Tháng 02</option>
                                <option value="03" {{$thang == '03' ? 'selected' : ''}}>Tháng 03</option>
                                <option value="04" {{$thang == '04' ? 'selected' : ''}}>Tháng 04</option>
                                <option value="05" {{$thang == '05' ? 'selected' : ''}}>Tháng 05</option>
                                <option value="06" {{$thang == '06' ? 'selected' : ''}}>Tháng 06</option>
                                <option value="07" {{$thang == '07' ? 'selected' : ''}}>Tháng 07</option>
                                <option value="08" {{$thang == '08' ? 'selected' : ''}}>Tháng 08</option>
                                <option value="09" {{$thang == '09' ? 'selected' : ''}}>Tháng 09</option>
                                <option value="10" {{$thang == '10' ? 'selected' : ''}}>Tháng 10</option>
                                <option value="11" {{$thang == '11' ? 'selected' : ''}}>Tháng 11</option>
                                <option value="12" {{$thang == '12' ? 'selected' : ''}}>Tháng 12</option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="select_nam" id="select_nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">

                        </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Ngày<br>xin hưởng</th>
                            <th style="text-align: center;width: 20%" >Họ và tên</th>
                            <th style="text-align: center; width: 10% ">Ngày sinh</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center">Nội dung xin huỏng</th>
                            <th style="text-align: center">Phân loại<br> xin hưởng</th>
                            <th style="text-align: center ; width: 5%">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayxinhuong)}}</td>
                                <td>{{$tt->hoten}}<br>Mã hồ sơ: <b>{{$tt->mahoso}}</b></td>
                                <td>{{getDayVn($tt->ngaysinh)}}</td>
                                <td>{{$tt->diachi}}</td>
                                <td>{{$tt->ndxinhuong}}</td>
                                <td style="text-align: center">{{$tt->plxinhuong}}</td>
                                @if($tt->trangthaihoso == 'Đã duyệt')
                                    <td style="text-align: center"><span class="label label-sm label-success">Đã duyệt</span></td>
                                @elseif($tt->trangthaihoso == 'Chờ duyệt')
                                    <td style="text-align: center"><span class="label label-sm label-warning">Chờ duyệt</span></td>
                                @elseif($tt->trangthaihoso == 'Bị trả lại')
                                    <td style="text-align: center"><span class="label label-sm label-danger">Bị trả lại</span></td>
                                @endif
                                <td>
                                    <a href="{{url('hosoxinhuongtx/'.$tt->mahoso)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Thông tin hồ sơ</a>
                                    @if(canDuyet($tt->trangthaihoso))
                                        @if($tt->trangthaihoso == 'Chờ duyệt')
                                            @if(can('dttx','approve'))
                                                @if($tt->plxinhuong == 'Mới')
                                                    <button type="button" onclick="getIdDuyet('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#duyet-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Duyệt</button>
                                                    <button type="button" onclick="getIdTraLai('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#tralai-modal" data-toggle="modal"><i class="fa fa-mail-forward"></i>&nbsp;
                                                        Trả lại</button>
                                                @else
                                                    <button type="button" onclick="getIdNhanHs('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#nhanhs-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Nhận hồ sơ</button>
                                                @endif
                                            @endif
                                        @endif
                                        @if($tt->trangthaihoso == 'Bị trả lại')
                                            <button type="button" data-target="#lydo-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="ShowLyDo('{{$tt->id}}}')" ><i class="fa fa-search"></i>&nbsp;Lý do trả lại</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->

    <div class="clearfix"></div>
    <div class="modal fade" id="duyet-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'hosoxinhuongtx/duyet','id' => 'frm_duyet'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý duyệt hồ sơ?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Thông tin quyết định hưởng trợ cấp</b></label>
                        {!!Form::text('qdhuong',null, array('id' => 'qdhuong','class' => 'form-control required'))!!}
                    </div>
                    <div class="form-group">
                        <label><b>Ngày hưởng trợ cấp</b></label>
                        {!!Form::text('ngayhuong',date('d/m/Y'), array('id' => 'ngayhuong','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div>
                    <div class="form-group">
                        <label><b>Số sổ trợ cấp</b></label>
                        {!!Form::text('sosotc',null, array('id' => 'sosotc','class' => 'form-control required'))!!}
                    </div>
                </div>
                <input type="hidden" name="idduyet" id="idduyet">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDuyet()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="nhanhs-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'hosoxinhuongtx/nhanhs','id' => 'frm_nhanhs'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xác nhận hồ sơ quản lý tại đơn vị?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Thông tin quyết định hưởng trợ cấp</b></label>
                        {!!Form::text('qdhuong',null, array('id' => 'qdhuong','class' => 'form-control required'))!!}
                    </div>
                </div>
                <input type="hidden" name="idnhanhs" id="idnhanhs">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDuyet()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="tralai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'hosoxinhuongtx/tralai','id' => 'frm_tralai'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý trả lại?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Lý do trả lại</b></label>
                        <textarea id="lydotralai" class="form-control required" name="lydotralai" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <input type="hidden" name="idtralai" id="idtralai">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickTraLai()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="lydo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Lý do trả lại hồ sơ!!!</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Lý do trả lại</b></label>
                        <div id="lydo"></div>
                    </div>
                </div>
                <input type="hidden" name="idtralai" id="idtralai">
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script>
        $(function(){

            $('#select_thang,#select_nam').change(function() {
                var current_path_url = '/hosoxinhuongtx?';
                var thang = '&thang='+ $('#select_thang').val();
                var nam = '&nam='+$('#select_nam').val();

                var url = current_path_url+thang+nam;
                window.location.href = url;
            });
        })


    </script>

@stop