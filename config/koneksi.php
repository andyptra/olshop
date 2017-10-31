<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$database = "onlineshop";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$q=mysql_fetch_array(mysql_query("select * from setting where id='1'"));
?>
