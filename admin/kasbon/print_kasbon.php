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
$kasbon = mysqli_query($koneksi, "SELECT B.*, K.nama FROM kasbon B INNER JOIN karyawan K on B.id_karyawan = K.nik ORDER BY tanggal DESC");


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
    <title>Data Pinjaman Karyawan</title>
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

    <h3 align="center">LAPORAN DATA PEMINJAMAN KARYAWAN</h3>
    <table width="100%" border="1" style="border-collapse: collapse">
    <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Tanggal Pengajuan</th>
        <th>Besarnya Pinjaman</th>
        <th>Keperluan Peminjaman</th>
        <th>Jangka Waktu</th>
        <th>Pemotongan Per Bulan</th>
        <th>Cara Pengembalian</th>
    </tr> ';
$i = 1;
foreach ($kasbon as $row) {
  $html .= '<tr>
        <td align="center">' . $i++ . '</td>
        <td align="left" style="padding-left:10px">' . $row["nama"] . '</td>
        <td align="left" style="padding-left:10px">' .  tanggal_indo($row["tanggal"], false) . '</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($row["besar_pinjaman"], 0, ",", ".") . '</td>
        <td align="left" style="padding-left:10px">' . $row["keperluan"] . '</td>
        <td align="left" style="padding-left:10px">' . $row["jangka_waktu"] . ' Bulan</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($row["jumlah_pemotongan"], 0, ",", ".") . '</td>
        <td align="left" style="padding-left:10px">' . $row["cara_pengembalian"] . '</td>
        </tr>';
}

$html .=   '</table>
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
