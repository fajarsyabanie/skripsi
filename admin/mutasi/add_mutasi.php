<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<section class="content-header">
	<h1>
		Laporan
		<small>Arus Kas Keluar</small>
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
					<h3 class="box-title">Tambah Laporan</h3>
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
							<label>Kantor Perwakilan</label>
							<select name="id_cabang" id="id_cabang" class="form-control select2" style="width: 100%;">
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

						<div class="row">
							<div class="form-group col-md-6">
								<label>Dari Tanggal</label>
								<input type="date" name="t_awal" id="t_awal" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Sampai Tanggal</label>
								<input type="date" name="t_akhir" id="t_akhir" class="form-control">
							</div>
						</div>



						<h4 class="box-title box-footer">Dana Masuk</h4>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Dana Masuk</label>
								<input type="number" name="dana_masuk" id="dana_masuk" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Dana Pegangan</label>
								<input type="number" name="dana_pegangan" id="dana_pegangan" class="form-control">
							</div>
						</div>



						<h4 class="box-title box-footer">Dana Keluar</h4>

						<div class="control-group after-add-more">
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
						<!-- /.box-body -->

						<div class="box-footer">
							<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
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
						$(this).parents(".control-group").remove();
					});
				});
			</script>
			<!-- /.box -->
</section>

<?php

if (isset($_POST['Simpan'])) {

	$sql_simpan = "INSERT INTO mutasi (id_cabang, id_karyawan, t_awal, t_akhir) VALUES (
           '" . $_POST['id_cabang'] . "',
          '" . $_POST['id_karyawan'] . "',
          '" . $_POST['t_awal'] . "',
          '" . $_POST['t_akhir'] . "')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	$id_terakhir = mysqli_insert_id($koneksi);

	$sql_simpan2 = "INSERT INTO mutasi_tambah (id_mutasi, dana_masuk, dana_pegangan) VALUES (
		$id_terakhir,
		'".$_POST['dana_masuk']."',
		'".$_POST['dana_pegangan']."')";
		$query_simpan2 = mysqli_query($koneksi, $sql_simpan2);

	//memasukkan data ke array
	$id_mutasi       = $id_terakhir;
	$tanggal         = $_POST['tanggal'];
	$rincian     = $_POST['rincian'];
	$biaya     = $_POST['biaya'];

	$jumlah_data = $_POST['tanggal'];
	for ($i = 0; $i < sizeof($jumlah_data) - 1; $i++) {

		mysqli_query($koneksi, "INSERT INTO mutasi_rinci SET
			id_mutasi = $id_mutasi,
            tanggal    = '$tanggal[$i]',
            rincian      = '$rincian[$i]',
            biaya      = '$biaya[$i]'
        ");
	}
	//mysqli_close($koneksi);

	if ($query_simpan) {

		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_mutasi';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_mutasi';
          }
      })</script>";
	}
}
