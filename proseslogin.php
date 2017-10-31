<?php
include"config/koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];

$pengacak1="(&^*I^&$^%$&^HCHFVDyt&^3e688vkhf8rii9yr674e67dujgg";
$pengacak2=")*^&(%fuyrrfuyf684Yfuyrfyr8YFYUUYUYFYUF&*%*(o";
$password=md5($pengacak1.$pass.md5($pengacak2).$pengacak2);

$query=mysql_query("Select * from pelanggan where username='$user' AND password='$password'") or die("gagal".mysql_error());
$ketemu=mysql_num_rows($query);
$r=mysql_fetch_array($query);
if($ketemu>0){
	session_start();
	$_SESSION['username'] = $r['username'];
 	$_SESSION['passuser'] = $r['password'];



if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}
else {
   $url = "user.php?mod=home"; // default page for 
}

header("Location: $url"); // perform correct redirect.

}
else{
	echo"anda bukan pelanggan<br>";
	echo"<a href='index.php'>LOGIN GAN</a>";
}
?>
