<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
<?php 
	for($r=1;$r<21;$r++)	{
	
	$lokasitujuan = 'c:\xampp\htdocs\SIGAR\Denah\Jadi'."\\".$_POST['idrumah'.$r].".jpg";
	
	echo $lokasitujuan." Id Rumah :".$_POST['idrumah'.$r]."<br>";
	
	$temp_file = $_FILES['namafile'.$r]['tmp_name'];
	move_uploaded_file($temp_file,$lokasitujuan);
	}
	
?>
</body>

</html>
