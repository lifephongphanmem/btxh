<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Loại đối tượng<span class="require">*</span></label>
                <p style="color: blue;font-size: 15px">
                    @if($trocap == 'NXH')
                        Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý
                    @elseif($trocap == 'CD')
                        Đối tượng BTXH tại cộng đồng do xã, phường quản lý
                    @else
                        Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội
                    @endif
                        {!!Form::hidden('pltrocap',$trocap , array('id' => 'pltrocap','class' => 'form-control'))!!}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tên gói trợ cấp</label>
                {!!Form::text('tengoitc', null , array('id' => 'tengoitc','class' => 'form-control required','autofocus'))!!}
            </div>
        </div>


    </div>
    @if($action == 'create')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tháng</label>
                {!! Form::select(
                'thang',
                array(
                '01' => 'Tháng 1',
                '02' => 'Tháng 2',
                '03' => 'Tháng 3',
                '04' => 'Tháng 4',
                '05' => 'Tháng 5',
                '06' => 'Tháng 6',
                '07' => 'Tháng 7',
                '08' => 'Tháng 8',
                '09' => 'Tháng 9',
                '10' => 'Tháng 10',
                '11' => 'Tháng 11',
                '12' => 'Tháng 12',
                ),$thang,
                array('id' => 'thang', 'class' => 'form-control'))
                !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Năm</label>
                {!! Form::select(
                'nam',
                $nams,$nam,
                array('id' => 'nam', 'class' => 'form-control'))
                !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" {{!(session('admin')->level == 'T') ? 'style=display:none;' : '' }} >
            <div class="form-group">
                <label class="col-sm-4 control-label">Quận huyện<span class="require">*</span></label>
                <select name="mahuyen" class="form-control required">
                    @foreach($huyens as $huyen)
                        <option value="{{$huyen->mahuyen}}" {{ $huyen->mahuyen == $mahuyen ? 'selected' : ''}}>{{$huyen->tenhuyen}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6" {{!(session('admin')->level == 'T' || session('admin')->level == 'H') ? 'style=display:none;' : '' }}>
            <div class="form-group">
                <label class="col-sm-4 control-label">Xã phường<span class="require">*</span></label>
                <select name="maxa" class="form-control required">
                    @foreach($xas as $xa)
                        <option value="{{$xa->maxa}}" {{$xa->maxa == $maxa ? 'selected' : ''}}>{{$xa->tenxa}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Tháng</label>
                    <p style="color: blue;font-size: 15px">{{$model->thang}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Năm</label>
                    <p style="color: blue;font-size: 15px"> {{$model->nam}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >
                <div class="form-group">
                    <label class="control-label">Quận huyện<span class="require">*</span></label>
                    <p style="color: blue;font-size: 15px">{{$model->tenhuyen}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Xã phường<span class="require">*</span></label>
                    <p style="color: blue;font-size: 15px">{{$model->tenxa}}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Ghi chú</label>
                {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control'))!!}
            </div>
        </div>
    </div>
</div>

