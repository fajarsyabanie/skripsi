<section class="content-header">
	<h1>
		Pengajuan
		<small>Bongkaran</small>
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
					<h3 class="box-title">Tambah Pengajuan Bongkaran</h3>
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
							<label>Tanggal Bongkaran</label>
							<input type="date" name="tanggal_bongkaran" id="tanggal_bongkaran" class="form-control" />
						</div>

						<div class="form-group">
							<label>Container</label>
							<select name="container" id="container" class="form-control" required>
								<option>-- Pilih Jenis Container --</option>
								<option>20 feet</option>
								<option>40 feet</option>
							</select>
						</div>

						<div class="form-group">
							<label>Sewa Mobil</label>
							<input type="number" name="sewa_mobil" id="sewa_mobil" class="form-control" placeholder="Sewa Mobil">
						</div>

						<div class="form-group">
							<label>Makan & Minum</label>
							<input type="number" name="konsumsi" id="konsumsi" class="form-control" placeholder="Makan & Minum">
						</div>

						<div class="form-group">
							<label>Sewa Forklift</label>
							<input type="number" name="forklift" id="forklift" class="form-control" placeholder="Sewa Forklift">
						</div>

						<div class="form-group">
							<label>Ekspedisi</label>
							<input type="number" name="ekspedisi" id="ekspedisi" class="form-control" placeholder="Ekspedisi">
						</div>

						<div class="form-group">
							<label>Parkir & Tol</label>
							<input type="number" name="tol" id="tol" class="form-control" placeholder="Parkir & Tol">
						</div>

						<div class="form-group">
							<label>Lain-lain</label>
							<input type="number" name="lainnya" id="lainnya" class="form-control" placeholder="Lain-lain">
						</div>

						<div class="form-group">
							<label>Uang Muka</label>
							<input type="number" name="uang_muka" id="uang_muka" class="form-control" placeholder="Lain-lain">
						</div>

						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
							<a href="?page=MyApp/data_bongkaran" class="btn btn-warning">Batal</a>
						</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO bongkaran (id_karyawan, tanggal_bongkaran, container, sewa_mobil, 
	konsumsi, forklift, ekspedisi, tol, lainnya, uang_muka) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['tanggal_bongkaran'] . "',
          '" . $_POST['container'] . "',
          '" . $_POST['sewa_mobil'] . "',
          '" . $_POST['konsumsi'] . "',
		  '" . $_POST['forklift'] . "',
		  '" . $_POST['ekspedisi'] . "',
		  '" . $_POST['tol'] . "',
		  '" . $_POST['lainnya'] . "',
          '" . $_POST['uang_muka'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_bongkaran';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_bongkaran';
          }
      })</script>";
	}
}
