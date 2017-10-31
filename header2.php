 <?php include"config/koneksi.php"; ?>
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
<link rel="stylesheet" href="plug/etalage.css">
<link rel="stylesheet" href="plug/select2.min.css">

<link type="text/css" href="orakuploader/orakuploader.css" rel="stylesheet"/>
<style type="text/css">
  .marquee {
  width: 300px;
  overflow: hidden;
 
}

.ver {
  height: 270px;
  width: 200px;
}
</style>

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
     
        <li><a href="uploadbuktitfdelay.php">Upload Bukti</a></li>
      </ul>
      <form action="search.php" method="post" class="navbar-form navbar-right">
  <div class="input-group ">
      <input type="text"  class="form-control " placeholder="cari produk" name="cari" >
      <span class="input-group-btn">
       <input type="submit" class="btn  btn-defalut" value="cari">
      </span>
    </div><!-- /input-group -->
</form>
     <?php
include"config/koneksi.php";

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){?>
  <ul class="nav navbar-nav navbar-right">
        <li><a href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><span class="glyphicon glyphicon-user"></span> Sign Up</a> </li>
        <li><a href="#login" data-toggle="modal" data-target=".loginbro"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  <?php
}else{
   $dd=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
?>
  <ul class="nav navbar-nav navbar-right">
        <li><a href="user.php?mod=user" ><span class="glyphicon glyphicon-user"></span> Hy, <?php echo "$dd[nama]";  ?> </a> </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
  <?php
  }
  ?>
      
    </div>
  </div>
</nav>