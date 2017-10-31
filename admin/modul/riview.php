<?php echo"<h2>riview produk</h2>
	<div class='row'>
					 
					 <div class='col-lg-2'>
		
		</div></div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover' id='dataTables-example'>   <thead>
			<tr><th>no</th><th>nama</th><th>isi</th><th>terbit</th><th>aksi</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT riview.*,pelanggan.nama from riview,pelanggan where riview.id_pelanggan=pelanggan.id_pelanggan ORDER BY id DESC");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){

			echo"<tr><td>$no</td>
					<td>$r[nama]</td>
					<td>$r[isi]</td>
					<td align='center'>$r[terbit]</td>
					";
					?>
					<td><?php if($r[terbit]=='Y'){
						?>
					<form action="konfirmasiriviewN.php" method="post">
                         <input type="hidden" name="id" value="<?php echo $r[id];?>">
                        
                           <input type="submit" value="batalkan" class="btn btn-primary">
                         </form>
						<?php
					}else{
						?>
						<form action="konfirmasiriview.php" method="post">
                         <input type="hidden" name="id" value="<?php echo $r[id];?>">
                        
                           <input type="submit" value="konfirmasi" class="btn btn-primary">
                         </form>
						<?php
					} ?>
					<?php
					echo "
					
						
					</td></tr>";
			$no++;
		}
		echo "</tbody></table></div></div>";