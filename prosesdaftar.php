<?php
include"config/koneksi.php";
session_start();
	    if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
	    	 echo "Kode Captcha Anda Salah<br/>";
	    	 echo"<input action='action' type='button' value='Back' onclick='history.go(-1);' />";
	    }
	    else{
	    	


$pass=$_POST['passwordku'];
	$pengacak1="(&^*I^&$^%$&^HCHFVDyt&^3e688vkhf8rii9yr674e67dujgg";
	$pengacak2=")*^&(%fuyrrfuyf684Yfuyrfyr8YFYUUYUYFYUF&*%*(o";
	$password=md5($pengacak1.$pass.md5($pengacak2).$pengacak2);
      $username=$_POST[username];
	mysql_query("insert into pelanggan( nama, alamat, no_hp,username,password,id_pertanyaan,jawaban

								  ) 
							VALUES(
								  							
						          '$_POST[nama]',
								   '$_POST[alamat]',
								  '$_POST[no_hp]',
								  '$_POST[username]',
								  '$password',
								  '$_POST[pertanyaan]',
								  '$_POST[jawaban]'
								
								 )")or die("gagal".mysql_error());

	 session_start();

 														           $loginquery = mysql_query("
 														           	SELECT * FROM pelanggan WHERE  username ='$username' AND password = '$password'");

 														            $count = mysql_num_rows($loginquery);
 														            $row= mysql_fetch_array($loginquery);

 														             if($count == 1){

 														             			
 													$_SESSION['username'] = $row['username'];
 													$_SESSION['passuser'] = $row['password'];
 													header('location:user.php?mod=home');
 												}



	}