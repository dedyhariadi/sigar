<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
<?php 
	include("menukanan.htm");
	include("sambungan.php");
	$perintah="select ID_RUMAH, ALAMAT from tbl_rumah where id_komplek=8 limit 561,20 ;";
	$sql=mysql_query($perintah,$conn);
	
?>
<form method="POST" action="aksi.php" enctype="multipart/form-data">
	<?php
		$x=0;
		while($hasil=mysql_fetch_array($sql)){
			$x=$x+1;
	?>
	<?php echo $hasil['ID_RUMAH'];?>
	<?php echo "Alamat : ".$hasil['ALAMAT'];?>&nbsp;&nbsp;&nbsp;&nbsp;<input name="namafile<?php echo $x;?>" type="file" /><br />
	<input name="idrumah<?php echo $x;?>" type="hidden" value="<?php echo $hasil['ID_RUMAH'];?>">
	<?php }?>
	<input name="Submit1" type="submit" value="submit" />
	
</form>	

<?php
	/*$x=1;
	while($hasil=mysql_fetch_array($sql)){
	
	echo $x.". ".substr($hasil['ID_RUMAH'],0,3)." ".$hasil['ALAMAT'];*/
?>

<?php 
	/*$x=$x+1;
	}*/
?>


</body>

</html>
