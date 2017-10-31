  <?php include"header2.php";?>
  <style type="text/css">
    .anu{
      border-bottom: 2px dotted;
      width:284px;
    }
    .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
  </style>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
    
        <div class="col-md-12">

               <?php
              include "config/koneksi.php";
              session_start();
              $qq=mysql_fetch_array(mysql_query("SELECT * from order_product WHERE kodepembayaran='$_SESSION[kodebayar]'"));
              if(!empty($_SESSION[kodebayar])){

               ?>
             

              <div class="bordered">

            
            

    <h4 class="anu">KODE PEMBAYARAN :<?php echo " $_SESSION[kodebayar]"?></h4>       
     <div class="alert alert-info">
  <strong>INFO!</strong> Upload bukti transfer Disini 
  <br/>
 
</div>    
               <br/>
<?php

?>
             

       <div class="panel panel-info">
      <div class="panel-heading nava">Upload Bukti Transfer</div>
      <div class="panel-body">
      <form action="input.php?buktitf=inputbuktitf" method="post" enctype="multipart/form-data"> 
      <input type="hidden" name="kodeunik" value="<?php echo "$_SESSION[kodebayar]";?>">
      <div class="form-group">
                               <label>Upload gambar</label><br/>
                           
                                <div id="uploadtf" orakuploader="on" name="gambar"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">upload</button>
                            </form>
              
      </div>
    </div>
     
  
    </div>
  <?php
}else{
echo "anda  belum beli apapun";
  }
  ?>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
    <?php include"footer.php";?>