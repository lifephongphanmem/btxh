<div class="form-group">
    <label class="col-md-3 control-label"><b>Tháng</b></label>
    <div class="col-md-8">
        <select name="select_thang" id="select_thang" class="form-control">
            <!--option value="all">--Chọn tháng--</option-->
            <option value="01" {{date('m') == '01' ? 'selected' : ''}}>Tháng 01</option>
            <option value="02" {{date('m') == '02' ? 'selected' : ''}}>Tháng 02</option>
            <option value="03" {{date('m') == '03' ? 'selected' : ''}}>Tháng 03</option>
            <option value="04" {{date('m') == '04' ? 'selected' : ''}}>Tháng 04</option>
            <option value="05" {{date('m') == '05' ? 'selected' : ''}}>Tháng 05</option>
            <option value="06" {{date('m') == '06' ? 'selected' : ''}}>Tháng 06</option>
            <option value="07" {{date('m') == '07' ? 'selected' : ''}}>Tháng 07</option>
            <option value="08" {{date('m') == '08' ? 'selected' : ''}}>Tháng 08</option>
            <option value="09" {{date('m') == '09' ? 'selected' : ''}}>Tháng 09</option>
            <option value="10" {{date('m') == '10' ? 'selected' : ''}}>Tháng 10</option>
            <option value="11" {{date('m') == '11' ? 'selected' : ''}}>Tháng 11</option>
            <option value="12" {{date('m') == '12' ? 'selected' : ''}}>Tháng 12</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label"><b>Năm</b></label>
    <div class="col-md-8">
        <select name="select_nam" id="select_nam" class="form-control">
            @if ($nam_start = intval(date('Y')) - 5 ) @endif
            @if ($nam_stop = intval(date('Y')) + 1 ) @endif
            @for($i = $nam_start; $i <= $nam_stop; $i++)
                <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
            @endfor
        </select>
    </div>
</div>