<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updateDis($_GET['newid_dis'],$_GET['newnama'],$_GET['newalamat'],$_GET['newtelepon']);
?>