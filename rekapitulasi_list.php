﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script type="text/javascript" language="javascript">
			
var tandake=new Array();
    
   	function seleksi(bariske){
   	    if(tandake[bariske]!=1){
   			var tabell=document.getElementById("tabelku");
    		tabell.rows[bariske].style.backgroundColor="#E8CF6C";
    		tabell.rows[bariske].style.color="#000000";
            tandake[bariske]=1;
        }else{
            tandake[bariske]=0;
            var tabell=document.getElementById("tabelku")
            var jenisbaris=bariske%2;
        	if (jenisbaris==1){
        	   tabell.rows[bariske].style.backgroundColor="#FFFFFF";
        	   tabell.rows[bariske].style.color="#000000";
        	}else{
        	   tabell.rows[bariske].style.backgroundColor="#F8F0FF";
        	   tabell.rows[bariske].style.color="#000000";
            }
        }
	}
		
	function ubahwarna(bariske){
    	    var tabell=document.getElementById("tabelku");
    		tabell.rows[bariske].style.backgroundColor="#E9D2FF";
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
            
        if(tandake[bariske]==1){
            var tabell=document.getElementById("tabelku");
    		tabell.rows[bariske].style.backgroundColor="#E8CF6C";
    		tabell.rows[bariske].style.color="#000000";
                //tandabaris=0;
        }
		
	//alert (warnabg)
	}
	
</script>
</head>

<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");

		$komplek = $_GET['pilihankomplek'];
        $status=$_GET['status'];
        
        $perintahplek="select * from tbl_komplek where id_komplek='$komplek';";
        $sql_plek=mysql_query($perintahplek,$conn);
        $hasilplek=mysql_fetch_array($sql_plek);
        
        $perintahstatus="select * from tbl_status where kode_status='$status';";    
        $sql_statuss=mysql_query($perintahstatus,$conn);
        $hasilstatuss=mysql_fetch_array($sql_statuss);
        

?>
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br />
<span style="font-family:fantasy;color: #000099;text-align:center">di <span style="color:red;font-weight:bold;"><?php 
	echo $hasilplek["KOMPLEK"];?></span><?php
if($status==0){
    echo "";
    }else{
    ?> yang berstatus <span style="color:red;font-weight:bold;"><?php echo $hasilstatuss["STATUS"]; ?></span><?php
}?>
</span></p>
	<?php
	if($status==0){
	   $prnth="select * 
            from tbl_rumah a,tbl_sip b,tbl_penghuni c 
            where a.id_komplek='$komplek'
            and a.id_rumah=b.id_rumah 
            and b.nrp=c.nrp order by a.NO_URUTRMH;";
	}else{
    $prnth="select * 
            from tbl_rumah a,tbl_sip b,tbl_penghuni c 
            where a.id_komplek='$komplek'
            and a.id_rumah=b.id_rumah 
            and b.nrp=c.nrp 
            and c.kode_status='$status' order by a.NO_URUTRMH;";
}
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
			die ("Perintah gagal");
		?>
		

<table style="width: 80%" border="0" id="tabelku" align="center" class="standardteks">

	<tr style="text-align: center; background-color: #DDBBFF;">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style="height: 63px; width: 34px;">KODE<br />RMH</td>
		<td style="width: 20%; height: 63px;">NAMA</td>
		<td width="14%" style="height: 63px">PANGKAT, KORPS</td>
		<td width="5%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">NOSIP</td>
		<td style="height: 63px; width: 20%;">ALAMAT</td>
		<td style="height: 63px; width: 63px;">STATUS SIP</td>
	</tr>
	
		<?php 
			$x=1;
			$tandabaris=0;
			
			while ($hasil = mysql_fetch_array($sql)) 
				{ 
				$tgl_sip=substr($hasil['NO_SIP'],-6);
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
							<tr style="height: 30px;" class="tulisantabel" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')" onclick="seleksi('<?php echo $x;?>')">
								<td style="text-align: center; width: 12px;"><?php echo $x;?></td>
								<td style="width: 34px; text-align: center;"><a id="idrumahh<?php echo $x;?>" href="rh_history.php?id_rumah=<?php	echo $hasil['ID_RUMAH'];?>&tgl_expired=<?php echo $tgl_expired?>"><?php echo $hasil['ID_RUMAH'];?></a></td>
								<?php 		
								
								$nrp=$hasil['NRP'];
								$perintah_nama="SELECT D.*
										FROM TBL_PENGHUNI D
										WHERE D.NRP='$nrp' LIMIT 1;";
								$sql_nama=mysql_query($perintah_nama,$conn);
									if (!$sql_nama)
									die("Cari nama gagal");
								$hasil_penghuni=mysql_fetch_array($sql_nama);
								?>
								<td style="width: 200px;text-align: left;"  ><?php	echo $hasil_penghuni['NAMA_PENGHUNI'];	?></td>
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
								<td width="14%" style="text-align: left;" ><?php echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS'];?></td>
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
								<td style="text-align: center; width: 107px;"><?php echo $hasil['NO_SIP'];	?></td>
								<td style="width: 20%"><?php echo $hasil['ALAMAT'];	?></td>
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