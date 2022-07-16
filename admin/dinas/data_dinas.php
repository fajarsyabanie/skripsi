<section class="content-header">
	<h1>
		Pengajuan
		<small>Dana Perjalanan Dinas</small>
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
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=MyApp/add_dinas" title="Tambah Pengajuan Perjalanan Dinas" class="btn btn-primary">
				<i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan Perjalanan Dinas</a>
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
							<th>NO</th>
							<th>Nama</th>
							<th>Berangkat Dari</th>
							<th>Tanggal Berangkat</th>
							<th>Tanggal Pulang</th>
							<th>Tujuan</th>
							<th>Total Pengajuan</th>
							<th>Kelola</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT D.*, K.nama FROM dinas D INNER JOIN karyawan K ON D.id_karyawan = K.nik ORDER BY 
						t_berangkat DESC");
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
									<?php echo $data['dari']; ?>
								</td>
								<td>
									<?php echo date('l,d M Y',strtotime($data['t_berangkat'])); ?>
								</td>
								<td>
									<?php echo date('l,d M Y',strtotime($data['t_pulang'])); ?>
								</td>
								<td>
									<?php echo $data['tujuan']; ?>
								</td>
								<td>
									<?php echo 'Rp ',number_format ($data['j_tiket']+$data['j_hotel']+$data['j_taxi']+$data['j_konsumsi']+$data['j_entertaiment']+$data['j_lainnya']) ; ?>  
								</td>

								<td>
									<a href="?page=MyApp/edit_dinas&kode=<?php echo $data['id']; ?>" title="Ubah" class="btn btn-success">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="?page=MyApp/del_dinas&kode=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')" title="Hapus" class="btn btn-danger">
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