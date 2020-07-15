<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rekapitulasi Penghuni Rumah Negara</title>
<link rel="stylesheet" type="text/css" href="menucssrekap.css" title="Style" />
<script type="text/javascript" language="javascript">

	function ubahwarna(bariske){
		
		var tabell=document.getElementById("tabela");
         
		var kolomaktif=document.getElementById("aktif"+bariske);
        var kolompurna=document.getElementById("purna"+bariske);
        var kolomwreda=document.getElementById("wreda"+bariske);
        var kolomwari=document.getElementById("wari"+bariske);
        var kolomjanda=document.getElementById("janda"+bariske);
        var kolomduda=document.getElementById("duda"+bariske);
        var kolomjml_perkomplek=document.getElementById("jml_perkomplek"+bariske);
        
        kolomaktif.style.color="white";
        kolompurna.style.color="white";
        kolomwreda.style.color="white";
        kolomwari.style.color="white";
        kolomjanda.style.color="white";
        kolomduda.style.color="white";
        kolomjml_perkomplek.style.color="white";
        
		tabell.rows[bariske].style.backgroundColor="RGB(91, 48, 19)";
		tabell.rows[bariske].style.color="#FFFFFF";
        //tabell.rows[bariske].
        
		}
	
	function balikwarna(bariske){
	
		var tabell=document.getElementById("tabela")
		var jenisbaris=bariske%2;
		var kolomaktif=document.getElementById("aktif"+bariske);
        var kolompurna=document.getElementById("purna"+bariske);
        var kolomwreda=document.getElementById("wreda"+bariske);
        var kolomwari=document.getElementById("wari"+bariske);
        var kolomjanda=document.getElementById("janda"+bariske);
        var kolomduda=document.getElementById("duda"+bariske);
        var kolomjml_perkomplek=document.getElementById("jml_perkomplek"+bariske);
        
        kolomaktif.style.color="black";
        kolompurna.style.color="black";
        kolomwreda.style.color="black";
        kolomwari.style.color="black";
        kolomjanda.style.color="black";
        kolomduda.style.color="black";
        kolomjml_perkomplek.style.color="black";

        //var kolomaktif=document.getElementById("aktif");
        //kolomaktif.style.color="black";
        
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#FFFCCC";
			tabell.rows[bariske].style.color="#000000";
		}
	}
</script>
</head>

<body alink="black" link="black" vlink="black">
	<?php 
		include("menuatas.php");
		include("sambungan.php"); 
	?>

<p style="text-align: center" class="judul">Rekapitulasi Penghuni Rumah Negara<br/> &nbsp;
	</p>

<table style="width: 70%; height: 67px; margin-left: 150px;" border="0" id="tabela" class="standardteks" >
	<tr bgcolor="maroon" align="center" style="color:white;" >
		<td style="width: 10px; height: 30px;">NO.</td>
		<td style="width: 67px; height: 30px;">KOMPLEK</td>
		<td style="width: 17px; height: 30px;">AKTIF (PA)</td>
		<td style="width: 17px; height: 30px;">BA</td>
		<td style="width: 17px; height: 30px;">TA</td>
		<td style="width: 17px; height: 30px;">PNS</td>
		<td style="width: 17px; height: 30px;">PURNA</td>
		<td style="width: 17px; height: 30px;">WREDA</td>
		<td style="width: 17px; height: 30px;">WARI</td>
		<td style="width: 17px; height: 30px;">JANDA</td>
		<td style="width: 17px; height: 30px;">DUDA</td>
		<td style="width: 17px; height: 30px;">JUMLAH</td>
	</tr>
	<?php 
		$jml_all=0;
		$jmlaktif_all=0;
		$jmlpurna_all=0;
		$jmlwreda_all=0;
		$jmlwari_all=0;
		$jmljanda_all=0;
		$jmlduda_all=0;
		$jmlkosong_all=0;
		$perintah_komplek="select * from tbl_komplek;";
		$sql_komplek=mysql_query($perintah_komplek,$conn);
        $s=0;
		while($hasil_komplek=mysql_fetch_array($sql_komplek))
		{	
			$idkomplek=$hasil_komplek['ID_KOMPLEK'];
				 $jmlaktif=0;
				 $jmlpurna=0;
				 $jmlwreda=0;
				 $jmlwari=0;
				 $jmljanda=0;
				 $jmlduda=0;
				 $jmlkosong=0;
			
			$perintah_gab="select a.id_komplek, c.kode_status, count(*) as JML 
							from tbl_rumah a, tbl_sip b, tbl_penghuni c
							where a.id_komplek='$idkomplek' 
							and a.id_rumah=b.id_rumah 
							and b.nrp=c.nrp group by c.kode_status;";
						
			$sql_gab=mysql_query($perintah_gab,$conn);
            //$s=0;
			while($hasil_gab=mysql_fetch_array($sql_gab))
			{
					switch ($hasil_gab['kode_status'])
					{
								case	1: 
									$jmlaktif=$hasil_gab['JML'];
									
									//PERWIRA
									$perintahjmlperwira="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 1 and 12;";								
									$sql_jmlperwira=mysql_query($perintahjmlperwira,$conn);
									$hasil_jmlperwira=mysql_fetch_array($sql_jmlperwira);
									$jmlperwira=$hasil_jmlperwira['jml'];
									
									//PATI
									$perintahjmlpati="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 1 and 6;";								
									$sql_jmlpati=mysql_query($perintahjmlpati,$conn);
									$hasil_jmlpati=mysql_fetch_array($sql_jmlpati);
									$jmlpati=$hasil_jmlpati['jml'];

									//PAMEN
									$perintahjmlpamen="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 7 and 9;";								
									$sql_jmlpamen=mysql_query($perintahjmlpamen,$conn);
									$hasil_jmlpamen=mysql_fetch_array($sql_jmlpamen);
									$jmlpamen=$hasil_jmlpamen['jml'];

								
									//PAMA
									$perintahjmlpama="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 10 and 12;";								
									$sql_jmlpama=mysql_query($perintahjmlpama,$conn);
									$hasil_jmlpama=mysql_fetch_array($sql_jmlpama);
									$jmlpama=$hasil_jmlpama['jml'];

									
									//BINTARA
									$perintahjmlbintara="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 13 and 18;";								
									$sql_jmlbintara=mysql_query($perintahjmlbintara,$conn);
									$hasil_jmlbintara=mysql_fetch_array($sql_jmlbintara);
									$jmlbintara=$hasil_jmlbintara['jml'];
									
									//TAMTAMA
									$perintahjmltamtama="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 19 and 27;";								
									$sql_jmltamtama=mysql_query($perintahjmltamtama,$conn);
									$hasil_jmltamtama=mysql_fetch_array($sql_jmltamtama);
									$jmltamtama=$hasil_jmltamtama['jml'];

									//PNS
									$perintahjmlpns="select c.kode_kat, count(*) as jml from tbl_rumah a, tbl_sip b, tbl_penghuni c 
														 where a.id_komplek='$idkomplek' and a.id_rumah=b.id_rumah and b.nrp=c.nrp and c.kode_status=1
														 and c.kode_kat between 28 and 42;";								
									$sql_jmlpns=mysql_query($perintahjmlpns,$conn);
									$hasil_jmlpns=mysql_fetch_array($sql_jmlpns);
									$jmlpns=$hasil_jmlpns['jml'];

									break;
								case	2: 
									$jmlpurna=$hasil_gab['JML'];
									break;
								case	3: 
									$jmlwreda=$hasil_gab['JML'];
									break;
								case	4: 
									$jmlwari=$hasil_gab['JML'];
									break;
								case	5: 
									$jmljanda=$hasil_gab['JML'];
									break;	
								case	6: 
									$jmlduda=$hasil_gab['JML'];
									break;
								default	:	
									$jmlkosong=$hasil_gab['JML'];
								break;
					}		
			}
			$jml_perkomplek=$jmlaktif+$jmlpurna+$jmlwreda+$jmlwari+$jmljanda+$jmlduda+$jmlkosong;
			$jml_all=$jml_perkomplek+$jml_all;
			$jmlaktif_all=$jmlaktif_all+$jmlaktif;
			$jmlpurna_all=$jmlpurna_all+$jmlpurna;
			$jmlwreda_all=$jmlwreda_all+$jmlwreda;
			$jmlwari_all=$jmlwari_all+$jmlwari;
			$jmljanda_all=$jmljanda_all+$jmljanda;
			$jmlduda_all=$jmlduda_all+$jmlduda;
			$jmlkosong_all=$jmlkosong_all+$jmlkosong;
	?>
	<tr onmouseover="ubahwarna('<?php echo $hasil_komplek['ID_KOMPLEK'];?>')" onmouseout="balikwarna('<?php echo $hasil_komplek['ID_KOMPLEK'];?>')">
		<td style="width: 10px; height: 30px;" align="center"><?php echo $hasil_komplek['ID_KOMPLEK'];?></td>
		<td style="width: 67px; height: 30px; padding-left:10px;"><?php echo $hasil_komplek['KOMPLEK'];?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="aktif<?php $s=$s+1;echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "1";?>"><?php echo $jmlperwira.", ".$jmlpati.", ".$jmlpamen.", ".$jmlpama;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlbintara;?>
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmltamtama;?>
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlpns;?>
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="purna<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "2";?>"><?php echo $jmlpurna;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="wreda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "3";?>"><?php echo $jmlwreda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="wari<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "4";?>"><?php echo $jmlwari;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="janda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "5";?>"><?php echo $jmljanda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="duda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "6";?>"><?php echo $jmlduda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="jml_perkomplek<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "0";?>"><?php echo $jml_perkomplek. " Orang";?></a></td>
	</tr>
	<?php 
	}

	?>
	<tr style="padding-right:17px;"> 
		<td style="width: 27px; height: 30px;" align="center">&nbsp;</td>
		<td style="width: 67px; height: 30px;">&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlaktif_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right">
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right">
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right">
		&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlpurna_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlwreda_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlwari_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmljanda_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlduda_all;?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jml_all." Orang";?></td>
	</tr>
	</table><br>

<script language="javascript">
		
	var tabell=document.getElementById("tabela")
	var jmlbaris=tabell.rows.length
	var tanda=0;
	
	for (t=1; t<=jmlbaris; t++){
		if (tanda==1){
			tabell.rows[t].style.backgroundColor="#FFFCCC";
			tanda=0;
		}else {
			tabell.rows[t].style.backgroundColor="#FFFFFF";
			tanda=1;
		}
	}
</script>

</body>

</html>
