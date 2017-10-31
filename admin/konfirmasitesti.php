<?php
session_start();
        include "../config/koneksi.php";

mysql_query("update testimoni set status='Y' where id='$_POST[id]'")or die("gagals".mysql_error());



header('location:admin.php?mod=testimoni');
