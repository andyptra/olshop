<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
include "../config/tanggal.php";

$mod=$_GET[mod];
$act=$_GET[act];



// Menghapus data
if (isset($mod) AND $act=='hapus'){
  mysql_query("DELETE FROM ".$mod." WHERE id ='$_GET[id]'");
  header('location:admin.php?mod='.$mod);
}


//Add Category
elseif ($mod=='category' AND $act=='input'){
	$insert = mysql_query("INSERT INTO category (id,category) VALUES ('','$_POST[nama_kategori]')");
	if($insert == FALSE){
		echo "<p>Kategori gagal ditambahkan, alesannya:".(mysql_error())."</p>";
		}
	header('location:admin.php?mod='.$mod);
	}
//Category Update
elseif ($mod=='category' AND $act=='update'){
	$update = mysql_query("UPDATE category SET category = '$_POST[nama_kategori]' WHERE id = '$_POST[id]'");
	if($update ==FALSE){
		echo "<p>Update gagal dilakukan karena:".(mysql_error())."</p>";
		}
	header('location:admin.php?mod='.$mod);
	}
	
//Add Product
elseif ($mod=='product' AND $act=='input'){

$zz=($_POST[images6ex]);
$zzz=($_POST[images6ex1]);

$str = implode('|', $zz);
$strs=implode('', $zzz);
	$insert = mysql_query("INSERT INTO product (product_name,
												price,
												diskon,
												stok,
												stok_s,
												stok_m,
												stok_l,
												stok_xl,
												feature_image,
												image,
												
												id_category,
												deskripsi) 
										VALUES ('$_POST[product_name]',
												'$_POST[price]',
												'$_POST[diskon]',
												'$_POST[stok]',
												'$_POST[stoks]',
												'$_POST[stokm]',
												'$_POST[stokl]',
												'$_POST[stokxl]',
												'$strs',
												'$str',
												
												'$_POST[cat]',
												'$_POST[diskripsi]')")or die(mysql_error());
	
	header('location:admin.php?mod='.$mod);
}



//Product Update
elseif ($mod=='product' AND $act=='update'){
	
$zz=($_POST[images6ex]);
$zzz=($_POST[images6ex1]);

$str = implode('|', $zz);
$strs=implode('', $zzz);

	if(empty($zzz)){
mysql_query("UPDATE product SET product_name= '$_POST[product_name]',
										price		= '$_POST[price]',
										diskon		= '$_POST[diskon]',
										stok		= '$_POST[stok]',
										stok_s		= '$_POST[stoks]',
										stok_m		= '$_POST[stokm]',
										stok_l		= '$_POST[stokl]',
										stok_xl		= '$_POST[stokxl]',
										id_category	= '$_POST[cat]',
										deskripsi	= '$_POST[diskripsi]'
									WHERE id = '$_POST[id]'")or die(mysql_error());
	}else{
		mysql_query("UPDATE product SET product_name= '$_POST[product_name]',
										price		= '$_POST[price]',
										diskon		= '$_POST[diskon]',
										stok		= '$_POST[stok]',
										stok_s		= '$_POST[stoks]',
										stok_m		= '$_POST[stokm]',
										stok_l		= '$_POST[stokl]',
										stok_xl		= '$_POST[stokxl]',
                    feature_image='$strs',
								
										id_category	= '$_POST[cat]',
										deskripsi	= '$_POST[diskripsi]'
									WHERE id = '$_POST[id]'")or die(mysql_error());
	}
	
		

	header('location:admin.php?mod='.$mod);
}

elseif ($mod=='keranjang' AND $act=='update'){
  $id       = $_POST[id];
  $jml_data = count($id);

  $jumlahs	= $_POST[jmls];
  $jumlahm  = $_POST[jmlm];
  $jumlahl = $_POST[jmll];
  $jumlahxl = $_POST[jmlxl];
  for ($i=1; $i <= $jml_data; $i++){
    mysql_query("UPDATE keranjang SET 
    									qty_s = '".$jumlahs[$i]."',
    									qty_m = '".$jumlahm[$i]."',
    									qty_l = '".$jumlahl[$i]."',
    									qty_xl = '".$jumlahxl[$i]."'    							
                                      WHERE id_keranjang = '".$id[$i]."'");
}
	header('Location:../chart.php');				
}

elseif ($mod=='setting' AND $act=='update'){
	 mysql_query("UPDATE setting SET nama_olshop   = '$_POST[judul]',
	 									domain = '$_POST[domain]',
                                      katakunci = '$_POST[katakunci]',
                                      deskripsi = '$_POST[deskripsi]',
                                      nama   = '$_POST[nama]',
									  email = '$_POST[email]',
									  no_telp = '$_POST[telp]',
									  bbm = '$_POST[bbm]',
									  line='$_POST[line]',
									member_diskon='$_POST[memberdisc]',
									  instagram = '$_POST[instagram]',
									  bank = '$_POST[bank]',
									  alamat_olshop = '$_POST[alamat]'
									  
                                WHERE id   = '1'") or die(mysql_error());

	header('location:admin.php?mod='.$mod);
}

elseif ($mod=='user' AND $act=='insert'){
	$pswd=md5($_POST[password]);
	$insert = mysql_query("INSERT INTO user (id_user,nama,email,password) VALUES (
		'$_POST[username]',
		'$_POST[nama]',
		'$_POST[email]',
		'$pswd'
		)");
	if($insert == FALSE){
		echo "<p>Kategori gagal ditambahkan, alesannya:".(mysql_error())."</p>";
		}
	header('location:admin.php?mod=admin');
	}

elseif ($mod=='user' AND $act=='update'){
mysql_query("UPDATE user SET  nama='$_POST[nama]',
												email='$_POST[email]'
												 WHERE id = '$_POST[id]'")or die(mysql_error());
	
	header('location:admin.php?mod=admin');
	}
	

elseif($mod=="user" AND $act=="updatepswd"){
	$pass=md5($_POST['password']);
	
	mysql_query("update  user set password='$pass'
								  where id='$_POST[id]' ")or die("gagal".mysql_error());
header('location:admin.php?mod=admin');
}


elseif ($mod=='slideshow' AND $act=='input'){


$zzz=($_POST[slides]);

$str = implode('|', $zzz);

	$insert = mysql_query("INSERT INTO slidshow(caption,
												image
												) 
										VALUES ('$_POST[caption]',													'$str')")or die(mysql_error());
	
	header('location:admin.php?mod='.$mod);
}
elseif ($mod=='slideshow' AND $act=='del'){
$qq=mysql_fetch_array(mysql_query("select * from slidshow where id='$_GET[id]'"));
mysql_query("delete from slidshow where id='$_GET[id]'");
	unlink("foto/$qq[image]");  
	header('location:admin.php?mod='.$mod);

}
elseif ($mod=='slideshow' AND $act=='update'){
	

$zzz=($_POST[slides]);

$str = implode('|', $zzz);

	if(empty($zzz)){
mysql_query("UPDATE slidshow SET caption= '$_POST[caption]'
									
									WHERE id = '$_POST[id]'")or die(mysql_error());
	}else{
		mysql_query("UPDATE slidshow SET caption= '$_POST[caption]',
									image='$str'
									WHERE id = '$_POST[id]'")or die(mysql_error());
	}
	
		

	header('location:admin.php?mod='.$mod);
}
?>
