<div class="tab-pane" id="tab_3">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th style="text-align: center" width="2%">STT</th>
                    <th style="text-align: center" >Ngày yêu cầu</th>
                    <th style="text-align: center" >Nội dung xin hưởng</th>
                    <th style="text-align: center" >Phân loại xin hưởng</th>
                    <th style="text-align: center" >Thông tin quyết định</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ttxinhuong as $key=>$tt)
                    <tr>
                        <td style="text-align: center">{{$key+1}}</td>
                        <td class="active" style="text-align: center">{{getDayVn($tt->ngayxinhuong)}}</td>
                        <td width="30%">{{$tt->ndxinhuong}}</td>
                        <td width="10%" style="text-align: center">{{$tt->plxinhuong}}</td>
                        <td width="40%">{{$tt->qdhuong.' - '.getDayVn($tt->ngayhuong)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>