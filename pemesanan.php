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
    if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
      echo "silahkan login untuk proses pemesanan";
    }else{

$_SESSION['kodepesenprod']=$_POST[sessionprod];
$myprod=$_SESSION['kodepesenprod'];
           $xxz=mysql_fetch_array(mysql_query("select * from product where id='$myprod'"));  
            $disc     = ($xxz[diskon]/100)*$xxz[price];
            $hargadisc     = $xxz[price]-$disc;
         ?>
            
    <h4 class="anu">ITEM : <?php echo "$xxz[product_name] "?></h4>       
     
               <br/>
           <form action="proses_pemesanan.php" method="post">

  <input type="hidden" name="idbar" value="<?php echo "$myprod";?>">
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
                           <label>jumlah uk S</label>
                           <input class="form-control" required="required"  placeholder="jumlah pre order" id="txt1" onkeyup="sum();" name="jumlah" value="" type="text">
                        </div>
                        <div class="form-group">
                           <label>jumlah uk M</label>
                           <input class="form-control" required="required"  placeholder="jumlah pre order" id="txt11" onkeyup="sum();" name="jumlah1" value="" type="text">
                        </div>
                        <div class="form-group">
                           <label>jumlah uk L</label>
                           <input class="form-control" required="required"  placeholder="jumlah pre order" id="txt12" onkeyup="sum();" name="jumlah2" value="" type="text">
                        </div>
                        <div class="form-group">
                           <label>jumlah uk XL</label>
                           <input class="form-control" required="required"  placeholder="jumlah pre order" id="txt13" onkeyup="sum();" name="jumlah3" value="" type="text">
                        </div>
             <div class="form-group">
                           <label>harga satuan</label>
                           <input class="form-control" required="required"  placeholder="harga1" name="harga1" id="txt2" onkeyup="sum();" value="<?php echo "$hargadisc";?>" type="text" readonly>
                        </div>
                         
                       <div class="form-group">
                           <label>jml item</label>
                           <input class="form-control" required="required"  placeholder="total item" name="jmltotal" id="txt4s" value="" type="text" readonly>
                        </div>
                        <div class="form-group">
                           <label>berat per item</label>
                           <input class="form-control" required="required"  placeholder="0.25 kg" name="beratitem" id="itemberat" value="" type="text" readonly>
                        </div>
                         <div class="form-group">
                           <label>Berat total (kg)</label>
                           <input class="form-control" required="required"  placeholder="" name="berattotal" id="berattotal" value="" type="text" readonly>
                        </div>
                       
                         <div class="form-group">
                           <label>Tarif per kg</label>
                           <input class="form-control" required="required"  placeholder="" name="tarif" id="tarif" value="" type="text">
                        </div>
                        <div class="form-group">
                           <label>total harga barang</label>
                           <input class="form-control" required="required"  placeholder="total" name="total" id="txt3" value="" type="text" readonly>
                        </div>
                        <div class="form-group">
                           <label>total ongkir</label>
                           <input class="form-control" required="required"  placeholder="" name="tottarif" id="tottarif" value="" type="text" readonly>
                        </div>
                        
      <div class="form-group">
                           <label>total harga plus ongkir</label>
                           <input class="form-control" required="required"  placeholder="" name="grandtotal" id="grandtotal" value="" type="text" readonly>
                        </div>
                        
  
 
    <?php 
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
         
            
        </form>
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
    <?php
  }
    ?>
    </div>
              

            </div><!--col md 9 ---->
    </div><!--end rows---->
    <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var aa = document.getElementById('txt11').value;
      var bb = document.getElementById('txt12').value;
      var cc = document.getElementById('txt13').value;
      var result = (parseInt(txtFirstNumberValue)+parseInt(aa)+parseInt(bb)+parseInt(cc)) * parseInt(txtSecondNumberValue);

       var results = parseInt(txtFirstNumberValue)+parseInt(aa)+parseInt(bb)+parseInt(cc) ;
       var resultss=(parseInt(txtFirstNumberValue)+parseInt(aa)+parseInt(bb)+parseInt(cc)) /4;
       var brat = document.getElementById('berattotal').value;
        var tar = document.getElementById('tarif').value;
       var totalongkir= resultss * parseFloat(tar);
       var grandtotals= result + totalongkir;

        if (!isNaN(grandtotals)) {
         document.getElementById('grandtotal').value = grandtotals;
      }

        if (!isNaN(totalongkir)) {
         document.getElementById('tottarif').value = totalongkir;
      }
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
       if (!isNaN(results)) {
         document.getElementById('txt4s').value = results;
      }
       if (!isNaN(resultss)) {
         document.getElementById('berattotal').value = resultss;
      }
}
</script>

    <?php include"footer.php";?>