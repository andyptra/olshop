
<?php

date_default_timezone_set('Asia/Jakarta');

function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
               "April", "Mei", "Juni",
               "Juli", "Agustus", "September",
               "Oktober", "November", "Desember");
  
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}

	echo"<h2>Item order</h2>
	<div class='row'>";
	?>
					 
					 <div class='col-lg-2'>
			

		</div>
		<?php echo "</div>
		<div class='panel panel-default'>
                        
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
		<table class='TableCart table table-striped table-bordered table-hover' id='dataTables-example'>   <thead>
			<tr><th>no</th><th>nama</th><th>tanggal</th><th>harga total</th><th>status Pembayaran</th><th>Lihat Item Order</th><th>Bukti Tranfer</th><th>Konfirmasi</th></tr></thead><tbody>";
		$sql = mysql_query("SELECT * from order_product order by tanggal DESC");
		$no = 1;

		while ($r=mysql_fetch_array($sql)){
			$tgls=DateToIndo($r[tanggal]);
$hargadisc     = number_format(($r[hargatotal]),0,",",".");
$
                  $hasilakhir=$total_rp - $potongan;
			echo"<tr><td>$no</td>
					<td>$r[name]</td>
					<td>$tgls</td>
					<td>Rp. $hargadisc </td>";
					?>
					<td align='center'><?php if($r[statusupload]=='Y'){
						echo "Sudah Dikonfirmasi";
					}else{
						echo "Belum Dikonfirmasi";
					}?></td>
					<?php
					?>
					<td>
						<a href="#notifdetail" id="<?php echo $r['id'] ?>" class="detail btn btn-success btn-sm" data-toggle="modal">Detail Pembelian</a>

					</td>
					<td><?php if(empty($r[buktitf])){
						echo "belum upload ";
					}else{
						?>
						<img width=50 src="../foto/<?php echo "$r[buktitf]";?>">
						<?php
					}?></td>
					<td><?php if($r[statusupload]=='Y'){
						?>
						<button type="button" class="btn btn-info">Done</button>
						<?php
					}
					else
					{
						?>
						
						<form action="konfirmasibayars.php" method="post">
                         <input type="hidden" name="id" value="<?php echo $r[id];?>">
                        
                           <input type="submit" value="konfirmasi" class="btn btn-primary">
                         </form>
						<?php
					}
					?></td>
					</tr>
			<?php 
			$no++;
		}
		echo "</tbody></table></div></div>";

	?>


           <div class="modal fade" id="notifdetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Order</h4>
      </div>
      <div class="modal-body">
      </div>
      
    </div>
  </div>