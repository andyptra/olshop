<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/tanggal.php";

$mod=$_GET[mod];
$act=$_GET[act];



// Menghapus data
if (isset($mod) AND $act=='hapus'){
  mysql_query("DELETE FROM ".$mod." WHERE id ='$_GET[id]'");
  header('location:user.php?mod='.$mod);
}


//Add testimoni
elseif ($mod=='testimoni' AND $act=='input'){
	$ambil=mysql_fetch_array(mysql_query("SELECT * FROM pelanggan  where username='$_SESSION[username]'"));

	$insert = mysql_query("INSERT INTO testimoni (id_pelanggan,isi) VALUES ('$ambil[id_pelanggan]','$_POST[testimoni]')");
	if($insert == FALSE){
		echo "<p>Kategori gagal ditambahkan, alesannya:".(mysql_error())."</p>";
		}
	header('location:user.php?mod='.$mod);
	}
//testimoni Update
elseif ($mod=='testimoni' AND $act=='update'){
	$update = mysql_query("UPDATE testimoni SET isi = '$_POST[testimoni]' WHERE id = '$_POST[id]'");
	if($update ==FALSE){
		echo "<p>Update gagal dilakukan karena:".(mysql_error())."</p>";
		}
	header('location:user.php?mod='.$mod);
	}
	
elseif ($mod=='user' AND $act=='update'){
	$update = mysql_query("UPDATE pelanggan SET  nama='$_POST[nama]',
												no_hp='$_POST[no_hp]',
												email='$_POST[email]',
												kodepos='$_POST[kodepos]',
												id_pertanyaan='$_POST[pertanyaan]',
												jawaban='$_POST[jawaban]',
												alamat='$_POST[alamat]'

		 WHERE id_pelanggan = '$_POST[id]'");
	if($update ==FALSE){
		echo "<p>Update gagal dilakukan karena:".(mysql_error())."</p>";
		}
	header('location:user.php?mod='.$mod);
	}
	

elseif($mod=="user" AND $act=="updatepswd"){
	$pass=$_POST['password'];
	$pengacak1="(&^*I^&$^%$&^HCHFVDyt&^3e688vkhf8rii9yr674e67dujgg";
	$pengacak2=")*^&(%fuyrrfuyf684Yfuyrfyr8YFYUUYUYFYUF&*%*(o";
	$password=md5($pengacak1.$pass.md5($pengacak2).$pengacak2);
	mysql_query("update  pelanggan set password='$password'
								  where id_pelanggan='$_POST[id_pelanggan]' ")or die("gagal".mysql_error());
header('location:user.php?mod='.$mod);
}

elseif($mod=="buktitf" AND $act=="buktitf"){
	$zzz=($_POST[uploadtf]);
	$strs=implode('', $zzz);
	mysql_query("update order_product set buktitf='$strs' WHERE kodepembayaran='$_POST[kodeunik]'");
header('location:user.php?mod='.$mod);
}

?>
