<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->hapusKasir($_GET['id_kasir']);
?>