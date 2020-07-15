<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>

<script type="text/javascript" language="javascript">
	function jumprumah(){
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="masalah_nonaktif.php?pilihankomplek="+pilihankmplk;
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
		tabell.rows[bariske].style.backgroundColor=" #DDBBFF";
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
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br /><span lang="id">========================================</span></p>

<p class="standardteks" align="center">Jumlah Personel Non Aktif untuk Komplek :&nbsp;<select name="pilihankomplek" style="width: 146px" onchange="jumprumah()" id="kmplk" class="standardteks">
		<?php
			$komplek = $_GET['pilihankomplek'];	    	
			$perintahkomplek="SELECT * FROM tbl_komplek";
			$sqlkomplek=mysql_query($perintahkomplek);
		
			while ($kompleksql = mysql_fetch_array($sqlkomplek)) { 
				if($komplek==$kompleksql[0]){?>
					<option value="<?php echo $kompleksql[0];?>" selected="selected"><?php echo $kompleksql[1];?></option>
				<?php }else{?>
					<option value="<?php echo $kompleksql[0];?>" ><?php echo $kompleksql[1];?></option>				
				<?php
				}
			}
	$prnth="SELECT A.*, B.*, C.*
 	 FROM TBL_PENGHUNI A, TBL_SIP B, TBL_RUMAH C
 	 WHERE A.KODE_STATUS<>1
	 AND A.NRP=B.NRP
	 AND B.ID_RUMAH=C.ID_RUMAH
	 AND C.ID_KOMPLEK='$komplek';";
 	 
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
			die ("Perintah gagal");
	$banyakdata=mysql_num_rows($sql);
			?>
	
		</select> adalah <font color=blue size=6px > <?php echo $banyakdata;?> </font>Orang </p>

<table style="width: 80%" border="0" id="tabelku" align="center">

	<tr style="text-align: center; color: #000000; background-color: #DDBBFF;font-family:'Segoe UI Semibold';font-size:large">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style=	"height: 63px; width: 34px;">KODE<br />
		RMH</td>
		<td style="width: 200px; height: 63px; font-family: 'Segoe UI Semibold'; font-size: large;">NAMA</td>
		<td width="20%" height: 63px;" style="height: 63px">PANGKAT, KORPS</td>
		<td width="5%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">NOSIP</td>
		<td style="height: 63px; width: 122px;">ALAMAT</td>
		<td style="height: 63px; width: 63px;">STATUS SIP</td>
		<!--<td style="height: 63px; width: 426px;">ACTION</td>-->
		
	</tr>
	
		<?php 
			$x=1;
			$tandabaris=0;
			
			while ($hasil = mysql_fetch_array($sql)) 
				{ 
			
					
								
								$nrp=$hasil['NRP'];
								$perintah_sip="SELECT D.*
										FROM TBL_SIP D
										WHERE D.NRP='$nrp' LIMIT 1;";
								$sql_sip=mysql_query($perintah_sip,$conn);
									if (!$sql_sip)
									die("Cari nama gagal");
								$hasil_sip=mysql_fetch_array($sql_sip);
								
								$koderumah=$hasil_sip['ID_RUMAH'];
								
								
				$tgl_sip=substr($hasil_sip['NO_SIP'],-6);
										$today=date("dmy");
										$thn_akhir=substr($tgl_sip,-2)+3;
										
										$tgl_akhir_temp="20".$thn_akhir."-".substr($tgl_sip,2,2)."-".substr($tgl_sip,0,2);
										$tgl_akhir_1=strtotime($tgl_akhir_temp);										
										$tgl_akhir_1_1=$tgl_akhir_1-24*60*60;
										$tgl_expired=date("dmy",$tgl_akhir_1_1);										
										
										//hari ini
										$thn_today=substr($today,-2);
										$bln_today=substr($today,2,2);
										$tgl_today=substr($today,0,2);
										
										$thn_akhir=substr($tgl_expired,-2);
										$bln_akhir=substr($tgl_expired,2,2);
										$tgl_akhir=substr($tgl_expired,0,2);
										//echo $tgl_expired."<br>";
										//echo $tgl_akhir." ".$bln_akhir." ".$thn_akhir."<br>";
										//echo $tgl_today." ".$bln_today." ".$thn_today;
										
										$selisih=(mktime (0,0,0,$bln_akhir,$tgl_akhir,$thn_akhir) - mktime (0,0,0,$bln_today,$tgl_today,$thn_today))/86400;
										$selisih_hari=intval($selisih);										
		      							
	
					?>
					<form>
							<tr class="tulisantabel" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')">
								<td style="text-align: center; width: 12px;"><?php echo $x;?></td>
								
								
								<td style="width: 34px; text-align: center;"><a href="rh_history.php?id_rumah=<?php	echo $hasil['ID_RUMAH'];?>&tgl_expired=<?php echo $tgl_expired?>"><?php echo $koderumah;?></a></td>
								<td style="width: 200px" ><?php	echo $hasil['NAMA_PENGHUNI'];	?></td>
								<?php
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
								<td width="14%" ><?php echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS'];?></td>
								<td style="width: 131px; text-align: center;" >
								
								<?php	
								
								$hrfdepan=substr($hasil['NRP'],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										echo $hasil['NRP'];	
									} ?>
								</td>
								<?php
								//cari pangkat
								$kodestatus=$hasil['KODE_STATUS'];
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kodestatus' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
								?>
								<td width="5%" style="text-align: center"><?php echo $hasil_status['STATUS'];	?></td>
								<td style="text-align: center; width: 107px;"><?php echo $hasil_sip['NO_SIP'];	?></td>
								<?php
									$perintah_rumah="SELECT ALAMAT FROM TBL_RUMAH WHERE ID_RUMAH='$koderumah' LIMIT 1;";
									$sql_rumah=mysql_query($perintah_rumah,$conn);
									$hasil_rumah=mysql_fetch_array($sql_rumah);
								?>
								<td style="width: 122px"><?php echo $hasil_rumah['ALAMAT'];	?></td>
								<td style="width: 63px; text-align: center;">
									<?php 
									
																			//echo "<br>".$today."<br>".$selisih_hari;
										if ($selisih_hari<=0) {
											?>
											<span style="color:red" id="status_expired">Expired</span>
											<?php
										}else{
											if ($selisih_hari<=60){
											?>
												<span style="color:navy" id="status_sisa"><?php echo $selisih_hari." hari lagi";?></span>
											<?php
														
											}else{
												?>
											<span style="color:green" id="status_aktif">Aktif</span>
											<?php
 
											}
										}
								?>						
								</td>
								<!--<td style="width: 426px"><?php echo $hasil['SATKER'];	?></td>-->

							</tr>
</form>					
	<?php
					$x=$x+1;
					
	}?>
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