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

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT B.*, K.nama FROM kasbon B INNER JOIN karyawan K on B.id_karyawan = K.nik WHERE B.id='" . $_GET['kode'] . "'";
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
    <title>Pinjaman Karyawan</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%; border-collapse: collapse">
            <tr>
                <td align="right">
                    <img src="../../dist/img/logo.jpg" style="width:90px; height:90px;"> 
                </td>
                <td style="width:75%;" align="left">
                        <p style="font-size: 25px; color:#FF0000"><b>PT TOTAL SARANA MANDIRI</b></p>
                        <P style="font-size: 12px";>Komplek Duta Indah Karya Blok A No. 10-Jl. Daan Mogot KM. 14 Jakarta Barat 11740</P>
                        <p style="font-size: 12px";>Telp : (62 21)2967 5301. Fax (62 21)2967 5302. E-mail : totalsarana@yahoo.com</p>
                </td>
            </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">PERMOHONAN PEMINJAMAN KARYAWAN</h3>
    <p>Saya yang bertanda tangan di bawah ini :</p>
    <table width="50%" border="0" cellpading="10" cellspacing="0">
    <tr>
    <td>Nama</td>
    <td>: ' . $data_cek["nama"] . '</td>
    </tr>
    <tr>
    <td>Jabatan</td>
    <td>: </td>
    </tr>
    <tr>
    <td>Cabang</td>
    <td>: TSM Banjarmasin</td>
    </tr>
    </table>
    <br>
    <p>Dengan ini mengajukan permohonan peminjaman uang kepada Perusahaan sebagai berikut :</p>
    <br>

    <table width="100%" border="0" cellpading="10" cellspacing="0">
    <tr>
    <td width="35%">Besarnya Pinjaman</td>
    <td>: Rp' . number_format($data_cek["besar_pinjaman"],0,",",".") . '</td>
    </tr>
    <tr>
    <td width="35%">Keperluan</td>
    <td>: ' . $data_cek["keperluan"] . '</td>
    </tr>
    <tr>
    <td width="35%">Jangka Waktu Pengembalian</td>
    <td>: ' . $data_cek["jangka_waktu"] . ' Bulan</td>
    </tr>
    <tr>
    <td width="35%">Jumlah Pemotongan</td>
    <td>: Rp' . number_format($data_cek["jumlah_pemotongan"],0,",",".") . '</td>
    </tr>
    <tr>
    <td width="35%">Cara Pengembalian</td>
    <td>: ' . $data_cek["cara_pengembalian"] . '</td>
    </tr>
    </table>
    <br>
    <br>
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
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            ' . $data_cek["nama"] . '
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
            <td align="center">
            ' . tanggal_indo($data_cek['tanggal'],false) . '
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
