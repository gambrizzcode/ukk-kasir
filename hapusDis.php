<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->hapusDis($_GET['id_dis']);
?>