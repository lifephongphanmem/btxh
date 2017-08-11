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
        function getIdDuyet(id){
            document.getElementById("idduyet").value=id;
        }
        function ClickDelete(){
            $('#frm_delete').submit();
        }
        function ClickDuyet(){
            $('#frm_duyet').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Chi trả trợ cấp đối tượng<small>&nbsp;thường xuyên</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">

                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        <a href="{{url('trocapdoituongtx/'.$trocap.'/create')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Lập danh sách chi trả trợ cấp</a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <select id="select_trocap" class="form-control">
                                <option value="NXH" {{$trocap == 'NXH' ? 'selected' : ''}}>Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý</option>
                                <option value="CD" {{$trocap == 'CD' ? 'selected' : ''}}>Đối tượng BTXH tại cộng đồng do xã, phường quản lý</option>
                                <option value="CS" {{$trocap == 'CS' ? 'selected' : ''}}>Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội</option>
                            </select>
                        </div>
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
                    <div class="portlet-body">
                        <div class="table-toolbar">

                        </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Quận/Huyện</th>
                            <th style="text-align: center">Xã/Phường</th>
                            <th style="text-align: center; ">Tên gói trợ cấp</th>
                            <th style="text-align: center ; width: 5%">Trạng thái</th>
                            <th style="text-align: center;width:25%" >Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td>{{$tt->tenhuyen}}</td>
                                <td>{{$tt->tenxa}}</td>
                                <td>{{$tt->tengoitc}}</td>
                                @if($tt->trangthai == 'Đã duyệt')
                                    <td style="text-align: center"><span class="label label-sm label-success">Đã duyệt</span></td>
                                @else
                                    <td style="text-align: center"><span class="label label-sm label-warning">Chờ duyệt</span></td>
                                @endif
                                <td>
                                    <a href="{{url('trocapdoituongtx/'.$tt->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if(canEdit($tt->trangthai))

                                        <a href="{{url('trocapdoituongtx/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                        @if($tt->trangthai == 'Chờ duyệt')
                                        <button type="button" onclick="getIdDuyet('{{$tt->id}}}')" class="btn btn-default btn-xs mbs" data-target="#duyet-modal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;
                                            Duyệt</button>
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
                {!! Form::open(['url'=>'trocapdoituongtx/delete','id' => 'frm_delete'])!!}
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


    <div class="modal fade" id="duyet-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'trocapdoituongtx/duyet','id' => 'frm_duyet'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý duyệt hồ sơ?</h4>
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

    <script>
        $(function(){

            $('#select_trocap,#select_thang,#select_nam,#select_huyen').change(function() {
                var current_path_url = '/trocapdoituongtx?';
                var trocap = '&trocap='+$('#select_trocap').val();
                var thang = '&thang='+ $('#select_thang').val();
                var nam = '&nam='+$('#select_nam').val();
                var url = current_path_url+trocap+thang+nam;
                window.location.href = url;
            });
        })
    </script>

@stop