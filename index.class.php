<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Jakarta');

/************************

|						|
|  By : Syaikhu Rizal	|
|						|	
|  ANMEDIACORP JEMBER	|
|						|

************************/

class sambung{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db   = "ukk_kasir";
	function __construct(){
		mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->db);
	}
}
class kerja{
	//kasir
	function simpanKasir($a,$b,$c,$d,$e,$f,$g,$h){
		$pass = md5($g);
		mysql_query("INSERT INTO kasir VALUES('$a','$b','$c','$d','$e','$f','$pass','$h')");
	}
	function hapusKasir($a){
		mysql_query("DELETE FROM kasir WHERE id_kasir = '$a'");
	}
	function updateKasir($a,$b,$c,$d,$f,$g,$h){
		$pass = md5($g);
		mysql_query("UPDATE kasir SET nama = '$b', alamat = '$c', telepon = '$d', username = '$f', password = '$pass', akses = '$h' WHERE id_kasir = '$a'");
	}
	//distributor
	function simpanDis($a,$b,$c,$d){
		mysql_query("INSERT INTO distributor VALUES('$a','$b','$c','$d')");
	}
	function hapusDis($a){
		mysql_query("DELETE FROM distributor WHERE id_distributor = '$a'");
	}
	function updateDis($a,$b,$c,$d){
		mysql_query("UPDATE distributor SET nama = '$b', alamat = '$c', telepon = '$d' WHERE id_distributor = '$a'");
	}
	//buku
	function simpanBuku($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		mysql_query("INSERT INTO buku VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");
	}
	function hapusBuku($a){
		mysql_query("DELETE FROM buku WHERE id_buku = '$a'");
	}
	function updateBuku($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		mysql_query("UPDATE buku SET judul = '$b', noisbn = '$c', penulis = '$d', penerbit = '$e', tahun = '$f', stok = '$g', harga_pokok = '$h', harga_jual = '$i', ppn = '$j', diskon = '$k' WHERE id_buku = '$a'");
	}
	//pasok
	function pasok($a,$b,$c,$d,$e){
		mysql_query("INSERT INTO pasok VALUES('$a','$b','$c','$d','$e')");
	}
	//jual
	function jual($a,$b,$c,$d,$e){
		mysql_query("INSERT INTO penjualan VALUES('$a','$b','$c','$d','$e')");
	}
	function det_jual($a,$b,$c){
		mysql_query("INSERT INTO det_jual VALUES('$a','$b','$c')");
	}
	function updateJual($a,$b){
		mysql_query("UPDATE penjualan SET jumlah = jumlah+'$b' WHERE id_penjualan = '$a'");
	}
	
}
?>