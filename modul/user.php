
<?php
switch($_GET['act']){
	//Tampil user
	default:
	echo"<h2>Pelanggan</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>Nama user</th><th>username</th><th>no hp</th><th>alamat</th><th>aksi</th><th>edit password</th></tr></thead>";
		$sql = mysql_query("SELECT * FROM pelanggan  where username='$_SESSION[username]'");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tbody><tr><td>$no</td>
					<td>$r[nama]</td>
					<td>$r[username]</td>
					<td>$r[no_hp]</td>
					<td>$r[alamat]</td>
					
					<td>";
					?>
						<a href=?mod=user&act=edituser&id=<?php echo "$r[id_pelanggan]";?>  class='btn btn-primary'>
						<?php echo"<i class='fa fa-edit'></i></a>
					</td>
					";?>
					<td><a href=?mod=user&act=editpswd&id=<?php echo "$r[id_pelanggan]";?>  class='btn btn-primary'><i class='fa fa-edit'></i></a></td>
<?php
					echo "</tr></tbody>";
			$no++;
		}
		echo "</table></div></div>";

	break;
	

	
	
	//Form Edit user
	case"edituser":
	$edit = mysql_query("SELECT * FROM pelanggan WHERE  id_pelanggan='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=user&act=update>
		<input type=hidden name=id value=<?php echo "$r[id_pelanggan]";?>>
					<div class="form-group">
												   <label>nama pelanggan</label>
												   <input class="form-control" placeholder="nama user" name="nama" value="<?php echo "$r[nama]";?>" type="text">
												</div>

					<div class="form-group">
												   <label>no handphone</label>
												   <input class="form-control" placeholder="nomer hp" name="no_hp" value="<?php echo "$r[no_hp]";?>" type="text">
												</div>
					<div class="form-group">
												   <label>email</label>
												   <input class="form-control" placeholder="email" name="email" value="<?php echo "$r[email]";?>" type="text">
												</div>
					      
                    
												<div class="form-group">
												   <label>kodepos</label>
												   <input class="form-control" placeholder="kodepos" name="kodepos" value="<?php echo "$r[kodepos]";?>" type="text">
												</div>
					<div class="form-group">
                           <label>alamat</label>
                          <textarea name="alamat" class="form-control" rows="3"><?php echo $r[alamat] ?></textarea>
                        </div>

                          <div class="form-group">
														   <label>pertanyaan keamanan</label>
														   <?php echo"<select name='pertanyaan' class='form-control'>";
														   if($r[id_pertanyaan]==0){
															echo"<option value=0 selected>- Pilih pertanyaan keamanan -</option>";
														   }
														   $tampila=mysql_query("SELECT * FROM pertanyaan_keamanan ")or die("gagal".mysql_error());
														   while($c=mysql_fetch_array($tampila)){
														   if($r[id_pertanyaan]==$c[id_pertanyaan]){
														   echo "<option value='$c[id_pertanyaan]' selected>$c[pertanyaan]</option>";
														   }
														   else{
															   echo"<option value='$c[id_pertanyaan]'>$c[pertanyaan]</option>";
														   }
											}
														   echo "</select>";?>
														</div>

                        <br/>
              <div class="form-group">
												   <label>jawaban</label>
												   <input class="form-control" placeholder="nama user" name="jawaban" value="<?php echo "$r[jawaban]";?>" type="text">
												</div>
					
	            
				<div class="form-group">
												   <input type="submit" class="btn btn-info" value="simpan">
												   <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="batal">
												</div>        
				</form> </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div> 
                        <!-- /.panel-body -->
                    </div>
		<?php
	break;
	case"editpswd":
	?>
	<div class="panel panel-default">
                        <div class="panel-heading">
                          edit password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                   <?php
										  $edit=mysql_query("select * from pelanggan where id_pelanggan='$_GET[id]'")or die("gagal".mysql_error());
										  $d=mysql_fetch_array($edit);
										  ?>
											<form action="aksi.php?mod=user&act=updatepswd" method="post" enctype="multipart/form-data">
												<input type="hidden" name="id_pelanggan" value="<?php echo"$d[id_pelanggan]";?>">
												  
											  
													<div class="form-group">
													   <label>username</label>
													   <input class="form-control" placeholder="username" name="username" type="text" value="<?php echo "$d[username]";?>" readonly>
													</div>
													
													<div class="form-group">
													   <label>password</label>
													   <input class="form-control" placeholder="password" name="password" type="password" style="width: 100% !important;">
													</div>
													
													<div class="form-group">
													   <input type="submit" class="btn btn-info" value="simpan">
													   <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="batal">
											  </div>                               
											</form>
                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	<?php
	break;
}
?>