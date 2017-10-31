<?php
include"config/koneksi.php";

session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
  $dd=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
?>

   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "$q[nama_olshop]";?></title>

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link rel="stylesheet" href="admin/awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css" type="text/css" />
 <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css" />

<link type="text/css" href="orakuploader/orakuploader.css" rel="stylesheet"/>
</head>

<body>
<div class="container">
   <nav class="navbar navbar-inverse nava ">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php"><?php echo "$q[nama_olshop]";?></a>
    </div>
    <div class="collapse navbar-collapse nava" id="myNavbar">
      <ul class="nav navbar-nav nava">
        <li ><a href="index.php">Home</a></li>
        <li><a href="about.php">about</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?mod=user" ><span class="glyphicon glyphicon-user"></span> Hy, <?php echo "$dd[nama]";  ?> </a> </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
    
    <div class="row">
        <h2 align="center">SELAMAT DATANG </h2>
	    <hr>
	    <br>
    	
      <div class="col-md-3">
           <div class="panel panel-default">
  <!-- Default panel contents -->
            <div class="va panel-heading ">Menu</div>
            <div class="panel-body">
                <ul class="list-group">
       
               <li class='list-group-item' >
               <a href='?mod=user'>Biodata</a>
               </li>
                <li class='list-group-item' >
               <a href='?mod=testimoni'>testimoni</a>
               </li>
               
               <li class='list-group-item' >
               <a href='?mod=itemorder'>item yang di beli</a>
               </li>
           

                 
                </ul>
            </div>
        </div>
      </div>
        <div class="col-md-9">
     <?php 
        if ($_GET['mod']=='home'){
          echo "
             ini adalah pelanggan dari rizwa collection</p>";
        }

        elseif($_GET['mod']=='testimoni'){
          include"modul/testimoni.php";
          }
    
        elseif ($_GET['mod']=='user'){
          include "modul/user.php";
          }
             elseif ($_GET['mod']=='buktitf'){
          include "modul/buktitf.php";
          }
              elseif ($_GET['mod']=='itemorder'){
          include "modul/itemorder.php";
          }
      ?>
             
       
            </div><!--end rows---->
        </div><!--col md 9 ---->
    </div><!--end rows---->


</div>
<script src="admin/js/jquery.min.js" type="text/javascript"></script>
<script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="uploads.js" type="text/javascript"></script>
  <script type="text/javascript" src="orakuploader/jquery-ui.min.js"></script>
  <script type="text/javascript" src="orakuploader/orakuploader.js"></script>
<script>
  (function($) {

  $(document).ready(function(e) {
    
    // deklarasikan variabel
    var kd_k = 0;

    $(document).on("click", ".detail", function () {
      var url = "popupitemorder.php";
      // ambil nilai id dari tombol ubah
      kd_k = this.id;
       $.post(url, {id: kd_k} ,function(data) {
        // tampilkan k.form.php ke dalam <div class="modal-body"></div>
        $(".modal-body").html(data).show();
        
      });
    });
 });
}) (jQuery);

    </script>
</body>
</html>
<?php
}
?>