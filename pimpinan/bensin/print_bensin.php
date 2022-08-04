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

require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';
$bensin = mysqli_query($koneksi, "SELECT * FROM bensin B 
INNER JOIN karyawan K ON K.nik = B.id_karyawan 
INNER JOIN perwakilan p ON p.id = B.id_perwakilan
INNER JOIN armada A ON A.id = B.id_armada
ORDER BY t_isi DESC");


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
    <title>Data BENSIN</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%; border-collapse: collapse" border="0">
            <tr>
            <td align="right">
            <img src="../../dist/img/logo.jpg" style="width:90px; height:90px;"> 
        </td>
        <td style="width:68%;" align="left">
                <p style="font-size: 25px; color:#FF0000"><b>PT TOTAL SARANA MANDIRI</b></p>
                <P style="font-size: 12px";>Komplek Duta Indah Karya Blok A No. 10-Jl. Daan Mogot KM. 14 Jakarta Barat 11740</P>
                <p style="font-size: 12px";>Telp : (62 21)2967 5301. Fax (62 21)2967 5302. E-mail : totalsarana@yahoo.com</p>
        </td>
            </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">DATA BENSIN</h3>
    <table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <th>No</th>
        <th>Perwakilan</th>
        <th>Armada</th>
        <th>Nama Pengisi</th>
        <th>KM Awal</th>
        <th>KM Akhir</th>
        <th>Tgl Isi</th>
        <th>Tujuan</th>
        <th>Harga</th>
        <th>Biaya</th>
    </tr> ';
$i = 1;
foreach ($bensin as $row) {
  $html .= '<tr>
        <td align="center">' . $i++ . '</td>
        <td align="left" style="padding-left:10px">' . $row["nama_perwakilan"] . '</td>
        <td align="left" style="padding-left:10px" width="15%">' .  $row["nama_armada"] . '</td>
        <td align="left" style="padding-left:10px" width="13%">' .  $row["nama"] . '</td>
        <td align="right" style="padding-right:10px">' . $row["km_awal"] . ' Km</td>
        <td align="right" style="padding-right:10px">' . $row["km_akhir"] . ' Km</td>
        <td align="left" >' . date("d-m-y",strtotime($row["t_isi"])) . '</td>
        <td align="left" style="padding-left:10px">' . $row["tujuan"] . '</td>
        <td align="right" >Rp ' . number_format($row["harga"],0,",",".") . '</td>
        <td align="right" >Rp ' . number_format($row["biaya"],0,",",".") . '</td>
        </tr>';
}

$html .=   '</table>
<br>
    <table style="page-break-inside: avoid; border-collapse: collapse" border="0" width="100%" autosize="1">
    <tr>
    <td width="75%"></td>
        <td align="center">
        Banjarbaru, ' . tanggal_indo(date("Y-m-d")) . '
        </td>
    </tr>
    <tr>
    <td width="75%"></td>
        <td align="center">
            Mengetahui
        </td>
    </tr>
    <tr>
    <td width="75%"></td>
        <td align="center" vertical-align="bottom" style="padding-top: 130px">
        KEPALA CABANG
        </td>
    </tr>
    <tr>
    </tr>
</table>
    
    
</body>
</html>';



$mpdf->WriteHTML($html);
$mpdf->Output();
