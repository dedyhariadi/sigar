                        <?php
                        $perintah_ovb="SELECT * FROM TBL_OVB where tgl_ovb like '$bulanovb' order by tgl_ovb;";
                        $sql_ovb=mysql_query($perintah_ovb);
                        if(!$sql_ovb)
                        die("Perintah OVB Gagal");
                        $banyakdata=mysql_num_rows($sql_ovb);
                        	while ($hasil = mysql_fetch_array($sql_ovb)) 
				            {
				    $id_rumah=$hasil['ID_RUMAH'];
                    $nrp_awal=$hasil['NRP_AWAL'];
                    $nama_awal=$hasil['NAMA_AWAL'];
                    $kode_kat_awal=$hasil['KODE_KAT_AWAL'];
                    $kode_korps_awal=$hasil['KODE_KORPS_AWAL'];
                    $kode_status_awal=$hasil['KODE_STATUS_AWAL'];
                    $nrp_akhir=$hasil['NRP_AKHIR'];
                    $nama_akhir=$hasil['NAMA_AKHIR'];
                    $kode_kat_akhir=$hasil['KODE_KAT_AKHIR'];
                    $kode_korps_akhir=$hasil['KODE_KORPS_AKHIR'];
                    $kode_status_akhir=$hasil['KODE_STATUS_AKHIR'];
                    $tgl_ovb=$hasil['TGL_OVB'];?>
                    
	<tr style="height: 30px;" class="tulisantabel" onmouseover="ubahwarna('<?php echo ($x+1);?>')" id="bariss" onmouseout="balikwarna('<?php echo ($x+1);?>')">
        <td style="text-align: center; width: 2%;"><?php echo $nomor;
          $perintah_rumah=" SELECT * FROM TBL_RUMAH WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
                $sql_rumah=mysql_query($perintah_rumah,$conn);
	               if (!$sql_rumah)
				    die("Cari rumah gagal");
				    $hasil_rumah=mysql_fetch_array($sql_rumah);
        ?></td>
		<td style="width: 5%; text-align: center;"><a href="rh_history.php?id_rumah=<?php	echo $id_rumah;?>&tgl_expired=<?php echo $tgl_expired?>"><?php echo $hasil['ID_RUMAH'];?></a></td>
		<td style="width: 2%; text-align: center;"><a href="javascript:edit(<?php echo $hasil['ID_OVB'];?>)">
		<img alt="" src="img27.jpg" width="14" height="14" border="0" /></a></td>
		<td style="width: 2%; text-align: center;"><a href="javascript:hapus(<?php echo $hasil['ID_OVB'];?>, '<?php echo $hasil_rumah['ALAMAT'];?>')">
		<img alt="" src="img26.jpg" width="14" height="14" border="0" /></a></td>
		<td style="width: 15%" >
            <?php	
                    echo $hasil_rumah['ALAMAT'];
             ?>
        </td>
		<td width="10%" style="text-align: left;"><?php echo $nama_awal;?></td>
        <td width="20%" >
            <?php
			 //cari pangkat
			
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kode_kat_awal' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kode_korps_awal' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
									die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
								
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kode_status_awal' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
                                //echo $hasil_status['STATUS'];
                                if($kode_status_awal>1){
                                    echo $hasil_pangkat['Pangkat']. " (".substr($hasil_status['STATUS'],0,5).") ";
                                    //echo $hasil_status;
                                }else{  
                                    echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']." ";    
                                }
                                
       	                        
                                $hrfdepan=substr($nrp_awal,0,2);
                                
                                if($hrfdepan=="NA"){
                                    echo ""; 
                                }else{
    								if($kode_kat_awal<=27){
    								    echo "NRP ".$nrp_awal;    
    								}else{
    								    echo "NIP ".$nrp_awal;
    								}
                                }?>
                                </td>
								<td style="text-align: left; width: 14%;">&nbsp;&nbsp;<?php echo $nama_akhir;	?></td>
                                <td style="width: 131px; text-align: left;" >
								<?php
								//cari pangkat
								
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kode_kat_akhir' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kode_korps_akhir' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
									die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
								
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kode_status_akhir' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);
                                //echo $hasil_status['STATUS'];
                                if($kode_status_akhir>1){
                                    echo $hasil_pangkat['Pangkat']. " (".substr($hasil_status['STATUS'],0,5).") ";
                                    //echo $hasil_status;
                                }else{  
                                    echo $hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']." ";    
                                }
                                
       	                        
                                $hrfdepan=substr($nrp_akhir,0,2);
                                
                                if($hrfdepan=="NA"){
                                    echo ""; 
                                }else{
    								if($kode_kat_akhir<=27){
    								    echo "NRP ".$nrp_akhir;    
    								}else{
    								    echo "NIP ".$nrp_akhir;
    								}
                                }
								?></td>
								<td style="width: 11%" align="right"><?php //echo $tgl_ovb;	
                                 $bulanangka=substr($tgl_ovb,2,2);
    		switch ($bulanangka) {
    			case '01' : $bulan = "Januari"; break;
    			case '02' : $bulan = "Februari"; break;
    			case '03' : $bulan = "Maret"; break;
    			case '04' : $bulan = "April"; break;
    			case '05' : $bulan = "Mei"; break;
    			case '06' : $bulan = "Juni"; break;
    			case '07' : $bulan = "Juli"; break;
    			case '08' : $bulan = "Agustus"; break;
    			case '09' : $bulan = "September"; break;	
    			case '10' : $bulan = "Oktober"; break;
    			case '11' : $bulan = "Nopember"; break;
    			case '12' : $bulan = "Desember"; break;
    			default	   : $bulan = " ";break;
   			}
    		$tanggal=substr($tgl_ovb,0,2);
    		$tahun=substr($tgl_ovb,4,2);
            if(substr($tgl_ovb,4,1)=="9"){
                echo $tanggal." ".$bulan." 19".$tahun;
            }else{
                echo $tanggal." ".$bulan." 20".$tahun;    
            }
      ?></td>
</tr>
	<?php
					$x=$x+1;
                    $nomor=$nomor+1;				
	}?>
		