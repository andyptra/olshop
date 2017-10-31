<?php
session_start();
        include "../config/koneksi.php";

mysql_query("delete from pelanggan where id_pelanggan='$_GET[id]'")or die("gagals".mysql_error());



header('location:admin.php?mod=user');
