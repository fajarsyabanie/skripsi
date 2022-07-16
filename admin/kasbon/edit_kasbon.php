<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM kasbon WHERE id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Permohonan Peminjaman Karyawan</h3>
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
								<option selected="selected">-- Pilih --</option>
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
							<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data_cek['tanggal']; ?>">
						</div>

						<div class="form-group">
							<label>Besarnya Pinjaman</label>
							<input type='number' class="form-control" name="besar_pinjaman" value="<?php echo $data_cek['besar_pinjaman']; ?>">
						</div>

						<div class="form-group">
							<label>Keperluan Peminjaman</label>
							<input type='text' class="form-control" name="keperluan" value="<?php echo $data_cek['keperluan']; ?>">
						</div>

						<div class="form-group">
							<label>Jangka Waktu(Bulan)</label>
							<input type='text' class="form-control" name="jangka_waktu" value="<?php echo $data_cek['jangka_waktu']; ?>">
						</div>

						<div class="form-group">
							<label>Jumlah Pemotongan</label>
							<input type='number' class="form-control" name="jumlah_pemotongan" value="<?php echo $data_cek['jumlah_pemotongan']; ?>">
						</div>

						<div class="form-group">
							<label>Cara Pengembalian</label>
							<select name="cara_pengembalian" id="cara_pengembalian" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
								//cek data yg dipilih sebelumnya
								if ($data_cek['cara_pengembalian'] == "Pemotongan Gaji") echo "<option value='Pemotongan Gaji' selected>Pemotongan Gaji</option>";
								else echo "<option value='Pemotongan Gaji'>Pemotongan Gaji</option>";

								if ($data_cek['cara_pengembalian'] == "Pemotongan Komisi") echo "<option value='Pemotongan Komisi' selected>Pemotongan Komisi</option>";
								else echo "<option value='Pemotongan Komisi'>Pemotongan Komisi</option>";

								if ($data_cek['cara_pengembalian'] == "Pemotongan Fee") echo "<option value='Pemotongan Fee' selected>Pemotongan Fee</option>";
								else echo "<option value='Pemotongan Fee'>Pemotongan Fee</option>";
								?>
							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_kasbon" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE kasbon SET
		id_karyawan='" . $_POST['id_karyawan'] . "',
		tanggal='" . $_POST['tanggal'] . "',
		besar_pinjaman='" . $_POST['besar_pinjaman'] . "',
		keperluan='" . $_POST['keperluan'] . "',
		jangka_waktu='" . $_POST['jangka_waktu'] . "',
		jumlah_pemotongan='" . $_POST['jumlah_pemotongan'] . "',
		cara_pengembalian='" . $_POST['cara_pengembalian'] . "'
        WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kasbon';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_kasbon';
            }
        })</script>";
	}
}
