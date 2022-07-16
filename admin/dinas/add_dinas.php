<section class="content-header">
	<h1>
		Pengajuan
		<small>Dana Perjalanan Dinas</small>
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
					<h3 class="box-title">Tambah Pengajuan Perjalanan Dinas</h3>
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
							<label>Dari</label>
							<input type="text" name="dari" id="dari" class="form-control" placeholder="Lokasi Awal">
						</div>

						<div class="form-group">
							<label>Dari Tanggal</label>
							<input type="date" name="t_berangkat" id="t_berangkat" class="form-control">
						</div>

						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="date" name="t_pulang" id="t_pulang" class="form-control" />
						</div>

						<div class="form-group">
							<label>Bagian</label>
							<input type="text" name="bagian" id="bagian" class="form-control" placeholder="Jabatan/Bagian yang Ingin Dijumpai">
						</div>

						<div class="form-group">
							<label>Tujuan</label>
							<input type="text" name="tujuan" id="tujuan" class="form-control" placeholder="Tujuan Perjalanan Dinas">
						</div>

						<div class="form-group">
							<label>Proyek</label>
							<input type="text" name="proyek" id="proyek" class="form-control" placeholder="Kegiatan Perjalanan Dinas">
						</div>

						<div class="form-group">
							<label>Tiket</label>
							<input type="number" name="j_tiket" id="j_tiket" class="form-control" placeholder="Tiket Perjalanan">
						</div>

						<div class="form-group">
							<label>Hotel/Penginapan</label>
							<input type="number" name="j_hotel" id="j_hotel" class="form-control" placeholder="Hotel/Penginapan">
						</div>

						<div class="form-group">
							<label>Biaya Taxi</label>
							<input type="number" name="j_taxi" id="j_taxi" class="form-control" placeholder="Biaya Taxi">
						</div>

						<div class="form-group">
							<label>Biaya Konsumsi</label>
							<input type="number" name="j_konsumsi" id="j_konsumsi" class="form-control" placeholder="Biaya Konsumsi">
						</div>

						<div class="form-group">
							<label>Representasi dan Entertaiment</label>
							<input type="number" name="j_entertaiment" id="j_entertaiment" class="form-control" placeholder="Representasi dan Entertaiment">
						</div>

						<div class="form-group">
							<label>lain-lain</label>
							<input type="text" name="j_lainnya" id="j_lainnya" class="form-control" placeholder="Lain-lain">
						</div>



						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
							<a href="?page=MyApp/data_dinas" class="btn btn-warning">Batal</a>
						</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO dinas (id_karyawan, dari, t_berangkat, t_pulang, bagian, tujuan, proyek, j_tiket, j_hotel, j_taxi,
		j_konsumsi, j_entertaiment, j_lainnya) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['dari'] . "',
          '" . $_POST['t_berangkat'] . "',
          '" . $_POST['t_pulang'] . "',
          '" . $_POST['bagian'] . "',
		  '" . $_POST['tujuan'] . "',
		  '" . $_POST['proyek'] . "',
		  '" . $_POST['j_tiket'] . "',
		  '" . $_POST['j_hotel'] . "',
		  '" . $_POST['j_taxi'] . "',
		  '" . $_POST['j_konsumsi'] . "',
		  '" . $_POST['j_entertaiment'] . "',
		  '" . $_POST['j_lainnya'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_dinas';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_dinas';
          }
      })</script>";
	}
}
