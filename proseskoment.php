<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include"config/tanggal.php";
  if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
	    	 echo "Kode Captcha Anda Salah<br/>";
	    	 echo"<input action='action' type='button' value='Back' onclick='history.go(-1);' />";
	    }else{
$dd=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
mysql_query("insert into riview(id_product,id_pelanggan,judul,rating,isi,tgl,jam)
								values('$_POST[id_prod]',
										'$dd[id_pelanggan]',
										'$_POST[judul]',
										'$_POST[rating]',
										'$_POST[isi]',
										'$tgl_sekarang',
										'$jam_sekarang')");

if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}
else {
   $url = "user.php?mod=home"; // default page for 
}

header("Location: $url"); // perform correct redirect.

}