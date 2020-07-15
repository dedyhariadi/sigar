<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script type="text/javascript" language="javascript">
	function jumprumah(){
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="sip_list_update.php?pilihankomplek="+pilihankmplk;
	}
	
				
	function ubahwarna(bariske){
		//alert ("sukses")
        var tabell=document.getElementById("tabelku")
		tabell.rows[bariske].style.backgroundColor="#0033CC";
		tabell.rows[bariske].style.color="#FFFFFF";
        
		}
	
	function balikwarna(bariske) {
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=(bariske)%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#CCFFFF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}
	//alert (warnabg)
	}
	
</script>
</head>

<body> 


<?php 
	include("menuatas.php");
	include("sambungan.php");
	
?>
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br />========================================</p>

<table style="width: 100%" border="0" id="tabelku" align="center" class="standardteks">

	<tr style="text-align: center; color: #FFFFFF; background-color: #333399;">
		<td style="width: 3%;">NO&nbsp;</td>
		<td style="width: 50px;">SATKER</td>
		<td style="width: 18%;">DIBERIKAN KEPADA</td>
		<td style="width: 15%; height: 51px;">NO SIP</td>
		<td style="width: 15%; height: 51px;">BATAS<br />
		WAKTU</td>
		<td style="height: 51px; width: 17%;">TANGGAL DITERBITKAN</td>
		<td style="width: 15%;">ALAMAT </td>
		<td style="height: 4%; width: 63px;">SEWA<br />
		RUMNEG<br />
		(PAJAK 1%<br />
		GAJI POKOK)</td>

	</tr>
	
		<?php 
            //
			$x=0;
				
			$perintah_laporan="select * from tbl_penghuni ;";
				
				$sql_laporan=mysql_query($perintah_laporan,$conn);

			while ($hasil = mysql_fetch_array($sql_laporan)) 
				{ 
				$x=$x+1;
					?>

							<tr style="height: 30px;" class="tulisantabel" id="bariss" >
								<td style="text-align: center; width: 3%;">&nbsp;</td>
								<td style="width: 15%" >&nbsp;<?php echo $x;?></td>

								<td >&nbsp;</td>
								
								<td style="width: 12%; text-align: left;">&nbsp;</td>
								<td style="width: 12%; text-align: center;">&nbsp;</td>
								<td style="width: 6%; text-align: left;">&nbsp;</td>
								<td style="text-align: left; width: 15%;">&nbsp;</td>
								<td style="width: 4%; text-align: center;"><?php echo $hasil['SEWA'];?>&nbsp;</td>
						</tr>
				
	<?php
					
					
	}?>
</table>

	<script language="javascript">
		
	var tabell=document.getElementById("tabelku")
	var jmlbaris=tabell.rows.length
	var tanda=0;
	
	for (t=2; t<=jmlbaris; t++){
		if (tanda==1){
			tabell.rows[t].style.backgroundColor="#CCFFFF";
			tanda=0;
		}else {
			tabell.rows[t].style.backgroundColor="#FFFFFF";
			tanda=1;
		}
	}
	</script>
</body>

</html>