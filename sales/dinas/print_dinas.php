<?php
require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';
$guru = mysqli_query($koneksi, "SELECT D.*, K.nama FROM dinas D INNER JOIN karyawan K ON D.id_karyawan = K.nik ORDER BY 
t_berangkat DESC");


$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>PRINT DATA PERJALANAN DINAS</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%;">
<tr>
<td style="width: 15%;">
    <img src="../../dist/img/logo.jpg" style="width:90px; height:90px;"> 
</td>
<td style="width:77%;">
    <left>
        <p style="font-size: 25px; color:#FF0000"><b>PT TOTAL SARANA MANDIRI</b></p>
        <P style="font-size: 12px";>Komplek Duta Indah Karya Blok A No. 10-Jl. Daan Mogot KM. 14 Jakarta Barat 11740</P>
        <p style="font-size: 12px";>Telp : (62 21)2967 5301. Fax (62 21)2967 5302. E-mail : totalsarana@yahoo.com</p>
    </left>
</td>
</tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">LAPORAN DATA PENGAJUAN PERJALANAN DINAS</h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Berangkat Dari</th>
        <th>Tanggal Berangkat</th>
        <th>Tanggal Pulang</th>
        <th>Tujuan</th>
        <th>Total Pengajuan</th>
    </tr> ';
    $i = 1;
    foreach( $guru as $row) {
        $html .= '<tr>
        <td align="center">'. $i++ .'</td>
        <td align="center">'. $row["nama"].'</td>
        <td align="center">'. $row["dari"].'</td>
        <td align="center">'. $row["t_berangkat"].'</td>
        <td align="center">'. $row["t_pulang"].'</td>
        <td align="center">'. $row["tujuan"].'</td>
        <td align="center">'. $row["j_tiket"]+$row["j_hotel"]+$row["j_taxi"]+$row["j_konsumsi"]+$row["j_etertaiment"]+$row["j_lainnya"].'</td>
        </tr>';
    }

    $html .=   '</table>

    <table style="border: 1px solid #fff;">
        <tr></tr>
        <tr>
        
            <td align="right" style="width: 15%;">
            <br>
            <br>Banjarbaru, _______________
            </td>
        </tr>
        
        <tr>
            <td align="right" style="width: 15%; padding-right: 45px;">
                Mengetahui
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%; padding-right: 10px">
            KEPALA CABANG
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 30%; padding-top: 90px; padding-right: 15px">
            NATAL TANDI
            </td>
        </tr>
    </table>
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
?>

