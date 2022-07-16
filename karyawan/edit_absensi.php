<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM absensi WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Absensi
		<small>Edit Absensi</small>
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
					<h3 class="box-title">Edit Absensi</h3>
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
							<label>Nama Karyawan</label>
							<select name="id_karyawan" id="id_karyawan" class="form-control select2"  style="width: 100%;">
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
							<label>Tanggal Absensi</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data_cek['tanggal']; ?>" />
						</div>
						<div class="form-group">
							<label>Jam Masuk</label>
							<input type="time" name="jam_masuk" id="jam_masuk" class="form-control" value="<?php echo $data_cek['jam_masuk']; ?>" />
						</div>
						<div class="form-group">
							<label>Jam Pulang</label>
							<input type="time" name="jam_pulang" id="jam_pulang" class="form-control" value="<?php echo $data_cek['jam_pulang']; ?>" />
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<select name="keterangan" id="keterangan" class="form-control" value="<?php echo $data_cek['keterangan']; ?>" required>
								<option value="">-- Pilih --</option>
								<?php
								//cek data yg dipilih sebelumnya
								if ($data_cek['keterangan'] == "HADIR") echo "<option value='HADIR' selected>HADIR</option>";
								else echo "<option value='HADIR'>HADIR</option>";

								if ($data_cek['keterangan'] == "SAKIT") echo "<option value='SAKIT' selected>SAKIT</option>";
								else echo "<option value='SAKIT'>SAKIT</option>";
								
								if ($data_cek['keterangan'] == "IZIN") echo "<option value='IZIN' selected>IZIN</option>";
								else echo "<option value='IZIN'>IZIN</option>";

								if ($data_cek['keterangan'] == "CUTI") echo "<option value='CUTI' selected>CUTI</option>";
								else echo "<option value='CUTI'>CUTI</option>";

								if ($data_cek['keterangan'] == "LIBUR") echo "<option value='LIBUR' selected>LIBUR</option>";
								else echo "<option value='LIBUR'>LIBUR</option>";

								if ($data_cek['keterangan'] == "ALPA") echo "<option value='ALPA' selected>ALPA</option>";
								else echo "<option value='ALPA'>ALPA</option>";

								?>
							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=karyawan/data_absensi" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE absensi SET
		id_karyawan='" . $_POST['id_karyawan'] . "',
		tanggal='" . $_POST['tanggal'] . "',
		jam_masuk='" . $_POST['jam_masuk'] . "',
		jam_pulang='" . $_POST['jam_pulang'] . "',
		keterangan='" . $_POST['keterangan'] . "'
		WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=karyawan/data_absensi';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=karyawan/data_absensi';
            }
        })</script>";
	}
}
