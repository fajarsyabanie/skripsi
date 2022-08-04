<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM kasbon_beli b
	INNER JOIN perwakilan p ON p.id = b.id_perwakilan
	INNER JOIN karyawan k ON k.nik = b.id_karyawan
	WHERE b.id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Pengajuan
		<small>Permohonan Kasbon</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Administrasi Keuangan PT Total Sarana Mandiri</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Permohonan Kasbon</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

					<div class="form-group">
							<label>Kantor Perwakilan</label>
							<select name="id_perwakilan" id="id_perwakilan" class="form-control select3" style="width: 100%;">
								<?php
								// ambil data dari database
								$query3 = "select * from perwakilan";
								$hasil3 = mysqli_query($koneksi, $query3);
								while ($row3 = mysqli_fetch_assoc($hasil3)) {
									$selected = $row3['id'] == $data_cek['id'] ? 'selected' : '';
									echo '<option ' . $selected . ' value="' . $row3['id'] . '">' . $row3['nama_perwakilan'] . '</option>';
								?>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Nama Karyawan</label>
							<select name="id_karyawan" id="id_karyawan" class="form-control select2" style="width: 100%;">
								<?php
								// ambil data dari database
								$query2 = "select * from karyawan";
								$hasil2 = mysqli_query($koneksi, $query2);
								while ($row2 = mysqli_fetch_assoc($hasil2)) {
									$selected = $row2['nik'] == $data_cek['nik'] ? 'selected' : '';
									echo '<option ' . $selected . ' value="' . $row2['nik'] . '">' . $row2['nama'] . '</option>';
								?>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Tanggal Pengajuan</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data_cek['tanggal'] ?>">
						</div>
						<div class="form-group">
							<label>Keperluan</label>
							<input type="text" name="keperluan" id="keperluan" class="form-control" value="<?php echo $data_cek['keperluan'] ?>">
						</div>

						<div class="form-group">
							<label>Biaya Kasbon</label>
							<input type="number" name="harga" id="harga" class="form-control" value="<?php echo $data_cek['harga'] ?>">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_kasbonbeli" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE kasbon_beli SET
		id_perwakilan='" . $_POST['id_perwakilan'] . "',
		id_karyawan='" . $_POST['id_karyawan'] . "',
		tanggal='" . $_POST['tanggal'] . "',
		keperluan='" . $_POST['keperluan'] . "',
		harga='" . $_POST['harga'] . "'
		WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kasbonbeli';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kasbonbeli';
            }
        })</script>";
	}
}
