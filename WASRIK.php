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
			$x=1;
			$tandabaris=0;
			$pilihankomplek=$_GET['pilihankomplek'];
			$perintah_laporan="select a.*,b.*,c.* from tbl_rumah a,tbl_sip b, tbl_penghuni c where a.id_rumah=b.id_rumah and b.nrp=c.nrp and a.id_komplek=$pilihankomplek and c.telepon like '%sud%' order by a.NO;";
				$sql_laporan=mysql_query($perintah_laporan,$conn);

			while ($hasil = mysql_fetch_array($sql_laporan)) 
				{ 
				$tgl_sip=substr($hasil['NO_SIP'],-6);
					?>

							<tr style="height: 30px;" class="tulisantabel" onmouseover="ubahwarna('<?php echo ($x+1);?>')" id="bariss" onmouseout="balikwarna('<?php echo ($x+1);?>')">
								<td style="text-align: center; width: 3%;"><?php echo $x;?></td>
								<td style="width: 15%" >&nbsp;<?php	echo $hasil['SATKER'];	?></td>
								<?php
								$nrp=$hasil['NRP'];
								
								//cari pangkat
								$kodekat=$hasil['KODE_KAT'];
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps=$hasil['KODE_KORPS'];
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kodekorps' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
										die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
								?>
								<td >&nbsp;<?php	echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']." ".$hasil['NAMA_PENGHUNI'];	
								$hrfdepan=substr($hasil['NRP'],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										echo " NRP ".$hasil['NRP'];	
									}
								?>
								
								</td>
								
								<td style="width: 12%; text-align: left;">&nbsp;&nbsp;
								<?php 
									$nomorsipp=$hasil['NO_SIP'];
									//echo $nomorsipp."<br>";
									$tanda_nosip=0;
                                    if(substr($nomorsipp,-4)!="9999"){
                                        $nomor=substr($hasil['NO_SIP'],0,(strlen($hasil['NO_SIP'])-7));
                                        $tanda_nosip=1;
    									//echo $nomor;
    									$bulanangka=substr($hasil['NO_SIP'],-4,2);
    									switch($bulanangka){
                                            case '01' : $bulan = "/I/"; break;
    										case '02' : $bulan = "/II/"; break;
    										case '03' : $bulan = "/III/"; break;
    										case '04' : $bulan = "/IV/"; break;
    										case '05' : $bulan = "/V/"; break;
    										case '06' : $bulan = "/VI/"; break;
    										case '07' : $bulan = "/VII/"; break;
    										case '08' : $bulan = "/VIII/"; break;
    										case '09' : $bulan = "/IX/"; break;	
    										case '10' : $bulan = "/X/"; break;
    	   									case '11' : $bulan = "/XI/"; break;
    										case '12' : $bulan = "/XII/"; break;
    										default	  : $bulan = "Gak Jelas bulannya";
                                        }   
                                        $tahun=substr($hasil['NO_SIP'],-2);
    									if(substr($tahun,0,1)<5){
    									   $tahunsip="20".$tahun;   
    									}else{
    									   $tahunsip="19".$tahun;
    									}
    									$tampil="SIP/".$nomor.$bulan.$tahunsip;
                                        echo $tampil;
                                    }else{
                                        echo "";
                                    }
                                    
                                    
									
								?>
								</td>
								<td style="width: 12%; text-align: center;">3 
								Tahun
								</td>
								<td style="width: 6%; text-align: left;">&nbsp;<?php 
                                	if($tanda_nosip==1){
                                        echo substr($hasil['NO_SIP'],-6,2)."-".substr($hasil['NO_SIP'],-4,2)."-".substr($hasil['NO_SIP'],-2);
                                        $tanda_nosip=0;
                                    }else {
                                        echo "";
                                    }
                                ?></td>
								<td style="text-align: left; width: 15%;">&nbsp;<?php echo $hasil['ALAMAT'];	?></td>
								<td style="width: 4%; text-align: center;"><?php echo $hasil['TELEPON'];?>
									&nbsp;</td>
						</tr>
				
	<?php
					$x=$x+1;
					
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