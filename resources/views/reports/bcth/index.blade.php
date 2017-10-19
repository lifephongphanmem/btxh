@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')


    <h3 class="page-title">
        Báo cáo tổng hợp <small>bảo trợ xã hội</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol>
                                <li><a href="{{url('reports/hsxhbtxh')}}" target="_blank"> Danh sách hồ sơ xin hưởng trợ cấp</a></li>
                                <li><a href="{{url('reports/hscqdbtxh')}}" target="_blank"> Danh sách hồ sơ có quyết định trợ cấp</a></li>
                                <li><a href="{{url('reports/hsdctc')}}" target="_blank"> Danh sách hồ sơ điều chỉnh trợ cấp</a></li>
                                <li><a href="{{url('reports/dscttcht')}}" target="_blank"> Danh sách chi trả trợ cấp hàng tháng</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop