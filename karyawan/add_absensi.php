<section class="content-header">
	<h1>
		Absensi
		<small>Tambah Absensi</small>
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Absensi</h3>
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
							<label>Tanggal Absensi</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" />
						</div>
						<div class="form-group">
							<label>Jam Masuk</label>
							<input type="time" name="jam_masuk" id="jam_masuk" class="form-control" />
						</div>
						<div class="form-group">
							<label>Jam Pulang</label>
							<input type="time" name="jam_pulang" id="jam_pulang" class="form-control" />
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<select name="keterangan" id="keterangan" class="form-control" required>
								<option>-- Pilih --</option>
								<option>HADIR</option>
							</select>
						</div>

						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
							<a href="?page=karyawan/data_absensi" class="btn btn-warning">Batal</a>
						</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO absensi (id_karyawan, tanggal, jam_masuk, jam_pulang, 
	keterangan) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['tanggal'] . "',
          '" . $_POST['jam_masuk'] . "',
          '" . $_POST['jam_pulang'] . "',
          '" . $_POST['keterangan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=karyawan/data_absensi';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=karyawan/add_absensi';
          }
      })</script>";
	}
}
