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
	<title>Pembelian | Kasirian</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
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
							<li><a class="menu-top-active" href="pembelian.php">Pembelian</a></li>
							<li><a href="buku.php">Buku</a></li>
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
						<i class="fa fa-shopping-cart"></i> PEMBELIAN BARANG
					</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<?php
							$queryPasok = mysql_query("SELECT * FROM pasok ORDER BY id_pasok DESC");
							$isiPasok   = mysql_fetch_array($queryPasok);
							?>
							<h4>ID PEMBELIAN / PASOK : <b><?php echo $isiPasok[0]+1; ?></b>
								<i class="pull-right"><?php echo date('d - m - Y'); ?></i>
							</h4>
						</div>
						<div class="panel-body">
							<input type="hidden" id="id_pasok" value="<?php echo $isiPasok[0]+1; ?>">
							<input type="hidden" id="tgl" value="<?php echo date('Y-m-d'); ?>">
							<label>PILIH DISTRIBUTOR</label>
							<select class="form-control" id="id_dis">
								<option></option>
								<?php
								$queryDis = mysql_query("SELECT * FROM distributor");
								while ($isiDis = mysql_fetch_array($queryDis)) {
									echo "<option value='".$isiDis[0]."'>".$isiDis[1]." - ".$isiDis[2]."</option>";
								}
								?>
							</select><br>
							<label>PILIH BUKU</label>
							<select class="form-control" id="id_buku">
								<option></option>
								<?php
								$queryBuku = mysql_query("SELECT * FROM buku");
								while ($isiBuku = mysql_fetch_array($queryBuku)) {
									echo "<option value='".$isiBuku[0]."'>".$isiBuku[1]." - ".$isiBuku[4]."</option>";
								}
								?>
							</select><br>
							<label>MASUKKAN JUMLAH</label>
							<input type="text" class="form-control" id="jumlah"><br>
						</div>
						<div class="panel-footer">
							<button type="button" id="yakin" style="padding-left: 50px;padding-right: 50px;" class="btn btn-flat btn-danger pull-right">
								YAKIN <i class="fa fa-hand-o-right"></i>
							</button>

							<button type="button" id="lanjut" style="padding-left: 50px;padding-right: 50px;" class="btn btn-flat btn-primary pull-right">
								LANJUT <i class="fa fa-hand-o-right"></i>
							</button><br>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="hasilPasok">
						
					</div>
				</div>
			</div>
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
	<script>
	$(document).ready(function() {
		$('#lanjut').hide();
		$('#yakin').hide();
		$('#yakin').click(function() {
			$('#lanjut').show(500);
			$('#yakin').hide(500);
		});

		$('#jumlah').keyup(function() {
			var id_dis  = $('#id_dis').val();
			var id_buku = $('#id_buku').val();
			var jumlah  = $(this).val();
			if (id_dis != "" && id_buku != "" && jumlah != "") {
				$('#yakin').show(500);
			}
		});
		$('#jumlah').keydown(function() {
			var jumlah  = $(this).val();
			if (jumlah == "") {
				$('#yakin').hide(500);
			}
		});

		$('#lanjut').click(function() {
			var id_pasok = $('#id_pasok').val();
			var id_dis   = $('#id_dis').val();
			var id_buku  = $('#id_buku').val();
			var jumlah   = $('#jumlah').val();
			var tgl      = $('#tgl').val();
			$.ajax({
				url: 'pasok.php',
				type: 'GET',
				data: 'id_pasok='+id_pasok+'&id_dis='+id_dis+'&id_buku='+id_buku+'&jumlah='+jumlah+'&tgl='+tgl,
				success:function(pasok){
					$('#hasilPasok').html(pasok);
					$('#hasilPasok').addClass('alert alert-success');
					window.location="pembelian.php";
				}
			});
		});
	});
	</script>
</body>
</html>