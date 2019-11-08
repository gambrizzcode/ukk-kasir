<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updateKasir($_GET['newid_kasir'],$_GET['newnama'],$_GET['newalamat'],$_GET['newtelepon'],$_GET['newusername'],$_GET['newpassword'],$_GET['newakses']);
?>