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
	<title>Kasir | Kasirian</title>
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
							<li><a href="buku.php">Buku</a></li>
							<li><a href="distributor.php">Distributor</a></li>
							<li><a href="laporan.php">Laporan</a></li>
							<?php
                            if ($isiKasir['akses'] == 'ADMIN') {
                                echo "<li><a class='menu-top-active' href='kasir.php'>Kasir</a></li>";
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
						<i class="fa fa-truck"></i> DATA MASTER KASIR 
						<button type="button" class="btn btn-flat btn-info pull-right" data-toggle="modal" data-target="#modalTambah">TAMBAH KASIR <i class="fa fa-plus"></i></button>
					</h4>

					<div class="modal fade" id="modalTambah" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h3>Tambah Kasir</h3>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<?php
										$ambilKasir = mysql_query("SELECT * FROM kasir ORDER BY id_kasir DESC");
										$idKasir = mysql_fetch_array($ambilKasir);
										?>
										<label>ID KASIR : <b><?php echo $idKasir[0]+1; ?></b></label>
										<input type="hidden" id="id_kasir" value="<?php echo $idKasir[0]+1; ?>"><br>
										<label>NAMA</label>
										<input type="text" id="nama" class="form-control">
										<label>ALAMAT</label>
										<input type="text" id="alamat" class="form-control">
										<label>TELEPON</label>
										<input type="text" id="telepon" class="form-control">
										<label>USERNAME</label>
										<input type="text" id="username" class="form-control">
										<label>PASSWORD</label>
										<input type="password" id="password" class="form-control">
										<label>KONFIRMASI PASSWORD</label>
										<input type="password" id="konfirm" class="form-control">
										<label>AKSES</label>
										<select class="form-control" id="akses">
											<option value="ADMIN">ADMIN</option>
											<option value="KASIR">KASIR</option>
										</select>
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

					<table id="tabelDis" class="table table-condensed table-striped table-hovered">
						<thead>
							<tr>
								<th>#</th>
								<th>ID KASIR</th>
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>NO TELEPON</th>
								<th>STATUS</th>
								<th>USERNAME</th>
								<th>PASSWORD</th>
								<th>AKSES</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$queryKasir = mysql_query("SELECT * FROM kasir");
						while ($isiKasir = mysql_fetch_array($queryKasir)) {
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $isiKasir[0]; ?></td>
								<td><?php echo $isiKasir[1]; ?></td>
								<td><?php echo $isiKasir[2]; ?></td>
								<td><?php echo $isiKasir[3]; ?></td>
								<td><?php if ($isiKasir[4] == 1) {
									echo "<span class='label label-success'>AKTIF</span>";
								}else{
									echo "<span class='label label-danger'>TIDAK AKTIF</span>";
								} ?></td>
								<td><?php echo $isiKasir[5]; ?></td>
								<td><?php echo $isiKasir[6]; ?></td>
								<td><?php echo $isiKasir[7]; ?></td>
								<td>
									<button type="button" class="btn btn-flat btn-xs btn-danger" data-toggle="modal" data-target="#modalhapus<?php echo $isiKasir[0]; ?>">
										<i class="fa fa-trash"></i>
									</button> || 

									<div class="modal fade" id="modalhapus<?php echo $isiKasir[0]; ?>" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h3>YAKIN HAPUS <?php echo $isiKasir[1]; ?> ?</h3>
												</div>
												<div class="modal-body">
													<center>
														<button type="button" id="<?php echo $isiKasir[0]; ?>" class="btn btn-flat btn-danger hapus">YA <i class="fa fa-check"></i></button>
														<button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">TIDAK <i class="fa fa-close"></i></button><br>
														<div id="hasilHapus" style="display: none"></div>
													</center>
												</div>
											</div>
										</div>
									</div>

									<button type="button" class="btn btn-flat btn-xs btn-warning buka_modal_edit" id="<?php echo $isiKasir[0]; ?>"><i class="fa fa-edit"></i></button>
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
		$('#tabelDis').DataTable({
			"paging":true,
			"lengthChange":true,
			"searching":true,
			"ordering":true,
			"autoWidth":true
		});

		$('#simpan').click(function() {
			var id_kasir = $('#id_kasir').val();
			var nama     = $('#nama').val();
			var alamat   = $('#alamat').val();
			var telepon  = $('#telepon').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var konfirm  = $('#konfirm').val();
			var akses 	 = $('#akses').val();
			if (password == konfirm) {
				$.ajax({
					url: 'simpanKasir.php',
					type: 'GET',
					data: 'id_kasir='+id_kasir+'&nama='+nama+'&alamat='+alamat+'&telepon='+telepon+'&username='+username+'&password='+password+'&akses='+akses,
					success:function(simpan){
						$('#hasilSimpan').html(simpan);
						window.location="kasir.php";
					}
				});
			}
		});

		$('.hapus').click(function() {
			var id_kasir = $(this).attr('id');
			$.ajax({
				url: 'hapusKasir.php',
				type: 'GET',
				data: 'id_kasir='+id_kasir,
				success:function(hapus){
					$('#hasilHapus').html(hapus);
					window.location="kasir.php";
				}
			});
		});

		$('.buka_modal_edit').click(function() {
			var id_kasir = $(this).attr('id');
			$.ajax({
				url: 'editKasir.php',
				type: 'GET',
				data: "id_kasir="+id_kasir,
				success:function(edit){
					$('#modalEdit').html(edit);
					$('#modalEdit').modal('show',{backdorp:'true'});

					$('#update').click(function() {
						var newid_kasir = $('#newid_kasir').val();
						var newnama     = $('#newnama').val();
						var newalamat   = $('#newalamat').val();
						var newtelepon  = $('#newtelepon').val();
						var newusername = $('#newusername').val();
						var newpassword = $('#newpassword').val();
						var newkonfirm  = $('#newkonfirm').val();
						var newakses    = $('#newakses').val();
						$.ajax({
							url: 'updateKasir.php',
							type: 'GET',
							data: 'newid_kasir='+newid_kasir+'&newnama='+newnama+'&newalamat='+newalamat+'&newtelepon='+newtelepon+'&newusername='+newusername+'&newpassword='+newpassword+'&newakses='+newakses,
							success:function(update){
								$('#hasilUpdate').html(update);
								window.location="kasir.php";
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
