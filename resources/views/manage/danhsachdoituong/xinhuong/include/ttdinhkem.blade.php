<div id="tab3" class="tab-pane active" >
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 1</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt1', null, array('id' => 'ipt1','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf1))
                            <a href="{{ url('file/doituongtx/'.$model->ipf1)}}" target="_blank">{{$model->ipf1}}</a>
                        @endif
                        {!!Form::file('ipf1', array('id'=>'ipf1','class' => 'passvalid'))!!}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 2</label>
                    <div class="col-sm-9 controls">

                        {!!Form::text('ipt2', null, array('id' => 'ipt2','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf2))
                            <a href="{{ url('file/doituongtx/'.$model->ipf2)}}" target="_blank">{{$model->ipf2}}</a>
                        @endif
                        {!!Form::file('ipf2', array('id'=>'ipf2','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 3</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt3', null, array('id' => 'ipt3','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf3))
                            <a href="{{ url('file/doituongtx/'.$model->ipf3)}}" target="_blank">{{$model->ipf3}}</a>
                        @endif
                        {!!Form::file('ipf3', array('id'=>'ipf3','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 4</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt4', null, array('id' => 'ipt4','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf4))
                            <a href="{{ url('file/doituongtx/'.$model->ipf4)}}" target="_blank">{{$model->ipf4}}</a>
                        @endif
                        {!!Form::file('ipf4', array('id'=>'ipf4','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 5</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt5', null, array('id' => 'ipt5','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf5))
                            <a href="{{ url('file/doituongtx/'.$model->ipf5)}}" target="_blank">{{$model->ipf5}}</a>
                        @endif
                        {!!Form::file('ipf5', array('id'=>'ipf5','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 6</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt6', null, array('id' => 'ipt6','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf6))
                            <a href="{{ url('file/doituongtx/'.$model->ipf6)}}" target="_blank">{{$model->ipf6}}</a>
                        @endif
                        {!!Form::file('ipf6', array('id'=>'ipf6','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 7</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt7', null, array('id' => 'ipt7','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf7))
                            <a href="{{ url('file/doituongtx/'.$model->ipf7)}}" target="_blank">{{$model->ipf7}}</a>
                        @endif
                        {!!Form::file('ipf7', array('id'=>'ipf7','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 8</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt8', null, array('id' => 'ipt8','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf8))
                            <a href="{{ url('file/doituongtx/'.$model->ipf8)}}" target="_blank">{{$model->ipf8}}</a>
                        @endif
                        {!!Form::file('ipf8', array('id'=>'ipf8','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 9</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt9', null, array('id' => 'ipt9','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf9))
                            <a href="{{ url('file/doituongtx/'.$model->ipf9)}}" target="_blank">{{$model->ipf9}}</a>
                        @endif
                        {!!Form::file('ipf9', array('id'=>'ipf9','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thông tin đính kèm 10</label>
                    <div class="col-sm-9 controls">
                        {!!Form::text('ipt10', null, array('id' => 'ipt10','class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-sm-8 controls">
                        @if(isset($model->ipf10))
                            <a href="{{ url('file/doituongtx/'.$model->ipf10)}}" target="_blank">{{$model->ipf10}}</a>
                        @endif
                        {!!Form::file('ipf10', array('id'=>'ipf10','class' => 'passvalid'))!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
