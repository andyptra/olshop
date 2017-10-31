   <?php
include"config/koneksi.php";
$results = mysql_fetch_array(mysql_query("SELECT jawaban FROM pelanggan WHERE jawaban='" . $_POST["jawaban"] . "'"));
if($results[jawaban]!=$_POST[jawaban]){
echo "dibilangin jawaban salah,coba lagi ya <br/>";
echo"<input action='action' type='button' value='Back' onclick='history.go(-1);' />";
}else{


?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "$q[nama_olshop]";?></title>

<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link rel="stylesheet" href="admin/awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css" type="text/css" />

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
  <style type="text/css">
    .anu{
      border-bottom: 2px dotted;
      width:284px;
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

      
    </div>
  </div>
</nav>

    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
    
        <div class="col-md-7">

             
              <div class="bordered">
         <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">reset password</div>
                       
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="donereset.php" method="post" enctype="multipart/form-data"  class="form-horizontal" id="loginku"> 
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" value="<?php echo "$_POST[username]";?>" placeholder="username" readonly>                                        
                                    </div>
                               <div  class="input-group margin-bottom-sm">
                    <span class="input-group-addon">
                      <i class="fa fa-lock fa-fw"></i>
                    </span>
                  <input class="form-control" name="password_name" type="password" placeholder="Password">
                </div>
                <label  class="error" for="password_id"></label>
             
    
                          
                                   
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                       <button type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp reset</button>
                                      

                                    </div>
                                </div>


                               
                            </form>     



                        </div>                     
                    </div>  
    </div>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
<div id="footer">
        <div class="container">
            <p class="footer-class">Copyright &copy; <?php echo date('Y') ?> |   All Rights Reserved </p>
        </div>
    </div>
</div>

<script src="admin/js/jquery.min.js" type="text/javascript"></script>
<script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>




</body>
</html>
<?php
}?>