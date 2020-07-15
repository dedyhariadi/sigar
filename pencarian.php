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
	include("menuatas.php");
	include("sambungan.php");
	
    //$alamat=$_GET['dataygdicari'];
    //echo "dataygdicari: ".$alamat;
    $kataygdicari=$_GET['cari'];
    $kolomygdicari=$_GET['kolom'];
    
    if($kataygdicari=="Cari Nama Penghuni / Alamat / NRP / Kode Rumah" or $kolomygdicari==0){
     ?>
     <script type="text/javascript" language="javascript">
        alert ("Tolong masukkan nama / alamat / nrp / kode rumah ATAU pilih kolom")
        history.back()
     </script>
     <?php
     exit;   
    }   
         
            switch ($kolomygdicari){
                case 1 :
                    
                    $kolom_db="NAMA_PENGHUNI";
                    $kolom_tampil="Nama Penghuni";
                    $prnth="SELECT A.*,B.*, C.*
             		 FROM TBL_SIP A,TBL_PENGHUNI B, TBL_RUMAH C
             		 WHERE A.NRP=B.NRP 
                     AND A.ID_RUMAH=C.ID_RUMAH
             		 AND B.NAMA_PENGHUNI LIKE '%$kataygdicari%' ORDER BY A.ID_RUMAH;";
                     
                    $sql=mysql_query($prnth,$conn);
            		if (! $sql) 
            			die ("Perintah gagal");
                    break;
                case 2 :
                    
                    $kolom_db="ALAMAT";
                    $kolom_tampil="Alamat";
                    
                    $prnth="SELECT A.*,B.*, C.*
             		 FROM TBL_SIP A,TBL_PENGHUNI B, TBL_RUMAH C
             		 WHERE A.NRP=B.NRP 
                     AND A.ID_RUMAH=C.ID_RUMAH
             		 AND C.ALAMAT LIKE '%$kataygdicari%' ORDER BY A.ID_RUMAH ;";
                     $sql=mysql_query($prnth,$conn);
            		if (! $sql) 
            			die ("Perintah gagal");
                    
                    break;
                case 3:
                    
                    $kolom_db="NRP";
                    $kolom_tampil="NRP";
                    $prnth="SELECT A.*,B.*, C.*
             		 FROM TBL_SIP A,TBL_PENGHUNI B, TBL_RUMAH C
             		 WHERE A.NRP=B.NRP 
                     AND A.ID_RUMAH=C.ID_RUMAH
             		 AND B.NRP LIKE '%$kataygdicari%' ORDER BY A.ID_RUMAH;";
                     $sql=mysql_query($prnth,$conn);
            		if (! $sql) 
            			die ("Perintah gagal");
                    break;
                case 4:
                    
                    $kolom_db="ID_RUMAH";
                    $kolom_tampil="Kode Rumah";
                    $prnth="SELECT A.*,B.*, C.*
             		 FROM TBL_SIP A,TBL_PENGHUNI B, TBL_RUMAH C
             		 WHERE A.NRP=B.NRP 
                     AND A.ID_RUMAH=C.ID_RUMAH
             		 AND A.ID_RUMAH LIKE '%$kataygdicari%' ORDER BY A.ID_RUMAH;";
                     $sql=mysql_query($prnth,$conn);
            		if (! $sql) 
            			die ("Perintah gagal");
                    break;
                default :
                    $kolom_db="";
                    $kolom_tampil="gagal";
            }
            
?>

<p class="judul" align="center" style="color: #400080;">Hasil Pencarian 
dengan&nbsp;<font color="red">&quot;<?php echo $_GET['cari'];?>&quot;</font>&nbsp; berdasarkan &nbsp;<font color="red">&quot;<?php echo $kolom_tampil;?>&quot;</font>
<br />ditemukan sebanyak <?php echo mysql_num_rows($sql);?> orang
</p>

<table style="width: 90%" border="0" id="tabelku" align="center" class="standardteks">

	<tr style="text-align: center; color: black; background-color:#DDBBFF;">
		<td style="height: 63px; width: 12px;">NO&nbsp;</td>
		<td style="height: 63px; width: 34px;">KODE<br />RMH</td>
		<td style="width: 15%; height: 63px;">NAMA</td>
		<td width="14%" style="height: 63px">PANGKAT, KORPS</td>
		<td width="5%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>
		<td style="height: 63px; width: 107px;">NOSIP</td>
		<td style="height: 63px; width: 20%;">ALAMAT</td>
		<td style="height: 63px; width: 10%;">KOMPLEK</td>
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
								<td style="width: 34px; text-align: center;"><a href="rh_history.php?id_rumah=<?php	echo $hasil['ID_RUMAH'];?>"><?php echo $hasil['ID_RUMAH'];?></a></td>
								<td style="width: 15%" ><a href="rh_history.php?id_rumah=<?php echo $hasil['ID_RUMAH'];?>">
                                <?php	
                                $nama=$hasil_penghuni['NAMA_PENGHUNI'];
                                if($kolomygdicari==1){
                                    //print $nama."";
                                    $posisi=strpos(strtolower($nama),$kataygdicari);                                
                                    //echo $nama." ".$posisi;
                                    $bnyk=strlen($nama);
                                    $bnykcari=strlen($kataygdicari);
                                    for ($s=0;$s<=$bnyk;$s++){
                                        if($s==$posisi){
                                           echo "<font style='background-color:magenta;' color='black'>".substr($nama,$s,$bnykcari)."</font>";    
                                        $s=$s+$bnykcari;
                                        }
                                        echo substr($nama,$s,1);
                                   }
                                    }else{
                                        echo $nama;
                                }
                                
                                ?>
                                
                                </a>
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
								<td style="width: 20%">
                                <?php 
                                
                                $nama=$hasil['ALAMAT'];
                                if($kolomygdicari==2){
                                    //print $nama."";
                                    $posisi=strpos(strtolower($nama),$kataygdicari);                                
                                    //echo $nama." ".$posisi;
                                    $bnyk=strlen($nama);
                                    $bnykcari=strlen($kataygdicari);
                                    for ($s=0;$s<=$bnyk;$s++){
                                        if($s==$posisi){
                                           echo "<font style='background-color:magenta;' color='black'>".substr($nama,$s,$bnykcari)."</font>";    
                                        $s=$s+$bnykcari;
                                        }
                                        echo substr($nama,$s,1);
                                   }
                                    }else{
                                        echo $nama;
                                }	

                                ?>
                                </td>
								<td style="width: 12%; text-align: left;">&nbsp;&nbsp;
								<?php								
								$id_komplek=$hasil['ID_KOMPLEK'];	
								$perintah_komplek=" SELECT *
										FROM TBL_KOMPLEK
										WHERE ID_KOMPLEK='$id_komplek' LIMIT 1;";
								$sql_komplek=mysql_query($perintah_komplek,$conn);
									if (!$sql_komplek)
									die("Cari komplek gagal");
								$hasil_komplek=mysql_fetch_array($sql_komplek);
								echo $hasil_komplek['KOMPLEK'];
								?>
									</td>
								<td style="width: 63px; text-align: center;"><a href="sip_update.php?id_rumah=<?php echo $hasil['ID_RUMAH'];?>">
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
								</a></td>
						</tr>
</form>					
	<?php
					$x=$x+1;
	}?>
</table>
</body>
</html>