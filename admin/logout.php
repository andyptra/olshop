<?php
  session_start();
  session_destroy();
  echo "<script>window.alert('your logout');
        window.location=('index.php')</script>";
?>
