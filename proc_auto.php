<?php
include"config/koneksi.php";


	$kode=$_GET['kode'];
    $dt=mysql_query("select pelanggan.*,pertanyaan_keamanan.pertanyaan from pelanggan,pertanyaan_keamanan where username='$kode' AND pertanyaan_keamanan.id_pertanyaan=pelanggan.id_pertanyaan");
    $d=mysql_fetch_array($dt);

        echo $d['pertanyaan']."|".$d['nama'];