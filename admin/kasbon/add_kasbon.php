<section class="content-header">
	<h1>
		Pengajuan
		<small>Permohonan Peminjaman Karyawan</small>
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
					<h3 class="box-title">Tambah Pengajuan Peminjaman</h3>
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
							<label>Tanggal Pengajuan</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control">
						</div>
						<div class="form-group">
							<label>Besarnya Pinjaman</label>
							<input type="number" name="besar_pinjaman" id="besar_pinjaman" class="form-control" placeholder="Besarnya Pinjaman">
						</div>

						<div class="form-group">
							<label>Keperluan Peminjaman</label>
							<input type="text" name="keperluan" id="keperluan" class="form-control" placeholder="Keperluan Peminjaman">
						</div>

						<div class="form-group">
							<label>Jangka Waktu(Berapa Bulan)</label>
							<input type="text" name="jangka_waktu" id="jangka_waktu" class="form-control" placeholder="Jangka Waktu">
						</div>

						<div class="form-group">
							<label>Jumlah Pemotongan</label>
							<input type="number" name="jumlah_pemotongan" id="stok" class="form-control" placeholder="Jumlah Pemotongan">
						</div>

						<div class="form-group">
							<label>Cara Pengembalian</label>
							<select name="cara_pengembalian" id="cara_pengembalian" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Pemotongan Gaji</option>
								<option>Pemotongan Komisi</option>
								<option>Pemotongan Fee</option>
							</select>
						</div>
					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_kasbon" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO kasbon (id_karyawan, tanggal, besar_pinjaman, keperluan, jangka_waktu, jumlah_pemotongan, cara_pengembalian) VALUES (
           '" . $_POST['id_karyawan'] . "',
           '" . $_POST['tanggal'] . "',
          '" . $_POST['besar_pinjaman'] . "',
		  '" . $_POST['keperluan'] . "',
		  '" . $_POST['jangka_waktu'] . "',
		  '" . $_POST['jumlah_pemotongan'] . "',
          '" . $_POST['cara_pengembalian'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_kasbon';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_kasbon';
          }
      })</script>";
	}
}
