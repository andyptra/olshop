
<?php
switch($_GET['act']){
	//Tampil user
	default:
	echo"<h2>List pelanggn</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>Nama user</th><th>username</th><th>no hp</th><th>alamat</th><th>aksi</th></tr></thead>";
		$sql = mysql_query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
					<td>$r[nama]</td>
					<td>$r[username]</td>
					<td>$r[no_hp]</td>
					<td>$r[alamat]</td>
					
					<td>";
					?>
						<a href=hapuspelanggan.php?id=<?php echo "$r[id_pelanggan]";?> onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class='btn btn-danger'>
						<?php echo"<i class='fa fa-trash'></i></a>
					</td></tr></tbody>";
			$no++;
		}
		echo "<tbody></table></div></div>";

	break;
	
	//Form Add user
	case "adduser":
	?>
		
			<div class="panel panel-default">
                        <div class="panel-heading">
                          tambah pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=user&act=input>
		
					<div class="form-group">
												   <label>nama pelanggan</label>
												   <input class="form-control" placeholder="nama user" name="nama_user" type="text">
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
	$edit = mysql_query("SELECT * FROM pelanggan WHERE id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=user&act=input>
		<input type=hidden name=id value=<?php echo "$r[id_pelanggan]";?>>
					<div class="form-group">
												   <label>nama pelanggan</label>
												   <input class="form-control" placeholder="nama user" name="nama_user" value="<?php echo "$r[user]";?>" type="text">
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
}
?>