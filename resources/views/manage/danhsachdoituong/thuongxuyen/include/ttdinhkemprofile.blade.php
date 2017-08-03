<div class="tab-pane" id="tab_3">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th style="text-align: center" width="2%">STT</th>
                    <th style="text-align: center" >Tên tài liệu</th>
                    <th style="text-align: center" >File tài liệu</th>
                    <th style="text-align: center ">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($attachments as $key=>$tt)
                    <tr>
                        <td style="text-align: center">{{$key+1}}</td>
                        <td class="active">{{$tt['ipt']}}</td>
                        <td>{{$tt['ipf']}}</td>
                        <td>
                            <a href="{{ url('file/doituongtx/'.$tt['ipf'])}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Tải về</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>