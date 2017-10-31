<?php
include"config/koneksi.php";
session_start();
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
            <div class="va panel-heading ">Keranjang Belanja</div>
            <div class="panel-body">
          <div class="shopping_cart">
   
              <div class="cart_details">
                               <?php
            
                  $sid = session_id();
                  

                  $sql = mysql_query("SELECT * FROM keranjang, product WHERE id_session='$sid' AND keranjang.id_product=product.id");
                  $row = mysql_num_rows($sql);
                  $jml = mysql_fetch_array($sql);
                  
                  echo "<span class='KetCart'><a href='chart.php'>$row item produk</a></span>";
                  ?>
              </div>    
              <div class="cart_icon"><img src="images/shoppingcart.png" alt="" title="" width="48" border="0" height="48">
              </div>        
            </div>
            </div>
        </div>


<div class="panel panel-default">
  <!-- Default panel contents -->
            <div class="va panel-heading ">Kategori</div>
            <div class="panel-body">
                <ul class="list-group">
         <?php 
              $kat = mysql_query("SELECT category, category.id from category join product on product.id_category=category.id group by category") or die(mysql_error());
              while($r=mysql_fetch_array($kat)){
                ?>
               <li  class='list-group-item' >
               <a href='kategori.php?cat=<?php echo  $r[id];?>'><?php echo $r[category];?></a>
               </li>
              <?php
            }
            ?>

                 
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
  <!-- Default panel contents -->
            <div class="va panel-heading ">Testimoni</div>
            <div class="panel-body">
            
                <ul class="list-group" >
        <?php 
              $tes= mysql_query("SELECT testimoni.*,pelanggan.nama from testimoni,pelanggan WHERE testimoni.id_pelanggan=pelanggan.id_pelanggan") or die(mysql_error());
              while($rs=mysql_fetch_array($tes)){
                ?>
               <li class='list-group-item' style="height:300px" >
               <div class="marquee ver" data-direction='down' data-duration=5000><b><?php echo "$rs[nama]";?></b><br/><?php echo "$rs[isi]";?> <hr></div>
              
               </li>
            <?php
            }
            ?>
 
                </ul>
            </div>
        </div>