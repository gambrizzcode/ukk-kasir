<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->simpanBuku($_GET['id_buku'],$_GET['judul'],$_GET['noisbn'],$_GET['penulis'],$_GET['penerbit'],$_GET['tahun'],$_GET['stok'],$_GET['hargapokok'],$_GET['hargajual'],$_GET['ppn'],$_GET['diskon']);
?>