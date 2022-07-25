<section class="content-header">
	<h1>
		Tambah
		<small>Form Entertaiment</small>
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
					<h3 class="box-title">Tambah Form Entertaiment</h3>
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
							<label>Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" />
						</div>

						<div class="form-group">
							<label>Kegiatan</label>
							<input type="Text" name="jenis" id="jenis" class="form-control" placeholder="Nama Kegiatan Entertaiment">
						</div>

						<div class="form-group">
							<label>Nama Tempat</label>
							<input type="text" name="nama_tempat" id="nama_tempat" class="form-control" placeholder="Nama Tempat">
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Tempat">
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
						</div>

						<div class="form-group">
							<label>Nama Relasi</label>
							<input type="text" name="nama_relasi" id="nama_relasi" class="form-control" placeholder="Nama Relasi">
						</div>

						<div class="form-group">
							<label>Posisi Relasi</label>
							<input type="text" name="posisi_relasi" id="posisi_relasi" class="form-control" placeholder="Posisi Relasi">
						</div>

						<div class="form-group">
							<label>Perusahaan Relasi</label>
							<input type="text" name="perusahaan_relasi" id="perusahaan_relasi" class="form-control" placeholder="Perusahaan Relasi">
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
						</div>

						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
							<a href="?page=MyApp/data_entertaiment" class="btn btn-warning">Batal</a>
						</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO entertaiment (id_karyawan, tanggal, jenis, nama_tempat, 
	alamat, jumlah, nama_relasi, posisi_relasi, perusahaan_relasi, keterangan) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['tanggal'] . "',
          '" . $_POST['jenis'] . "',
          '" . $_POST['nama_tempat'] . "',
          '" . $_POST['alamat'] . "',
		  '" . $_POST['jumlah'] . "',
		  '" . $_POST['nama_relasi'] . "',
		  '" . $_POST['posisi_relasi'] . "',
          '" . $_POST['perusahaan_relasi'] . "',
          '" . $_POST['keterangan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_entertaiment';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_entertaiment';
          }
      })</script>";
	}
}
