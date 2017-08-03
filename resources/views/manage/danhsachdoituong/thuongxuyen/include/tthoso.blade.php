<div id="tab1" class="tab-pane active" >
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-6" {{!(session('admin')->level == 'T') ? 'style=display:none;' : '' }} >
                <div class="form-group">
                    <label class="col-sm-4 control-label">Quận huyện<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        <select name="mahuyen" class="form-control required" autofocus>
                            @foreach($huyens as $huyen)
                                <option value="{{$huyen->mahuyen}}" {{ $huyen->mahuyen == $mahuyen ? 'selected' : ''}}>{{$huyen->tenhuyen}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6" {{!(session('admin')->level == 'T' || session('admin')->level == 'H') ? 'style=display:none;' : '' }}>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Xã phường<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        <select name="maxa" class="form-control required">
                            @foreach($xas as $xa)
                                <option value="{{$xa->maxa}}" {{$xa->maxa == $maxa ? 'selected' : ''}}>{{$xa->tenxa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Họ và tên</label>

                    <div class="col-sm-8 controls">
                        {!!Form::text('hoten', null, array('id' => 'hoten','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Ngày sinh<span class="require">*</span></label>

                    <div class="col-sm-8 controls">
                        {!!Form::text('ngaysinh',isset($model->ngaysinh) ? date('d/m/Y',strtotime($model->ngaysinh)) : '', array('id' => 'ngaysinh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Giới tính<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'gioitinh',
                        array(
                        'Nam' => 'Nam',
                        'Nữ' => 'Nữ'
                        ),null,
                        array('id' => 'gioitinh', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Số CMND<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('socmnd', null, array('id' => 'socmnd','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Địa chỉ<span class="require">*</span></label>
                    <div class="col-sm-10 controls">
                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Bảo hiểm y tế</label>
                    <div class="col-sm-8 controls">
                        {!! Form::select(
                        'bhyt',
                        array(
                        'Có' => 'Có',
                        'Không' => 'Không'
                        ),null,
                        array('id' => 'bhyt', 'class' => 'form-control'))
                        !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nơi khám bệnh<span class="require">*</span></label>
                    <div class="col-sm-8 controls">
                        {!!Form::text('noikhambenh', null, array('id' => 'noikhambenh','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Hình ảnh đại diện</label>
                    <div class="col-sm-8 controls">
                        @if($action == 'create')
                            <p><img src="{{ url('images/avatar/doituongtx/no-image.png')}}" width="96"></p>
                        @else
                            <p><img src="{{ url('images/avatar/doituongtx/'.$model->avatar)}}" width="96">
                                @if(isset($model->avatar))
                                    <a href="{{ url('images/avatar/doituongtx/'.$model->avatar)}}" target="_blank">{{$model->avatar}}</a>
                                @endif
                            </p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">
                    </label>
                    <div class="col-sm-8 controls">
                        {!!Form::file('avatar',array('id'=>'avatar','class' => 'passvalid','accept'=>'image/*'))!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function($){
        $('select[name="mahuyen"]').change(function(){

            if($(this).val() != 'all'){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/getXas',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahuyen: $(this).val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success')
                            $('select[name="maxa"]').replaceWith(data.message);
                        else
                            $('select[name="maxa"]').val();

                    }
                });
            } else {
                $('select[name="maxa"]').val('all');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(":input").inputmask();
    });
</script>