  <?php include"header2.php";?>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
      <div class="col-md-3">
      <?php include"sidebar.php";?>
      </div>
        <div class="col-md-9">

             
              <div class="bordered">

              <h2 class="Judul">Form Pemesanan</h2>
        <form action="input.php?input=inputform" method="post">
 <?php
include"config/koneksi.php";

session_start();
$_SESSION['hartot']=$_POST[harganologin];
$_SESSION['hartotpot']=$_POST[hargalogin];
$_SESSION['jmlorder']=$_POST[jmlorder];
$jmlorder=$_SESSION['jmlorder'];
$hargatot=$_SESSION['hartot'];
$hargatotlog=$_SESSION['hartotpot'];
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){   
  ?>
  <input type="hidden" name="harganologins" value="<?php echo "$hargatot";?>">
 
            <div class="form-group">
                           <label>nama pelanggan</label>
                           <input class="form-control" required="required"  placeholder="nama" name="name" value="" type="text">
                        </div>
             <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" required="required"  placeholder="email" name="email" value="" type="text">
                        </div>
                         <div class="form-group">
                           <label>No Handphone</label>
                           <input class="form-control" required="required"  placeholder="No handphone" name="telp" value="" type="text">
                        </div>
                             <div class="form-group">
                           <label>Masukkan kota tujuan pengiriman</label>
                           <select name="id_kota" id="id_kota" class="form-control" style="width: 100%;">
                          <?php $xxza=mysql_query("select * from kota order by nama_kota ASC");
                          while ($xxa=mysql_fetch_array($xxza)) {
                           ?>
                           <option value="<?php echo $xxa[id_kota] ?>"><?php echo $xxa[nama_kota] ?></option>
                           <?php

                          } ?>

                    </select>
                        </div>

                         <div class="form-group">
                           <label>Tarif per kg</label>
                           <input class="form-control" required="required"  placeholder="" name="tarif" id="tarif" onfocus="sum();" value="" type="text">
                        </div>
                         <div class="form-group">
                           <label>jml item</label>
                           <input class="form-control" required="required"  placeholder="total item" name="jmlorder" onfocus="sum();" id="jmlorder" value="<?php echo "$jmlorder";?>" type="text" readonly>
                        </div>
                        <div class="form-group">
                           <label>total ongkir</label>
                           <input class="form-control" required="required"  placeholder="" name="tottarif" id="tottarif" value="" type="text" readonly>
                        </div>
                        <div class="form-group">
                           <label>Kodepos</label>
                           <input class="form-control" required="required"  placeholder="Kodepos" name="kodepos" value="" type="text">
                        </div>
            <div class="form-group">
                           <label>Alamat</label>
                          <textarea name="address" class="form-control" required="required"  placeholder="isikan alamat lengkap karena untuk pengiriman barang" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button class='btn btn-primary' type=submit value=update>order</button>
                        </div>
         
           <?php }else{
             $d=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
            ?>
             <input type="hidden" name="hargalogins" value="<?php echo "$hargatotlog";?>">
             <div class="form-group">
                           <label>nama pelanggan</label>
                           <input class="form-control" required="required"  placeholder="nama" name="name" value="<?php echo "$d[nama]";?>" type="text">
                        </div>
             <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" required="required"  placeholder="email" name="email" value="<?php echo "$d[email]";?>" type="text">
                        </div>
                         <div class="form-group">
                           <label>No Handphone</label>
                           <input class="form-control" required="required"  placeholder="No handphone" name="telp" value="<?php echo "$d[no_hp]";?>" type="text">
                        </div>
                           <div class="form-group">
                           <label>Masukkan kota tujuan pengiriman</label>
                           <select name="id_kota" id="id_kota" class="form-control" style="width: 100%;">
                          <?php $xxza=mysql_query("select * from kota order by nama_kota ASC");
                          while ($xxa=mysql_fetch_array($xxza)) {
                           ?>
                           <option value="<?php echo $xxa[id_kota] ?>"><?php echo $xxa[nama_kota] ?></option>
                           <?php

                          } ?>

                    </select>
                        </div>

                         <div class="form-group">
                           <label>Tarif per kg</label>
                           <input class="form-control" required="required"  placeholder="" name="tarif" id="tarif" onfocus="sum();" value="" type="text">
                        </div>
                         <div class="form-group">
                           <label>jml item</label>
                           <input class="form-control" required="required"  placeholder="total item" name="jmlorder" onfocus="sum();" id="jmlorder" value="<?php echo "$jmlorder";?>" type="text" readonly>
                        </div>
                        <div class="form-group">
                           <label>total ongkir</label>
                           <input class="form-control" required="required"  placeholder="" name="tottarif" id="tottarif" value="" type="text" readonly>
                        </div>
                         <div class="form-group">
                           <label>Kodepos</label>
                           <input class="form-control" required="required"  placeholder="Kodepos" name="kodepos" value="<?php echo "$d[kodepos]";?>" type="text">
                        </div>
            <div class="form-group">
                           <label>Alamat</label>
                          <textarea name="address" class="form-control" required="required"   placeholder="isikan alamat lengkap karena untuk pengiriman barang" rows="3"><?php echo "$d[alamat]";?></textarea>
                        </div>
                        <div class="form-group">
                            <button class='btn btn-primary' type=submit value=update>order</button>
                        </div>
            <?php
           }?>
            
        </form>
              
    </div>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
        <script>
function sum() {
    var brat = document.getElementById('jmlorder').value;
        var tar = document.getElementById('tarif').value;
       var totalongkir= parseInt(tar) * parseInt(brat/4)  ;
        if (!isNaN(totalongkir)) {
         document.getElementById('tottarif').value = totalongkir;
      }
       }
</script>
    <?php include"footer.php";?>