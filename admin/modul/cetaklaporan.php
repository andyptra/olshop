<?php

include "pdf/class.ezpdf.php"; //class ezpdf yg di panggil
include"../../config/koneksi.php";//koneksi database
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


$pdf = new Cezpdf('A4');

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Courier.afm');


//Teks di tengah atas untuk judul header

$pdf->ezText("<b>Laporan Penjualan $q[nama_olshop] </b>", 16, array("justification" => "center","spacing" =>"0"));
$pdf->ezText("<b>$q[alamat_olshop] </b>", 14, array("justification" => "center","spacing" =>"1.5"));
$pdf->ezText("<b> No Telpon : $q[no_telp] </b>", 13, array("justification" => "center","spacing" =>"1.5"));
$pdf->ezText("", 14, array("justification" => "center","spacing" =>"1.5"));

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 800, 50);

//Teks kiri bawah
$pdf->addText(640,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user

$tgl_awal=$_POST['tgl1'];
$tgl_akhir=$_POST['tgl2'];

$mulai=DateToIndo($tgl_awal);
$akhir=DateToIndo($tgl_akhir);
//echo "$mulai $selesai";exit;

$dir=mysql_fetch_array(mysql_query("select * from pegawai WHERE id_jenis='J000000001' "));
$tampildir=$dir[nama];


$tampil = "SELECT * from  order_product where statusupload='Y'";

$sql = mysql_query($tampil);




$i = 1;
while($r = mysql_fetch_array($sql)) {

    
   $xz=mysql_fetch_array(mysql_query("SELECT COUNT(id_product) as jml,SUM(detail_order_product.jumlah_s+detail_order_product.jumlah_l+detail_order_product.jumlah_m+detail_order_product.jumlah_xl) as jmku FROM detail_order_product,order_product WHERE detail_order_product.id_order_product=order_product.id GROUP BY detail_order_product.id_order_product"));
          $tglz=DateToIndo($r[tanggal]);
      $hargatot    = number_format(($r[hargatotal]),0,",",".");
      
//Format Menampilkan data di ezPdf
  $data[$i]=array(
             
           'Nama'=>"$r[name]",
           'Jumlah Order'=>"$xz[jmlku]",
             
            'Email'=>"$r[email]",
            'No Hp'=>"$r[phone]",
            'Alamat'=>"$r[address]",
            'Kode Pos'=>"$r[kodepos]",
            
            'Tanggal Beli'=>"$tglz",
           'Total Bayar'=>"Rp. $hargatot"
           );
  $i++;
$jumlah+=$r['hargatotal']; 
}
  $x='Rp. '.number_format(($jumlah),0,',','.');   
//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("jumlah $x ", 14, array("justification" => "right","spacing" =>"2"));
$pdf->ezText("", 14, array("justification" => "right","spacing" =>"2"));

$pdf->ezText("\nPeriode: $mulai s/d $akhir",12);

$pdf->ezText("Tertanda", 14, array("justification" => "right","spacing" =>"6"));
$pdf->ezText("$q[nama]", 14, array("justification" => "right","spacing" =>"6"));
// Penomoran halaman
$pdf->ezStartPageNumbers(57, 20, 8);
$pdf->ezStream();



?>