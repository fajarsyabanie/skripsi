<?php

function tanggal_indo($date, $cetak_hari = false)
{
  $hari = array(
    1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode(' ', $date);
  $split_tanggal = explode('-', $split[0]);
  if (count($split) == 1) {
    $tgl_indo = $split_tanggal[2] . ' ' . $bulan[(int)$split_tanggal[1]] . ' ' . $split_tanggal[0];
  } else {
    $split_waktu = explode(':', $split[1]);
    $tgl_indo = $split_tanggal[2] . ' ' . $bulan[(int)$split_tanggal[1]] . ' ' . $split_tanggal[0] . ' ' . $split_waktu[0] . ':' . $split_waktu[1] . ':' . $split_waktu[2];
  }

  if ($cetak_hari) {
    $num = date('N', strtotime($date));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}

require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/skripsi/inc/koneksi.php';
if (isset($_GET['kode'])) {
    $sql_cek ="SELECT * FROM bongkaran B INNER JOIN karyawan K ON B.id_karyawan=K.nik WHERE B.id='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_assoc($query_cek);
}

require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';

$sql_cek = "SELECT B.*, K.nama, P.nama_perwakilan FROM kasbon_beli B 
INNER JOIN karyawan K on B.id_karyawan = K.nik 
INNER JOIN perwakilan P on B.id_perwakilan = P.id WHERE B.id='" . $_GET['kode'] . "'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>FORM DATA KAS BON</title>
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

    <h3 align="center">KAS BON</h3>
    <table rules="none" border="0" >
 
    
    <tr>
        <td>Nama</td>
        <td>: ' . $data_cek["nama"] . '</td>
    </tr>
    <tr>
        <td>Perwakilan</td>
        <td>: ' . $data_cek["nama_perwakilan"] . '</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>: '. tanggal_indo($data_cek["tanggal"], true).'</td>
    </tr>
</table>
<br>
    <table width="100%" border="1" cellpading="10" cellspacing="0">';
   $i=1;
        $html .= '
        <tr>
        <td align="center">No</td>
        <td align="center">Keperluan</td>
        <td align="center">Value</td>
        </tr>
        <tr>
        <td align="center">1</td>
        <td align="left"  style="padding-left:10px">'. $data_cek["keperluan"].'</td>
        <td align="right"  style="padding-right:10px">Rp '. number_format($data_cek["harga"],0,",",".").'</td>
        </tr>';


    $html .=   '</table>

    <br>

    <table style="border: 1px solid #fff;" border="0" width="100%">
        <tr>
        </tr>
        <tr>
        </tr>
        
        <tr>
            <td align="center">
                Penerima,
            </td>
            <td align="center">
                Mengetahui,
            </td>
            <td align="center">
                Diserahkan,
            </td>
        </tr>
        <tr>
           
        </tr>
        <tr>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            ___________________
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            ___________________
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            ___________________
            </td>
    </table>   
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
