<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM kasbon_beli WHERE id='" . $_GET['kode'] . "'";
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
							<label>Perwakilan</label>
							<select name="id_perwakilan" id="id_perwakilan" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih Perwakilan --</option>
								<?php
								// ambil data dari database
								$query = "select * from perwakilan ";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id'] ?>">
										<?php echo $row['nama_perwakilan'] ?>
									</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Nama Karyawan</label>
							<select name="id_karyawan" id="id_karyawan" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from karyawan ";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['nik'] ?>">
										<?php echo $row['nama'] ?>
									</option>
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
						<a href="?page=MyApp/data_kasbon" class="btn btn-warning">Batal</a>
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
		harga='" . $_POST['harga'] . "',";
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
