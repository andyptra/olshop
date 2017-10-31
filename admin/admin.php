<?php
include "../config/koneksi.php";
include "../config/tanggal.php";
include"setting.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
<head>
<title><?php echo"$judul"; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link type="text/css" href="orakuploader/orakuploader.css" rel="stylesheet"/>
 <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
     <link rel="stylesheet" href="vendor/BeatPicker.min.css"/>
<script src="nicedit/nicEdit.js" type="text/javascript"></script>
<script src="uploads.js" type="text/javascript"></script>
<script src="uploadslide.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function(){
		nicEditors.allTextAreas(({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']})) });
</script>
<style>
	.beatpicker-clear  {
		display: none!important;
	}
	.beatpicker-clearButton{
		display: none!important;
	}
</style>
</head>
<body>
		<div class="wrap">
			<div class="headers">
            <div class="nav"><ul>
                                <li><a href="?mod=home"><img src="../img/png/Home.png"></a></li>
                                <li><a title="PRODUK" href="?mod=product"><img src="../img/png/Shopping Bag.png"></a></li>
                                <li><a title="KATEGORI PRODUK" href="?mod=category"><img src="../img/png/Format Bullets.png"</a></li>
                               <li><a title="RIVIEW PRODUK" href="?mod=riview"><img src="../img/png/Balloon.png"</a><li>
                               
                               
                                
                                 <li><a title="MANAJEMEN USER" href="?mod=user"><img src="../img/png/Member Card.png"></a></li>
                                 <li><a title="KONFIRMASI ORDER" href="?mod=konfirmasibayar"><img src="../img/png/Shopping Cart.png"</a><li>
                                  <li><a title="TESTIMONI" href="?mod=testimoni"><img src="../img/png/Balloon.png"</a><li>
                                  <li><a title="PENGATURAN" href="?mod=setting"><img src="../img/png/Gears.png"</a><li>
                                  <li><a title="SLIDE SHOW" href="?mod=slideshow"><img src="../img/png/Image.png"</a><li>
                                  
                                  <li><a title="ADMIN" href="?mod=admin"><img src="../img/png/key.png"</a><li>
                                 <li><a title="LAPORAN" href="?mod=report"><img src="../img/png/Information 1.png"></a></li>
                                <li><a title="LOGOUT" href="logout.php"><img src="../img/png/Power.png"></a></li>
                                
                             </ul>
        </div>
			</div>
			<br class="clearfloat" />
	<div class="BigCOntent">
		<div class="LeftContent">
			
		</div>
		<div class="RightContent">
			<?php 
				if ($_GET['mod']=='home'){
				  echo "<h1 class='Judul'>Selamat Datang</h1>
						  Have you entered into the administrator page, please use a menu available :)</p>";
				}

				//Add Kategori
				elseif ($_GET['mod']=='category'){
					include "modul/mod_kategori.php";
					}
				//Add Product
				elseif ($_GET['mod']=='product'){
					include "modul/mod_produk.php";
					}
					//setting
				elseif ($_GET['mod']=='setting'){
					include "modul/seting.php";
					}
					//testimonis
				elseif($_GET['mod']=='testimoni'){
					include"modul/testimoni.php";
					}
					elseif($_GET['mod']=='riview'){
					include"modul/riview.php";
					}
				//Report
				elseif ($_GET['mod']=='report'){
					include "modul/report.php";
					}
				elseif ($_GET['mod']=='user'){
					include "modul/user.php";
					}
					elseif ($_GET['mod']=='admin'){
					include "modul/admin.php";
					}
						elseif ($_GET['mod']=='konfirmasibayar'){
					include "modul/konfirmasibayar.php";
					}

						elseif ($_GET['mod']=='slideshow'){
					include "modul/slideshow.php";
					}

			?>
		</div>
	</div>
				<br class="clearfloat" />
			<div class="footer">
				<p align="center">Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo"$domain";?>"><?php echo"$judul";?></a> - All Rights Reserved</p>
			</div>
		</div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="vendor/BeatPicker.min.js"></script>
 <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
	<script type="text/javascript" src="orakuploader/jquery-ui.min.js"></script>
	<script type="text/javascript" src="orakuploader/orakuploader.js"></script>
	<script src="uploads.js" type="text/javascript"></script>
	    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script>
  (function($) {

  $(document).ready(function(e) {
    
    // deklarasikan variabel
    var kd_k = 0;

    $(document).on("click", ".detail", function () {
      var url = "popupitemorder.php";
      // ambil nilai id dari tombol ubah
      kd_k = this.id;
       $.post(url, {id: kd_k} ,function(data) {
        // tampilkan k.form.php ke dalam <div class="modal-body"></div>
        $(".modal-body").html(data).show();
        
      });
    });
 });
}) (jQuery);

    </script>
	</body>

</html>
<?php
}
?>
