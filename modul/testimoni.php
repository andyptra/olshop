
<?php
switch($_GET['act']){
	//Tampil testimoni
	default:
	echo"<h2>testimoni</h2>
	<div class='row'>";
	?>
					 
					 <div class='col-lg-2'>
					 <?php
					 $zz=mysql_fetch_array(mysql_query("select * from pelanggan where username='$_SESSION[username]'"));
					  $qq=mysql_query("select count(id) as numb from testimoni where id_pelanggan='$zz[id_pelanggan]'");
							  $rr=mysql_fetch_array($qq);
							  if($rr[numb]==1){
								?>
		<input class='btn btn-danger' type=button value='testimoni maksimal di isi 1 kali' >
		<?php }else{
			?>
			<input class='btn btn-primary' type=button value='Tambah testimoni' onClick=location.href='?mod=testimoni&act=addtestimoni'>
			<?php
		}
		?>

		</div>
		<?php echo "</div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover' id='dataTables-example'>   <thead>
			<tr><th>no</th><th>nama</th><th>isi</th><th>status</th><th>aksi</th></tr></thead>";
		$sql = mysql_query("SELECT testimoni.*,pelanggan.nama from testimoni,pelanggan where testimoni.id_pelanggan=pelanggan.id_pelanggan AND pelanggan.username='$_SESSION[username]'");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){

			echo"<tbody><tr><td>$no</td>
					<td>$r[nama]</td>
					<td>$r[isi]</td>
					<td align='center'>$r[status]</td>
					<td><a href=?mod=testimoni&act=edittestimoni&id=$r[id] class='btn btn-info'><i class='fa fa-edit'></i></a>
						<a href=aksi.php?mod=testimoni&act=hapus&id=$r[id] class='btn btn-danger'><i class='fa fa-trash'></i></a>
					</td></tr></tbody>";
			$no++;
		}
		echo "</table></div></div>";

	break;
	
	//Form Add testimoni
	case "addtestimoni":
	?>
		
			<div class="panel panel-default">
                        <div class="panel-heading">
                          tambah testimoni
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=testimoni&act=input>
		
					<div class="form-group">
                           <label>Isi testimoni</label>
                          <textarea name="testimoni" class="form-control" rows="3"></textarea>
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
	
	//Form Edit testimoni
	case"edittestimoni":
	$edit = mysql_query("SELECT * FROM testimoni WHERE id='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	?>

	
			<div class="panel panel-default">
                        <div class="panel-heading">
                          edit testimoni
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=testimoni&act=update>
		<input type=hidden name=id value=<?php echo "$r[id]";?>>
			
					
	            <div class="form-group">
                           <label>Isi testimoni</label>
                          <textarea name="testimoni" class="form-control" rows="3"><?php echo $r[isi] ?></textarea>
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