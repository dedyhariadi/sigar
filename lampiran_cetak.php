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
        
	
	function balikwarna(bariske){
	   
		var tabell=document.getElementById("tabelku")
		var jenisbaris=bariske%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}	
	}
 </script>
</head>

<body style="font-family:Arial, Helvetica, sans-serif">
<p style="color:black;font-size:15px; margin-bottom:0px;margin-top:0px; width: 274px; text-align: center;" align="left" >
PANGKALAN UTAMA TNI AL V<br /><span style="text-decoration:underline">
DINAS ADMINISTRASI PERSONEL</span></p>
<p style="color:black;font-size:20px;margin-bottom:6px;" align="left" >&nbsp;&nbsp;&nbsp;DAFTAR PENGAJUAN NOMOR SIP</p>

<?php
    $r=1;
    $data_idrumah=$_GET['idrumah'];
    include("sambungan.php");
    $idrumah=explode("nnn",$data_idrumah);
    $banyakdata= count($idrumah)-1;
    //echo $banyakdata;
    
    
    for ($putaran=0;$putaran<$banyakdata;$putaran++){
        $perintahsip="SELECT * FROM tbl_rumah a, tbl_sip b, tbl_penghuni c 
                        WHERE a.ID_RUMAH=b.ID_RUMAH 
                        AND b.NRP=c.NRP 
                        AND a.ID_RUMAH='$idrumah[$putaran]';"; 
    	$sqlsip=mysql_query($perintahsip);
        $hasil= mysql_fetch_array($sqlsip);
        
        $kodekat[$putaran]=$hasil['KODE_KAT'];
        $kodekorps[$putaran]=$hasil['KODE_KORPS']; 
        $namapenghuni[$putaran]=$hasil['NAMA_PENGHUNI'];
        $nrp[$putaran]=$hasil['NRP'];
        $alamat[$putaran]=$hasil['ALAMAT'];
        $status[$putaran]=$hasil['KODE_STATUS'];
	     
  }
//echo $namapenghuni[0]."<br>";
//  echo $namapenghuni[1];

array_multisort($status,$kodekat,$nrp,$namapenghuni,$alamat,$kodekorps);
    
  for($j=0;$j<$banyakdata;$j++){    
  		
								//cari pangkat
								$kodekat_temp=$kodekat[$j];
                                
								$perintah_kat=" SELECT *
										FROM TBL_PANGKAT
										WHERE Kode_kat='$kodekat_temp' LIMIT 1;";
								$sql_kat=mysql_query($perintah_kat,$conn);
									if (!$sql_kat)
									die("Cari pangkat gagal");
								$hasil_pangkat=mysql_fetch_array($sql_kat);
								
								//cari korps
								$kodekorps_temp=$kodekorps[$j];
								$perintah_korps=" SELECT *
										FROM TBL_KORPS
										WHERE KODE_KORPS='$kodekorps_temp' LIMIT 1;";
								$sql_korps=mysql_query($perintah_korps,$conn);
									if (!$sql_korps)
									die("Cari korps gagal");
								$hasil_korps=mysql_fetch_array($sql_korps);
            		if($status[$j]==1){
            			if($j<=8){
            				echo ($j+1).".&nbsp;&nbsp;&nbsp;&nbsp;".$hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']." ".$namapenghuni[$j];   		  				
            				}else{
            				echo ($j+1).".&nbsp;&nbsp;".$hasil_pangkat['Pangkat']. " ".$hasil_korps['KORPS']." ".$namapenghuni[$j];   		  
            				}
                        	
            		}else{
            		  //cari korps
            		  			$kodestatus_temp=$status[$j];
								$perintah_status=" SELECT *
										FROM TBL_STATUS
										WHERE KODE_STATUS='$kodestatus_temp' LIMIT 1;";
								$sql_status=mysql_query($perintah_status,$conn);
									if (!$sql_status)
									die("Cari status gagal");
								$hasil_status=mysql_fetch_array($sql_status);

						if($j<=8){
            				echo ($j+1).".&nbsp;&nbsp;&nbsp;&nbsp;".$hasil_pangkat['Pangkat']. " (".substr($hasil_status['STATUS'],0,5).") ".$namapenghuni[$j];
            				}else{
            				echo ($j+1).".&nbsp;&nbsp;".$hasil_pangkat['Pangkat']. " (".substr($hasil_status['STATUS'],0,5).") ".$namapenghuni[$j];
            				}
            		}
                        $hrfdepan=substr($nrp[$j],0,2);
                        if($hrfdepan=="NA") 
									{
										echo " ";	
									}else{
										if($kodekat_temp<=27){
												echo " NRP ".$nrp[$j];	
											}else{
												echo " NIP ".$nrp[$j];	
											}
									} ?>

		<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php	
             $perintahidrumah="SELECT * FROM tbl_sip WHERE NRP='$nrp[$j]';"; 
                        //AND a.ID_RUMAH='$idrumah[$putaran]';";
                         
              $sqlidrumah=mysql_query($perintahidrumah);
              $hasilidrumah= mysql_fetch_array($sqlidrumah);
            echo $alamat[$j]." (".$hasilidrumah['ID_RUMAH'].")";?>
		<br />
    <?php
	}		
    ?>
</body>

</html>
