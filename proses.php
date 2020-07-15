<?php
	
	session_start();
	$_SESSION=array();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
 <?php
	include("sambungan.php");
	$nama=$_POST['nama_pengguna'];
	$password=$_POST['kata_kunci'];
	
	echo $nama."<br>";
	echo $password."<br>";
	$auten=0;
	$bnyk=0;
	$plasa=array();
	$tanda_user=0;
	$tanda_password=0;
	if ($nama<>"")
		{
		$prnth="SELECT * FROM tbl_user WHERE NAMA='$nama' ;";
		$sql=mysql_query($prnth,$conn);
			if (! $sql) 
			die ("Perintah gagal");
			
		while($plasa=mysql_fetch_array($sql)){
			//echo $plasa[1];
			if ($plasa[1]==$nama){
			//echo "User terdaftar"."<br>";
				$tanda_user=1;
				if($plasa[2]==$password){
					//echo "User terdaftar, password cocok"."<br>";
					$tanda_password=1;
				}
			}
		}
	}
	if ($tanda_user==1){
		echo "User terdaftar"."<br>";
	}else{
		echo "User tidak terdaftar"."<br>";
		?>
		<script language="javascript">
			location.href="index.php"
		</script>
		<?php
	}
	if ($tanda_password==1){
		echo "Password Benar"."<br>";
		$_SESSION['user']=$nama;
		?>
		<script language="javascript">
			location.href="utama.php"
		</script>
		<?php
	}else{
		echo "Password Salah"."<br>";
		?>
		<script language="javascript">
			location.href="index.php"
		</script>
		<?php
	}
		
	
 ?>


</body>

</html>
