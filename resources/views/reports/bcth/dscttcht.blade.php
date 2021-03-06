<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <style type="text/css">
        body {
            font: normal 14px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 5px;
        }
        p{
            padding: 5px;
        }
        span{
            text-transform: uppercase;
            font-weight: bold;

        }
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldv->tenxa}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">DANH SÁCH CHI TRẢ TRỢ CẤP HÀNG THÁNG</p>
<p style="text-align: center">{{$thang !='all' ? 'Tháng '. $thang.' Năm '.$nam : 'Năm '.$nam}}</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th rowspan="2">STT</th>
        <th rowspan="2">Họ tên</th>
        <th rowspan="2">Năm sinh</th>
        <th rowspan="2">Số quyết định hưởng</th>
        <th rowspan="2">Số sổ lĩnh tiền</th>
        <th rowspan="2">Tiền trợ cấp tháng này</th>
        <th colspan="2">Chưa trả tháng trước</th>
        <th rowspan="2">Tổng số tiền trợ cấp</th>
        <th colspan="2">Người nhận</th>
    </tr>
    <tr>
        <th>Số tháng</th>
        <th>Số tiền</th>
        <th>Ký</th>
        <th>Họ tên</th>
    </tr>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$tt->hoten}}</td>
            <td>{{$tt->namsinh}}</td>
            <td>{{$tt->qdhuong}}</td>
            <td></td>
            <td>{{$tt->sotientc}}</td>
            <td>{{$tt->thangtl}}</td>
            <td>{{number_format($tt->sotientl)}}</td>
            <td>{{number_format($tt->sotientc - $tt->sotientl)}}</td>
            <td></td>
            <td></td>
        </tr>
    @endforeach

</table>
<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="50%"></td>
        <td style="text-align: center;" width="50%">
            <i>Ngày... tháng.... năm 20.. </i>
        </td>
    </tr>
    <tr>
        <td style="text-align: center"><b>NGƯỜI LẬP BIỂU</b></td>
        <td style="text-align: center"><b>{{$modeldv->chucvuky}}</b></td>
    </tr>
    <tr>
        <td style="text-align: center"><i>(Ký, ghi rõ họ tên, chức vụ)</i></td>
        <td style="text-align: center"><i>(Ký, ghi rõ họ tên, đóng dấu</i></td>
    </tr>
</table>
<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:80px auto; text-align: center;">
    <tr>
        <td style="text-align: center;" width="50%"><b>{{$modeldv->nguoithuchien}}</b></td>
        <td style="text-align: center;" width="50%"><b>{{$modeldv->hotennguoiky}}</b></td>
    </tr>
</table>
</body>
</html>