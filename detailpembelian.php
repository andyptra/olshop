  <?php include"header2.php";?>
  <style type="text/css">
    .anu{
      border-bottom: 2px dotted;
      width:284px;
    }
  </style>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
    
        <div class="col-md-12">

             
              <div class="bordered">

            
              <?php
              include "config/koneksi.php";
              session_start();
              $qq=mysql_fetch_array(mysql_query("SELECT * from order_product WHERE kodepembayaran='$_SESSION[kodebayar]'"));
               if(!empty($_SESSION[kodebayar])){

               ?>

    <h4 class="anu">KODE PEMBAYARAN :<?php echo " $_SESSION[kodebayar]"?></h4>       
     <div class="alert alert-info">
  <strong>INFO!</strong> CATAT DAN SIMPAN KODE PEMBAYARAN, KODE PEMBAYARAN DIGUNAKAN UNTUK MELAKUKAN KONFIRMASI PEMBAYARAN
  <br/>
  
</div>    
               <br/>
<?php

?>
                <table class="TableCart table table-striped table-bordered table-hover" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
              <tr><th>No</th>
               <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga satuan</th>
                                <th>Sub  total</th>
                
              </th>
              <?php
              $no=1;
              $tmp=mysql_query("SELECT detail_order_product.* FROM detail_order_product,order_product WHERE order_product.id=detail_order_product.id_order_product AND order_product.id='$qq[id]'");
              while ($rr=mysql_fetch_array($tmp)) {
              

                $xz=mysql_fetch_array(mysql_query("SELECT product.* FROM product WHERE product.id='$rr[id_product]'"));

                   $disc     = ($xz[diskon]/100)*$xz[price];
                    $hargadisc     = number_format(($xz[price]-$disc),0,",",".");
                  $subtotal    = ($xz[price]-$disc) * ($rr[jumlah_s]+$rr[jumlah_m]+$rr[jumlah_l]+$rr[jumlah_xl]);
                  $total       = $total + $subtotal;  
                  $subtotal_rp = $subtotal;
                  $total_rp    = $total;
                  $harga       = $rr[price];

                ?>
              
           <tr><td><?php echo "$no";?></td>
                    <td><img width=50 src=admin/foto/<?php echo "$xz[feature_image]";?>></td>
                    <td><?php echo "$xz[product_name]";?></td>
                    <td><?php echo "$rr[jumlah_s](S),$rr[jumlah_m](M),$rr[jumlah_l](L),$rr[jumlah_xl](XL)";?></td>
                    <td>Rp. <?php echo $hargadisc ;?></td>
                    <td>Rp. <?php echo $subtotal_rp ;?></td>
                    </tr>

               
             <?php
             $no++;
               } 
              ?>
                
                <tr><td colspan=5 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b><?php echo $total_rp ;?></b></td></tr> 
        
         </table>

       <div class="panel panel-info">
      <div class="panel-heading nava">Biodata Pembeli</div>
      <div class="panel-body"><p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; <?php echo "$qq[name]";?></p>
      <p>No Telpon &nbsp;&nbsp;: &nbsp;<?php echo "$qq[phone]";?></p>
      <p>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$qq[address]";?></p>
      <p>KodePos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$qq[kodepos]";?></p>
      <p><b>Harga total &nbsp;&nbsp;: &nbsp;<?php echo "$qq[hargatotal]";?></b></p>
      </div>
    </div>
    <?php
    $ss=mysql_fetch_array(mysql_query("SELECT * from setting WHERE id='1'"));
    ?>
           <div class="panel  panel-info">
      <div class="panel-heading nava">Transfer Ke</div>
      <div class="panel-body"><p>Nama Pemilik Rekening : &nbsp; <?php echo "$ss[nama]";?></p>
      <p>Bank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$ss[nama_bank]";?></p>
      <p>Nomer Rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$ss[bank]";?></p>
      
      </div>
    </div>    

     <div class="alert alert-info">
  <strong>INFO!</strong> JIKA SUDAH MELAKUKAN TRANSFER MASUK KE MENU KONFIRMASI PEMBAYARAN, KLIK DIBAWAH
   <form action="uploadbuktitf.php" method="Post" enctype="multipart/form-data" target="_blank">
                    <input type="hidden" name="kodebayar" value="<?php echo"$_SESSION[kodebayar]";?>">
                    
                    <button type="Submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
      </form>
  <br/>
  
</div>  
  <?php
}else{
echo "anda  belum beli apapun";
  }
  ?>     
    </div>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
    <?php include"footer.php";?>