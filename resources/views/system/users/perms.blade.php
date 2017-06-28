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
                            @if(canGeneral('congdan','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Công dân</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->congdan->index) && $permission->congdan->index == 1) ? 'checked' : '' }} value="1" name="roles[congdan][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->congdan->create) && $permission->congdan->create == 1) ? 'checked' : '' }} value="1" name="roles[congdan][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->congdan->edit) && $permission->congdan->edit == 1) ? 'checked' : '' }} value="1" name="roles[congdan][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->congdan->delete) && $permission->congdan->delete == 1) ? 'checked' : '' }} value="1" name="roles[congdan][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('khaisinh','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Khai sinh</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->khaisinh->index) && $permission->khaisinh->index == 1) ? 'checked' : '' }} value="1" name="roles[khaisinh][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaisinh->create) && $permission->khaisinh->create == 1) ? 'checked' : '' }} value="1" name="roles[khaisinh][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaisinh->edit) && $permission->khaisinh->edit == 1) ? 'checked' : '' }} value="1" name="roles[khaisinh][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaisinh->delete) && $permission->khaisinh->delete == 1) ? 'checked' : '' }} value="1" name="roles[khaisinh][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaisinh->approve) && $permission->khaisinh->approve == 1) ? 'checked' : '' }} value="1" name="roles[khaisinh][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('khaitu','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Khai tử</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->khaitu->index) && $permission->khaitu->index == 1) ? 'checked' : '' }} value="1" name="roles[khaitu][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaitu->create) && $permission->khaitu->create == 1) ? 'checked' : '' }} value="1" name="roles[khaitu][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaitu->edit) && $permission->khaitu->edit == 1) ? 'checked' : '' }} value="1" name="roles[khaitu][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaitu->delete) && $permission->khaitu->delete == 1) ? 'checked' : '' }} value="1" name="roles[khaitu][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->khaitu->approve) && $permission->khaitu->approve == 1) ? 'checked' : '' }} value="1" name="roles[khaitu][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('tthonnhan','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Tình trạng hôn nhân</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->tthonnhan->index) && $permission->tthonnhan->index == 1) ? 'checked' : '' }} value="1" name="roles[tthonnhan][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->tthonnhan->create) && $permission->tthonnhan->create == 1) ? 'checked' : '' }} value="1" name="roles[tthonnhan][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->tthonnhan->edit) && $permission->tthonnhan->edit == 1) ? 'checked' : '' }} value="1" name="roles[tthonnhan][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->tthonnhan->delete) && $permission->tthonnhan->delete == 1) ? 'checked' : '' }} value="1" name="roles[tthonnhan][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->tthonnhan->approve) && $permission->tthonnhan->approve == 1) ? 'checked' : '' }} value="1" name="roles[tthonnhan][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('kethon','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Kết hôn</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->kethon->index) && $permission->kethon->index == 1) ? 'checked' : '' }} value="1" name="roles[kethon][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kethon->create) && $permission->kethon->create == 1) ? 'checked' : '' }} value="1" name="roles[kethon][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kethon->edit) && $permission->kethon->edit == 1) ? 'checked' : '' }} value="1" name="roles[kethon][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kethon->delete) && $permission->kethon->delete == 1) ? 'checked' : '' }} value="1" name="roles[kethon][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kethon->approve) && $permission->kethon->approve == 1) ? 'checked' : '' }} value="1" name="roles[kethon][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('dkgiamho','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Đăng ký giám hộ</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->dkgiamho->index) && $permission->dkgiamho->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgiamho][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dkgiamho->create) && $permission->dkgiamho->create == 1) ? 'checked' : '' }} value="1" name="roles[dkgiamho][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dkgiamho->edit) && $permission->dkgiamho->edit == 1) ? 'checked' : '' }} value="1" name="roles[dkgiamho][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dkgiamho->delete) && $permission->dkgiamho->delete == 1) ? 'checked' : '' }} value="1" name="roles[dkgiamho][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dkgiamho->approve) && $permission->dkgiamho->approve == 1) ? 'checked' : '' }} value="1" name="roles[dkgiamho][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('dknhanchamecon','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Đăng ký nhận cha mẹ con</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->dknhanchamecon->index) && $permission->dknhanchamecon->index == 1) ? 'checked' : '' }} value="1" name="roles[dknhanchamecon][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dknhanchamecon->create) && $permission->dknhanchamecon->create == 1) ? 'checked' : '' }} value="1" name="roles[dknhanchamecon][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dknhanchamecon->edit) && $permission->dknhanchamecon->edit == 1) ? 'checked' : '' }} value="1" name="roles[dknhanchamecon][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dknhanchamecon->delete) && $permission->dknhanchamecon->delete == 1) ? 'checked' : '' }} value="1" name="roles[dknhanchamecon][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dknhanchamecon->approve) && $permission->dknhanchamecon->approve == 1) ? 'checked' : '' }} value="1" name="roles[dknhanchamecon][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('capbansao','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Cấp bản sao</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->capbansao->index) && $permission->capbansao->index == 1) ? 'checked' : '' }} value="1" name="roles[capbansao][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->capbansao->create) && $permission->capbansao->create == 1) ? 'checked' : '' }} value="1" name="roles[capbansao][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->capbansao->edit) && $permission->capbansao->edit == 1) ? 'checked' : '' }} value="1" name="roles[capbansao][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->capbansao->delete) && $permission->capbansao->delete == 1) ? 'checked' : '' }} value="1" name="roles[capbansao][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->capbansao->approve) && $permission->capbansao->approve == 1) ? 'checked' : '' }} value="1" name="roles[capbansao][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('chungthuc','index'))
                            <div class="col-md-3">
                                <h4 style="text-align: center;color: #0000ff  ">Chứng thực</h4>
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
                                        <td><input type="checkbox" {{ (isset($permission->chungthuc->index) && $permission->chungthuc->index == 1) ? 'checked' : '' }} value="1" name="roles[chungthuc][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chungthuc->create) && $permission->chungthuc->create == 1) ? 'checked' : '' }} value="1" name="roles[chungthuc][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chungthuc->edit) && $permission->chungthuc->edit == 1) ? 'checked' : '' }} value="1" name="roles[chungthuc][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chungthuc->delete) && $permission->chungthuc->delete == 1) ? 'checked' : '' }} value="1" name="roles[chungthuc][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chungthuc->approve) && $permission->chungthuc->approve == 1) ? 'checked' : '' }} value="1" name="roles[chungthuc][approve]"/></td>
                                        <td>Xét duyệt</td>
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