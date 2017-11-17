<div class="tab-pane" id="tab_4">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th style="text-align: center" width="2%">STT</th>
                    <th style="text-align: center" >Ngày yêu cầu</th>
                    <th style="text-align: center" >Nội dung di chuyển</th>
                    <th style="text-align: center" >Đơn vị di chuyển</th>
                    <th style="text-align: center" >Thông tin quyết định</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ttdichuyen as $key=>$tt)
                    <tr>
                        <td style="text-align: center">{{$key+1}}</td>
                        <td class="active" style="text-align: center">{{getDayVn($tt->ngayyc)}}</td>
                        <td width="30%">{{$tt->nddichuyen}}</td>
                        <td style="text-align: center">{{$tt->noidichuyen}}</td>
                        <td width="40%">{{$tt->ttqd}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>