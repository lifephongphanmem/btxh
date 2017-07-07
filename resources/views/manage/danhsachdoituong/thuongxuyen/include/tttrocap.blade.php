<div id="tab2" class="tab-pane active" >
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Thông tin quyết định</label>

                    <div class="col-sm-8 controls">
                        {!!Form::text('ttquyetdinh', null, array('id' => 'ttquyetdinh','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Sổ trợ cấp</label>

                    <div class="col-sm-8">
                        {!!Form::text('sosotc',null, array('id' => 'sosotc','class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Trạng thái hưởng<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'trangthaihuong',
                        array(
                        'Đang hưởng' => 'Đang hưởng',
                        'Dừng hưởng' => 'Dừng hưởng',
                        ),null,
                        array('id' => 'trangthaihuong', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày hưởng<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('ngayhuong',isset($model->ngayhuong) ? date('d/m/Y',strtotime($model->ngayhuong)) : '', array('id' => 'ngayhuong','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>
            @if($action =='create')
            <div id="ngaydung" class="col-md-6" style="display: none">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày dừng hưởng</label>
                    <div class="col-sm-8">
                        {!!Form::text('ngaydunghuong',null, array('id' => 'ngaydunghuong','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>
            @else
                <div id="ngaydung" class="col-md-6" style="{{$model->trangthaihuong == 'Đang hưởng' ? 'display: none' :''}}">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Ngày dừng hưởng</label>
                        <div class="col-sm-8">
                            {!!Form::text('ngaydunghuong',null, array('id' => 'ngaydunghuong','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if($action =='create')
        <div id="lydo" class="row" style="display: none">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Lý do dừng hưởng</label>
                    <div class="col-sm-10">
                        {!!Form::text('lydodunghuong',null, array('id' => 'lydodunghuong','class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>
        </div>
        @else
            <div id="lydo" class="row" style="{{$model->trangthaihuong == 'Đang hưởng' ? 'display: none' :''}}">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lý do dừng hưởng</label>
                        <div class="col-sm-10">
                            {!!Form::text('lydodunghuong',null, array('id' => 'lydodunghuong','class' => 'form-control required'))!!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($action == 'create')
        <div class="row">
            @foreach($selectloaidt as $tc)
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-1"></label>
                    <label class="col-sm-11">{!! Form::radio ('matrocap', $tc->matrocap,null,array('id' => 'matrocap','class' => 'form-control required',$tc->matrocap == $loaitrocapdf ? 'checked' : '')) !!}
                        &nbsp; &nbsp; {{$tc->noidung}} {{$tc->chitiet != '' ? '- '.$tc->chitiet : ''}}- <b>Hệ số: {{$tc->heso}}</b> </label>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="row">
                @foreach($selectloaidt as $tc)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-1"></label>
                            <label class="col-sm-11">{!! Form::radio ('matrocap', $tc->matrocap,null,array('id' => 'matrocap','class' => 'form-control required',$tc->matrocap == $model->matrocap ? 'checked' : '')) !!}
                                &nbsp; &nbsp; {{$tc->noidung}} {{$tc->chitiet != '' ? '- '.$tc->chitiet : ''}}- <b>Hệ số: {{$tc->heso}}</b> </label>
                        </div>
                    </div>
                @endforeach
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
            } else {
                $( "#lydo" ).toggle( "fast" );
                $( "#ngaydung" ).toggle( "fast" );
            }
        });
    });
</script>

