<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "/inc/koneksi.php";
$sql="select * from setting where id='1'";
$query=mysql_query($sql);
$setting=mysql_fetch_array($query);
$judul=$setting['judul'];
	$domain=$setting['domain'];
	$keyword=$setting['katakunci'];
	$deskripsi=$setting['deskripsi'];
	$nama=$setting['nama'];
	$email=$setting['email'];
	$telp=$setting['telp'];
	$fb=$setting['facebook'];
	$tw=$setting['twitter'];
	$ist=$setting['instagram'];
	$bank=$setting['bank'];
	$alamat=$setting['alamat'];
?>