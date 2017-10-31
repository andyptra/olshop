<?php
include "../config/koneksi.php";
error_reporting(0);
$pass=md5($_POST[pass]);
//$pass=($_POST[pass]);

$login=mysql_query("SELECT * FROM user WHERE id_user='$_POST[username]' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
$_SESSION['namauser']     = $r["username"];
  $_SESSION['passuser']     = $r["password"];
  $_SESSION['email']     = $r["email"];
  $_SESSION['leveluser']    = $r["level"];
  header('location:admin.php?mod=home');
}
else{
  echo "<script>window.alert('Username atau Password Salah!!!');
        window.location=('index.php')</script>";
}
?>
