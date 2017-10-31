<?php
include"config/koneksi.php";
session_start();
	   
$pass=$_POST['password_name'];
$username=$_POST['username'];
	$pengacak1="(&^*I^&$^%$&^HCHFVDyt&^3e688vkhf8rii9yr674e67dujgg";
	$pengacak2=")*^&(%fuyrrfuyf684Yfuyrfyr8YFYUUYUYFYUF&*%*(o";
	$password=md5($pengacak1.$pass.md5($pengacak2).$pengacak2);
     
	mysql_query("update pelanggan set password='$password' where username='$username'")or die("gagal".mysql_error());
	header('location:index.php');

	