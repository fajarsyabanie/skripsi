<section class="content-header">
	<h1>
		Tambah
		<small>Pengisian BBM</small>
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Pengisian BBM</h3>
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
										<?php echo $row['nama_armada']; echo' - ', $row['plat'] ?>
									</option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="box-body">
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
								<input type="date" name="t_isi" id="t_isi" class="form-control" placeholder="Tanggal Pengisian BBM">
							</div>
							<div class="form-group">
								<label>Tujuan</label>
								<input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Tujuan">
							</div>
							<div class="form-group">
								<label>KM Awal</label>
								<input type="number" name="km_awal" id="km_awal" class="form-control" placeholder="KM Awal">
							</div>
							<div class="form-group">
								<label>KM Akhir</label>
								<input type="number" name="km_akhir" id="km_akhir" class="form-control" placeholder="KM Akhir">
							</div>
							<div class="form-group">
								<label>Harga/Ltr</label>
								<input type="number" name="harga" id="harga" class="form-control" placeholder="Harga/Ltr">
							</div>
							<div class="form-group">
								<label>Biaya Pengisian BBM</label>
								<input type="number" name="biaya" id="biaya" class="form-control" placeholder="Biaya Pengisian BBM">
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

	$sql_simpan = "INSERT INTO bensin (id_karyawan, id_armada, id_perwakilan, km_awal, 
	km_akhir, t_isi, tujuan, harga, biaya) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['id_armada'] . "',
          '" . $_POST['id_perwakilan'] . "',
          '" . $_POST['km_awal'] . "',
          '" . $_POST['km_akhir'] . "',
		  '" . $_POST['t_isi'] . "',
		  '" . $_POST['tujuan'] . "',
		  '" . $_POST['harga'] . "',
		  '" . $_POST['biaya'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_bensin';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_bensin';
          }
      })</script>";
	}
}
