<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->simpanKasir($_GET['id_kasir'],$_GET['nama'],$_GET['alamat'],$_GET['telepon'],0,$_GET['username'],$_GET['password'],$_GET['akses']);
?>