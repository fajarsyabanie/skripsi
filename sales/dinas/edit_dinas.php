<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM dinas d
		INNER JOIN karyawan k on k.nik = d.id_karyawan
		WHERE d.id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
<h1>
		Pengajuan
		<small>Dana Perjalanan Dinas</small>
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
					<h3 class="box-title">Ubah Pengajuan Perjalanan Dinas</h3>
					<!-- <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div> -->
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
							<label>Dari</label>
							<input type='text' class="form-control" name="dari" value="<?php echo $data_cek['dari']; ?>" />
						</div>

						<div class="form-group">
							<label>Dari Tanggal</label>
							<input type="date" name="t_berangkat" id="t_berangkat" class="form-control" value="<?php echo $data_cek['t_berangkat']; ?>" />
						</div>

						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="date" name="t_pulang" id="t_pulang" class="form-control" value="<?php echo $data_cek['t_pulang']; ?>" />
						</div>


						<div class="form-group">
							<label>Bagian</label>
							<input type='text' class="form-control" name="bagian" value="<?php echo $data_cek['bagian']; ?>" />
						</div>

						<div class="form-group">
							<label>Tujuan</label>
							<input type='text' class="form-control" name="tujuan" value="<?php echo $data_cek['tujuan']; ?>" />
						</div>

						<div class="form-group">
							<label>Proyek</label>
							<input type='text' class="form-control" name="proyek" value="<?php echo $data_cek['proyek']; ?>" />
						</div>

						<div class="form-group">
							<label>Tiket</label>
							<input type='number' class="form-control" name="j_tiket" value="<?php echo $data_cek['j_tiket']; ?>" />
						</div>

						<div class="form-group">
							<label>Hotel/Penginapan</label>
							<input type='number' class="form-control" name="j_hotel" value="<?php echo $data_cek['j_hotel']; ?>" />
						</div>

						<div class="form-group">
							<label>Biaya Taxi</label>
							<input type='number' class="form-control" name="j_taxi" value="<?php echo $data_cek['j_taxi']; ?>" />
						</div>

						<div class="form-group">
							<label>Biaya Konsumsi</label>
							<input type='number' class="form-control" name="j_konsumsi" value="<?php echo $data_cek['j_konsumsi']; ?>" />
						</div>

						<div class="form-group">
							<label>Representasi dan Entertaiment</label>
							<input type='number' class="form-control" name="j_entertaiment" value="<?php echo $data_cek['j_entertaiment']; ?>" />
						</div>

						<div class="form-group">
							<label>Lain-lain</label>
							<input type='number' class="form-control" name="j_lainnya" value="<?php echo $data_cek['j_lainnya']; ?>" />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyAppSales/data_dinas" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE dinas SET
		id_karyawan='".$_POST['id_karyawan']."',
		dari='".$_POST['dari']."',
		t_berangkat='".$_POST['t_berangkat']."',
		t_pulang='".$_POST['t_pulang']."',
		bagian='".$_POST['bagian']."',
		tujuan='".$_POST['tujuan']."',
		proyek='".$_POST['proyek']."',
		j_tiket='".$_POST['j_tiket']."',
		j_hotel='".$_POST['j_hotel']."',
		j_taxi='".$_POST['j_taxi']."',
		j_konsumsi='".$_POST['j_konsumsi']."',
		j_entertaiment='".$_POST['j_entertaiment']."',
        j_lainnya='".$_POST['j_lainnya']."'
        WHERE id='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyAppSales/data_dinas';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyAppSales/data_dinas';
            }
        })</script>";
    }
}

