<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM dinas WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
				<b>Website Administrasi keuangan PT Total Sarana Mandiri</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_kunjungan" title="Tambah Data" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Rencana Kunjungan</a>
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
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Karyawan</th>
							<th>Tujuan Daerah</th>
							<th>Periode</th>
							<th>Keberangkatan</th>
							<th>Total Kasbon</th>
							<th>Keterangan</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT R.*, K.nama from rencana_kunjungan R 
						INNER JOIN karyawan K ON R.id_karyawan = K.nik ORDER BY 
				  		t_dibuat DESC");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php echo $data['tujuan_daerah']; ?>
								</td>
								<td>
									<?php echo date('d M Y',strtotime($data['t_berangkat'])) ,' - ',  date('d M Y',strtotime($data['t_pulang']));?> 
								</td>
								<td>
									<?php echo $data['keberangkatan']; ?>
								</td>
								<td>
									<?php echo 'Rp ', number_format ($data['bbm']+$data['penginapan']+$data['makan']+$data['tiket_berangkat']+$data['tiket_pulang']); ?>
								</td>
								<td>
									<?php echo $data['keterangan']; ?>
								</td>

								<td>
									<a href="?page=MyApp/edit_kunjungan&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="?page=MyApp/del_kunjungan&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
										<i class="glyphicon glyphicon-trash"></i>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>