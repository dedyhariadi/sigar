﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
</head>

<body>
<?php 
	include("menukanan.htm");
	include ("sambungan.php");
?>

<p class="judul">Surat Izin Penempatan <br />Rumah Negara<br />
=================
</p>


<form name="formkomplek" action="listsip.php" method="post">
<p class="standardteks" align="center">Komplek :&nbsp; <select name="pilihankomplek" style="width: 146px" onchange="kdrmh()" id="kmplk" class="standardteks">
		<option value=" ">(pilih komplek)</option>
		
		<?php
			$perintah="SELECT * FROM tbl_komplek";
			$sql=mysql_query($perintah);
			while ($hasil = mysql_fetch_array($sql)) { 
		?>		
		<option value="<?php echo $hasil[0];?>"><?php echo $hasil[1];?></option>
		<?php }?>
		</select></p>
<p class="standardteks" align="center">&nbsp;</p>
<p align="center"><input name="Submit1" type="submit" value="Tampilkan" />&nbsp;</p>
</form>
</body>

</html>
