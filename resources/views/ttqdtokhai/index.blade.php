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
        Thông tin quyết định tờ khai <small>&nbsp;xin hưởng</small>
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
                        <a href="{{url('maubieutokhai/create')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Thêm mới</a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
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
                            <th style="text-align: center">Tiêu đề</th>
                            <th style="text-align: center;width: 20%" >Nội dụng</th>
                            <th style="text-align: center;width: 10%">Ngày ban hành</th>
                            <th style="text-align: center;width: 10%">Ngày áp dụng</th>
                            <th style="text-align: center;width: 20%;">Thao tác</th>
                        </tr>
                        </thead>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td class="active">{{$tt->tieude}}</td>
                                <td>{{$tt->noidung}}</td>
                                <td>{{getDayVn($tt->ngaybanhanh)}}</td>
                                <td>{{getDayVn($tt->ngayapdung)}}</td>
                                <td>
                                    <a href="{{url('maubieutokhai/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                    @if($tt->file != '')
                                    <a href="{{ url('file/maubieutokhai/'.$tt->file)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-download"></i>&nbsp;Tải về</a>
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

    <script>
        $(function(){

            $('#select_thang,#select_nam').change(function() {
                var current_path_url = '/maubieutokhai?';
                var nam = '&nam='+$('#select_nam').val();

                var url = current_path_url+nam;
                window.location.href = url;
            });
        })


    </script>

@stop