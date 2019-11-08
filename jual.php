<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$id_penjualan = $_GET['id_penjualan'];
$id_buku	  = $_GET['id_buku'];
$tgl		  = $_GET['tgl'];
$jumlah		  = $_GET['jumlah'];
$id_kasir 	  = $_GET['id_kasir'];

$queryCek = mysql_query("SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");
$adaCek   = mysql_num_rows($queryCek);
if ($adaCek == 0) {
	$krj->jual($id_penjualan,$id_buku,$tgl,$jumlah,$id_kasir);
	$krj->det_jual($id_penjualan,$id_buku,$jumlah);
}
elseif ($adaCek == 1) {
	$krj->updateJual($id_penjualan,$jumlah);
	$krj->det_jual($id_penjualan,$id_buku,$jumlah);
}
?>