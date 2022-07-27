<?php
require '../koneksi.php';
require '../vendor/autoload.php';
include '../koneksi.php';

function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
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
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}

if(isset($_GET['id'])){
     $sql_cek = "SELECT * FROM tb_berita_acara_peminjaman b
     INNER JOIN tbl_peminjaman p ON b.id_peminjaman = p.id_peminjaman
     INNER JOIN tbl_user u ON u.id_user = p.id_user
     INNER JOIN tbl_barang br ON br.id_barang = p.id_barang
     WHERE b.id_peminjaman = '".$_GET['id']."'";
     $query_cek = mysqli_query($conn, $sql_cek);
     $hasil = mysqli_fetch_assoc($query_cek);
     $tanggal = $hasil['tgl_pinjam'];
     
     
    
    // $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="../assets/css/print.css" class="css">
    <title>PRINT DATA BARANG</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%;">
        <tr>
            <td style="width: 15%;">
                <img src="../assets/images/kalsel.png" style="width:90px; height:90px;"> 
            </td>
            <td style="width:77%;">
                <center>
                    <p style="font-size: 15px;"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></p>
                    <P style="font-size: 15px;"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></P>
                    <P style="font-size: 15px;"><b>SMK NEGERI 2 BANJARBARU</b></P>
                    <P style="font-size: 12px";>Jalan Nusatara Nomor 1 <img src="../assets/images/phone.png" style="width:10px; height: 10px;">/Fax(0511)4773452 Loktabat Selatan Banjarbaru</P>
                    <p style="font-size: 12px";>Website https://www.smkn2banjarbaru.sch.id Email: smkn2bjb@gmail.com</p>
                </center>
            </td>
        </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">Berita Acara Peminjaman Alat Pratek</h3>
    <table style="border: 1px solid #fff;">
    <tr>
    <td>Id Berita Acara : '.$hasil['id_berita_acara_peminjaman'].'</td>
    </tr>
    <tr>
    <td>Nama Peminjam : ' .$hasil['nm_user'].'</td>
    </tr>
    <tr>
    <td>Pada Tanggal : ' . tanggal_indo(date('Y-m-d'), true).'</td>
    </tr>
    <tr>
    <td>Jam Pelajaran Ke : ' .$hasil['waktu_pinjam'].'</td>
    </tr>
    </table>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    </tr>
    ';
    foreach($query_cek as $row_pj_alat) {
   
    $html .= '
    <tr>
    <td align="center">'.$row_pj_alat['nama_barang'].'</td>
    <td align="center">'.$row_pj_alat['jumlah'].'</td>
    </tr>
    ';
    }
    $html .= '
    </table>
    <table style="border: 1px solid #fff;">
        <tr></tr>
        <tr>
        
            <td align="right" style="width: 10%;">
            <br>
            <br>Banjarbaru, '.$hasil['tgl_pinjam'].'
            </td>
        </tr>
        
        <tr>
            <td align="right" style="width: 15%; padding-right: 45px;">
                Mengetahui
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%; padding-right: 10px">
            KEPALA BENGKEL TKJ
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 30%; padding-top: 90px; padding-right: 15px">
            Muhammad Yasa, S.Pd
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%;">
            NIP. 198111242009031002
            </td>
        </tr>
    </table>
</body>
</html>';

    

$mpdf->WriteHTML(utf8_encode($html));
ob_end_clean();
$mpdf->Output();
?>

