
<?php
switch($_GET['act']){
	//Tampil Kategori
	default:
	echo"<h2>List Produk</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		<input class='btn btn-primary' type=button value='Tambah Produk Baru' onClick=location.href='?mod=product&act=addproduct'>
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover'id='dataTables-example'>   <thead>
			<tr><th>no</th><th>Nama Produk</th><th>Harga</th><th>diskon</th><th>Stok S</th><th>Stok M</th><th>Stok L</th><th>Stok XL</th><th>aksi</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT * FROM product ORDER BY id DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			echo"<tr><td>$no</td>
					<td>$r[product_name]</td>
					<td>$r[price]</td>
					<td align=center>$r[diskon] &nbsp; %</td>
	
					<td align='center'>$r[stok_s]</td>
					<td align='center'>$r[stok_m]</td>
					<td align='center'>$r[stok_l]</td>
					<td align='center'>$r[stok_xl]</td>
					<td><a href=?mod=product&act=editproduct&id=$r[id] class='btn btn-info'><i class='fa fa-edit'></i></a>
						<a href=aksi.php?mod=product&act=hapus&id=$r[id] class='btn btn-danger'><i class='fa fa-trash'></i></a>
					</td></tr>";
			$no++;
		}
		echo "</tbody></table></div></div>";
		break;
	//Form Add Product
	case "addproduct":?>
	
		 <div class="panel panel-default">
                        <div class="panel-heading">
                          tambah Produk
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form enctype='multipart/form-data' method=POST action=aksi.php?mod=product&act=input>
		
					<div class="form-group">
												   <label>nama produk</label>
												   <input class="form-control" placeholder="nama produk" name="product_name" type="text">
												</div>
					<div class="form-group">
												   <label>Kategori</label>
												   <?php echo"<select name='cat' class='form-control'>
												   <option value=0 selected>- Pilih Kategori -</option>";
												   $tampil=mysql_query("SELECT * FROM category ");
												   while($v=mysql_fetch_array($tampil)){
												   echo "<option value='$v[id]'>$v[category]</option>";
												   }
												   echo "</select>";?>
												</div>
					
				<div class="form-group">
												   <label>harga</label>
												   <input class="form-control" placeholder="harga" name="price" type="text">
												</div>
				<div class="form-group">
												   <label>diskon</label>
												   <input class="form-control" placeholder="diskon" name="diskon" type="text">
												     </div>
				<div class="form-group">
												   <label>stok</label>
												   <input class="form-control" placeholder="stok" name="stok" type="text">
												     </div>
			<div class="form-group">
												   <label>stok S</label>
												   <input class="form-control" placeholder="stok S" name="stoks" type="text">
												     </div>
			<div class="form-group">
												   <label>stok M</label>
												   <input class="form-control" placeholder="stok M" name="stokm" type="text">
												     </div>
			<div class="form-group">
												   <label>stok L</label>
												   <input class="form-control" placeholder="stok L" name="stokl" type="text">
												     </div>
			<div class="form-group">
												   <label>stok XL</label>
												   <input class="form-control" placeholder="stok XL" name="stokxl" type="text">
												     </div>
				<div class="form-group">
												   <label>diskripsi</label>
												  <textarea name="diskripsi" class="form-control" rows="3"></textarea>
												    </div>
				<div class="form-group">
								               <label>Upload gambar utama</label><br/>
								           
								                <div id="images6ex1" orakuploader="on" name="gambar"></div>
								            </div>
			
				<div class="form-group">
								               <label>Upload gambar</label><br/>
								           
								                <div id="images6ex" orakuploader="on" name="gambar"></div>
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
                    <!-- /.panel -->
				<?php
		break;
	//Form Edit Product
	case"editproduct":
		$edit = mysql_query("SELECT * FROM product WHERE id='$_GET[id]'");
		$d = mysql_fetch_array($edit);
	?>
		 <div class="panel panel-default">
                        <div class="panel-heading">
                          edit Produk
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<form method=POST enctype='multipart/form-data' action='aksi.php?mod=product&act=update'>
				<input type=hidden name=id value=<?php echo "$d[id]";?>>
				<div class="form-group">
												   <label>nama produk</label>
												   <input class="form-control" placeholder="nama produk" name="product_name" value="<?php echo $d[product_name]?>" type="text">
												</div>
					<div class="form-group">
														   <label>kategori</label>
														   <?php echo"<select name='cat' class='form-control'>";
														   if($d[id]==0){
															echo"<option value=0 selected>- Pilih kategori -</option>";
														   }
														   $tampilas=mysql_query("SELECT * FROM category ")or die("gagal".mysql_error());
														   while($c=mysql_fetch_array($tampilas)){
														   if($d[id_category]==$c[id]){
														   echo "<option value='$c[id]' selected>$c[category]</option>";
														   }
														   else{
															   echo"<option value='$c[id]'>$c[category]</option>";
														   }
											}
														   echo "</select>";?>
														</div>

														<div class="form-group">
												   <label>harga</label>
												   <input class="form-control" placeholder="harga" name="price" type="text" value="<?php   echo  $d[price] ?>">
												</div>
				<div class="form-group">
												   <label>diskon</label>
												   <input class="form-control" placeholder="diskon" name="diskon" type="text" value="<?php  echo  $d[diskon] ?>">
												     </div>
				<div class="form-group">
												   <label>stok</label>
												   <input class="form-control" placeholder="stok" name="stok" type="text"value="<?php echo  $d[stok] ?>">
												     </div>

					<div class="form-group">
												   <label>stok S</label>
												   <input class="form-control" placeholder="stok S" name="stoks" value="<?php echo  $d[stok_s] ?>" type="text">
												     </div>
			<div class="form-group">
												   <label>stok M</label>
												   <input class="form-control" placeholder="stok M" name="stokm" value="<?php echo  $d[stok_m] ?>" type="text">
												     </div>
			<div class="form-group">
												   <label>stok L</label>
												   <input class="form-control" placeholder="stok L" name="stokl"   value="<?php echo  $d[stok_l] ?>" type="text">
												     </div>
			<div class="form-group">
												   <label>stok XL</label>
												   <input class="form-control" placeholder="stok XL" name="stokxl"  value="<?php echo  $d[stok_xl] ?>" type="text">
												     </div>

				<div class="form-group">
												   <label>diskripsi</label>
												  <textarea name="diskripsi" class="form-control" rows="3"><?php echo $d[deskripsi] ?></textarea>
												</div>
				
				
				 <div class="form-group">
				 
								               <label>edit gambar utama</label><br/>
								           <img src="foto/tn/<?php echo $d[feature_image]?>">
								                <div id="images6ex1" orakuploader="on" name="gambar"></div>
								          
			
				
								  			          				  			            
	           	<div class="form-group">
												   <input type="submit" class="btn btn-info" value="simpan">
												   <input type="button" class="btn btn-danger" onClick='self.history.back()'  value="batal">
												</div>   </form></div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
	<?php	break;
}
?>