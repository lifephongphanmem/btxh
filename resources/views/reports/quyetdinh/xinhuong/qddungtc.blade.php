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
            padding: 10px;
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
<body style="font:normal 16px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 0px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$model->donviqd}}</b><br>
            --------
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i>Độc lập - Tự do - Hạnh phúc</i></b><br>
            --------
        </td>
    </tr>
    <tr>
        <td width="40%">Số: {{$model->soqd}}</td>
        <td><i>{{$model->diadanhqd}}, {{ChangeDateString($model->ngayqd)}} </i></td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">QUYẾT ĐỊNH</p>
<p style="text-align: center"><b>Về việc thôi hưởng trợ cấp xã hội</b></p>
<p style="text-align: center"><b style="text-transform: uppercase;">{{$model->chucdanhqd}}</b></p>
<p align="justify">{!! nl2br(e($model->cancuqd)) !!}</p>
<p>{{$model->xettheototrinh}}</p>
<p style="text-align: center;text-transform: uppercase;"><b>QUYẾT ĐỊNH</b></p>
<p align="justify"><b>Điều 1. </b> Thôi hưởng trợ cấp cho ông(bà) : <b style="text-transform: uppercase;">{{$model->hoten}}</b><br>
Hiện cư trú tại: {{$model->diachi}}<br>
Là đối tượng đang hưởng mức trợ cấp {{number_format($model->sotientc)}} đồng/tháng <br>
Nay thôi hưởng trợ cấp {{number_format($model->sotientc)}} (Bằng chữ: {{VndText($model->sotientc)}}), kể từ {{ChangeDateString($model->ngaydunghuong)}}<br>
Lý do thôi hưởng: {{$model->lydodunghuong}}</p>
<p><b>Điều 2. </b>Quyết định này có hiệu lực kể từ ngày ký</p>
<p align="justify"><b>Điều 3. </b>Các ông (bà) Chánh Văn Phòng Uỷ ban nhân dân Thành Phố, Trưởng phòng Lao động- Thương binh và Xã hội và các Ông(bà) có tên nêu trên Điều 1 có trách
nhiệm thi hành quyết định này</p>

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="50%">
           <b><i>Nơi nhận:</i></b> <br>-Như điều 3<br>
            -Lưu VPUB, LĐTB-XH
        </td>
        <td style="text-align: center;text-transform: uppercase;" width="50%">
            <b>{!! nl2br(e($model->chucdanhkyqd)) !!}</b>
        </td>
    </tr>

</table>
</body>
</html>