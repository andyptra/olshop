<?php
session_start();
        include "../config/koneksi.php";

mysql_query("update order_product set statusupload='Y' where id='$_POST[id]'")or die("gagals".mysql_error());



header('location:admin.php?mod=konfirmasibayar');
