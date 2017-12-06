<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
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

<p style="text-align: center; font-weight: bold; font-size: 16px;">DANH SÁCH HỒ SƠ XIN HƯỞNG TRỢ GIÚP XÃ HỘI</p>
<p style="text-align: center">{{$thang !='all' ? 'Tháng '. $thang.' Năm '.$nam : 'Năm '.$nam}}</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center;width: 2%">STT</th>
        <th style="text-align: center;width: 10%">Tên chủ hộ<br>(cá nhân)</th>
        <th style="text-align: center;width: 5%">Ngày sinh</th>
        <!--th>Giới tính</th-->
        <th style="text-align: center;width: 10%">Địa chỉ</th>
        <th style="text-align: center;width: 20%">Đối tượng</th>
        <th style="text-align: center;width: 5%">Hệ số</th>
        <th style="text-align: center;width: 5%">Số tiền</th>
    </tr>
    @foreach($model as $key=>$tt)
        <tr>
            <td style="text-align: center">{{$key+1}}</td>
            <td>{{$tt->hoten}}</td>
            <td  style="text-align: center">{{getDayVn($tt->ngaysinh)}}</td>
            <td>{{$tt->diachi}}</td>
            <td>{{$tt->tttctd}}</td>
            <td  style="text-align: center">{{$tt->heso}}</td>
            <td  style="text-align: right">{{number_format($tt->sotientc)}}</td>
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