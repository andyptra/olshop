   <?php
    $ss=mysql_fetch_array(mysql_query("SELECT * from setting WHERE id='1'"));
    ?>
           <div class="panel  panel-info">
      <div class="panel-heading nava">Transfer Ke</div>
      <div class="panel-body"><p>Nama Pemilik Rekening : &nbsp; <?php echo "$ss[nama]";?></p>
      <p>Bank &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$ss[nama_bank]";?></p>
      <p>Nomer Rekening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo "$ss[bank]";?></p>
      
      </div>
    </div>
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
			<tr><th>no</th><th>nama</th><th>tanggal</th><th>harga total</th><th>status Pembayaran</th><th>Lihat Item Order</th><th>upload bukti</th></tr></thead>";
		$sql = mysql_query("SELECT order_product.*,pelanggan.nama from order_product,pelanggan where order_product.id_pelanggan=pelanggan.id_pelanggan AND pelanggan.username='$_SESSION[username]'");
		$no = 1;
		
		while ($r=mysql_fetch_array($sql)){
			$tgls=DateToIndo($r[tanggal]);
$hargadisc     = number_format(($r[hargatotal]),0,",",".");
			echo"<tbody><tr><td>$no</td>
					<td>$r[nama]</td>
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

					</td><td>
<?php if(!empty($r[id_pelanggan])  AND !empty($r[buktitf])){
	echo "sudah upload";

} elseif (!empty($r[id_pelanggan])  AND empty($r[buktitf])) {
	?>

					<form action="user.php?mod=buktitf" method="Post" target="_blank" enctype="multipart/form-data">
           
                    <input type="hidden" name="idku" value="<?php echo"$r[id]";?>">
                   
                    <button type="Submit" class="btn btn-default">uploadbukti</button>
      </form>
	<?php
}?>


      </td></tr></tbody>
			<?php 
			$no++;
		}
		echo "</table></div></div>";

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