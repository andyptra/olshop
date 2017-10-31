
<?php
switch($_GET['act']){
	//Tampil slidshow
	default:
	echo"<h2>List slideshow</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		<input class='btn btn-primary' type=button value='Tambah slidshow' onClick=location.href='?mod=slideshow&act=addslidshow'>
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>caption</th><th>gambar</th><th>aksi</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT * FROM slidshow ORDER BY id DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
					<td>$r[caption]</td>
					<td><img width=50 src='foto/$r[image]'></td>
					<td><a href=?mod=slideshow&act=editslidshow&id=$r[id] class='btn btn-info'><i class='fa fa-edit'></i></a>
						<a href=aksi.php?mod=slideshow&act=del&id=$r[id] class='btn btn-danger'><i class='fa fa-trash'></i></a>
					</td></tr>";
			$no++;
		}
		echo "</tbody></table></div></div>";

	break;
	
	//Form Add slidshow
	case "addslidshow":
	?>
		
			<div class="panel panel-default">
                        <div class="panel-heading">
                          tambah slideshow
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=slideshow&act=input>
		
					<div class="form-group">
												   <label>nama slidshow</label>
												   <input class="form-control" placeholder="nama slidshow" name="caption" type="text">
												</div>
					<div class="form-group">
								               <label>Upload gambar</label><br/>
								           
								                <div id="slides" orakuploader="on" name="gambar"></div>
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
	
	//Form Edit slidshow
	case"editslidshow":
	$edit = mysql_query("SELECT * FROM slidshow WHERE id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit slideshow
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=slideshow&act=update>
		<input type=hidden name=id value=<?php echo "$r[id]";?>>
					<div class="form-group">
												   <label>nama slideshow</label>
												   <input class="form-control" placeholder="nama slidshow" name="caption" value="<?php echo "$r[caption]";?>" type="text">
												</div>
					
	             <div class="form-group">
				 
								               <label>edit gambar </label><br/>
								           <img src="foto/tn/<?php echo $r[image]?>">
								                <div id="slides" orakuploader="on" name="gambar"></div>
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