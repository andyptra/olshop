<?php
$aksi="aksi.php";
switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysql_query("SELECT * FROM setting where id ='1'");
    $d    = mysql_fetch_array($sql);
	?>
    

 <div class="panel panel-default">
                        <div class="panel-heading">
                          Setting
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
      <form method=POST enctype='multipart/form-data' action='aksi.php?mod=setting&act=update'>
        <input type=hidden name=id value=<?php echo "$d[id]";?>>
        <div class="form-group">
                           <label>nama website</label>
                           <input class="form-control"  name="judul" value="<?php echo $d[nama_olshop]?>" type="text">
                        </div>
                        <div class="form-group">
                           <label>Alamat website</label>
                           <input class="form-control"  name="domain" type="text" value="<?php   echo  $d[domain] ?>">
                        </div>
         <div class="form-group">
                           <label>meta keyword</label>
                          <textarea name="katakunci" class="form-control" rows="3"><?php echo $d[katakunci] ?></textarea>
                        </div>
<div class="form-group">
                           <label>meta diskripsi</label>
                          <textarea name="deskripsi" class="form-control" rows="3"><?php echo $d[deskripsi] ?></textarea>
                        </div>

                            <div class="form-group">
                           <label>Pemilik website</label>
                           <input class="form-control"  name="nama" type="text" value="<?php   echo  $d[nama] ?>">
                        </div>
                        <div class="form-group">
                           <label>Member Diskon(dalam satuan persen)</label>
                           <input class="form-control"  name="memberdisc" type="text" value="<?php   echo  $d[member_diskon] ?>">
                        </div>
        <div class="form-group">
                           <label>email</label>
                           <input class="form-control"  name="email" type="text" value="<?php  echo  $d[email] ?>">
        <div class="form-group">
                           <label>No handphone</label>
                           <input class="form-control"  name="telp" type="text"value="<?php echo  $d[no_telp] ?>">
        <div class="form-group">
        <div class="form-group">
                           <label>Bbm</label>
                           <input class="form-control"  name="bbm" type="text" value="<?php  echo  $d[bbm] ?>">
         <div class="form-group">
                           <label>line</label>
                           <input class="form-control"  name="line" type="text" value="<?php  echo  $d[line] ?>">

           <div class="form-group">
                           <label>instagram</label>
                           <input class="form-control"  name="instagram" type="text" value="<?php  echo  $d[instagram] ?>">
           <div class="form-group">
                           <label>rek bank</label>
                           <input class="form-control"  name="bank" type="text" value="<?php  echo  $d[bank] ?>">
        <div class="form-group">
                           <label>alamat</label>
                          <textarea name="alamat" class="form-control" rows="3"><?php echo $d[alamat_olshop] ?></textarea>
                        </div>
        
        
       
      
        
                                                              
              <div class="form-group">
                           <input type="submit" class="btn btn-info" value="update">
                           
                        </div>   </form></div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


   <?php
    break;  
}
?>
