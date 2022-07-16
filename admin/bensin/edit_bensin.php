<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM bensin WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Edit
		<small>Pengisian BBM</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Absensi dan Administrasi keuangan PT Total Sarana Mandiri</b>
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
					<h3 class="box-title">Edit Pengisian BBM</h3>
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
							<label>Jenis Kendaraan</label>
							<select name="id_armada" id="id_armada" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih Armada --</option>
								<?php
								// ambil data dari database
								$query = "select * from armada ";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
									<option value="<?php echo $row['id'] ?>">
										<?php echo $row['nama_armada'], $row['plat'] ?>
									</option>
								<?php
								}
								?>
							</select>
						</div>

					<div class="form-group">
								<label>Nama Karyawan Mengisi BBM</label>
								<select name="id_karyawan" id="id_karyawan" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih Nama Karyawan --</option>
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
								<label>Tanggal Pengisian BBM</label>
								<input type='date' class="form-control" name="t_isi" value="<?php echo $data_cek['t_isi']; ?>">
							</div>
							<div class="form-group">
								<label>Tujuan</label>
								<input type='text' class="form-control" name="tujuan" value="<?php echo $data_cek['tujuan']; ?>" />
							</div>
							<div class="form-group">
								<label>KM Awal</label>
								<input type='number' class="form-control" name="km_awal" value="<?php echo $data_cek['km_awal']; ?>" />
							</div>
							<div class="form-group">
								<label>KM Akhir</label>
								<input type='number' class="form-control" name="km_akhir" value="<?php echo $data_cek['km_akhir']; ?>" />
							</div>
							<div class="form-group">
								<label>Harga/Ltr</label>
								<input type='number' class="form-control" name="harga" value="<?php echo $data_cek['harga']; ?>" />
							</div>
							<div class="form-group">
								<label>Biaya Pengisian BBM</label>
								<input type='number' class="form-control" name="biaya" value="<?php echo $data_cek['biaya']; ?>" />
							</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_bensin" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE bensin SET
		id_karyawan='" . $_POST['id_karyawan'] . "',
		id_armada='" . $_POST['id_armada'] . "',
		id_perwakilan='" . $_POST['id_perwakilan'] . "',
		km_awal='" . $_POST['km_awal'] . "',
		km_akhir='" . $_POST['km_akhir'] . "',
		t_isi='" . $_POST['t_isi'] . "',
		tujuan='" . $_POST['tujuan'] . "',
		harga='" . $_POST['harga'] . "',
        biaya='" . $_POST['biaya'] . "'
        WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_bensin';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_bensin';
            }
        })</script>";
	}
}
