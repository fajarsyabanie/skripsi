<?php

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
        <td>: Sales</td>
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
        <td>Tiket</td>
        <td align="right">Rp ' . number_format($data_cek["j_tiket"]) . '</td>
        </tr>
        <tr>
        <td align="center">2</td>
        <td>Hotel/Penginapan</td>
        <td align="right">Rp ' . number_format($data_cek["j_hotel"]) . '</td>
        </tr>
        <tr>
        <td align="center">3</td>
        <td>Biaya Taxi</td>
        <td align="right">Rp ' . number_format($data_cek["j_taxi"]) . '</td>
        </tr>
        <tr>
        <td align="center">4</td>
        <td>Biaya Konsumsi</td>
        <td align="right">Rp ' . number_format($data_cek["j_konsumsi"]) . '</td>
        </tr>
        <tr>
        <td align="center">5</td>
        <td>Representasi & Entertaiment</td>
        <td align="right">Rp ' . number_format($data_cek["j_entertaiment"]) . '</td>
        </tr>
        <tr>
        <td align="center">6</td>
        <td>Lain-lain</td>
        <td align="right">Rp ' . number_format($data_cek["j_lainnya"]) . '</td>
        </tr>
        <tr>
        <td align="center"> </td>
        <td>Total Keseluruhan</td>
        <td align="right">Rp ' . number_format($data_cek["j_tiket"] + $data_cek["j_hotel"] + $data_cek["j_taxi"] + $data_cek["j_konsumsi"] + $data_cek["j_entertaiment"] + $data_cek["j_lainnya"]) . '</td>
        </tr>
        <tr>'
        
        
        
        
        
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
