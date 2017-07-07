<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Loại đối tượng<span class="require">*</span></label>
                {!! Form::select(
                'pltrocap',
                array(
                'NXH' => 'Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý',
                'CD' => 'Đối tượng BTXH tại cộng đồng do xã, phường quản lý',
                'CS' => 'Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội',
                ),null,
                array('id' => 'pltrocap', 'class' => 'form-control','autofocus'))
                !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Thông tư quyết định</label>
                {!!Form::text('ttqd', null , array('id' => 'ttqd','class' => 'form-control'))!!}
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Điều</label>
                {!!Form::text('dieu', null, array('id' => 'dieu','class' => 'form-control'))!!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Khoản</label>
                {!!Form::text('khoan', null , array('id' => 'khoan','class' => 'form-control'))!!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Nội dung<span class="require">*</span></label>
                {!!Form::text('noidung', null, array('id' => 'noidung','class' => 'form-control required'))!!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Chi tiết<span class="require">*</span></label>
                {!!Form::text('chitiet', null, array('id' => 'chitiet','class' => 'form-control'))!!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Hệ số<span class="require">*</span></label>
                {!! Form::select(
                'heso',
                array(
                '1' => '1',
                '1.5' => '1.5',
                '2' => '2',
                '2.5' => '2.5',
                '3' => '3',
                '3.5' => '3.5',
                '4' => '4',
                ),null,
                array('id' => 'heso', 'class' => 'form-control'))
                !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Ghi chú</label>
                {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control'))!!}
            </div>
        </div>
    </div>
</div>