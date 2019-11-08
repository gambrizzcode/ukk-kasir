<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

if (!$_SESSION['id_kasir']) {
	header("location:logout.php");
}
else{
	$queryKasir = mysql_query("SELECT * FROM kasir WHERE id_kasir = '$_SESSION[id_kasir]'");
	$isiKasir = mysql_fetch_array($queryKasir);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Buku | Kasirian</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.css">
</head>
<!-- Author : Syaikhu Rizal -->
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<strong>Email: </strong>permanen29@gmail.com
					&nbsp;&nbsp;
					<strong>Telepon: </strong>+62 812-3085-6890
				</div>
			</div>
		</div>
	</header>

	<div class="navbar navbar-inverse set-radius-zero">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">
					<!-- <img src="assets/img/logo.PNG" style="border-radius: 5px;width: 220px;"> -->
					<h1 style="color:cyan;cursor:default"><b>KASIRIAN</b></h1>
				</a>
			</div>

			<div class="left-div">
				<div class="user-settings-wrapper">
					<ul class="nav">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								<span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
							</a>
							<div class="dropdown-menu dropdown-settings">
								<div class="media">
									<h4 class="media-heading"><?php echo $isiKasir['nama']; ?></h4>
									<h5><?php echo $isiKasir['akses']; ?></h5>
								</div>
								<hr />
								<a href="logout.php" class="btn btn-danger btn-block btn-sm">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>

	<section class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-collapse collapse">
						<ul id="menu-top" class="nav navbar-nav navbar-right">
							<li><a href="penjualan.php">Penjualan</a></li>
							<li><a href="pembelian.php">Pembelian</a></li>
							<li><a class="menu-top-active" href="buku.php">Buku</a></li>
							<li><a href="distributor.php">Distributor</a></li>
							<li><a href="laporan.php">Laporan</a></li>
							<?php
							if ($isiKasir['akses'] == 'ADMIN') {
								echo "<li><a href='kasir.php'>Kasir</a></li>";
							}else{};
							?>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>

	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="page-head-line">
						<i class="fa fa-book"></i> DATA MASTER BUKU 
						<button type="button" class="btn btn-flat btn-info pull-right" data-toggle="modal" data-target="#modalTambah">TAMBAH BUKU <i class="fa fa-plus"></i></button>
					</h4>
				</div>
			</div>

			<div class="modal fade" id="modalTambah" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h3>Tambah Buku</h3>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<?php
										$ambilBuku = mysql_query("SELECT * FROM buku ORDER BY id_buku DESC");
										$idBuku = mysql_fetch_array($ambilBuku);
										?>
										<label>ID BUKU : <b><?php echo $idBuku[0]+1; ?></b></label>
										<input type="hidden" id="id_buku" value="<?php echo $idBuku[0]+1; ?>"><br>
										<label>JUDUL</label>
										<input type="text" id="judul" class="form-control">
										<label>NO ISBN</label>
										<input type="text" id="noisbn" class="form-control">
										<label>PENULIS</label>
										<input type="text" id="penulis" class="form-control">
										<label>PENERBIT</label>
										<input type="text" id="penerbit" class="form-control">
										<label>TAHUN</label>
										<input type="text" id="tahun" class="form-control">
										<label>STOK</label>
										<input type="text" id="stok" class="form-control" value="0">
										<label>HARGA POKOK</label>
										<input type="text" id="hargapokok" class="form-control" value="0">
										<label>HARGA JUAL</label>
										<input type="text" id="hargajual" class="form-control" value="0">
										<label>PPN</label>
										<input type="text" id="ppn" class="form-control" value="0">
										<label>DISKON</label>
										<input type="text" id="diskon" class="form-control" value="0">
										<hr>
										<button type="button" id="simpan" class="btn btn-flat btn-primary pull-right">
											SIMPAN <i class="fa fa-download"></i>
										</button><br>
										<div id="hasilSimpan" style="display: none"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

			<div class="row">
				<div class="col-md-12">
					<table id="tabelBuku" class="table table-condensed table-hovered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>ID BUKU</th>
								<th>JUDUL</th>
								<th>NO ISBN</th>
								<th>PENULIS</th>
								<th>PENERBIT</th>
								<th>TAHUN</th>
								<th>STOK</th>
								<th>HARGA POKOK</th>
								<th>HARGA JUAL</th>
								<th>PPN</th>
								<th>DISKON</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$queryBuku = mysql_query("SELECT * FROM buku");
						while ($isiBuku = mysql_fetch_array($queryBuku)) {
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $isiBuku[0]; ?></td>
								<td><?php echo $isiBuku[1]; ?></td>
								<td><?php echo $isiBuku[2]; ?></td>
								<td><?php echo $isiBuku[3]; ?></td>
								<td><?php echo $isiBuku[4]; ?></td>
								<td><?php echo $isiBuku[5]; ?></td>
								<td><?php echo $isiBuku[6]; ?></td>
								<td><?php echo $isiBuku[7]; ?></td>
								<td><?php echo $isiBuku[8]; ?></td>
								<td><?php echo $isiBuku[9]; ?></td>
								<td><?php echo $isiBuku[10]; ?></td>
								<td>
									<button type="button" class="btn btn-flat btn-xs btn-danger" data-toggle="modal" data-target="#modalhapus<?php echo $isiBuku[0]; ?>">
										<i class="fa fa-trash"></i>
									</button> || 

									<div class="modal fade" id="modalhapus<?php echo $isiBuku[0]; ?>" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h3>YAKIN HAPUS <?php echo $isiBuku[1]; ?> ?</h3>
												</div>
												<div class="modal-body">
													<center>
														<button type="button" id="<?php echo $isiBuku[0]; ?>" class="btn btn-flat btn-danger hapus">YA <i class="fa fa-check"></i></button>
														<button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">TIDAK <i class="fa fa-close"></i></button><br>
														<div id="hasilHapus" style="display: none"></div>
													</center>
												</div>
											</div>
										</div>
									</div>

									<button type="button" class="btn btn-flat btn-xs btn-warning buka_modal_edit" id="<?php echo $isiBuku[0]; ?>"><i class="fa fa-edit"></i></button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="modal fade" id="modalEdit" role="dialog" aria-labeledby="myModalLabel" tabindex="-1" aria-hidden="true"></div>

		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					&copy; Copyright 2017 | By : Syaikhu Rizal, SMK PGRI 05 JEMBER
				</div>
			</div>
		</div>
	</footer>

	<script src="assets/js/jquery-1.11.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="datatables/jquery.dataTables.min.js"></script>
	<script src="datatables/dataTables.bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#tabelBuku').DataTable({
			"paging":true,
			"lengthChange":true,
			"searching":true,
			"ordering":true,
			"autoWidth":true
		});

		$('#simpan').click(function() {
			var id_buku = $('#id_buku').val();
			var judul = $('#judul').val();
			var noisbn = $('#noisbn').val();
			var penulis = $('#penulis').val();
			var penerbit = $('#penerbit').val();
			var tahun = $('#tahun').val();
			var stok = $('#stok').val();
			var hargapokok = $('#hargapokok').val();
			var hargajual = $('#hargajual').val();
			var ppn = $('#ppn').val();
			var diskon = $('#diskon').val();
			$.ajax({
				url: 'simpanBuku.php',
				type: 'GET',
				data: 'id_buku='+id_buku+'&judul='+judul+'&noisbn='+noisbn+'&penulis='+penulis+'&penerbit='+penerbit+'&tahun='+tahun+'&stok='+stok+'&hargapokok='+hargapokok+'&hargajual='+hargajual+'&ppn='+ppn+'&diskon='+diskon,
				success:function(simpan){
					$('#hasilSimpan').html(simpan);
					window.location="buku.php";
				}
			});
		});

		$('.hapus').click(function() {
			var id_buku = $(this).attr('id');
			$.ajax({
				url: 'hapusBuku.php',
				type: 'GET',
				data: 'id_buku='+id_buku,
				success:function(hapus){
					$('#hasilHapus').html(hapus);
					window.location="buku.php";
				}
			});
		});

		$('.buka_modal_edit').click(function() {
			var id_buku = $(this).attr('id');
			$.ajax({
				url: 'editBuku.php',
				type: 'GET',
				data: "id_buku="+id_buku,
				success:function(edit){
					$('#modalEdit').html(edit);
					$('#modalEdit').modal('show',{backdorp:'true'});

					$('#update').click(function() {
						var newid_buku = $('#newid_buku').val();
						var newjudul = $('#newjudul').val();
						var newnoisbn = $('#newnoisbn').val();
						var newpenulis = $('#newpenulis').val();
						var newpenerbit = $('#newpenerbit').val();
						var newtahun = $('#newtahun').val();
						var newstok = $('#newstok').val();
						var newhargapokok = $('#newhargapokok').val();
						var newhargajual = $('#newhargajual').val();
						var newppn = $('#newppn').val();
						var newdiskon = $('#newdiskon').val();
						$.ajax({
							url: 'updateBuku.php',
							type: 'GET',
							data: 'newid_buku='+newid_buku+'&newjudul='+newjudul+'&newnoisbn='+newnoisbn+'&newpenulis='+newpenulis+'&newpenerbit='+newpenerbit+'&newtahun='+newtahun+'&newstok='+newstok+'&newhargapokok='+newhargapokok+'&newhargajual='+newhargajual+'&newppn='+newppn+'&newdiskon='+newdiskon,
							success:function(update){
								$('#hasilUpdate').html(update);
								window.location="buku.php";
							}
						});
					});

				}
			});
		});

	});
	</script>
</body>
</html>