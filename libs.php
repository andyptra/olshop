<?php
include"config/koneksi.php";

if(!empty($_POST["jawaban"])) {
$result = mysql_query("SELECT count(*) FROM pelanggan WHERE jawaban='" . $_POST["jawaban"] . "'");
$row = mysql_fetch_row($result);
$user_count = $row[0];
if($user_count>0) echo "<span style='color: #2FC332;'> jawaban benar.</span>";
else echo "<span style='color: #D60202;'> jawaban salah.</span>";
}
?>