<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
<title>RUMNEG BERMASALAH</title>
</head>

<body>
<?php 
	include("menukanan.htm");
	include("sambungan.php");
	
?>

<p style="margin-bottom:2px;margin-top:2px;" class="judul">RUMNEG BERMASALAH<br />=========================</p>
<p style="height: 0px; margin-bottom: 50px"></p>
<table style="width: 100%;font-size:x-large;height:200px" class="standardteks" >
	<tr>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">1.</td>
		<td style="width: 50%">&nbsp;<a href="masalah_nonaktif.php?pilihankomplek=1">Anggota Non Aktif (Purna, Wreda, Wari, Janda, Duda)</a></td>
		<td width="2%">:</td>
		<?php 
			$perintah_jmlnonaktif="	SELECT KODE_STATUS,COUNT(*) AS JML
						FROM TBL_PENGHUNI
						WHERE KODE_STATUS<>1
						GROUP BY KODE_STATUS;";
			$sql_jmlnonaktif=mysql_query($perintah_jmlnonaktif,$conn);
			$jumlahnonaktif=0;
			while($hasil_jmlnonaktif=mysql_fetch_array($sql_jmlnonaktif))
			      {
				$jumlahnonaktif=$jumlahnonaktif+$hasil_jmlnonaktif['JML'];
			     }
			
		?>	
		<td><a href="masalah_nonaktif.php?pilihankomplek=1"><?php echo $jumlahnonaktif;?> Orang</a></td>
	</tr>
	
	<tr>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">2.</td>
		<td style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 50%;">
		&nbsp;<a href="masalah_tdksesuai.php?pilihankomplek=1">Rumneg Tidak Sesuai Peruntukannya</a></td>
		<td width="2%">:</td>
		<td>&nbsp; Orang</td>
	</tr>
	
	<tr>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">3.</td>
		<td style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 50%;">
		&nbsp;SIP habis masa berlakunya (EXPIRED)</td>
		<td width="2%">:</td>
		<td>Orang</td>
	</tr>
	
	<tr>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">4.</td>
		<td style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 50%;">
		&nbsp;Rumneg yang mendapatkan <font color="red">Surat Peringatan</font></td>
		<td width="2%">:</td>
		<td>Orang</td>
	</tr>
	
</table>

</body>

</html>
