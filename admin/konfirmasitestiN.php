<?php
session_start();
        include "../config/koneksi.php";

mysql_query("update testimoni set status='N' where id='$_POST[id]'")or die("gagals".mysql_error());



header('location:admin.php?mod=testimoni');
