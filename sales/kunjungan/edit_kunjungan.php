<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM rencana_kunjungan WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Pengajuan Bongkaran Rencana Kunjungan Ke Daerah</h3>
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
							<input type="text" name="tujuan_daerah" id="tujuan_daerah" class="form-control" value="<?php echo $data_cek['tujuan_daerah']?>">
						</div>
						
						<div class="form-group">
							<label>Tanggal Berangkat</label>
							<input type="date" name="t_berangkat" id="t_berangkat" class="form-control" value="<?php echo $data_cek['t_berangkat']?>">
						</div>
						
						<div class="form-group">
							<label>Tanggal Pulang</label>
							<input type="date" name="t_pulang" id="t_pulang" class="form-control" value="<?php echo $data_cek['t_pulang']?>">
						</div>

						<div class="form-group">
							<label>Keberangkatan</label>
							<select name="keberangkatan" id="keberangkatan" class="form-control" required>
								<option>-- Pilih Jenis Keberangkatan --</option>
								<?php
								//cek data yg dipilih sebelumnya
								if ($data_cek['keberangkatan'] == "ARMADA SENDIRI") echo "<option value='ARMADA SENDIRI' selected>ARMADA SENDIRI</option>";
								else echo "<option value='ARMADA SENDIRI'>ARMADA SENDIRI</option>";

								if ($data_cek['keberangkatan'] == "TIKET PENERBANGAN") echo "<option value='TIKET PENERBANGAN' selected>TIKET PENERBANGAN</option>";
								else echo "<option value='TIKET PENERBANGAN'>TIKET PENERBANGAN</option>";

								if ($data_cek['keberangkatan'] == "ARMADA LAIN") echo "<option value='ARMADA LAIN' selected>ARMADA LAIN</option>";
								else echo "<option value='ARMADA LAIN'>ARMADA LAIN</option>";
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Biaya Bahan Bakar</label>
							<input type="number" name="bbm" id="bbm" class="form-control" value="<?php echo $data_cek['bbm']?>">
						</div>

						<div class="form-group">
							<label>Penginapan</label>
							<input type="number" name="penginapan" id="penginapan" class="form-control" value="<?php echo $data_cek['penginapan']?>">
						</div>

						<div class="form-group">
							<label>Konsumsi</label>
							<input type="number" name="makan" id="makan" class="form-control" value="<?php echo $data_cek['makan']?>">
						</div>

						<div class="form-group">
							<label>Lainnya</label>
							<input type="number" name="lainnya" id="lainnya" class="form-control" value="<?php echo $data_cek['lainnya']?>">
						</div>

						<div class="form-group">
							<label>Tiket Berangkat</label>
							<input type="number" name="tiket_berangkat" id="tiket_berangkat" class="form-control" value="<?php echo $data_cek['tiket_berangkat']?>">
						</div>
						
						<div class="form-group">
							<label>Tiket Pulang</label>
							<input type="number" name="tiket_pulang" id="tiket_pulang" class="form-control" value="<?php echo $data_cek['tiket_pulang']?>">
						</div>

						<div class="form-group">
							<label>Tanggal Dibuat</label>
							<input type="date" name="t_dibuat" id="t_dibuat" class="form-control" value="<?php echo $data_cek['t_dibuat']?>">
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $data_cek['keterangan']?>">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_kunjungan" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE rencana_kunjungan SET
		id_karyawan='" . $_POST['id_karyawan'] . "',
		tujuan_daerah='" . $_POST['tujuan_daerah'] . "',
		t_berangkat='" . $_POST['t_berangkat'] . "',
		t_pulang='" . $_POST['t_pulang'] . "',
		keberangkatan='" . $_POST['keberangkatan'] . "',
		bbm='" . $_POST['bbm'] . "',
		penginapan='" . $_POST['penginapan'] . "',
		makan='" . $_POST['makan'] . "',
		lainnya='" . $_POST['lainnya'] . "',
		tiket_berangkat='" . $_POST['tiket_berangkat'] . "',
		tiket_pulang='" . $_POST['tiket_pulang'] . "',
        t_dibuat='" . $_POST['t_dibuat'] . "',
        keterangan='" . $_POST['keterangan'] . "'
        WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kunjungan';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kunjungan';
            }
        })</script>";
	}
}
