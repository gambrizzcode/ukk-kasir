<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->pasok($_GET['id_pasok'],$_GET['id_dis'],$_GET['id_buku'],$_GET['jumlah'],$_GET['tgl']);

echo "<h4>Pasok Buku Telah Berhasil !!</h4>";
?>