<section class="content-header">
	<h1>
		Pengajuan
		<small>Permohonan Kasbon</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website  Administrasi Keuangan PT Total Sarana Mandiri</b>
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
					<h3 class="box-title">Tambah Pengajuan Kasbon</h3>
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
							<label>Keperluan</label>
							<input type="text" name="keperluan" id="keperluan" class="form-control" placeholder="Keperluan">
						</div>

						<div class="form-group">
							<label>Biaya Kasbon</label>
							<input type="number" name="harga" id="harga" class="form-control" placeholder="Biaya Kasbon">
						</div>

					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_kasbonbeli" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO kasbon_beli (id_karyawan, id_perwakilan, tanggal, keperluan, harga) VALUES (
           '" . $_POST['id_karyawan'] . "',
           '" . $_POST['id_perwakilan'] . "',
          '" . $_POST['tanggal'] . "',
		  '" . $_POST['keperluan'] . "',
          '" . $_POST['harga'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_kasbonbeli';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_kasbonbeli';
          }
      })</script>";
	}
}
