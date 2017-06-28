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
    </script>

@stop

@section('content')

    <h3 class="page-title">
        Cấu hình <small>&nbsp;chức năng của chương trình</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            {!! Form::open(['url' => 'setting'])!!}
            <div class="portlet box blue">

                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                        </th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($setting->doituongbtxh->index) && $setting->doituongbtxh->index == 1) ? 'checked' : '' }} value="1" name="roles[doituongbtxh][index]"/></td>
                                        <td>Đối tượng bảo trợ</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
    </div>
    <div class="row" style="text-align: center">
        <div class="col-md-12">
            <a href="{{url('cau_hinh_he_thong')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
        </div>
    </div>


        {!! Form::close() !!}

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>




    </div
@stop