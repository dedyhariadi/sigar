﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<tr bgcolor="maroon" align="center" style="color:white;height:30px;" >
		<td style="width: 10px">NO.</td>
		<td style="width: 67px">KOMPLEK</td>
		<td style="width: 17px">AKTIF</td>
		<td style="width: 17px">PURNA</td>
		<td style="width: 17px">WREDA</td>
		<td style="width: 17px">WARI</td>
		<td style="width: 17px">JANDA</td>
		<td style="width: 17px">DUDA</td>
		<td style="width: 17px">JUMLAH</td>
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
        $nourut=0;
		while($hasil_komplek=mysql_fetch_array($sql_komplek))
		{	
			$nourut=$nourut+1;
            $kodekomplek=$hasil_komplek['KODE_KOMPLEK'];
				 $jmlaktif=0;
				 $jmlpurna=0;
				 $jmlwreda=0;
				 $jmlwari=0;
				 $jmljanda=0;
				 $jmlduda=0;
				 $jmlkosong=0;
			
			$perintah_rmh="select *, count(tbl_penghuni.kode_status) as jmlstatus from tbl_sip left join tbl_penghuni using(nrp) where tbl_sip.ID_RUMAH like '$kodekomplek%' group by tbl_penghuni.kode_status;";
                		
			$sql_rmh=mysql_query($perintah_rmh,$conn);
            $s=0;
           while($hasil_rmh=mysql_fetch_array($sql_rmh))
			{
			
                switch ($hasil_rmh['KODE_STATUS']){
                    case 1:
                        $jmlaktif=$hasil_rmh['jmlstatus'];break;
                    case 2:
                        $jmlpurna=$hasil_rmh['jmlstatus'];break;
                    case 3:
                        $jmlwreda=$hasil_rmh['jmlstatus'];break;
                    case 4:
                        $jmlwari=$hasil_rmh['jmlstatus'];break;
                    case 5:
                        $jmljanda=$hasil_rmh['jmlstatus'];break;
                    case 6:
                        $jmlduda=$hasil_rmh['jmlstatus'];break;    
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
		<td style="width: 10px; height: 30px;" align="center"><?php echo $nourut;?></td>
		<td style="width: 67px; height: 30px; padding-left:10px;"><?php echo $hasil_komplek['KOMPLEK'];?></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="aktif<?php ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "1";?>"><?php echo $jmlaktif;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="purna<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "2";?>"><?php echo $jmlpurna;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="wreda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "3";?>"><?php echo $jmlwreda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="wari<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "4";?>"><?php echo $jmlwari;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="janda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "5";?>"><?php echo $jmljanda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="duda<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "6";?>"><?php echo $jmlduda;?></a></td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><a id="jml_perkomplek<?php echo $s; ?>" href="rekapitulasi_list.php?pilihankomplek=<?php echo $hasil_komplek['ID_KOMPLEK'];?>&&status=<?php echo "0";?>"><?php echo $jml_perkomplek." Orang";?></a></td>
	</tr>
	<?php 
          $jml_all=$jml_all+$s;  
	}

	?>
	<tr style="padding-right:17px;"> 
		<td style="width: 27px; height: 30px;" align="center">&nbsp;</td>
		<td style="width: 67px; height: 30px;">&nbsp;</td>
		<td style="width: 17px; height: 30px; padding-right:17px;" align="right"><?php echo $jmlaktif_all;?></td>
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
