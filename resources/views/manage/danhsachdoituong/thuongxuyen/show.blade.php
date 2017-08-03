@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box">
                <div class="portlet-title">
                    <h3 class="page-title">
                        Thông tin <small>{{$loaidt}}</small>
                    </h3>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line boxless">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">
                                    Thông tin hồ sơ đối tượng</a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab">
                                    Thông tin thay đổi</a>
                            </li>
                            <li>
                                <a href="#tab_3" data-toggle="tab">
                                    Thông tin giấy tờ đính kèm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @include('manage.danhsachdoituong.thuongxuyen.include.tthosoprofile')
                            @include('manage.danhsachdoituong.thuongxuyen.include.ttthaydoiprofile')
                            @include('manage.danhsachdoituong.thuongxuyen.include.ttdinhkemprofile')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div style="text-align: center">
            <a href="{{url('danhsachdoituongtx?&trocap='.$model->pltrocap)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            <a href="" class="btn btn-default"><i class="fa fa-search"></i>&nbsp;Lịch sử</a>
        </div>
    </div>
@stop