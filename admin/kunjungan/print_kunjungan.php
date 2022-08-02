<?php
require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';

$sql_cek = "SELECT R.*, K.nama from rencana_kunjungan R 
INNER JOIN karyawan K ON R.id_karyawan = K.nik WHERE R.id='" . $_GET['kode'] . "'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

$sql_cek2 = "SELECT * FROM kunjungan_rincian  WHERE id_kunjungan='" . $_GET['kode'] . "' ORDER BY t_kunjungan ASC ";
$query_cek2 = mysqli_query($koneksi, $sql_cek2);
$data_cek2 = mysqli_fetch_array($query_cek2, MYSQLI_BOTH);


$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>PRINT DATA BONGKARAN</title>
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

    <h3 align="center">RENCANA KUNJUNGAN KE DAERAH</h3> 
    <table rules="none" border="0" >
 
    
    <tr>
        <td>Tujuan Daerah</td>
        <td>: ' . $data_cek["tujuan_daerah"] . '</td>
    </tr>
    <tr>
        <td>Periode</td>
        <td>: '. date('d M Y', strtotime($data_cek["t_berangkat"])).' - '. date('d M Y', strtotime($data_cek["t_pulang"])).'</td>
    </tr>
    <tr>
        <td>Maksud dan Tujuan</td>
        <td>: </td>
    </tr>
</table>
<br>

    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>Tanggal</th>
        <th>Rincian</th>
    </tr> ';

    foreach( $query_cek2 as $row) {
        $html .= '<tr>
        <td align="center" style="width: 15%">' . date('d M Y', strtotime($row["t_kunjungan"])) . '</td>
        <td align="left">  ' . $row["rincian"] . '</td>
        ';
    }

    $html .=   '</table>

    <br>
    <p> Biaya yang dibutuhkan :

    <table rules="none" border="0" width="100%" >
 
    
    <tr>
        <td width="25%">Keberangkatan</td>
        <td width="25%">: ' . $data_cek["keberangkatan"] . '</td>
        <td width="25%">Tiket Berangkat</td>
        <td width="25%">:Rp ' . number_format($data_cek["tiket_berangkat"]) . '</td>
    </tr>
    <tr>
        <td>Bahan Bakar Minyak</td>
        <td>:Rp '. number_format($data_cek['bbm']).'</td>
        <td>Tiket Pulang</td>
        <td>:Rp ' . number_format($data_cek["tiket_pulang"]) . '</td>
    </tr>
    <tr>
        <td>Penginapan</td>
        <td>:Rp ' . number_format($data_cek["penginapan"]) . '</td>
    </tr>
    <tr>
        <td>Konsumsi</td>
        <td>:Rp ' . number_format($data_cek["makan"]) . '</td>
    </tr>
    <tr>
        <td>Biaya Lainnya</td>
        <td>:Rp ' . number_format($data_cek["lainnya"]) . '</td>
    </tr>
    
</table>
<br>
<br>



<table style="border: 1px solid #fff;" border="0" width="100%">
<tr>
</tr>
<tr>
</tr>

<tr>
    <td align="center">
        Diajukan Oleh :
    </td>
    <td align="center">
        Diperiksa Oleh :
    </td>
    <td align="center">
        Mengetahui Atasan Langsung
    </td>
    <td align="center">
        Persetujuan Direktur
    </td>
</tr>
<tr>
   
</tr>
<tr>
    <td align="left" style="width: 30%; padding-top: 90px; padding-center: 15px">
    Nama :'. $data_cek["nama"].'
    </td>
    <td align="left" style="width: 30%; padding-top: 90px; padding-center: 15px">
    Nama :
    </td>
    <td align="left" style="width: 30%; padding-top: 90px; padding-center: 15px">
    Nama :
    </td>
    <td align="left" style="width: 30%; padding-top: 90px; padding-center: 15px">
    Nama :
    </td>
<tr>
    <td align="left">
    Tanggal :'. $data_cek["tanggal"].'
    </td>
    <td align="left">
    Tanggal :
    </td>
    <td align="left">
    Tanggal :
    </td>
    <td align="left">
    Tanggal :
    </td>
</tr>
</table>    
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
