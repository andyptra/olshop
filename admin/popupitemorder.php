<?php
include"../config/koneksi.php";
$kd_k = $_POST['id'];

// query untuk menampilkan  berdasarkan id pegawai


?>
 <div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
    <table class='TableCart table table-striped table-bordered table-hover' id='dataTables-example'>   <thead>
      <tr><th>no</th><th>nama</th><th>foto produk</th><th>Jumlah</th><th>Harga</th></tr></thead>
      <?php 
      $cus=mysql_fetch_array(mysql_query("select  * from  order_product where id='$kd_k'"));
   $query=mysql_query("SELECT * from detail_order_product where id_order_product='$kd_k' ")or die("gagal".mysql_error());
    $no = 1;
    $x=mysql_fetch_array(mysql_query("select member_diskon from setting where id='1'"));

    while ($r=mysql_fetch_array($query)){
 $xz=mysql_fetch_array(mysql_query("SELECT product.* FROM product WHERE product.id='$r[id_product]'"));
   $disc     = ($xz[diskon]/100)*$xz[price];
                    $hargadisc     = number_format(($xz[price]-$disc),0,",",".");
                    $subtotal    = ($xz[price]-$disc) * ($r[jumlah_s]+$r[jumlah_m]+$r[jumlah_l]+$r[jumlah_xl]);
                  $total       = $total + $subtotal;  
                  $subtotal_rp = $subtotal;
                  $total_rp    = $total;
                  $harga       = $xz[price];

                  $potongan=($x[member_diskon]/100)*$total_rp;
                  $hasilakhir=$total_rp - $potongan;

                     
      echo"<tbody><tr><td>$no</td>
          <td>$xz[product_name]</td>";
          ?>
          <td><img width=50 src="foto/<?php echo "$xz[feature_image]";?>"></td>
         <td><?php echo "$r[jumlah_s](S),$r[jumlah_m](M),$r[jumlah_l](L),$r[jumlah_xl](XL)";?></td>
          <td ><?php echo "Rp. $hargadisc"?> </td>
          </tr>
          
      <?php 
      $no++;
    }
    if (empty($cus[id_pelanggan])){
 echo "<tr><td colspan=4 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$total_rp</b></td></tr>";
    }else{
 echo "<tr><td colspan=4 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$total_rp</b></td></tr>
<tr><td colspan=4 align=right>Potongan Member :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$potongan</b></td></tr>
                <tr><td colspan=4 align=right>Total Yang Harus Dibayar :&nbsp;&nbsp;&nbsp;</td><td>Rp. <b>$hasilakhir</b></td></tr>";
    }
   
     ?>
</tbody>
    </table></div></div>

    