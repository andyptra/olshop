  <?php include"header2.php";?>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
      <div class="col-md-3">
      <?php include"sidebar.php";?>
      </div>
        <div class="col-md-9">

             
              <div class="bordered">
              	<table class="TableCart table table-striped table-bordered table-hover" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
              <tr><th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
         
                <th>S</th>
                <th>M</th>
                <th>L</th>
                <th>XL</th>
                <th>Harga satuan</th>
                <th>Harga total</th>
                <th>Delete</th>
              </th>
            <?php
            session_start();
              $sid = session_id();
              $sql = mysql_query("SELECT * FROM keranjang, product WHERE id_session='$sid' AND keranjang.id_product=product.id");
              $x=mysql_fetch_array(mysql_query("select member_diskon from setting where id='1'"));
              $hitung = mysql_num_rows($sql);
              if ($hitung < 1){
                echo"<script>window.alert('Keranjang belanja kosong....');
                    window.location=('index.php')</script>";
                }
              else { echo"<form method=POST enctype=multipart/form-data action=admin/aksi.php?mod=keranjang&act=update>";
              
              $no = 1;
                while($bacaku=mysql_fetch_array($sql)){
                  /*
                   $disc        = ($r[diskon]/100)*$r[harga];
                    $hargadisc   = number_format(($r[harga]-$disc),0,",",".");
                    $subtotal    = ($r[harga]-$disc) * $r[jumlah];
                    $total       = $total + $subtotal;  
                    $subtotal_rp = format_rupiah($subtotal);
                    $total_rp    = format_rupiah($total);
                    $harga       = format_rupiah($r[harga]);
                  */
                  $disc     = ($bacaku[diskon]/100)*$bacaku[price];
                    $hargadisc     = number_format(($bacaku[price]-$disc),0,",",".");
                  $subtotal    = ($bacaku[price]-$disc) * ($bacaku[qty_s]+$bacaku[qty_m]+$bacaku[qty_l]+$bacaku[qty_xl]);
                  $total       = $total + $subtotal;  
                  $subtotal_rp = $subtotal;
                  $total_rp    = $total;
                  $harga       = $bacaku[price];

                  $potongan=($x[member_diskon]/100)*$total_rp;
                  $hasilakhir=$total_rp - $potongan;

                  $jmltotal=$bacaku[qty_s]+$bacaku[qty_m]+$bacaku[qty_l]+$bacaku[qty_xl];
                  echo"<tr><td>$no</td><input type=hidden name=id[$no] value=$bacaku[id_keranjang]>
                    <td><img width=50 src=admin/foto/$bacaku[feature_image]></td>
                    <td>$bacaku[product_name]</td>
                            <td><input type=text name=jmls[$no] value=$bacaku[qty_s] size=1></td>
                    <td><input type=text name=jmlm[$no] value=$bacaku[qty_m] size=1></td>
                    <td><input type=text name=jmll[$no] value=$bacaku[qty_l] size=1></td>
                    <td><input type=text name=jmlxl[$no] value=$bacaku[qty_xl] size=1></td>
                    <td>Rp. $hargadisc</td>
                    <td>Rp. $subtotal_rp</td>
                    <td><a href=input.php?input=delete&id=$bacaku[id_keranjang]>Hapus</a></td></tr>";
              $no++;
              $jumlah+=$jmltotal; 
                }?>

                <?php
include"config/koneksi.php";

session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){   
  echo"
                <tr><td colspan=8 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$total_rp</b></td></tr>";
}else{
   echo"<tr><td colspan=8 align=right>Potongan Member :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$potongan</b></td></tr>
                <tr><td colspan=8 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$hasilakhir</b></td></tr>";
  }
  ?>

             
                
                
             <?php
          echo"</table>";
                echo"<button class='btn btn-primary' type=submit value=update>Update Keranjang</button></form>";
              }
            ?>
            <a class="btn btn-success" href="index.php">Lanjut Belanja</a>
            <br/>
            <form action="order.php" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="jmlorder" value="<?php echo "$jumlah";?>">
                    <input type="hidden" name="harganologin" value="<?php echo"$total_rp";?>">
                    <input type="hidden" name="hargalogin" value="<?php echo"$hasilakhir";?>">
                    <button type="Submit" class="btn btn-default">selesai</button>
      </form>
            
            
    </div>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
    <?php include"footer.php";?>