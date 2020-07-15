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
		location.href="sip_list.php?pilihankomplek="+pilihankmplk;
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
		tabell.rows[bariske].style.backgroundColor="#0033CC";
		tabell.rows[bariske].style.color="#FFFFFF";
		}
	
	function balikwarna(bariske){
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=bariske%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#CCFFFF";
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
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br />
<font color=#FF0000> YANG TIDAK SESUAI PERUNTUKANNYA</font><br /><span lang="id">========================================</span></p>

<?php
				
			/*while ($kompleksql = mysql_fetch_array($sqlkomplek)) { 
				if($komplek==$kompleksql[0]){?>
					<option value="<?php echo $kompleksql[0];?>" selected="selected"><?php echo $kompleksql[1];?></option>
				<?php }else{?>
					<option value="<?php echo $kompleksql[0];?>" ><?php echo $kompleksql[1];?></option>				
				<?php
				}
			}*/	
		
 $prnth="SELECT * FROM TBL_PENGHUNI WHERE ID_MASALAH<>'';";
 		 
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
			die ("Perintah gagal");
		?>


<table style="width: 100%" border="0" id="tabelku">

	<tr style="text-align: center; color: #FFFFFF; background-color: #333399;font-family:'Segoe UI Semibold';font-size:large">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style="height: 63px; width: 34px;">KODE<br />
		RMH</td>
		<td style="width: 133px; height: 63px; font-family: 'Segoe UI Semibold'; font-size: large;">NAMA</td>
		<td width="14%" height: 63px;" style="height: 63px">PANGKAT, KORPS</td>
		<td width="5%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">ALAMAT</td>
		<td style="height: 63px; width: 16px;">KOMPLEK</td>
		<td style="width: 81px; height: 63px;">STATUS SIP</td>
		
		<td style="width: 111px; height: 63px;">KETERANGAN</td>
		
	</tr>
	
		<?php 
			$x=1;
			$tandabaris=0;
			
			while ($hasil_penghuni = mysql_fetch_array($sql)) 
				{ 
				$nrp=$hasil_penghuni['NRP'];
				
				$prnth_sip="SELECT * FROM TBL_SIP WHERE NRP='$nrp';";
				$sql_sip=mysql_query($prnth_sip,$conn);
				if (! $sql_sip) 
					die ("Perintah gagal");
				$hasil_sip=mysql_fetch_array($sql_sip);
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
				<tr class="tulisantabel" valign="top" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')">
								<td style="text-align: center; width: 12px;"><?php echo $x;?></td>
								<td style="width: 34px; text-align: center;"><a href="sip_perpanjang.php?id_rumah=<?php	echo $hasil_sip['ID_RUMAH'];?>&tgl_expired=<?php echo $tgl_expired?>"><?php echo $hasil_sip['ID_RUMAH'];?></a></td>
								<?php 		
								
								
								/*$perintah_nama="SELECT D.*
										FROM TBL_PENGHUNI D
										WHERE D.NRP='$nrp' LIMIT 1;";
								$sql_nama=mysql_query($perintah_nama,$conn);
									if (!$sql_nama)
									die("Cari nama gagal");
								$hasil_penghuni=mysql_fetch_array($sql_nama);*/
								?>
								<td style="width: 133px" ><?php	echo $hasil_penghuni['NAMA_PENGHUNI'];	?></td>
								<?php
								//cari pangkat
								$kodekat=$hasil_penghuni['KODE_KAT'];
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps=$hasil_penghuni['KODE_KORPS'];
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
								
								$hrfdepan=substr($hasil_sip['NRP'],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										echo $hasil_sip['NRP'];	
									} ?>
								</td>
								<?php
								//cari pangkat
								$kodestatus=$hasil_penghuni['KODE_STATUS'];
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kodestatus' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
								?>
								<td width="5%" style="text-align: center"><?php echo $hasil_status['STATUS'];	?></td>
								<?php
								$koderumah=$hasil_sip['ID_RUMAH'];
								
								$perintah_rumah=" SELECT * FROM TBL_RUMAH WHERE ID_RUMAH='$koderumah' LIMIT 1;";
								$sql_rumah=mysql_query($perintah_rumah,$conn);
									if (!$sql_rumah)
									die("Cari rumah gagal");
								$hasil_rumah=mysql_fetch_array($sql_rumah);
								?>
								<td style="text-align: left; width: 107px;"><?php echo $hasil_rumah['ALAMAT'];	?></td>
								
								<td style="width: 16px; text-align: center;">
								<?php
								$komplek = $hasil_rumah['ID_KOMPLEK'];
								//echo $komplek;
								$perintahkomplek="SELECT * FROM tbl_komplek WHERE id_komplek='$komplek'";
								$sqlkomplek=mysql_query($perintahkomplek,$conn);
								$hasilkomplek=mysql_fetch_array($sqlkomplek);
								
								 echo $hasilkomplek['KOMPLEK'];?>	&nbsp;</td>
								
								<td style="width: 63px; text-align: center;">
									<?php 
										if ($selisih_hari<=0) {
											?>
											<span style="color:red">Expired</span>
											<?php
										}else{
											if ($selisih_hari<=60){
											?>
												<span style="color:navy"><?php echo $selisih_hari." hari lagi";?></span>
											<?php
														
											}else{
												?>
											<span style="color:green" id="status_aktif0">Aktif</span>
											<?php
 
											}
										}
								?>						
								</td>

								<td style="width: 111px" class="standardteks">
									<?php
									echo $hasil_penghuni['KETERANGAN'];
									?>
										
									
								</td>
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