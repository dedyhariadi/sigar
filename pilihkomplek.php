<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
</head>

<body>
<?php 
	include("menuatas.php");
	include ("sambungan.php");
?>

<p class="judul">Proses SIP Rumneg TNI AL<br />di Wilayah Surabaya<br />
==================================
</p>
<br>
<p style="font-family:'Berlin Sans FB';" align="center">DAFTAR KOMPLEK</p>

		



<table style="width: 45%;border-color:#FFDFFF;" align="center" border="0">
	<?php
			$perintah="select a.id_komplek,count(*) as jml,b.komplek 
						from tbl_rumah a, tbl_komplek b 
						where a.id_komplek=b.id_komplek 
						group by a.id_komplek;";
			
			$sql=mysql_query($perintah);
			while ($hasil = mysql_fetch_array($sql)) { 
				$idkomplek=$hasil['id_komplek'];
				$sisa[$idkomplek]=$idkomplek%5;
				$jmlbaris=mysql_numrows($sql);
				$idplek[$idkomplek]=$hasil['id_komplek'];
				$plek[$idkomplek]=$hasil['komplek'];
				$jmlpenghuni[$idkomplek]=$hasil['jml'];
			}
			$batasan=($jmlbaris/2);

			
	for($x=1;$x<=$batasan;$x++){
	?>		
		<tr class="standardteks" style="height:40px;" bgcolor="#FFDFFF">
		<td style="width:10px;" align="center"><?php echo $idplek[$x].".";?></td>
		<td style="width:129px;"><a href="sip_list_update.php?pilihankomplek=<?php echo $idplek[$x];?>"><?php echo $plek[$x]." (".$jmlpenghuni[$x] ." Penghuni)";?></a></td>
		<td style="width:10px;" align="center"><?php echo $idplek[$x+$batasan].".";	?></td>
		<td style="width:100px;"><a href="sip_list_update.php?pilihankomplek=<?php echo $idplek[$x+$batasan];?>"><?php echo $plek[$x+$batasan]." (".$jmlpenghuni[$x+$batasan] ." Penghuni)";;	?></a></td>		
	</tr>
	<?php }?>
</table>

</body>

</html>
