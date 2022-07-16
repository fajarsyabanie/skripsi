<section class="content-header">
	<h1>
		Pengajuan
		<small>Rencana Kunjungan Ke Daerah</small>
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
					<h3 class="box-title">Tambah Pengajuan Rencana Kunjungan Ke Daerah</h3>
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
							<label>Tujuan Daerah</label>
							<input type="text" name="tujuan_daerah" id="tujuan_daerah" class="form-control" placeholder="Tujuan Daerah Kunjungan">
						</div>
						
						<div class="form-group">
							<label>Tanggal Berangkat</label>
							<input type="date" name="t_berangkat" id="t_berangkat" class="form-control" placeholder="Tanggal Berangkat">
						</div>
						
						<div class="form-group">
							<label>Tanggal Pulang</label>
							<input type="date" name="t_pulang" id="t_pulang" class="form-control" placeholder="Tanggal Pulang">
						</div>

						<div class="form-group">
							<label>Keberangkatan</label>
							<select name="keberangkatan" id="keberangkatan" class="form-control" required>
								<option>-- Pilih Jenis Keberangkatan --</option>
								<option>ARMADA SENDIRI</option>
								<option>TIKET PENERBANGAN</option>
								<option>ARMADA LAIN</option>
							</select>
						</div>

						<div class="form-group">
							<label>Biaya Bahan Bakar</label>
							<input type="number" name="bbm" id="bbm" class="form-control" placeholder="Biaya Bahan Bakar">
						</div>

						<div class="form-group">
							<label>Penginapan</label>
							<input type="number" name="penginapan" id="penginapan" class="form-control" placeholder="Biaya Penginapan">
						</div>

						<div class="form-group">
							<label>Konsumsi</label>
							<input type="number" name="makan" id="makan" class="form-control" placeholder="Biaya Konsumsi">
						</div>

						<div class="form-group">
							<label>Lainnya</label>
							<input type="number" name="lainnya" id="lainnya" class="form-control" placeholder="Biaya lain – lain">
						</div>

						<div class="form-group">
							<label>Tiket Berangkat</label>
							<input type="number" name="tiket_berangkat" id="tiket_berangkat" class="form-control" placeholder="Tiket Berangkat">
						</div>
						
						<div class="form-group">
							<label>Tiket Pulang</label>
							<input type="number" name="tiket_pulang" id="tiket_pulang" class="form-control" placeholder="Tiket Berangkat">
						</div>

						<div class="form-group">
							<label>Tanggal Dibuat</label>
							<input type="date" name="t_dibuat" id="t_dibuat" class="form-control" placeholder="Tanggal Dibuat">
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
						</div>

						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
							<a href="?page=MyApp/data_kunjungan" class="btn btn-warning">Batal</a>
						</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO rencana_kunjungan (id_karyawan, tujuan_daerah, t_berangkat, t_pulang, 
	keberangkatan, bbm, penginapan, makan, lainnya, tiket_berangkat, tiket_pulang, t_dibuat, keterangan) VALUES (
           '" . $_POST['id_karyawan'] . "',
          '" . $_POST['tujuan_daerah'] . "',
          '" . $_POST['t_berangkat'] . "',
          '" . $_POST['t_pulang'] . "',
          '" . $_POST['keberangkatan'] . "',
		  '" . $_POST['bbm'] . "',
		  '" . $_POST['penginapan'] . "',
		  '" . $_POST['makan'] . "',
		  '" . $_POST['lainnya'] . "',
		  '" . $_POST['tiket_berangkat'] . "',
		  '" . $_POST['tiket_pulang'] . "',
          '" . $_POST['t_dibuat'] . "',
          '" . $_POST['keterangan'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_kunjungan';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_kunjungan';
          }
      })</script>";
	}
}
