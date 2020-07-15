<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
<script type="text/javascript" language="javascript">
	function ubahwarna(bariske){
		
        //alert ("cekbok terpilih");
        var str="Asli";
        
        with(document.formkuu)
        {
             if(pilihan[bariske].checked){
	                var tabell=document.getElementById("tabelku");
	        		tabell.rows[bariske].style.backgroundColor="#993300";
	        		tabell.rows[bariske].style.color="#FFFFFF";
	        		jmlrmhterpilih.value=parseInt(jmlrmhterpilih.value)+1;
                    if (jmlrmhterpilih.value>29){
                        alert ("Terpilih 29 orang, sudah cukup untuk satu lembar lampiran, Kertas e Gak Cukup")
                        pilihan[bariske].checked=false
                        var tabell=document.getElementById("tabelku")
    					var jenisbaris=bariske%2;
    					if (jenisbaris==1){
    						tabell.rows[bariske].style.backgroundColor="#FFFCCC";
    						tabell.rows[bariske].style.color="#000000";
    					}else{
    						tabell.rows[bariske].style.backgroundColor="#FFFFFF";
    						tabell.rows[bariske].style.color="#000000";
    					}
                      jmlrmhterpilih.value=parseInt(jmlrmhterpilih.value)-1;  	
                    }
	           //     alert ("cekbok terpilih"+bariske);
            }else{
            	  	jmlrmhterpilih.value=parseInt(jmlrmhterpilih.value)-1;
					var tabell=document.getElementById("tabelku")
					var jenisbaris=bariske%2;
					if (jenisbaris==1){
						tabell.rows[bariske].style.backgroundColor="#FFFCCC";
						tabell.rows[bariske].style.color="#000000";
					}else{
						tabell.rows[bariske].style.backgroundColor="#FFFFFF";
						tabell.rows[bariske].style.color="#000000";
					}	
			             //   alert ("tidak terpilih"+bariske);
            }
        }
//      
   	}
        
	
	
    function halamancetak(jmlrekod){
       var bukahalaman;
        var idrmh = "lampiran_cetak.php?idrumah=";
        var terpilih=0;
        var h=0;
         while (h<=jmlrekod){
                if(document.formkuu.pilihan[h].checked){
                    terpilih=terpilih+1;
                    idrmh+=document.formkuu.pilihan[h].value+"nnn";
                    //alert (idrmh)
                }
                h=h+1;
                if(h==jmlrekod){
                    bukahalaman=window.open(idrmh,"lampiran","navigator=yes, directories=no,toolbar=no,menubar=yes,width=500,height=400,Location=Yes");
                    bukahalaman.focus()   
                }                         
         }
    }
    
    function ubahwarna2(bariske){
		//alert ("sukses")
        var tabell=document.getElementById("tabelku")
		tabell.rows[bariske].style.backgroundColor="#993300";
		tabell.rows[bariske].style.color="#FFFFFF";
        
		}
	
	function balikwarna2(bariske){
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=(bariske)%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#FFFCCC";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}
        
        if(document.formkuu.pilihan[bariske].checked){
            var tabell=document.getElementById("tabelku")
		      tabell.rows[bariske].style.backgroundColor="#993300";
		      tabell.rows[bariske].style.color="#FFFFFF";
        }
        
	//alert (warnabg)
	}
	
 </script>
</head>

<body class="standardteks">

<?php 
	include("menuatas.php");
	include("sambungan.php");
	$perintahsip="SELECT * FROM tbl_rumah a, tbl_sip b, tbl_penghuni c where a.ID_RUMAH=b.ID_RUMAH AND b.NRP=c.NRP AND b.NO_SIP like '%9999' order by a.NO_URUTRMH;";
		$sqlsip=mysql_query($perintahsip);
	?>
<p style="color:maroon;font-size:20px" align="center">DAFTAR RUMNEG YANG BELUM <br />
MENDAPATKAN NOMOR SIP</p>
<form method="post" name="formkuu" action="lampiran_cetak.php">
<p align="center" style="font-size:18px;">Jumlah Rumneg Yang Dipilih =&nbsp;&nbsp; <input type="text" name="jmlrmhterpilih" style="font-size: 18px;border:none;width:18px;" value="0" class="standardteks" />&nbsp;&nbsp;&nbsp;Rumah<br />
<font size="20px"><a href="javascript:halamancetak('<?php echo mysql_num_rows($sqlsip);?>')">Cetak Lampiran</a></font></p>
	
<table style="width: 90%" border="0" id="tabeljudul" align="center">
	<tr bgcolor="maroon" style="color:white">
		<td width="5%" align="center">NO</td>
		<td width="10%" align="center">&nbsp;KODE RUMAH</td>
		<td width="26%" style="text-align:center"><br />NAMA PENGHUNI&nbsp;<br />&nbsp;
		</td>
		<td style="text-align: center" width="30%">PANGKAT, KORPS, NRP/NIP</td>
		<td style="text-align: center">ALAMAT</td>
	</tr>

</table>

<table style="width: 90%" border="0" id="tabelku" align="center">
	
	<?php
    $r=1; 
	while ($hasil_sip= mysql_fetch_array($sqlsip)) {	
	?>
	
	<tr onmouseover="ubahwarna2('<?php echo ($r-1);?>')" onmouseout="balikwarna2('<?php echo ($r-1);?>')" id="bariss" >
		<td width="5%" align="center"><?php echo $r;?></td>
		<td width="10%" align="center"><?php echo $hasil_sip['ID_RUMAH'];?></td>
		<td style="width: 3%"><input name="pilihan" value="<?php echo $hasil_sip['ID_RUMAH']?>" type="checkbox" onchange="ubahwarna('<?php echo ($r-1);?>')" id="bariss" /></td>
		<td width="23%">&nbsp;<?php	echo $hasil_sip['NAMA_PENGHUNI'];?></td>
		<td width="30%">&nbsp;<?php	
		
								//cari pangkat
								$kodekat=$hasil_sip['KODE_KAT'];
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps=$hasil_sip['KODE_KORPS'];
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kodekorps' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
									die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
								?>
        <?php echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS'];?>
								<?php	
								
								$hrfdepan=substr($hasil_sip['NRP'],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										if($hasil_sip['KODE_KAT']<=27){
												echo "NRP ".$hasil_sip['NRP'];	
											}else{
												echo "NIP ".$hasil_sip['NRP'];	
											}
									} ?>
</td>
		<td>&nbsp;&nbsp;<?php	echo $hasil_sip['ALAMAT'];?></td>
	</tr>
	<?php 
	$r++;
	}	
    ?>

</table>

<script language="javascript">
		
	var tabell=document.getElementById("tabelku")
	var jmlbaris=tabell.rows.length
	var tanda=0;
	
	for (t=0; t<=jmlbaris; t++){
		if (tanda==1){
			tabell.rows[t].style.backgroundColor="#FFFCCC";
			tanda=0;
		}else {
			tabell.rows[t].style.backgroundColor="#FFFFFF";
			tanda=1;
		}
	}
	
	</script>
</form>	
</body>

</html>
