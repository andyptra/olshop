
<?php if (empty($_POST[idku])){
  ?>
  <div class="panel panel-default">
                        <div class="panel-heading">
                          Upload Bukti Transfer
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <p>anda tidak punya item orderan</p>
                        
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->

                    </div>
<?php
}else{ 
  ?>


	<div class="panel panel-default">
                        <div class="panel-heading">
                          Upload Bukti Transfer
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                   <?php 
                      
                                  $ddx=mysql_fetch_array(mysql_query("select * from order_product where id='$_POST[idku]'"));
                      ?>
												
													<form action="aksi.php?mod=buktitf&act=buktitf" method="post" enctype="multipart/form-data">
												<input type="hidden" name="id_pelanggan" value="<?php echo"$ddx[id_pelanggan]";?>">
												  
											  
													<div class="form-group">
                               <label>Upload gambar</label><br/>
                           
                                <div id="uploadtf" orakuploader="on" name="gambar"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">upload</button>
											</form>
												
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->

                    </div>
<?php
}
?>
