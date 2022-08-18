<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM entertaiment e
	INNER JOIN karyawan k ON k.nik = e.id_karyawan
	WHERE e.id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Edit
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
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Form Entertaiment</h3>
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
							<label>Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data_cek['tanggal']; ?>" />
						</div>

						<div class="form-group">
							<label>Kegiatan</label>
							<input type='text' class="form-control" name="jenis" value="<?php echo $data_cek['jenis']; ?>" />
						</div>
						<div class="form-group">
							<label>Nama Tempat</label>
							<input type='text' class="form-control" name="nama_tempat" value="<?php echo $data_cek['nama_tempat']; ?>" />
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type='text' class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>" />
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type='text' class="form-control" name="jumlah" value="<?php echo $data_cek['jumlah']; ?>" />
						</div>
						<div class="form-group">
							<label>Nama Relasi</label>
							<input type='text' class="form-control" name="nama_relasi" value="<?php echo $data_cek['nama_relasi']; ?>" />
						</div>
						<div class="form-group">
							<label>Posisi Relasi</label>
							<input type='text' class="form-control" name="posisi_relasi" value="<?php echo $data_cek['posisi_relasi']; ?>" />
						</div>
						<div class="form-group">
							<label>Perusahaan Relasi</label>
							<input type='text' class="form-control" name="perusahaan_relasi" value="<?php echo $data_cek['perusahaan_relasi']; ?>" />
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type='text' class="form-control" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>" />
						</div>
						
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_entertaiment" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE entertaiment SET

		id_karyawan='" . $_POST['id_karyawan'] . "',
		tanggal='" . $_POST['tanggal'] . "',
		jenis='" . $_POST['jenis'] . "',
		nama_tempat='" . $_POST['nama_tempat'] . "',
		alamat='" . $_POST['alamat'] . "',
		jumlah='" . $_POST['jumlah'] . "',
		nama_relasi='" . $_POST['nama_relasi'] . "',
		posisi_relasi='" . $_POST['posisi_relasi'] . "',
		perusahaan_relasi='" . $_POST['perusahaan_relasi'] . "',
		keterangan='" . $_POST['keterangan'] . "'
        WHERE id='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);

	if ($query_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_entertaiment';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_entertaiment';
            }
        })</script>";
	}
}
