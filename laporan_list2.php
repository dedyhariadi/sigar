<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script type="text/javascript" language="javascript">
	  
    
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
	include("sambungan.php");
	$komplek = $_GET['pilihankomplek'];	 
	$perintahkomplek="SELECT KOMPLEK FROM tbl_komplek WHERE ID_KOMPLEK=$komplek";
	$sqlkomplek=mysql_query($perintahkomplek);
	$kompleksql = mysql_fetch_array($sqlkomplek);
?>
<p class="judul" style="color:#400080 ;">DAFTAR PENGHUNI RUMAH NEGARA<br /> DI KOMPLEK :&nbsp;<?php echo $kompleksql[0]; ?> </p>
<br/>
<table style="width: 80%" border="0" id="tabelku" align="center" class="standardteks">

	<tr style="text-align: center; color: black; background-color:#DDBBFF;">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style="width: 20%; height: 63px;">NAMA</td>
		<td width="14%" style="height: 63px">PANGKAT, KORPS, NRP/NIP </td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">NOSIP</td>
		<td style="height: 63px; width: 20%;">ALAMAT</td>
		<td style="height: 63px; width: 63px;">STATUS SIP</td>
	</tr>
	
		<?php 
			$x=1;
			$tandabaris=0;
            $prnth="SELECT A.*,B.*
             		 FROM TBL_SIP A,TBL_RUMAH B
             		 WHERE A.ID_RUMAH=B.ID_RUMAH
             		 AND B.ID_KOMPLEK='$komplek' order by B.NO;";
            
            	$sql=mysql_query($prnth,$conn);
            		if (!$sql) 
            			die ("Perintah gagal");
			
			while ($hasil = mysql_fetch_array($sql)) 
				{ 
				$tgl_berlaku=$hasil['TGL_BERLAKU'];
										$today=date("dmy");
										$thn_akhir=substr($tgl_berlaku,-2)+3;
										
										$tgl_akhir_temp="20".$thn_akhir."-".substr($tgl_berlaku,2,2)."-".substr($tgl_berlaku,0,2);
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
                    <?php 		
							$nrp=$hasil['NRP'];
							$perintah_nama="SELECT D.*
									FROM TBL_PENGHUNI D
									WHERE D.NRP='$nrp' LIMIT 1;";
							$sql_nama=mysql_query($perintah_nama,$conn);
									if (!$sql_nama)
									die("Cari nama gagal");
							$hasil_penghuni=mysql_fetch_array($sql_nama);
							
                            //cek blacklist atau tidak	 
                            $namahuni=strtolower($hasil_penghuni['NAMA_PENGHUNI']);
                            $blacklist="blacklist";
                            $posisiblak=strpos($namahuni,$blacklist);
                            
                            if ($x%2==0){
                                    if($posisiblak===FALSE){?>
                                        <tr style="height: 30px;background-color: #F8F0FF;" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')" onclick="seleksi('<?php echo $x;?>')">                                        
                                    <?php 
                                        } else {
                                    ?>
                                        <tr style="height: 30px;background-color:red;" id="bariss">                                        
                                    <?php
                                    }
                            }else{ 
                                if($posisiblak===FALSE){?>
                                        <tr style="height: 30px;background-color: #FFFFFF;" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')" onclick="seleksi('<?php echo $x;?>')">                                        
                                    <?php 
                                        } else {
                                    ?>
                                        <tr style="height: 30px;background-color:red;" id="bariss">                                        
                                    <?php
                                    }
                             } 
                            //batas cek blacklist
                            ?>
                            
								<td style="text-align: center; width: 12px;"><?php echo $x;?></td>
																
								<td style="width: 200px" >
                                    <?php 
                                        if ($posisiblak===FALSE){?>
                                            <a href="rh_history.php?id_rumah=<?php echo $hasil['ID_RUMAH'];?>"><?php echo $hasil_penghuni['NAMA_PENGHUNI'];?></a>        
                                        <?php 
                                        } else { ?> 
                                            <a href="rh_history_masalah.php?id_rumah=<?php echo $hasil['ID_RUMAH'];?>"><?php echo $hasil_penghuni['NAMA_PENGHUNI'];?></a>
                                        <?php 
                                        }
                                    ?>
                                    
                                </td>
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
								<td width="14%" ><?php echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']," ";

								$hrfdepan=substr($hasil['NRP'],0,2);
								
								if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										echo $hasil['NRP'];	
									} ?>
								</td>
								<?php
								
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
								<td style="text-align: center; width: 107px;">
                                <?php 
                                if(substr($hasil['NO_SIP'],-4)=="9999"){
                                    ?>
                                    <font color="#C6FFC6" style="background-color:#002D00">PROSES</font>
                                    <?php
                                }else{
                                    echo $hasil['NO_SIP'];
                                }
                                	
                                ?>
                                </td>
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
</body>

</html>