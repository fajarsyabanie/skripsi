<section class="content-header">
	<h1>
		Karyawan
		<small>Tambah Karyawan</small>
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
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Karyawan</h3>
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
							<label>NIK</label>
							<input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
						</div>

						<div class="form-group">
							<label>Nama Karyawan</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Karyawan">
						</div>

						<div class="form-group">
							<label>Jabatan</label>
							<select name="id_jabatan" id="id_jabatan" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from jabatan ";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id'] ?>">
									<?php echo $row['nama_jabatan'] ?>									
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
						</div>
						
						<div class="form-group">
							<label>Nomor Telpon</label>
							<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor Telpon">
						</div>

					</div>
					
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_karyawan" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO karyawan (nik,nama,id_jabatan,alamat,no_hp) VALUES (
           '".$_POST['nik']."',
          '".$_POST['nama']."',
		  '".$_POST['id_jabatan']."',
		  '".$_POST['alamat']."',
          '".$_POST['no_hp']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_karyawan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_karyawan';
          }
      })</script>";
    }
  }
    
