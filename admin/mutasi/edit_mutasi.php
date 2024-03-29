<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM mutasi m 
	INNER JOIN karyawan k ON k.nik = m.id_karyawan 
	INNER JOIN perwakilan p ON m.id_cabang = p.id
	WHERE m.id='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

	$sql_cek3 ="SELECT * FROM mutasi_tambah WHERE id_mutasi = '".$_GET['kode']."'";
	$query_cek3 = mysqli_query($koneksi, $sql_cek3);
	$data_cek3 = mysqli_fetch_array($query_cek3, MYSQLI_BOTH);
}
?>

<section class="content-header">
	<h1>
		Edit
		<small>Mutasi Kas Kecil</small>
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
					<h3 class="box-title">Edit Data Mutasi Kas Kecil</h3>
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
							<label>Kantor Perwakilan</label>
							<select name="id_cabang" id="id_cabang" class="form-control select3" style="width: 100%;">
								<?php
								// ambil data dari database
								$query3 = "select * from perwakilan";
								$hasil3 = mysqli_query($koneksi, $query3);
								while ($row3 = mysqli_fetch_assoc($hasil3)) {
									$selected = $row3['id'] == $data_cek['id'] ? 'selected' : '';
									echo '<option ' . $selected . ' value="' . $row3['id'] . '">' . $row3['nama_perwakilan'] . '</option>';
								?>
								<?php
								}
								?>
							</select>
						</div>

						<!-- <div class="form-group">
							<label>Kantor Perwakilan</label>
							<?php
							$sql = $koneksi->query("SELECT M.*, P.nama_perwakilan FROM mutasi M INNER JOIN perwakilan P ON M.id_cabang = P.id WHERE M.id='" . $_GET['kode'] . "' ");
							while ($data = $sql->fetch_assoc()) {
							?>
								<input type='text' class="form-control" name="id_cabang" id="id_cabang" value="<?php echo $data['nama_perwakilan']; ?>" readonly />
							<?php
							}
							?>
						</div> -->


						<div class="row">
							<div class="form-group col-md-6">
								<label>Dari Tanggal</label>
								<input type="date" name="t_awal" class="form-control" value="<?php echo $data_cek['t_awal']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Sampai Tanggal</label>
								<input type="date" name="t_akhir" class="form-control" value="<?php echo $data_cek['t_akhir']; ?>">
							</div>
						</div>

						<h4 class="box-title box-footer">Dana Masuk</h4>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Dana Masuk</label>
								<input type="number" name="dana_masuk" id="dana_masuk" class="form-control" value="<?php echo $data_cek3['dana_masuk'];?>">
							</div>
							<div class="form-group col-md-6">
								<label>Dana Pegangan</label>
								<input type="number" name="dana_pegangan" id="dana_pegangan" class="form-control" value="<?php echo $data_cek3['dana_pegangan'];?>">
							</div>
						</div>

						<h4 class="box-title box-footer">Rincian Keluar</h4>
						<div class="control-group after-add-more">
							<?php
							$sql_cek2 = "SELECT * FROM mutasi_rinci WHERE id_mutasi='" . $_GET['kode'] . "'";
							$query_cek2 = mysqli_query($koneksi, $sql_cek2);
							while ($data_cek2 = mysqli_fetch_assoc($query_cek2)) { ?>
								<div class="control-group">
									<div class="form-group">
										<label>Rincian</label>
										<input type="text" name="rincian[]" id="rincian" class="form-control" placeholder="Rincian Nota" value="<?= $data_cek2['rincian'] ?>">
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label>Tanggal Nota</label>
											<input type="date" name="tanggal[]" id="tanggal" class="form-control" placeholder="Tanggal Nota" value="<?= $data_cek2['tanggal'] ?>">
										</div>

										<div class="form-group col-sm-6">
											<label>Harga</label>
											<input type="text" name="biaya[]" id="biaya" class="form-control" placeholder="Harga" value="<?= $data_cek2['biaya'] ?>">
										</div>
									</div>
									<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
								</div>
							<?php } ?>
						</div>
						<br>
						<button class="btn btn-success add-more" type="button">
							<i class="glyphicon glyphicon-plus"></i> Add
						</button>

						<!-- hide -->

						<div class="copy hide">
							<div class="control-group ">
								<div class="form-group">
									<label>Rincian</label>
									<input type="text" name="rincian[]" id="rincian" class="form-control" placeholder="Rincian Nota">
								</div>
								<div class="row">
									<div class="form-group col-sm-6">
										<label>Tanggal Nota</label>
										<input type="date" name="tanggal[]" id="tanggal" class="form-control" placeholder="Tanggal Nota">
									</div>

									<div class="form-group col-sm-6">
										<label>Harga</label>
										<input type="text" name="biaya[]" id="biaya" class="form-control" placeholder="Harga">
									</div>
								</div>

								<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>

							</div>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_mutasi" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".add-more").click(function() {
						var html = $(".copy").html();
						$(".after-add-more").after(html);
					});

					// saat tombol remove dklik control group akan dihapus 
					$("body").on("click", ".remove", function() {
						$(this).parent(".control-group").remove();
					});
				});
			</script>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Ubah'])) {
	//mulai proses ubah
	$sql_ubah = "UPDATE mutasi SET 
	id_cabang='" . $_POST['id_cabang'] . "',
	id_karyawan='" . $_POST['id_karyawan'] . "',
	t_awal='" . $_POST['t_awal'] . "',
	t_akhir='" . $_POST['t_akhir'] . "'
	WHERE id='" . $_GET['kode'] . "'";
	$sql_ubah = mysqli_query($koneksi, $sql_ubah);

	$sql_ubah = "UPDATE mutasi_tambah SET 
	dana_masuk='" . $_POST['dana_masuk'] . "',
	dana_pegangan='" . $_POST['dana_pegangan'] . "'
	WHERE id_mutasi='" . $_GET['kode'] . "'";
	$sql_ubah = mysqli_query($koneksi, $sql_ubah);


	//memasukkan data ke array
	$id_mutasi       = $_GET['kode'];
	$tanggal         = $_POST['tanggal'];
	$rincian     = $_POST['rincian'];
	$biaya     = $_POST['biaya'];

	$jumlah_data = $_POST['tanggal'];

	$delete = "DELETE FROM mutasi_rinci WHERE id_mutasi=$id_mutasi";
	$delete_cek = mysqli_query($koneksi, $delete);
	for ($i = 0; $i < sizeof($jumlah_data) - 1; $i++) {

		mysqli_query($koneksi, "INSERT INTO  mutasi_rinci SET
		 id_mutasi = $id_mutasi,
		 tanggal    = '$tanggal[$i]',
		 rincian      = '$rincian[$i]',
		 biaya      = '$biaya[$i]'
	 ");
	}

	if ($sql_ubah) {
		echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_mutasi';
            }
        })</script>";
	} else {
		echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_mutasi';
            }
        })</script>";
	}
}
