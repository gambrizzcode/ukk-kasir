<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->hapusBuku($_GET['id_buku']);
?>