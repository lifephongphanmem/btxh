<div id="tab2" class="tab-pane active" >
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-1"></div>
                    <a data-target="#modal-addtc" data-toggle="modal">Chọn loại đối tượng trợ cấp</a>
                </div>
            </div>
        </div>
        @if($action == 'edit')
            <div id="tttrocap">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nội dung</label>
                            <div class="col-sm-10" style="color: blue;font-size: 15px">{{$tttrocap->noidung}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Chi tiết</label>
                            <div class="col-sm-10" style="color: blue;margin: auto; font-size: 15px" >{{$tttrocap->chitiet}}- Hệ số: {{$tttrocap->heso}}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hệ số</label>
                            <div class="col-sm-8">
                                {!!Form::text('heso',null, array('id' => 'heso','class' => 'form-control','readonly'))!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Số tiền</label>
                            <div class="col-sm-8">
                                {!!Form::text('sotientc',null, array('id' => 'sotientc','data-mask'=>'fdecimal','style'=>'text-align: right','class' => 'form-control required','readonly'))!!}
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::hidden('matrocap',null, array('id' => 'matrocap','class' => 'form-control'))!!}
            </div>
        @else
            <div id="tttrocap">
                {!!Form::hidden('matrocap',null, array('id' => 'matrocap','class' => 'form-control'))!!}
            </div>
        @endif
    </div>
</div>


<script>
    jQuery(function($){
        $('#trangthaihuong').change(function(){

            if($(this).val() == 'Đang hưởng'){
                $( "#lydo" ).hide();
                $( "#ngaydung" ).hide();
                $('#qddungtc').hide();
            } else {
                $( "#lydo" ).toggle( "fast" );
                $( "#ngaydung" ).toggle( "fast" );
                $('#qddungtc').toggle( "fast" );
            }
        });
        $('#select_noidung').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/getChiTietTc',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    noidung: $("#select_noidung option:selected" ).text(),
                    pltrocap : $('#pltrocap').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success')
                        $('#select_chitiet').replaceWith(data.message);
                }
            });
        });
    });
</script>
<script>
    function addtc(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/addTcTx',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                matrocap: $('#select_chitiet').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.status == 'success') {
                    toastr.success("Nhập trợ cấp cho đối tượng thành công!");
                    $('#tttrocap').replaceWith(data.message);
                    $('#modal-addtc').modal("hide");

                }
            }
        })
    }
</script>
@include('includes.script.create-header-scripts')

