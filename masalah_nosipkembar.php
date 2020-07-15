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
		tabell.rows[bariske*2-1].style.backgroundColor="RGB(91, 48, 19)";
		tabell.rows[bariske*2-1].style.color="#FFFFFF";
        tabell.rows[bariske*2].style.backgroundColor="RGB(91, 48, 19)";
		tabell.rows[bariske*2].style.color="#FFFFFF";

		}
	
	function balikwarna(bariske){
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=(bariske*2-1)%2;
		if (jenisbaris==1){
			tabell.rows[bariske*2-1].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske*2-1].style.color="#000000";
            tabell.rows[bariske*2].style.backgroundColor="#FFFCCC";
			tabell.rows[bariske*2].style.color="#000000";
		}else{
			tabell.rows[bariske*2-1].style.backgroundColor="#FFFCCC";
			tabell.rows[bariske*2-1].style.color="#000000";
            tabell.rows[bariske*2].style.backgroundColor="#FFFCCC";
			tabell.rows[bariske*2].style.color="#000000";
		}
		
		//alert (warnabg)
	}
	
</script>
</head>

<body>


<?php 
	include("menukanan.htm");
	include("sambungan.php");
	
	$prnth_nosipkembar="select NO_SIP,NRP,TGL_EXPIRED,ID_RUMAH,count(*) as jml from TBL_SIP group by NO_SIP having jml > 1;";
 		 $sql_nosipkembar=mysql_query($prnth_nosipkembar,$conn);
			if (! $sql_nosipkembar) 
			die ("Perintah No  sip gagal");
		//$hasil_tdksesuai=mysql_fetch_array($sql_rmhganda);
		$jmlnosipkembar=mysql_num_rows($sql_nosipkembar);
	
?>
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br /><span lang="id">========================================</span></p>

<p class="standardteks" align="center">Jumlah Nomor SIP yang Kembar&nbsp; adalah <font color="blue" size="6px" > <?php echo $jmlnosipkembar;?> </font>Orang </p>

<table style="width: 100%" border="0" id="tabelku" align="center">

	<tr style="text-align: center; color: #FFFFFF; background-color: maroon;font-family:'Segoe UI Semibold';font-size:large">
		<td style="height: 63px;" width="5%   ">NO&nbsp;</td>
		<td style="height: 63px;" width="15%">NOSIP</td>
		<td style="height: 63px;" width="10%">STATUS SIP</td>
		<td width="15%"style="height: 63px; font-family: 'Segoe UI Semibold'; font-size: large;">NAMA</td>
		<td width="10%" style="height: 63px">PANGKAT, KORPS</td>
		<td width="15%" style="height: 63px">NRP / NIP</td>
		<td style="height: 63px; width: 151px;">STATUS</td>

		
		<td style="height: 63px; width: 151px;">KODE RUMAH</td>

		
		<td style="height: 63px;" width="20%">ALAMAT</td>

		
	</tr>
	
		<?php 
			$x=1;
			$tandabaris=0; 
			$tandabariss=0;
			while ($hasil = mysql_fetch_array($sql_nosipkembar)) 
				{ 
	
                                    
					?>
					       
							<tr class="tulisantabel" onmouseover="ubahwarna('<?php echo $x;?>')" id="bariss" onmouseout="balikwarna('<?php echo $x;?>')">
								<td style="text-align: center; width: 12px; " rowspan="2"><?php echo $x;?></td>
                                <td style="text-align: center; width: 107px; " rowspan="2">&nbsp;<?php 
                                echo $hasil['NO_SIP'];?></td>
								<td style="width: 63px; text-align: center; " rowspan="2">
									<?php 
									$tgl_today=date("d");
                                    $bulan_today=date("m");
                                    $thn_today=date("y");
                                    $jd1=juliantojd($bulan_today,$tgl_today,$thn_today);
                                    
																			//echo "<br>".$today."<br>".$selisih_hari;

											$tglexpiredd=$hasil['TGL_EXPIRED'];
                                            $tgl_akhir=substr($tglexpiredd,0,2);
                                            $bln_akhir=substr($tglexpiredd,2,2);
                                            $thn_akhir=substr($tglexpiredd,-2);
                                            $jd2=juliantojd($bln_akhir,$tgl_akhir,$thn_akhir);
                                            $selisih_hari=$jd2-$jd1;
                                            
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
								</td><?php
                                
                                $nosip=$hasil['NO_SIP'];
								$perintah_sipp=" SELECT * FROM TBL_SIP a,TBL_PENGHUNI b,TBL_RUMAH c WHERE a.NRP=b.NRP AND a.ID_RUMAH=c.ID_RUMAH AND a.NO_SIP='$nosip';";
								$sql_sipp=mysql_query($perintah_sipp,$conn);
									if (!$sql_sipp)
									die("Cari nrp sip gagal");
								while($hasil_sipp=mysql_fetch_array($sql_sipp)){
								    //echo $hasil_sipp['NRP']."<br>";
								
								  
                                    
								?>
								<td style="width: 200px; height: 38px;" ><?php	echo $hasil_sipp['NAMA_PENGHUNI'];	?></td>
								<?php
								//cari pangkat
								$kodekat=$hasil_sipp['KODE_KAT'];
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps=$hasil_sipp['KODE_KORPS'];
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kodekorps' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
									die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
								?>
								<td width="14%" style="height: 38px" ><?php echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS'];?></td>
								<td style="width: 131px; text-align: center; height: 38px;" >
								
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
                                $nrp=$hasil['NRP'];
								$kodestatus=$hasil_sipp['KODE_STATUS'];
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kodestatus' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
								?>
								<td width="5%" style="text-align: center; height: 38px;"><?php echo $hasil_status['STATUS'];	?></td>
								<?php
								//	$perintah_alamat="SELECT a.*, b.ALAMAT FROM tbl_sip a, tbl_rumah b 
//                                                      WHERE a.id_rumah=b.id_rumah 
//                                                      AND a.NRP='$nrp';";
//									$sql_alamat=mysql_query($perintah_alamat,$conn);
//                                    $a=1;
//                                    
//									while($hasil_alamat=mysql_fetch_array($sql_alamat)){
//									    $alamat[$a]=$hasil_alamat['ALAMAT'];
//                                        $nosipp[$a]=$hasil_alamat['NO_SIP'];
//                                       	$idrumahh[$a]=$hasil_alamat['ID_RUMAH'];
//                                       	                                        
//                                        $hurufdepan=substr($idrumahh[$a],0,3);
//                                       	$perintah_komplekk="select * from tbl_komplek where KODE_KOMPLEK='$hurufdepan';";
//                                        $sql_komplek2=mysql_query($perintah_komplekk,$conn);
//                                        $hasil_komplek2=mysql_fetch_array($sql_komplek2);
//                                        
//                                        $komplekk[$a]=$hasil_komplek2['KOMPLEK'];
//                                        $a=$a+1;
//                                       
//									}
                                
								?>
                                
    
	  							<td width="5%" style="text-align: center; height: 38px;">
	  							<?php 
	  							echo $hasil_sipp['ID_RUMAH'];
	  							?>
								&nbsp;</td>
                                
    
	  							<td width="5%" style="text-align: left; height: 38px;">
	  							<?php 
	  							echo $hasil_sipp['ALAMAT'];
	  							?>

	  							</td>
                                
    
	  						</tr>
                            <?php }?>
							<tr class="standardteks" >
								
								
								<td ></td>
																
								<td><?php 
                                for($b=1;$b<3;$b++){
                                    //echo "@ ".$alamat[$b]." (".$idrumahh[$b].") ".$komplekk[$b]."<br>";
                                        
                               } ?></td>
						<td ></td>
						<td ></td>

						<td >&nbsp;</td>

						<td >&nbsp;</td>

							</tr>
                            

	<?php
					
                    $tandabariss=0;
                    //}
                    
                    $x=$x+1;
					
	}?>
</table>

<script language="javascript">
		
	var tabell=document.getElementById("tabelku")
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