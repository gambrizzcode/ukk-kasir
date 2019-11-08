<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$krj->updateBuku($_GET['newid_buku'],$_GET['newjudul'],$_GET['newnoisbn'],$_GET['newpenulis'],$_GET['newpenerbit'],$_GET['newtahun'],$_GET['newstok'],$_GET['newhargapokok'],$_GET['newhargajual'],$_GET['newppn'],$_GET['newdiskon']);
?>