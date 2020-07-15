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
		location.href="masalah_expired.php?pilihankomplek="+pilihankmplk;
	}
	
	function jumpaksi(bariske){
		alert (bariske);
		idd="aksiid["+bariske+"]";

//		var tabell=document.getElementById("tabelku");
		hasil = document.forms[bariske].selects[bariske].value
		alert (hasil)
		
//		var formm=document.getElementById("formid");
		hasil = document.form[bariske].selekaksi.options[document.form[bariske].selekaksi.selectedIndex].value
		alert (hasil);
	}	
		
		//var list=document.getElementById("pilihanaksi")
		//var aksi=list.options[list.selectedIndex].value


//	var list=document.getElementById("pilihanaksi");
//	aksi=list.options[list.selectedIndex].value	


	/*switch (aksi)
		{
		case "1"	: {
			alert (id_rumah);
			location.href="sip_perpanjang.php?id_rumah="+id_rumah;
			break;
			}
		case "2"	: 
			alert (id_rumah);
			location.href="sip_pengalihan.php?id_rumah="+id_rumah;
			break;	
		case "3"	: 
			alert (id_rumah);
			location.href="sip_ganti.php?id_rumah="+id_rumah;
			break;	
		default	: alert (aksi)
		}*/
	
	
	function ubahwarna(bariske){
		var tabell=document.getElementById("tabelku");
		tabell.rows[bariske].style.backgroundColor="#DDBBFF";
		tabell.rows[bariske].style.color="#000000";
		}
	
	function balikwarna(bariske){
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=bariske%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#F8F0FF";
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
<p class="judul"><font color="#DDBBFF">REKAPITULASI RUMNEG YANG <font color="red">EXPIRED</font><br />
==========================================</font></p>
<?php
//echo $selisih_hari[4];
//echo $hasil_expired['NRP']."<br>";

?>
<table style="width: 50%" border="0" id="tabelku" align="center" class="standardteks">
	<tr style="text-align: center; color: #000000; background-color: #DDBBFF;font-size:large;"  >
		<td style="width: 5%;" >NO</td>
		<td style="width: 15%; ">KOMPLEK</td>
		<td style="width: 10%;" >SIP AKTIF</td>
		<td style="height: 40px; width: 10%;">SIP EXPIRED</td>
		<td style="height: 40px; width: 10%;">JUMLAH</td>
		
	</tr>
		<?php 
            $perintahkomplek="SELECT a.ID_KOMPLEK,a.KOMPLEK,count(*) as jml FROM TBL_KOMPLEK a, TBL_RUMAH b where a.id_komplek=b.id_komplek GROUP BY b.ID_KOMPLEK ";
			$sqlkomplek=mysql_query($perintahkomplek);
            $x=1;
            
            // hari ini
            $tgl_today=date("d");
			$bulan_today=date("m");
            $tahun_today="20".date("y");
            $jd1=gregoriantojd($bulan_today,$tgl_today,$tahun_today);
            
            while($hasilkomplek=mysql_fetch_array($sqlkomplek)){
                $idkomplek=$hasilkomplek['ID_KOMPLEK'];
                $perintahjmlkomplek="SELECT * FROM TBL_RUMAH WHERE ID_KOMPLEK='$idkomplek';";
                
                
                 //n         
                 //hari ini
					?>
		
			<tr class="tulisantabel" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')" style="height: 30px;">
				<td style="width: 5%;text-align: center;"><?php echo $hasilkomplek['ID_KOMPLEK'];?></td>
				<td style="width: 15%" >&nbsp;&nbsp;<?php echo $hasilkomplek['KOMPLEK'];?></td>
				<td width="10%" ></td>
				<td width="10%" style="text-align: center"><?php //echo $hasil_status['STATUS'];	?></td>
				<td style="text-align: right; width: 10%;"><?php echo $hasilkomplek['jml'];?>&nbsp;&nbsp;Rumah</td>
			</tr>

	<?php 
    $x++;
    }
    ?>
</table>

<script language="javascript">
		
	var tabell=document.getElementById("tabelku")
	var jmlbaris=tabell.rows.length
	var tanda=0;
	
	for (t=1; t<=jmlbaris; t++){
		if (tanda==1){
			tabell.rows[t].style.backgroundColor="#F8F0FF";
			tanda=0;
		}else {
			tabell.rows[t].style.backgroundColor="#FFFFFF";
			tanda=1;
		}
		
	}
	</script>
</body>

</html>