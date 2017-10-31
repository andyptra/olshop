<?php
error_reporting(0);
include"../setting.php";
include"fungsi_tgl.php";
switch($_GET['act']){
	default:
	echo"<h2>Hubungi Kami</h2>
	*) klik email untuk membalas
	<br/>
	<br/>
	<table class='TableCart'>
			<tr><th>no</th><th>Nama</th><th>email</th><th>subjek</th><th>tanggal</th><th>aksi</th></tr>";
		$sql = mysql_query("SELECT * FROM hubungi ORDER BY id ");
		$no = 1;
		while ($r=mysql_fetch_array($sql)){
			$tgl=tgl_indo($r[tanggal]);
			echo"<tr><td>$no</td>
					<td>$r[nama]</td>
					<td><a href=?mod=hubungi&act=balas&id=$r[id]>$r[email]</a></td>
					<td align=center>$r[subjek]</td>
					<td align='center'>$tgl</td>
					<td><a href=aksi.php?mod=hubungi&act=hapus&id=$r[id]>Hapus</a>
					</td></tr>";
			$no++;
		}
		echo "</table>";
		break;
	case "balas":
    $sql = mysql_query("SELECT * FROM hubungi WHERE id='$_GET[id]'");
    $r      = mysql_fetch_array($sql);

    echo "<h2>Reply Email</h2>
          <form method=POST action='?mod=hubungi&act=kirim'>
          <table class='list'><tbody>
          <tr><td class='left'>Kepada</td><td class='left'> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td class='left'>Subjek</td><td class='left'> : <input type=text name='subjek' size=50 value='Re: $r[subjek]'></td></tr>
          <tr><td class='left'>Pesan</td><td class='left'> <textarea name='pesan' id='loko' style='width: 600px; height: 180px;'><br/><br/><br/><br/><br/>    
  ---------------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
    
  case "kirim":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: $email ");
    echo "<h2>Status Email</h2>
          <p>Email telah terkirim</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
?>
