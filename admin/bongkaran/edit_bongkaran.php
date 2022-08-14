<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM bongkaran b
	INNER JOIN karyawan k ON k.nik = b.id_karyawan
	WHERE b.id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Pengajuan
		<small>Bongkaran</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Website Administrasi keuangan PT Total Sarana Mandiri</b>
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
					<h3 class="box-title">Edit Pengajuan Bongkaran</h3>
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
								<?php
								// ambil data dari database
								$query2 = "select * from karyawan";
								$hasil2 = mysqli_query($koneksi, $query2);
								while ($row2 = mysqli_fetch_assoc($hasil2)) {
									$selected = $row2['nik'] == $data_cek['nik'] ? 'selected' : '';
									echo '<option ' . $selected . ' value="' . $row2['nik'] . '">' . $row2['nama'] . '</option>';
								?>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Tanggal Bongkaran</label>
							<input type="date" name="tanggal_bongkaran" id="tanggal_bongkaran" class="form-control" value="<?php echo $data_cek['tanggal_bongkaran']; ?>" />
						</div>

						<div class="form-group">
							<label>Container</label>
							<select name="container" id="container" class="form-control" required>
								<option value="">-- Pilih Jenis Kontainer --</option>
								<?php
								//cek data yg dipilih sebelumnya
								if ($data_cek['container'] == "20 feet") echo "<option value='20 feet' selected>20 feet</option>";
								else echo "<option value='20 feet'>20 feet</option>";

								if ($data_cek['container'] == "40 feet") echo "<option value='40 feet' selected>40 feet</option>";
								else echo "<option value='40 feet'>40 feet</option>";
								?>
							</select>
						</div>


						<div class="form-group">
							<label>Sewa Mobil</label>
							<input type='number' class="form-control" name="sewa_mobil" value="<?php echo $data_cek['sewa_mobil']; ?>" />
						</div>

						<div class="form-group">
							<label>Makan & Minum</label>
							<input type='number' class="form-control" name="konsumsi" value="<?php echo $data_cek['konsumsi']; ?>" />
						</div>

						<div class="form-group">
							<label>Sewa Forklift</label>
							<input type='number' class="form-control" name="forklift" value="<?php echo $data_cek['forklift']; ?>" />
						</div>

						<div class="form-group">
							<label>Ekspedisi</label>
							<input type='number' class="form-control" name="ekspedisi" value="<?php echo $data_cek['ekspedisi']; ?>" />
						</div>

						<div class="form-group">
							<label>Parkir & Tol</label>
							<input type='number' class="form-control" name="tol" value="<?php echo $data_cek['tol']; ?>" />
						</div>

						<div class="form-group">
							<label>Lain-lain</label>
							<input type='number' class="form-control" name="lainnya" value="<?php echo $data_cek['lainnya']; ?>" />
						</div>

						<div class="form-group">
							<label>Uang Muka</label>
							<input type='number' class="form-control" name="uang_muka" value="<?php echo $data_cek['uang_muka']; ?>" />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_bongkaran" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE bongkaran SET
		tanggal_bongkaran='" . $_POST['tanggal_bongkaran'] . "',
		container='" . $_POST['container'] . "',
		sewa_mobil='" . $_POST['sewa_mobil'] . "',
		konsumsi='" . $_POST['konsumsi'] . "',
		forklift='" . $_POST['forklift'] . "',
		ekspedisi='" . $_POST['ekspedisi'] . "',
		tol='" . $_POST['tol'] . "',
		lainnya='" . $_POST['lainnya'] . "',
        uang_muka='" . $_POST['uang_muka'] . "'
        WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_bongkaran';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_bongkaran';
            }
        })</script>";
	}
}
