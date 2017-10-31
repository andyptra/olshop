<?php
include"config/koneksi.php";
	$kode=$_GET['kode'];
    $dt=mysql_query("select * from kota where id_kota='$kode'");
    $d=mysql_fetch_array($dt);
    echo $d['id_kota']."|".$d['nama_kota']."|".$d['tarif'];



?>