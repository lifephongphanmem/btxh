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
        Quản lý phân quyền chức năng cho<small>&nbsp;tài khoản</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => '/users/permission'])!!}
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <input type="hidden" id="id" name="id" value="{{$model->id}}">
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption" style="color: #000000">
                        Tên tài khoản: {{$model->name}} (Tài khoản truy cập: {{$model->username}})
                    </div>
                    <div class="actions">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                        <div class="row">
                            @if(canGeneral('dttx','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Đối tượng BTXH thường xuyên</h4>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                        </th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->index) && $permission->dttx->index == 1) ? 'checked' : '' }} value="1" name="roles[dttx][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->create) && $permission->dttx->create == 1) ? 'checked' : '' }} value="1" name="roles[dttx][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->edit) && $permission->dttx->edit == 1) ? 'checked' : '' }} value="1" name="roles[dttx][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->delete) && $permission->dttx->delete == 1) ? 'checked' : '' }} value="1" name="roles[dttx][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->forward) && $permission->dttx->forward == 1) ? 'checked' : '' }} value="1" name="roles[dttx][forward]"/></td>
                                        <td>{{$model->level == 'X' ? 'Chuyển' : 'Duyệt'}}</td>
                                    </tr>
                                    @if($model->level !='X')
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dttx->approve) && $permission->dttx->approve == 1) ? 'checked' : '' }} value="1" name="roles[dttx][approve]"/></td>
                                        <td>Duyệt</td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('dtdx','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Đối tượng BTXH đột xuất</h4>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                        </th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->index) && $permission->dtdx->index == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->create) && $permission->dtdx->create == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->edit) && $permission->dtdx->edit == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->delete) && $permission->dtdx->delete == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->forward) && $permission->dtdx->forward == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][forward]"/></td>
                                        <td>{{$model->level == 'X' ? 'Chuyển' : 'Duyệt'}}</td>
                                    </tr>
                                    @if($model->level !='X')
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dtdx->approve) && $permission->dtdx->approve == 1) ? 'checked' : '' }} value="1" name="roles[dtdx][approve]"/></td>
                                        <td>Duyệt</td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('ctdttx','index'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Trợ cấp ĐTBTXH thường xuyên</h4>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->index) && $permission->ctdttx->index == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->create) && $permission->ctdttx->create == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->edit) && $permission->ctdttx->edit == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->delete) && $permission->ctdttx->delete == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->forward) && $permission->ctdttx->forward == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][forward]"/></td>
                                            <td>{{$model->level == 'X' ? 'Chuyển' : 'Duyệt'}}</td>
                                        </tr>
                                        @if($model->level !='X')
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdttx->approve) && $permission->ctdttx->approve == 1) ? 'checked' : '' }} value="1" name="roles[ctdttx][approve]"/></td>
                                            <td>Duyệt</td>
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if(canGeneral('ctdtdx','index'))
                                <div class="col-md-3">
                                    <h4 style="text-align: center;color: #0000ff  ">Trợ cấp ĐTBTXH đột xuất</h4>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->index) && $permission->ctdtdx->index == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->create) && $permission->ctdtdx->create == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->edit) && $permission->ctdtdx->edit == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->delete) && $permission->ctdtdx->delete == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->forward) && $permission->ctdtdx->forward == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][forward]"/></td>
                                            <td>{{$model->level == 'X' ? 'Chuyển' : 'Duyệt'}}</td>
                                        </tr>
                                        @if($model->level !='X')
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ctdtdx->approve) && $permission->ctdtdx->approve == 1) ? 'checked' : '' }} value="1" name="roles[ctdtdx][approve]"/></td>
                                            <td>Duyệt</td>
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                                @if(canGeneral('baocao','index'))
                                    <div class="col-md-3">
                                        <h4 style="text-align: center;color: #0000ff  ">Sổ sách báo cáo</h4>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Chức năng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->baocao->index) && $permission->baocao->index == 1) ? 'checked' : '' }} value="1" name="roles[baocao][index]"/></td>
                                                <td>Xem</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                        </div>
                    </div>

                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('users')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
        {!! Form::close() !!}
        <!-- END EXAMPLE TABLE PORTLET-->
        </div>

        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
        <div class="clearfix"></div>
</div>
@stop