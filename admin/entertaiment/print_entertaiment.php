<?php
require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';
$sql_cek = "SELECT E.*, K.nama from entertaiment E INNER JOIN karyawan K ON E.id_karyawan = K.nik ORDER BY tanggal DESC";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);


$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('L');
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>PRINT DATA FORMULIR ENTERTAIMENT</title>
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

    <h3 align="center">DATA FORMULIR ENTERTAIMENT</h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Tanggal</th>
        <th>Kegiatan</th>
        <th>Nama Tempat</th>
        <th>Alamat</th>
        <th>Jumlah Orang</th>
        <th>Nama Relasi</th>
        <th>Posisi</th>
        <th>Nama Perusahaan</th>
        <th>Keterangan</th>
    </tr> ';
    $i = 1;
    foreach( $query_cek as $data) {
        $html .= '<tr>
        <td align="center">'. $i++ .'</td>
        <td align="left">'. $data["nama"].'</td>
        <td align="center">'. $data["tanggal"].'</td>
        <td align="left">'. $data["jenis"].'</td>
        <td align="left">'. $data["nama_tempat"].'</td>
        <td align="left">'. $data["alamat"].'</td>
        <td align="center">'. $data["jumlah"].' Orang</td>
        <td align="left">'. $data["nama_relasi"].'</td>
        <td align="left">'. $data["posisi_relasi"].'</td>
        <td align="left">'. $data["perusahaan_relasi"].'</td>
        <td align="left">'. $data["keterangan"].'</td>
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
