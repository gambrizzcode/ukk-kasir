<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->simpanDis($_GET['id_dis'],$_GET['nama'],$_GET['alamat'],$_GET['telepon']);
?>