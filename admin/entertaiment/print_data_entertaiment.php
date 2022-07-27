<?php
require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';
if (isset($_GET['kode'])) {
    $sql_cek ="SELECT E.*, K.nama from entertaiment E INNER JOIN karyawan K ON E.id_karyawan = K.nik WHERE E.id='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_assoc($query_cek);
}


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

    <h3 align="center">FORMULIR ENTERTAIMENT</h3>
    <table width="100%" border="0" cellpading="10" cellspacing="0"> ';
    foreach( $query_cek as $data) {
        $html .= '
        <tr>
        <td align="left">Tanggal</td>
        <td align="left">: '. $data["tanggal"].'</td>
        </tr>
        <tr>
        <td align="left">Kegiatan</td>
        <td align="left">: '. $data["jenis"].'</td>
        </tr>
        <tr>
        <td align="left">Nama Tempat</td>
        <td align="left">: '. $data["nama_tempat"].'</td>
        </tr>
        <tr>
        <td align="left">Alamat</td>
        <td align="left">: '. $data["alamat"].'</td>
        </tr>
        <tr>
        <td align="left">Jumlah</td>
        <td align="left">: '. $data["jumlah"].' Orang</td>
        </tr>
        <tr>
        <td align="left">Keterangan</td>
        <td align="left">: '. $data["keterangan"].'</td>
        </tr>
        <tr>
        <td align="left">RELASI</td>
        </tr>
        <tr>
        <td align="left">Nama Relasi</td>
        <td align="left">: '. $data["nama_relasi"].'</td>
        </tr>
        <tr>
        <td align="left">Posisi</td>
        <td align="left">: '. $data["posisi_relasi"].'</td>
        </tr>
        <tr>
        <td align="left">Perusahaan</td>
        <td align="left">: '. $data["perusahaan_relasi"].'</td>
        </tr>
        
        
        ';
    }

    $html .=   '</table>
    <br>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
