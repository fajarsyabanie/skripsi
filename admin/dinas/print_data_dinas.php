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
    $sql_cek ="SELECT D.*, K.nama FROM dinas D INNER JOIN karyawan K ON D.id_karyawan = K.nik WHERE D.id='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_assoc($query_cek);
}


$mpdf = new \Mpdf\Mpdf();
ob_start();
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

    <h3 align="center">DECLARASI PERJALANAN DINAS</h3>

    <table rules="none" border="0" width="100%" >
 
    
    <tr>
        <td>Nama</td>
        <td>: ' . $data_cek["nama"] . '</td>
        <td>Bagian</td>
        <td>: ' . $data_cek["bagian"] . '</td>
    </tr>
    <tr>
        <td>Dari</td>
        <td>: '.$data_cek["dari"].'</td>
        <td>Tujuan</td>
        <td>: ' . $data_cek["tujuan"] . '</td>
    </tr>
    <tr>
        <td>Periode</td>
        <td>: ' . date('d M Y',strtotime($data_cek["t_berangkat"])) . ' - ' . date('d M Y',strtotime($data_cek["t_pulang"])). '</td>
        <td>Proyek</td>
        <td>: ' . $data_cek["proyek"] . '</td>
    </tr>
</table>
<br>





    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
    <th>No</th>
    <th>Rincian</th>
    <th>Total</th>
        
    </tr> ';

$html .= '<tr>
        <td align="center">  1 </td>
        <td style="padding-left:10px">Tiket</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_tiket"]) . '</td>
        </tr>
        <tr>
        <td align="center">2</td>
        <td style="padding-left:10px">Hotel/Penginapan</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_hotel"]) . '</td>
        </tr>
        <tr>
        <td align="center">3</td>
        <td style="padding-left:10px">Biaya Taxi</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_taxi"]) . '</td>
        </tr>
        <tr>
        <td align="center">4</td>
        <td style="padding-left:10px">Biaya Konsumsi</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_konsumsi"]) . '</td>
        </tr>
        <tr>
        <td align="center">5</td>
        <td style="padding-left:10px">Representasi & Entertaiment</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_entertaiment"]) . '</td>
        </tr>
        <tr>
        <td align="center">6</td>
        <td style="padding-left:10px">Lain-lain</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_lainnya"]) . '</td>
        </tr>
        <tr>
        <td align="center"> </td>
        <td style="padding-left:10px">Total Keseluruhan</td>
        <td align="right" style="padding-right:10px">Rp ' . number_format($data_cek["j_tiket"] + $data_cek["j_hotel"] + $data_cek["j_taxi"] + $data_cek["j_konsumsi"] + $data_cek["j_entertaiment"] + $data_cek["j_lainnya"]) . '</td>
        </tr>
        <tr>'
        
        
        
        
        
        ;

$html .=   '</table>
<br>
<p style = "font-size:12px">Banjarbaru, ' . tanggal_indo(date("Y-m-d")) . '</p>

<table style="border: 1px solid #fff;" border="0" width="100%">
        <tr>
        </tr>
        <tr>
        </tr>
        
        <tr>
            <td align="center">
                Disetujui Oleh,
            </td>
            <td align="center">
                Diketahui Oleh,
            </td>
            <td align="center">
                Diperiksa Oleh,
            </td>
            <td align="center">
                Yang Membuat,
            </td>
        </tr>
        <tr>
           
        </tr>
        <tr>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            (KURNIAWAN)
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            (JONATAN ANDRE)
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            (YUNITA)
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            (' . $data_cek["nama"] . ')
            </td>
    </table>    
    
</body>
</html>';




$mpdf->WriteHTML($html);
ob_get_clean();
$mpdf->Output();
