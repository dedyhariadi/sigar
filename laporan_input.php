<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
</head>

<body>
<?php 
	include("menukanan.htm");
	include ("sambungan.php");
?>

<p align="center" class="judul">Laporan Triwulan Rumah Negara<br />
==================================
</p><?php

	$perintah="SELECT id_komplek,count(*) as jmlpenghuni FROM tbl_rumah group by id_komplek";
	$hasil=mysql_query($perintah);

        ?>
<p >&nbsp;</p>
<table style="width: 35%" class="tulisantabel" align="center" >
	<?php 
	while ($data=mysql_fetch_array($hasil)){
		//echo $data[0]."<br>";
		$id_komplek=$data[0];
		$jmlpenghuni[]=$data[1];
	}
	?>	
	<tr style="height:75px;">
		<td>1. <a href="laporan_triwulan.php?pilihankomplek=<?php echo $id_komplek[0];?>">DBAL (<?php echo $jmlpenghuni[0]; ?>)</a></td>
		<td>6. <a href="laporan_triwulan.php?pilihankomplek=<?php echo $id_komplek[5];?>">Pulungan <?php echo $jmlpenghuni[5]; ?></a></td>
	</tr>
	<tr>
		<td>2. <a href="laporan_triwulan.php?pilihankomplek=<?php echo $id_komplek[0];?>">Hang Tuah (<?php echo $jmlpenghuni[1]; ?>)</a>
		</td>
		<td>7.&nbsp; Sukolilo<?php echo $jmlpenghuni[6]; ?></td>
	</tr>
	<tr>
		<td>3. Gedangan <?php echo $jmlpenghuni[2]; ?>
		</td>
		<td>8.&nbsp; Tanjung Teluk <?php echo $jmlpenghuni[7]; ?></td>
	</tr>
	<tr>
		<td>4. Juanda <?php echo $jmlpenghuni[3]; ?>
		</td>
		<td>9.&nbsp; Wonosari <?php echo $jmlpenghuni[8]; ?></td>
	</tr>
	<tr>
		<td>5. Kenjeran <?php echo $jmlpenghuni[4]; ?>
		</td>
		<td>10. Luar Komplek <?php echo $jmlpenghuni[9]; ?></td>
	</tr>
	<?php //}?>
</table>

</body>

</html>
