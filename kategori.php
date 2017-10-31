  <?php include"header2.php";?>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
      <div class="col-md-3">
      <?php include"sidebar.php";?>
      </div>
        <div class="col-md-9">

           <div class="row">
		  
      <?php
 
	 
$cat=$_GET['cat'];

                        $sql = mysql_query("SELECT * FROM product WHERE id_category='$cat' ") or die ("Query gagal dengan error: ".mysql_error());
                      
                        while($data=mysql_fetch_array($sql)){
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
                        ?> 
			</div>		   
              
                  



            </div><!--col md 9 ---->
    </div><!--end rows---->
   <?php include"footer.php"; ?>