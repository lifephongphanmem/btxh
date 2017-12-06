@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script>
        function ClickBC1(){
            $('#frm_bc1').submit();
        }
        function ClickBC2(){
            $('#frm_bc2').submit();
        }
        function ClickBC3(){
            $('#frm_bc3').submit();
        }
        function ClickBC4(){
            $('#frm_bc4').submit();
        }
    </script>
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
                    @if(session('admin')->level == 'X')
                    <div class="row">
                        <div class="col-lg-12">
                            <ol>
                                <li><a data-target="#BC1-thoai-confirm" data-toggle="modal">Danh sách hồ sơ xin hưởng trợ cấp</a></li>
                                <li><a data-target="#BC2-thoai-confirm" data-toggle="modal"> Danh sách hồ sơ có quyết định trợ cấp</a></li>
                                <li><a data-target="#BC3-thoai-confirm" data-toggle="modal"> Danh sách hồ sơ điều chỉnh trợ cấp</a></li>
                                <li><a data-target="#BC4-thoai-confirm" data-toggle="modal"> Danh sách chi trả trợ cấp hàng tháng</a></li>
                            </ol>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Modal Thoại BC1-->
    <div id="BC1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            {!! Form::open(['url'=>'/reports/hsxhbtxh','target'=>'_blank' , 'id' => 'frm_bc1', 'class'=>'form-horizontal form-validate']) !!}
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách hồ sơ xin hưởng trợ cấp</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @include('reports.bcth.include.thangnamthoai')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC1()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--Modal Thoại BC2-->
    <div id="BC2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            {!! Form::open(['url'=>'/reports/hscqdbtxh','target'=>'_blank' , 'id' => 'frm_bc2', 'class'=>'form-horizontal form-validate']) !!}
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách hồ sơ có quyết định trợ cấp</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @include('reports.bcth.include.thangnamthoai')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC2()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--Modal Thoại BC3-->
    <div id="BC3-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            {!! Form::open(['url'=>'/reports/hsdctc','target'=>'_blank' , 'id' => 'frm_bc3', 'class'=>'form-horizontal form-validate']) !!}
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách hồ sơ điều chỉnh trợ cấp</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @include('reports.bcth.include.thangnamthoai')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC3()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--Modal Thoại BC4-->
    <div id="BC4-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            {!! Form::open(['url'=>'/reports/dscttcht','target'=>'_blank' , 'id' => 'frm_bc4', 'class'=>'form-horizontal form-validate']) !!}
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách chi trả trợ cấp hàng tháng</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        @include('reports.bcth.include.thangnamthoai')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC4()">Đồng ý</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop