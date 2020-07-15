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
<p class="judul"><font color="#DDBBFF">DAFTAR PENGHUNI RUMAH NEGARA<br />========================================</font></p>

<p class="standardteks" align="center">Jumlah Personel utk <font color="red">SIP EXPIRED</font> untuk Komplek :&nbsp;<select name="pilihankomplek" style="width: 146px" onchange="jumprumah()" id="kmplk" class="standardteks">
	<?php
		$komplek = $_GET['pilihankomplek'];	    	
		$perintahkomplek="SELECT * FROM tbl_komplek";
		$sqlkomplek=mysql_query($perintahkomplek);

		while ($kompleksql = mysql_fetch_array($sqlkomplek)) { 
			if($komplek==$kompleksql[0]){?>
				<option value="<?php echo $kompleksql[0];?>" selected="selected"><?php echo $kompleksql[1];
                $kodedepan=$kompleksql[2];
                ?></option>
                              
			<?php }else{?>
				<option value="<?php echo $kompleksql[0];?>" ><?php echo $kompleksql[1];?></option>				
			<?php
				}
			}?>
		</select>
    
            <?php 
            
            $prnth_expired="SELECT * FROM TBL_SIP WHERE ID_RUMAH like '$kodedepan%' ORDER BY NO_URUTSIP ASC";
        
		  $sql_expired=mysql_query($prnth_expired,$conn);
			if (! $sql_expired) 
			die ("Perintah expired gagal");
            
		$tgl_today=date("d");
		$bulan_today=date("m");
		$tahun_today=date("y");
		$h=1;
		

            $tgl_today=date("d");
			$bulan_today=date("m");
			$tahun_today="20".date("y");
            $jd1=gregoriantojd($bulan_today,$tgl_today,$tahun_today);
        while($hasil_expired=mysql_fetch_array($sql_expired)){
		  
        	
         $tglexpired=$hasil_expired['TGL_EXPIRED'];
					
				$thn_akhir=substr($tglexpired,-2);
				
                if(substr($thn_akhir,0,1)=="9"){
                    $thn_akhir= "19".$thn_akhir;
                }else{
                    $thn_akhir= "20".$thn_akhir;    
                }
                $bln_akhir=substr($tglexpired,2,2);
				$tgl_akhir=substr($tglexpired,0,2);
				
                $jd2=gregoriantojd($bln_akhir,$tgl_akhir,$thn_akhir);
                		
				$selisih=$jd2-$jd1;
                
		if($selisih<0){
	        $hasilkoderumah[$h]=$hasil_expired['ID_RUMAH'];
            $hasilnrp[$h]=$hasil_expired['NRP'];
            $hasilsip[$h]=$hasil_expired['NO_SIP'];
            $hasiltglexpired[$h]=$hasil_expired['TGL_EXPIRED'];
            $h=$h+1;
		  }
		}?>
        adalah <font color="red"  size="6px" > <?php echo $h-1;?> </font>Orang </p>

<table style="width: 80%" border="0" id="tabelku" align="center" class="standardteks">

	<tr style="text-align: center; color: #000000; background-color: #DDBBFF;font-size:large">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style="height: 63px; width: 34px;">KODE<br />
		RMH</td>
		<td style="width: 200px; height: 63px;">NAMA</td>
		<td width="14%" style="height: 63px">PANGKAT, KORPS</td>
		<td width="5%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">NOSIP</td>
		<td style="height: 25%; width: 122px;">ALAMAT</td>
		<td style="height: 63px; width: 63px;">STATUS SIP</td>
		
	</tr>
		<?php 
		
			$tandabaris=0;
            			
		for ($x=1;$x<$h;$x++){
		  
			$koderumah=$hasilkoderumah[$x];
					?>
		
                    
			<tr class="tulisantabel" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')" style="height: 30px;">
								<td style="text-align: center; width: 12px;"><?php echo $x;?></td>
								
								
								<td style="width: 34px; text-align: center;"><a href="rh_history.php?id_rumah=<?php	echo $koderumah;?>"><?php echo $koderumah;?></a></td>
								<td style="width: 200px" ><?php	
                                
                                  $perintahpenghuni="SELECT * FROM tbl_penghuni where NRP='$hasilnrp[$x]';" ;
    		                      $sqlpenghuni=mysql_query($perintahpenghuni);

                                $hasilpenghuni=mysql_fetch_array($sqlpenghuni);
                                echo $hasilpenghuni['NAMA_PENGHUNI'];	
                                ?>
                                </td>
								<?php
								//cari pangkat
								$kodekat=$hasilpenghuni['KODE_KAT'];
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps=$hasilpenghuni['KODE_KORPS'];
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
								
								$hrfdepan=substr($hasilnrp[$x],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										echo $hasilnrp[$x];	
									} ?>
								</td>
								<?php
								//cari pangkat
								$kodestatus=$hasilpenghuni['KODE_STATUS'];
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kodestatus' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
								?>
								<td width="5%" style="text-align: center"><?php echo $hasil_status['STATUS'];	?></td>
								<td style="text-align: center; width: 107px;"><?php echo $hasilsip[$x];	?></td>
								<?php
                                    
									$perintah_rumah="SELECT ALAMAT FROM TBL_RUMAH WHERE ID_RUMAH='$koderumah' LIMIT 1;";
									$sql_rumah=mysql_query($perintah_rumah,$conn);
									$hasil_rumah=mysql_fetch_array($sql_rumah);
								?>
								<td style="width: 25%"><?php echo $hasil_rumah['ALAMAT'];	?></td>
								<td style="width: 63px; text-align: center;">
									<?php 
									$today=date("dmy");
									//echo $hasiltglexpired[$x];
									
									$bln_akhir=substr($hasiltglexpired[$x],2,2);
									$tgl_akhir=substr($hasiltglexpired[$x],0,2);
									$thn_akhir=substr($hasiltglexpired[$x],-2);
									
									$bln_today=substr($today,2,2);
									$tgl_today=substr($today,0,2);
									$thn_today=substr($today,-2);
									
									$selisih=(mktime (0,0,0,$bln_akhir,$tgl_akhir,$thn_akhir) - mktime (0,0,0,$bulan_today,$tgl_today,$tahun_today))/86400;
									$selisih_hari=intval($selisih);
								
																			//echo "<br>".$today."<br>".$selisih_hari;
										if ($selisih_hari<=0) {
											?>
											<span style="color:red" id="status_expired">Expired</span>
											<?php
										}else{
											if ($selisih_hari<=100){
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


							</tr>

	<?php

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