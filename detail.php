  <?php include"header2.php";?>
    <div id="details">
   
    </div><!--end nduwur---->
    <div class="row">
        
      <div class="col-md-3">
      <?php include"sidebar.php";?>
      </div>
        <div class="col-md-9">

             
              <div class="bordered">
              	<div class="media">

      <div class="media-left">
      <?php include"config/koneksi.php";


session_start();
    $c=$_GET[id];
    $_SESSION['sessionprod']=$c;
    $sessionproduks=$_SESSION['sessionprod'];
    $tampil=mysql_query("SELECT * FROM product where id='$c'");
   
    $r=mysql_fetch_array($tampil);
    $disc     = ($r[diskon]/100)*$r[price];
                        $hargadisc     = number_format(($r[price]-$disc),0,",",".");
    $str =$r[image];


$array =  explode('|', $str);


    ?>
        <ul id="etalage">
        <?php
        foreach ($array as $item) {
          ?>
    
     <li>
                <a href="optionallink.html">
                  <img class="etalage_thumb_image img-responsive" src="admin/foto/tn/<?php echo "$item";?>" alt="" >
                  <img class="etalage_source_image img-responsive" src="admin/foto/<?php echo "$item";?>" alt="" >
                </a>
              </li>
      <?php
        }
        ?>
             
           
            </ul>
      </div>
      <div class="media-body">
        <h3 class="media-heading"><?php echo"$r[product_name]";?></h3>
        <hr>
         <?php
                        if ($data[diskon]!= "0"){
                            $angkaa = "$r[price]";
                      $jumlah_desimala ="2";
                      $pemisah_desimala =",";
                      $pemisah_ribuana =".";
                      $notdis= "Rp ".number_format($angkaa, $jumlah_desimala, $pemisah_desimala, $pemisah_ribuana);


                            ?>
        <p>Harga : Rp. <b><?php echo "$hargadisc";?>,00 <br/>
        <b style='text-decoration:line-through;'><?php echo "$notdis";?></b><b>&nbsp;&nbsp;&nbsp;-<?php echo "$r[diskon]";?>%</b></p>
        <?php
         }else{
                              $angkaa = "$r[price]";
                      $jumlah_desimala ="2";
                      $pemisah_desimala =",";
                      $pemisah_ribuana =".";
                      $hartot= "Rp ".number_format($angkaa, $jumlah_desimala, $pemisah_desimala, $pemisah_ribuana);
                            ?>
                             <p>Harga : Rp. <b><?php echo "$hartot";?> </p>
                             <?php
                       } 

                        ?>
             
        <hr>                    

<p>Stok dalam ukuran</p>
   
 <form action="input.php?input=add" method="Post" enctype="multipart/form-data">
<div class="form-group">
 
    <div class="col-xs-2">

        <select name="belis" class="form-control">
        <option value=0 selected> S </option>
        <?php for($i=0; $i<=$r[stok_s];$i++){
                  ?>

                 <option value="<?php echo "$i";?>"><?php echo "$i";?></option>
                  <?php
                  }
                  ?>
        </select>
    </div>
    <div class="col-xs-2">
        <select name="belim" class="form-control">
        <option value=0 selected> M </option>
            <?php for($i=0; $i<=$r[stok_m];$i++){
                  ?>
                 <option value="<?php echo "$i";?>"><?php echo "$i";?></option>
                  <?php
                  }
                  ?>
        </select>
    </div>
      <div class="col-xs-2">
        <select name="belil" class="form-control">
        <option value=0 selected> L </option>
            <?php for($i=0; $i<=$r[stok_l];$i++){
                  ?>
                 <option value="<?php echo "$i";?>"><?php echo "$i";?></option>
                  <?php
                  }
                  ?>
        </select>
    </div>
      <div class="col-xs-2">
        <select name="belixl" class="form-control">
        <option value=0 selected> XL </option>
            <?php for($i=0; $i<=$r[stok_xl];$i++){
                  ?>
                 <option value="<?php echo "$i";?>"><?php echo "$i";?></option>
                  <?php
                  }
                  ?>
        </select>
    </div>
</div>
  <br/>              
        <hr>
        <P>Deskripsi : <?php echo"$r[deskripsi]";?></P>
        <br>
         <p>  </p>
        
        
                   <input type="hidden" name="ids" value=" <?php echo $r[id]?>">
                   
                    
                    <button type="Submit" class="btn btn-primary">Beli</button>
                  </form>
                  <br>
               
                 
         <a href="javascript:history.go(-1)" class="btn btn-primary" style="
    position: relative;
    top: -54px;
    left: 123px;
" role="button">Kembali</a></p>
        <form action="pemesanan.php" method="post">
          <input type="hidden" name="sessionprod"  value="<?php echo "$sessionproduks";?>">
          <button type="Submit" class="btn btn-primary" style="
    position: relative;
    top: -98px;
    left: 53px;
" rel="popover" id='el3' data-trigger="hover" data-content="jika anda ingin melakukan pemesanan dalam jumlah banyak, bisa klik tombol pesan" title="info">pesan</button>
        </form>
       </div>
    </div>

<div class="bordered">
<div class="row"> 


    <div class="col-sm-8">
        <div class="panel panel-white post ">
           <h2>komentar</h2>
            <div class="post-footer">
                
                <ul class="comments-list">
                <?php
                function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
                   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
                  $BulanIndo = array("Januari", "Februari", "Maret",
                   "April", "Mei", "Juni",
                   "Juli", "Agustus", "September",
                   "Oktober", "November", "Desember");
                  $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
                  $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
                  $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
                  $zzesult = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                  return($zzesult);
                }
                $tm=mysql_query("SELECT riview.*, pelanggan.nama FROM riview,pelanggan,product WHERE riview.id_pelanggan=pelanggan.id_pelanggan AND riview.id_product='$r[id]' AND product.id=riview.id_product AND riview.terbit='Y'");
                while ($s=mysql_fetch_array($tm)) {?>
                   <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user"><?php echo "$s[nama]";?></h4>

                                <h5 class="time"><?php echo "$s[jam]";?> - <?php echo DateToIndo($s[tgl]);?>  </h5><a href="hapuskomentsendiri.php?id=<?php echo "$s[id_pelanggan]";?>"<i class="btn-danger fa fa-close"></i></a>
                            </div>
                                <h4 class="user"><?php echo "$s[judul]";?></h4>
                            <p><?php echo "$s[isi]";?></p>
                            <hr>
                        </div>
                      
                    </li>
               <?php }
                ?>
                  
                     
                </ul>
            </div>
            
                
        </div>
         
         <?php 
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){  ?>
 <h3>login untuk menambahkan komentar</h3>
                          <div class="form-group">
                           <a href="#login" data-toggle="modal" data-target=".loginbro"> <button class="btn btn-success unggu btn-circle text-uppercase " type="submit" ><span class="glyphicon glyphicon-log-in"></span> Login</button></a>
                            
                        </div>
                        <?php }else{
                          ?>
                         <?php 
                         $d=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
                         $dd=mysql_fetch_array(mysql_query("select * from riview where id_pelanggan='$d[id_pelanggan]' and id_product='$r[id]'"));
                          if(!empty($dd[id_pelanggan])){?>
                              <h3>Maaf anda sudah melakukan riview</h3>
                          <?php
                        }else {
                          ?>
                            
                          

                        <h3>tambah komentar</h3>
                        <form action="proseskoment.php" method="post" enctype="multipart/form-data"  > 
                        <input type="hidden" name="id_prod" value="<?php echo "$r[id]";?>">
                          <div class="form-group">
                         
                        
                           <select  name='rating' class='form-control' required='required'>
                           <option value=0 selected>- Rating Produk-</option>";
                           
                           <option value='1'>1 Star</option>
                            <option value='2'>2 Star</option>
                             <option value='3'>3 Star</option>
                              <option value='4'>4 Star</option>
                               <option value='5'>5 Star</option>
                           
                           </select>
                           
                        </div>
         <div class="form-group"> 
                    <input class="form-control" placeholder="judul komentar" name="judul" type="text" required='required'>
                    
                </div>
                  <div class="form-group">
                       
                          <textarea name="isi" class="form-control" rows="3" required='required' placeholder="isi komentar" ></textarea>
                        </div>

                         <div class="form-group">
                                   
                                        <img src="gambar.php" alt="gambar" />
                                       
                                  
                                </div>
                                <div class="form-group">
                                    
                                
                                        <input type="text" class="form-control" name="nilaiCaptcha" placeholder="captcha" maxlength="6" required="required">
                                 
                                </div>
              <div class="form-group">
                            <button class="btn btn-success  btn-circle text-uppercase " type="submit" ><span class="glyphicon glyphicon-send"></span> Submit comment</button>
                            
                        </div></form><?php
                      }
                      ?>
                          <?php
                          }?>
    </div>



</div>

    </div>
    </div>
              



            </div><!--col md 9 ---->
    </div><!--end rows---->
    <?php include"footer.php";?>