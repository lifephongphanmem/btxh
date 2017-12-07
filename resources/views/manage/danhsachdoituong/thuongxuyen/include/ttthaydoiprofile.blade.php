<div class="tab-pane" id="tab_5">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <table class="table table-striped table-bordered table-hover table-dulieubang" >
                <thead>
                <tr>
                    <th style="text-align: center" width="2%">STT</th>
                    <th style="text-align: center" >Ngày yêu cầu</th>
                    <th style="text-align: center" >Nội dung thay đổi</th>
                    <th style="text-align: center" >Thông tin thay đổi</th>
                    <th style="text-align: center" >Thông tin quyết định</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ttthaydoi as $key=>$tt)
                    <tr>
                        <td style="text-align: center">{{$key+1}}</td>
                        <td class="active" style="text-align: center">{{getDayVn($tt->ngayyc)}}</td>
                        <td width="30%">{{$tt->noidungthaydoi}}</td>
                        <td width="40%">{{$tt->tttctd}}</td>
                        <td>{{$tt->qdhuong.' - '. getDayVn($tt->ngayhuong)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>