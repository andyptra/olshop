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
                            
                        <form action="resetpswd2.php" method="post" enctype="multipart/form-data"  class="form-horizontal" id="loginku"> 
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="username" value="" placeholder="username" required="required">                                        
                                    </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign"></i></span>
                                        <input id="pertanyaan" type="text" class="form-control" name="pertanyaan" value="" placeholder="" readonly>                                        
                                    </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicons-info-sign"></i></span>
                                        <input id="jawaban" type="text" class="form-control" name="jawaban" placeholder="jawaban" onBlur="checkAvailability()" required="required">
                  
                                    </div>
                                    <p><img src="loader.gif" id="loaderIcon" style="display:none" />
<span id="user-availability-status"></span> 
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


<script type="text/javascript">
 
        function checkAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
      url: "libs.php",
      data:'jawaban='+$("#jawaban").val(),
      type: "POST",
      success:function(data){
      $("#user-availability-status").html(data);
      $("#loaderIcon").hide();
      },
      error:function (){}
      });
    }
   
       </script>

       <script type="text/javascript">
   $(document).ready(function(){
      
  
   //jika ada perubahan di kode barang
                    $("#username").change(function(){
                        kode=$("#username").val();
                        
                       
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"proc_auto.php",
                            data:"kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                $("#pertanyaan").val(data[0]);
                 $("#nama").val(data[1]);
               
                              
                                
                                
                                
                                
                            }
                        });
                    });
      
      
  });
    
      

    

  
  </script>



</body>
</html>
