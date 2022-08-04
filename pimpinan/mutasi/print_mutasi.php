<?php
require '/xampp/htdocs/apkbaru/inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include '/xampp/htdocs/apkbaru/inc/koneksi.php';

$sql_cek = "SELECT M.*, K.nama, P.nama_perwakilan FROM mutasi M 
INNER JOIN karyawan K on M.id_karyawan = K.nik 
INNER JOIN perwakilan P on M.id_cabang = P.id WHERE M.id='" . $_GET['kode'] . "'";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

$sql_cek2 = "SELECT * FROM mutasi_rinci WHERE id_mutasi='" . $_GET['kode'] . "'";
$query_cek2 = mysqli_query($koneksi, $sql_cek2);
$data_cek2 = mysqli_fetch_array($query_cek2, MYSQLI_BOTH);

$sql_cek3 = "SELECT * FROM mutasi_tambah WHERE id_mutasi='" . $_GET['kode'] . "'";
$query_cek3 = mysqli_query($koneksi, $sql_cek3);
$data_cek3 = mysqli_fetch_array($query_cek3, MYSQLI_BOTH);


$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/print.css" class="css">
    <title>PRINT Laporan Arus Kas</title>
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

    <h3 align="center">LAPORAN ARUS KAS</h3>

    <p>Perwakilan : '. $data_cek["nama_perwakilan"].'</p>
    <p>Periode : '. date('d', strtotime($data_cek["t_awal"])).' - '. date('d M Y', strtotime($data_cek["t_akhir"])).'</p>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th style="width:4%;">No</th>
        <th style="width:15%;">Tanggal</th>
        <th style="width:62%;">Rincian</th>
        <th style="width:19%;">Debet</th>
        <th style="width:19%;">Kredit</th>
    </tr> 
    <tr>
        <td></td>
        <td></td>
        <td>Dana Masuk</td>
        <td align="right">Rp '.number_format($data_cek3['dana_masuk'],0,",",".").'</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Dana Pegangan</td>
        <td align="right">Rp '.number_format($data_cek3['dana_pegangan'],0,",",".").'</td>
        <td></td>
    </tr>
    
    
    ';
    $total = 0;
    $i = 1;
    foreach( $query_cek2 as $row) {
        $html .= '<tr>
        <td align="center" >'. $i++ .'</td>
        <td align="center">'. date('d M Y', strtotime($row["tanggal"])).'</td>
        <td align="left">'. $row["rincian"].'</td>
        <td></td>
        <td align="right">Rp '. number_format($row["biaya"],0,",",".").'</td>
        </tr>
        ' .$total += $row['biaya'] . '
        ';
    }

    $html .=   '
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td  align="center"> TOTAL</td>
        <td align="right">Rp '. number_format($data_cek3['dana_masuk']+$data_cek3['dana_pegangan'],0,",",".").' </td>
        <td align="right">Rp '. number_format($total,0,",",".").' </td>
        </tr>
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td  align="center"> Sisa Saldo</td>
        <td align="right">Rp '. number_format($data_cek3['dana_masuk']+$data_cek3['dana_pegangan']-$total,0,",",".").' </td>
        <td align="right"></td>
        </tr>
    </table>

    <br>

<table style="border: 1px solid #fff;" border="0" width="100%">
        <tr>
        </tr>
        <tr>
        </tr>
        
        <tr>
            <td align="center">
                Kasir,
            </td>
            <td align="center">
                Dibukukan,
            </td>
            <td align="center">
                Diperiksa,
            </td>
            <td align="center">
                Diketahui,
            </td>
            <td align="center">
                Disetujui,
            </td>
        </tr>
        <tr>
           
        </tr>
        <tr>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            Ribka
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            ' . $data_cek["nama"] . '
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            Yunita
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            
            </td>
            <td align="center" style="width: 30%; padding-top: 90px; padding-center: 15px">
            
            </td>
    </table>    
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
