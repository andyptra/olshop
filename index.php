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
      <a class="navbar-brand" href="#"><?php echo "$q[nama_olshop]";?></a>
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



session_start(); // starts the session
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){?>
  <ul class="nav navbar-nav navbar-right">
        <li><a href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><span class="glyphicon glyphicon-user"></span> Sign Up</a> </li>
        <li><a href="#login" data-toggle="modal" data-target=".loginbro" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
    <div id="nduwur">

    

       <div id="owl-demo" class="owl-carousel owl-theme">
     <?php
     $tampilslide=mysql_query("select * from slidshow ORDER BY RAND() LIMIT 4 ");
     while($rr=mysql_fetch_array($tampilslide)){
      ?>
      <div class="item"><div class="textoverlay"><p><?php echo "$rr[caption]";?></p></div><img src="admin/foto/<?php echo "$rr[image]";?>" alt="" title=""></div>
      <?php
     }
     ?>
      
      
    </div>


    </div><!--end nduwur---->
    <div class="row">
         <div class="col-md-12">
     <h2 align="center">SELAMAT DATANG</h2>
      <hr>
      </div>
       <div class="col-md-2 pull-right">
        

  <select class="form-control" id="sortby" name="sortby">
        <option value="terbaru">Terbaru</option>
        <option value="termurah">Termurah</option>
        <option value="termahal">Termahal</option>
       
      </select>
       </div>
    </div>
    <div class="row">
       
   
	    <br>
    	
      <div class="col-md-3">
            <?php include"sidebar.php";?>
      </div>
        <div class="col-md-9">
            <div class="row">
            <div id="list" >      <?php    
              
    $sql = "SELECT * FROM product ";
     $exe = mysql_query($sql);
                   while($data=mysql_fetch_array($exe)){
                        $disc     = ($data[diskon]/100)*$data[price];
                        $hargadisc     = number_format(($data[price]-$disc),0,",",".");
                      

                    ?>
                <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                          <img title="<?php echo "$data[product_name]"; ?>" src="admin/foto/<?php echo"$data[feature_image]"; ?>" alt="..." width="200px" height="300px" >
                          <div class="caption">
                          <h3><a style="  font-size: 17px ;"  href=detail.php?id=<?php echo "$data[id]"?>><?php echo "$data[product_name]"; ?></a></h3>


                   <p style="text-align:center">

                            <?php
                        if ($data[diskon]!= "0"){
                            $angkaa = "$data[price]";
                      $jumlah_desimala ="2";
                      $pemisah_desimala =",";
                      $pemisah_ribuana =".";
                      $notdis= "Rp ".number_format($angkaa, $jumlah_desimala, $pemisah_desimala, $pemisah_ribuana);


                            ?>
                           <div class='prod_price'><span  class='price'> Rp. <b><?php echo "$hargadisc";?>,00 <br />
                        </span>&nbsp;<span  class='price2'><b style='text-decoration:line-through;'><?php echo "$notdis";?></b><b>&nbsp;&nbsp;&nbsp;-<?php echo "$data[diskon]";?>%</b> </span>                        
                        </div><?php
                          }else{
                              $angkaa = "$data[price]";
                      $jumlah_desimala ="2";
                      $pemisah_desimala =",";
                      $pemisah_ribuana =".";
                      $hartot= "Rp ".number_format($angkaa, $jumlah_desimala, $pemisah_desimala, $pemisah_ribuana);
                            ?>
                       <div class='prod_price_notdiskon'><span class='price'> <br /></span>&nbsp;<span class='price'>  <?php echo "$hartot";?></b></span></div>
                      
                          <?php
                       } 

                        ?>
                        </p>
                     
                        <?php if($data[stok]!=="0"){
                        echo"<a href='detail.php?id=$data[id]' class='cart' role='button'>Beli</a>";
                       
                        }
                        else{
               
                        echo"<a href='#' class='cart' role='button'>pesan</a>";
                       }?>
                        
                        </div>
                    </div><!----thumbnail---->
                </div><!--col-sm-6 col-md-4---->
            <?php }
                        ?> </div>
			
						
						
            </div><!--end rows---->
            <?php
              $limit = 6;
        $sql = "SELECT COUNT(id) FROM product ";  
        $rs_result = mysql_query($sql);  
        $row = mysql_fetch_row($rs_result);  
        $total_records = $row[0];  
        $total_pages = ceil($total_records / $limit); 
        ?>
        <div align="center">
        <ul class='pagination text-center' id="pagination">
        <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
              if($i == 1):?>
                    <li class='active'  id="<?php echo $i;?>"><a href='page.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
              <?php else:?>
              <li id="<?php echo $i;?>"><a href='page.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
            <?php endif;?>      
        <?php endfor;endif;?>  
        </div>
        </div><!--col md 9 ---->
    </div><!--end rows---->


    



    <?php include"footer.php";?>