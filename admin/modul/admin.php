
<?php
switch($_GET['act']){
	//Tampil user
	default:
	echo"<h2>admin</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		<input class='btn btn-primary' type=button value='Tambah admin' onClick=location.href='?mod=admin&act=adduser'>
		</div></div>
		<div class='panel panel-default'>
                        
	
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>nama</th><th>username</th><th>email</th><th>aksi</th><th>edit password</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT * FROM user  ");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
				<td>$r[nama]</td>
					<td>$r[id_user]</td>
					
					<td>$r[email]</td>
					
					
					<td>";
					?>
						<?php if ($r[id_user] == $_SESSION['username'] )   {?><a href=?mod=admin&act=edituser&id=<?php echo "$r[id]";?>  class='btn btn-primary'>
						<i class='fa fa-edit'></i></a><?php
					 }else{
						echo "";

					}
					?>
					</td>
					
					<td><?php if ($r[id_user] == $_SESSION['username'] )   {?>
						<a href=?mod=admin&act=editpswd&id=<?php echo "$r[id]";?>  class='btn btn-primary'><i class='fa fa-edit'></i></a>
					<?php
					 }else{
						echo "";

					}
					?></td>
<?php
					echo "</tr>";
			$no++;
		}
		echo "</tbody></table></div></div>";

	break;
	

	 case"adduser":
	 ?>
	 	<div class="panel panel-default">
                        <div class="panel-heading">
                          edit user
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=user&act=insert>
		<input type=hidden name=id value=<?php echo "$r[id]";?>>
		<div class="form-group">
												   <label>username</label>
												   <input class="form-control" placeholder="username" name="username" value="" type="text" >
												</div>

					<div class="form-group">
												   <label>nama</label>
												   <input class="form-control" placeholder="nama " name="nama" value="" type="text">
												</div>

					
					<div class="form-group">
												   <label>email</label>
												   <input class="form-control" placeholder="email" name="email" value="" type="text">
												</div>
					   <div class="form-group">
												   <label>password</label>
												   <input class="form-control" placeholder="password" name="password" value="" type="text">
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
	
	//Form Edit user
	case"edituser":
	$edit = mysql_query("SELECT * FROM user WHERE  id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit user
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=user&act=update>
		<input type=hidden name=id value=<?php echo "$r[id]";?>>
		<div class="form-group">
												   <label>username</label>
												   <input class="form-control" placeholder="nama " name="ids" value="<?php echo "$r[id_user]";?>" type="text" readonly>
												</div>

					<div class="form-group">
												   <label>nama</label>
												   <input class="form-control" placeholder="nama user" name="nama" value="<?php echo "$r[nama]";?>" type="text">
												</div>

					
					<div class="form-group">
												   <label>email</label>
												   <input class="form-control" placeholder="email" name="email" value="<?php echo "$r[email]";?>" type="text">
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
										  $edit=mysql_query("select * from user where id='$_GET[id]'")or die("gagal".mysql_error());
										  $d=mysql_fetch_array($edit);
										  ?>
											<form action="aksi.php?mod=user&act=updatepswd" method="post" enctype="multipart/form-data">
												<input type="hidden" name="id" value="<?php echo"$d[id]";?>">
												  
											  
													<div class="form-group">
													   <label>username</label>
													   <input class="form-control" placeholder="username" name="username" type="text" value="<?php echo "$d[id_user]";?>" readonly>
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