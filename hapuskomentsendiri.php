<?php
include"config/koneksi.php";
session_start();
mysql_query("Delete from riview where id_pelanggan='$_GET[id]'")or die("gagal".mysql_error());
if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}
else {
   $url = "user.php?mod=home"; // default page for 
}

header("Location: $url"); // perform correct redirect.
	?>