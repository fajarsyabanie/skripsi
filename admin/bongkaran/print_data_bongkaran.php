<?php

require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/skripsi/inc/koneksi.php';
if (isset($_GET['kode'])) {
    $sql_cek ="SELECT * FROM bongkaran B INNER JOIN karyawan K ON B.id_karyawan=K.nik WHERE B.id='" . $_GET['kode'] . "'";
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

    <h3 align="center">LAPORAN DATA PENGAJUAN BONGKARAN</h3>

    <table rules="none" border="0" >
 
    
    <tr>
        <td>Nama</td>
        <td>: ' . $data_cek["nama"] . '</td>
    </tr>
    <tr>
        <td>Divisi</td>
        <td>: Supply Chain</td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>: ' . $data_cek["tanggal_bongkaran"] . '</td>
    </tr>
    <tr>
        <td>Container</td>
        <td>: ' . $data_cek["container"] . '</td>
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
        <td>Sewa Mobil / Truck (Armada)</td>
        <td align="right">Rp ' . number_format($data_cek["sewa_mobil"]) . '</td>
        </tr>
        <tr>
        <td align="center">2</td>
        <td>Makan & Minum</td>
        <td align="right">Rp ' . number_format($data_cek["konsumsi"]) . '</td>
        </tr>
        <tr>
        <td align="center">3</td>
        <td>Biaya Forklift</td>
        <td align="right">Rp ' . number_format($data_cek["forklift"]) . '</td>
        </tr>
        <tr>
        <td align="center">4</td>
        <td>Ekspedisi</td>
        <td align="right">Rp ' . number_format($data_cek["ekspedisi"]) . '</td>
        </tr>
        <tr>
        <td align="center">5</td>
        <td>Parkir & Tol</td>
        <td align="right">Rp ' . number_format($data_cek["tol"]) . '</td>
        </tr>
        <tr>
        <td align="center">6</td>
        <td>Lain-lain</td>
        <td align="right">Rp ' . number_format($data_cek["lainnya"]) . '</td>
        </tr>
        <tr>
        <td align="center"> </td>
        <td>Total Keseluruhan</td>
        <td align="right">Rp ' . number_format($data_cek["sewa_mobil"] + $data_cek["konsumsi"] + $data_cek["forklift"] + $data_cek["ekspedisi"] + $data_cek["tol"] + $data_cek["lainnya"]) . '</td>
        </tr>
        <tr>
        <td align="center"> </td>
        <td>Uang Muka</td>
        <td align="right">Rp ' . number_format($data_cek["uang_muka"]) . '</td>
        </tr>
        <tr>
        <td align="center"> </td>
        <td>Dibayar oleh Perusahaan/Karyawan</td>
        <td align="right">Rp ' . number_format($data_cek["sewa_mobil"] + $data_cek["konsumsi"] + $data_cek["forklift"] + $data_cek["ekspedisi"] + $data_cek["tol"] + $data_cek["lainnya"]-$data_cek["uang_muka"]) . '</td>
        </tr>'
        
        
        
        
        ;

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
ob_get_clean();
$mpdf->Output();
