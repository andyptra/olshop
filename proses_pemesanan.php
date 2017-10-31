<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";
include "config/fungsi_tgl.php";
	$now = date("Ymd");
$sid = session_id();
$dd=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
				mysql_query("INSERT INTO order_product(
											id_pelanggan,
											name,
											email,
											kodepos,
											phone,
											id_kota,
											jumlah_item,
											ongkir,
											address,
											hargatotal,
											tanggal,
											id_pemesan) 
									VALUES ('$dd[id_pelanggan]',
											'$_POST[name]',
											'$_POST[email]',
											'$_POST[kodepos]',
											'$_POST[telp]',
											'$_POST[id_kota]',
											'$_POST[jmltotal]',
											'$_POST[tottarif]',
											'$_POST[address]',
											'$_POST[grandtotal]',
											'$now',
											'$sid')");

$dd=mysql_fetch_array(mysql_query("SELECT id FROM order_product ORDER BY id DESC LIMIT 1"));
		$idku=$dd[id];
			mysql_query("INSERT INTO detail_order_product(id_order_product,
											
											id_product,
								
											jumlah_s,
                      jumlah_m,
                      jumlah_l,
                      jumlah_xl
											) 
									VALUES ('$idku',
											'$_POST[idbar]',
											'$_POST[jumlah]',
										

											 '$_POST[jumlah1]',
						                      '$_POST[jumlah2]',
						                      '$_POST[jumlah3]'
											)")or die("gagalnya".mysql_error());
		header('user.php?mod=itemorder');
?>