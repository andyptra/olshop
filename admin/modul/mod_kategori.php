
<?php
switch($_GET['act']){
	//Tampil Kategori
	default:
	echo"<h2>List Kategori</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		<input class='btn btn-primary' type=button value='Tambah Kategori' onClick=location.href='?mod=category&act=addkategori'>
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>Nama kategori</th><th>aksi</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT * FROM category ORDER BY id DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
					<td>$r[category]</td>
					
					<td><a href=?mod=category&act=editkategori&id=$r[id] class='btn btn-info'><i class='fa fa-edit'></i></a>
						<a href=aksi.php?mod=category&act=hapus&id=$r[id] class='btn btn-danger'><i class='fa fa-trash'></i></a>
					</td></tr>";
			$no++;
		}
		echo "</tbody></table></div></div>";

	break;
	
	//Form Add Kategori
	case "addkategori":
	?>
		
			<div class="panel panel-default">
                        <div class="panel-heading">
                          tambah kategori
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=category&act=input>
		
					<div class="form-group">
												   <label>nama kategori</label>
												   <input class="form-control" placeholder="nama Kategori" name="nama_kategori" type="text">
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
	
	//Form Edit Category
	case"editkategori":
	$edit = mysql_query("SELECT * FROM category WHERE id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit kategori
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=category&act=input>
		<input type=hidden name=id value=<?php echo "$r[id]";?>>
					<div class="form-group">
												   <label>nama kategori</label>
												   <input class="form-control" placeholder="nama Kategori" name="nama_kategori" value="<?php echo "$r[category]";?>" type="text">
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