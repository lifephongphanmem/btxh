<div class="tab-pane active" id="tab_1">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table id="user" class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td style="width:280; text-align: center" rowspan="5">
                            <img src="{{ url('/images/avatar/doituongtx/'.$model->avatar)}}">
                        </td>
                        <td><b>Đơn vị quản lý:</b> {{$dvql}}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Họ và tên:</b> {{$model->hoten}}
                        </td>
                    </tr>
                    <tr>
                        <td><b>Mã hồ sơ:</b> {{$model->mahoso}}</td>
                    </tr>
                    <tr>
                        <td><b>Ngày sinh:</b> {{getDayVn($model->ngaysinh)}}</td>
                    </tr>
                    <tr>
                        <td><b>Giới tính:</b> {{$model->gioitinh}}</td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ</b></td>
                        <td>{{$model->diachi}}</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Bảo hiểm y tế- Nơi khám chữa bệnh</b>
                        </td>
                        <td>{{$model->bhyt}}- {{$model->noikhambenh}}</td>
                    </tr>
                    <tr>
                        <td><b>Quyết định trợ cấp</b></td>
                        <td>{{$model->qdhuong}}</td>
                    </tr>
                    <tr>
                        <td><b>Sổ trợ cấp</b></td>
                        <td>{{$model->sosotc}}</td>
                    </tr>
                    <tr>
                        <td><b>Trạng thái hưởng</b></td>
                        <td>{{$model->trangthaihuong}}</td>
                    </tr>
                    <tr>
                        <td><b>Ngày bắt đâu-kết thúc hưởng</b></td>
                        <td>{{getDayVn($model->ngayhuong)}} - {{$model->trangthaihuong=='Dừng hưởng' ? getDayVn($model->ngaydunghuong) : ''}}</td>
                    </tr>
                    @if($model->trangthaihuong == 'Dừng hưởng')
                        <tr>
                            <td><b>Quyết định dừng hưởng</b></td>
                            <td>{{$model->qddunghuong}}</td>
                        </tr>
                        <tr>
                            <td><b>Lý do dừng hưởng</b></td>
                            <td>{{$model->lydodunghuong}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><b>Loại trợ cấp</b></td>

                        <td>
                            @if(isset($loaitc))
                            {{$loaitc->noidung}} {{$loaitc->chitiet != '' ? '- '.$loaitc->chitiet : ''}}-Hệ số: {{$loaitc->heso}}-  <b>Số tiền trợ cấp: {{number_format($model->sotientc)}}</b>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>