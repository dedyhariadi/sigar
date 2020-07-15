<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>
<?php
	include "sambungan.php";
	$perintah="SELECT ID_RUMAH,ALAMAT FROM tbl_rumah WHERE ALAMAT LIKE '%badik%'";
	$sql=mysql_query($perintah);
	
	$banyakdata=$_POST['jmldata'];
	echo $banyakdata;

	for($d=1;$d<=$banyakdata;$d++){
		//$filename[$d]=$_FILES['ganti.$d']['name'];
		//echo $filename[$d]."<br>";
		$_
		$filename[$d]=$_FILES['ganti['.$d.']']['name'];
		echo $filename[$d];
		//<?php echo $ganti[$x];
	}

	//$filename=$_FILES['$ganti[$x]']['name'];
	//$filesize=$_FILES['foto_penghuni']['size'];
	//$fileerror=$_FILES['foto_penghuni']['error'];
	//if($filesize>0 || $fileerror==0){
	//	$move=move_uploaded_file($_FILES['foto_penghuni']['tmp_name'],'C:/xampp/htdocs/Sigar/denah/'.$filename);
	//	if($move){
	//		//echo "Foto terupload sukses";
	//}
	
?>
</body>

</html>