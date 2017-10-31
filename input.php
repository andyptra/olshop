<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";
include "config/fungsi_tgl.php";

$input=$_GET[input];
$sid = session_id();
$inputform=$_GET[inputform];
$buktitf=$_GET[buktitf];

if($input=='add'){
	$idku=$_POST[ids];
	$s=$_POST[belis];
	$m=$_POST[belim];
	$l=$_POST[belil];
	$xl=$_POST[belixl];
	$sql = mysql_query("SELECT id_product,qty_s,
											qty_m,
											qty_l,
											qty_xl FROM keranjang WHERE id_product='$idku' AND id_session='$sid'");
	$xx=mysql_fetch_array($sql);
	$num = mysql_num_rows($sql);
	if ($num==0){
		mysql_query("INSERT INTO keranjang(id_product,
											id_session,
											tgl_keranjang,
									
											qty_s,
											qty_m,
											qty_l,
											qty_xl)
									VALUES	('$idku',
											'$sid',
											'$tgl_sekarang',
						
											'$s',
											'$m',
											'$l',
											'$xl')");
	}
	else {
		$aa=$xx[qty_s] + $s;
		$bb=$xx[qty_m] + $m;
		$cc=$xx[qty_l] + $l;
		$dd=$xx[qty_xl]+ $xl;
		mysql_query("UPDATE keranjang SET qty_s = '$aa',
                      qty_m = '$bb',
                      qty_l = ' $cc',
                      qty_xl = '$dd'
    									   WHERE id_session = '$sid' AND id_product='$idku'");


	}


	deletecart();
header('location:chart.php');
	}				
elseif ($input=='delete'){
	mysql_query("DELETE FROM keranjang WHERE id_keranjang='$_GET[id]'");
	header('location:chart.php');
	}
	
	

elseif ($input=='inputform'){
function generatekodepembayaran($length = 8) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
    $kodepembayaran=generatekodepembayaran();


	function cart_content(){
	$ct_content = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM keranjang WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$ct_content[] = $r;
	}
	return $ct_content;
}

	$ct_content = cart_content();
	$jml = count($ct_content);
	$now = date("Ymd");
	if(empty($_SESSION[username]) AND empty($_SESSION[passuser])){
		$hargas=$_POST[harganologins]+$_POST[tottarif];
			mysql_query("INSERT INTO order_product(name,
											email,
											kodepos,
											phone,
											id_kota,
											jumlah_item,
											ongkir,
											address,
											hargatotal,
											tanggal,
											id_pemesan,
											kodepembayaran) 
									VALUES ('$_POST[name]',
											'$_POST[email]',
											'$_POST[kodepos]',
											'$_POST[telp]',
											'$_POST[id_kota]',
											'$_POST[jmlorder]',
											'$_POST[tottarif]',
											'$_POST[address]',
											'$hargas',
											'$now',
											'$sid',
											'$kodepembayaran')");
		}else{
			$dd=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
		$hargasa=$_POST[hargalogins]+$_POST[tottarif];	
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
											'$_POST[jmlorder]',
											'$_POST[tottarif]',
											'$_POST[address]',
											'$hargasa',
											'$now',
											'$sid')");
		}
	
	for($i=0; $i<$jml; $i++){
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
											{$ct_content[$i]['id_product']},
										

											 {$ct_content[$i]['qty_s']},
						                      {$ct_content[$i]['qty_m']},
						                      {$ct_content[$i]['qty_l']},
						                      {$ct_content[$i]['qty_xl']}
											)")or die("gagalnya".mysql_error());
		
	
		}
		for ($i = 0; $i < $jml; $i++) {
			$xxz=mysql_fetch_array(mysql_query("select * from product where id = {$ct_content[$i]['id_product']}"));

										$stok_s = ($xxz[stok_s] - $ct_content[$i]['qty_s']);
									      $stok_m = ($xxz[stok_m] - $ct_content[$i]['qty_m']);
									      $stok_l = ($xxz[stok_l] - $ct_content[$i]['qty_l']);
									      $stok_xl = ($xxz[stok_xl] - $ct_content[$i]['qty_xl']);

		mysql_query("UPDATE product SET 
										stok_s = '$stok_s',
									      stok_m = '$stok_m',
									      stok_l = '$stok_l',
									      stok_xl = '$stok_xl'
								WHERE id = {$ct_content[$i]['id_product']}");
		}
	
	//tambahkan produk yang dibeli (best seller)
	for ($i = 0; $i < $jml; $i++) {
		mysql_query("UPDATE product SET dibeli = dibeli + {$ct_content[$i]['qty']}
								WHERE id = {$ct_content[$i]['id_product']}");
		}
	for($i=0; $i<$jml; $i++){
		mysql_query("DELETE FROM keranjang WHERE id_keranjang = {$ct_content[$i]['id_keranjang']}");
		}
		if(empty($_SESSION[username]) AND empty($_SESSION[passuser])){
			$_SESSION['kodebayar'] = $kodepembayaran;
			header('location:detailpembelian.php');
		}
		else{
			echo"<script>window.alert('Terimakasih sudah berbelanja, silahkan isi testimoni ya kakak');
                    window.location=('user.php?mod=testimoni')</script>";
			
		}
	}								
elseif ($buktitf=='inputbuktitf') {
	$zzz=($_POST[uploadtf]);
	$strs=implode('', $zzz);
	mysql_query("update order_product set buktitf='$strs' WHERE kodepembayaran='$_POST[kodeunik]'");
	 session_destroy();
echo"<script>window.alert('Terimakasih sudah berbelanja, nanti akan di konfirmasi lewat sms....');
                    window.location=('index.php')</script>";
											}											

function deletecart(){
	$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM keranjang WHERE tgl_keranjang < '$del'");
	}
	

