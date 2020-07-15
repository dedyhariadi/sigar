<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head> 
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KOMANDO ARMADA RI KAWASAN TIMUR</title>
<style type="text/css">
.auto-style1 {
	font-size: 13px;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	text-align: left;
}
</style>
</head>
<body style="font-family:Arial, Helvetica, sans-serif;">
<p style="color:black;font-size:15px; margin-bottom:0px;margin-top:0px; width: 320px; padding-bottom:5px; border-bottom:1px solid black; text-align: center;">
KOMANDO ARMADA RI KAWASAN TIMUR<br />PANGKALAN UTAMA TNI AL V<br/></p>
<?php include("sambungan.php");
$id_rumah= $_GET['id_rumah'];
$nrp= $_GET['nrp'];

$prnth="SELECT * FROM TBL_SIP WHERE ID_RUMAH='$id_rumah' AND NRP='$nrp';";
 		 
$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal");
$data=mysql_fetch_array($sql)

?>
<br/>
<table style="width: 65%; font-family: Arial, Helvetica, sans-serif; font-size: 16px" align="left" border="0">
	<tr>
		<td style="text-align: center;" colspan="4">
		<img src="Gambar/tnial.gif" align="middle" height="78" width="92"><br />
		SURAT IZIN PENGHUNIAN RUMAH 
		NEGARA<br />
		Nomor : SIP/
		<?php
        if(substr($data['NO_SIP'],-4)=="9999"){
            echo "";
        }else{
        	$posisistrip=strpos($data['NO_SIP'],"/");
    		$nomorsip=explode("/",$data['NO_SIP']);
            echo $nomorsip[0];
            
    		//echo trim($nomorsip);
    		$tanggal=substr($data['NO_SIP'],$posisistrip+1,2);
    		$bulan=substr($data['NO_SIP'],$posisistrip+3,2);
    		$tahun=substr($data['NO_SIP'],$posisistrip+5,2);
    		switch ($bulan) {
    			case '01' : $bulanromawi = "I"; break;
    			case '02' : $bulanromawi = "II"; break;
    			case '03' : $bulanromawi = "III"; break;
    			case '04' : $bulanromawi = "IV"; break;
    			case '05' : $bulanromawi = "V"; break;
    			case '06' : $bulanromawi = "VI"; break;
    			case '07' : $bulanromawi = "VII"; break;
    			case '08' : $bulanromawi = "VIII"; break;
    			case '09' : $bulanromawi = "IX"; break;	
    			case '10' : $bulanromawi = "X"; break;
    			case '11' : $bulanromawi = "XI"; break;
    			case '12' : $bulanromawi = "XII"; break;
    			default	  : $bulanromawi = "  ";
    			}
    		$awalangkatahun=substr($data['NO_SIP'],$posisistrip+5,1);
    		if($awalangkatahun==9){
    			$tahun="19".$tahun;
    		}else{
    			$tahun="20".$tahun;
    		}
    		echo "/".$bulanromawi."/".$tahun;
		}
  		?></td>
	</tr>	
	<tr>
	<?php
			
			$prnth="SELECT * FROM tbl_penghuni
				WHERE NRP='$nrp';";
				 
 		 
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$data_penghuni=mysql_fetch_array($sql);
			$kode_statuss=$data_penghuni['KODE_STATUS'];

		?>

		<td style="width: 2%">1.</td>
		<td style="width: 30%">Diizinkan kepada :</td>
		<td style="width: 11px;"></td>
		<td style="width: 133px;"></td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Pangkat, Korps, NRP / NIP</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px"><?php
			//echo $data_penghuni[]
		
		$kode_kat=$data_penghuni['KODE_KAT'];
		$kode_korps=$data_penghuni['KODE_KORPS'];
		
		//cari pangkat	
		$prnth="SELECT * FROM tbl_pangkat
			WHERE Kode_kat='$kode_kat';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$data_pangkat=mysql_fetch_array($sql);
			$pangkat=$data_pangkat['Pangkat'];
			
			
		//cari korps
		$prnth="SELECT * FROM tbl_korps
			WHERE KODE_KORPS='$kode_korps';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$data_korps=mysql_fetch_array($sql);
			
			$korps=$data_korps['KORPS'];
			
            if($kode_statuss==1){
                echo $pangkat." ".$korps;
    			$hrfdepan=substr($nrp,0,2);
    			if($hrfdepan=="NA") 
    			{
    				echo " ";	
    			}else{
    			    if($kode_kat<=27){
    			         if ($kode_kat<=6){
    			             echo " ";    
    			         }else{
    			             echo " NRP ".$nrp;
    			         }
    			    }else{
    			         echo " NIP ".$nrp;
    			    } 
    					
    			}
            }
            
            if($kode_statuss==2 || $kode_statuss==3){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                echo $pangkat." (".$hasil_statuss['STATUS'].")";
            }
            
            if($kode_statuss==4 || $kode_statuss==5 || $kode_statuss==6){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                echo $hasil_statuss['STATUS']." ".$pangkat;
                if($data_penghuni['NAMA_ANGGOTA']==$data_penghuni['NAMA_PENGHUNI']){
                    echo " ";
                }else{
                    echo " ".$data_penghuni['NAMA_ANGGOTA'];
                }
            }			
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Nama</td>
		<td style="width: 11px;">:</td>
		<td style="width: 133px;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Jabatan,Satker</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px"><?php echo $data_penghuni['SATKER'];?></td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Satker</td>
		<td style="width: 11px">:</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">&nbsp;</td>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">2.</td>
		<td style="width: 30%">Untuk Menempati rumah :</td>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Alamat</td>
		<td style="width: 11px;">:</td>
		<td style="width: 133px;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Sebagian / Seluruhnya</td>
		<td style="width: 11px">:</td>
		<td style="width: 133px"><?php echo $data['ID_RUMAH'];?></td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Tipe rumah</td>
		<td style="width: 11px">:</td>
		<td style="width: 133px"><?php echo $data_penghuni['NAMA_PENGHUNI'];?></td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Dipakai untuk</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px"><?php
			//echo $data_penghuni[]
		
		$kode_kat=$data_penghuni['KODE_KAT'];
		$kode_korps=$data_penghuni['KODE_KORPS'];
		
		//cari pangkat	
		$prnth="SELECT * FROM tbl_pangkat
			WHERE Kode_kat='$kode_kat';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$data_pangkat=mysql_fetch_array($sql);
			$pangkat=$data_pangkat['Pangkat'];
			
			
		//cari korps
		$prnth="SELECT * FROM tbl_korps
			WHERE KODE_KORPS='$kode_korps';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$data_korps=mysql_fetch_array($sql);
			
			$korps=$data_korps['KORPS'];
			
            if($kode_statuss==1){
                echo $pangkat." ".$korps;
    			$hrfdepan=substr($nrp,0,2);
    			if($hrfdepan=="NA") 
    			{
    				echo " ";	
    			}else{
    			    if($kode_kat<=27){
    			         if ($kode_kat<=6){
    			             echo " ";    
    			         }else{
    			             echo " NRP ".$nrp;
    			         }
    			    }else{
    			         echo " NIP ".$nrp;
    			    } 
    					
    			}
            }
            
            if($kode_statuss==2 || $kode_statuss==3){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                echo $pangkat." (".$hasil_statuss['STATUS'].")";
            }
            
            if($kode_statuss==4 || $kode_statuss==5 || $kode_statuss==6){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                echo $hasil_statuss['STATUS']." ".$pangkat;
                if($data_penghuni['NAMA_ANGGOTA']==$data_penghuni['NAMA_PENGHUNI']){
                    echo " ";
                }else{
                    echo " ".$data_penghuni['NAMA_ANGGOTA'];
                }
            }			
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Terhitung mulai</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px"><?php echo $data_penghuni['SATKER'];?></td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">Berlaku sampai</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 30%">&nbsp;</td>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">3.</td>
		<td style="width: 30%">Jumlah Keluarga</td>
		<td style="width: 2%">&nbsp;</td>
		<td style="width: 133px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td colspan="3">
		<table style="width: 100%" border="1">
			<tr class="auto-style1">
				<td style="height: 34px; width: 58px">NO</td>
				<td class="auto-style2" style="height: 34px; width: 421px">NAMA 
				KELUARGA</td>
				<td class="auto-style2" style="height: 34px; width: 74px">LK / 
				PR</td>
				<td class="auto-style2" style="height: 34px; width: 328px">
				TEMPAT, <br />
				TGL LAHIR</td>
				<td class="auto-style2" style="height: 34px; width: 219px">
				HUBUNGAN <br />
				KELUARGA</td>
				<td class="auto-style2" style="height: 34px">KET</td>
			</tr>
			<tr>
				<td style="width: 58px" class="auto-style2">1</td>
				<td style="width: 421px" class="auto-style2">2</td>
				<td class="auto-style2" style="width: 74px">3</td>
				<td class="auto-style2" style="width: 328px">4</td>
				<td class="auto-style2" style="width: 219px">5</td>
				<td class="auto-style2">6</td>
			</tr>
			<tr>
				<td style="width: 58px">&nbsp;</td>
				<td style="width: 421px">&nbsp;</td>
				<td class="auto-style2" style="width: 74px">&nbsp;</td>
				<td class="auto-style2" style="width: 328px">&nbsp;</td>
				<td class="auto-style2" style="width: 219px">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 58px">&nbsp;</td>
				<td style="width: 421px">&nbsp;</td>
				<td class="auto-style2" style="width: 74px">&nbsp;</td>
				<td class="auto-style2" style="width: 328px">&nbsp;</td>
				<td class="auto-style2" style="width: 219px">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 2%">4.</td>
		<td colspan="3">Dengan catatan :</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td colspan="3" align="justify">a.&nbsp;&nbsp;Surat izin ini berlaku dan sah apabila ditandatangani oleh pejabat yang 
		diberi wewenang dalam penerbitan SIP rumah negara. </td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td colspan="3" align="justify">b.&nbsp; Surat izin ini tidak berlaku untuk / anggota lain kecuali yang ditunjuk dalam surat izin ini.</td>
	</tr>
	<tr>
		<td style="width: 2%">&nbsp;</td>
		<td colspan="3" align="justify">c. 
		Bersedia mengosongkan, menginggalkan dan menyerahkan rumah negara yang 
		ditempati tanpa syarat serta dalam keadaan baik dan lengkap apabila 
		personel yang namanya ditunjuk dalam SIP sebagai berikut:</td>
	</tr>
	<tr>
		<td style="width: 2%; height: 22px;"></td>
		<td colspan="3" align="justify" style="height: 22px">
		<table style="width: 100%">
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">1)</td>
				<td>Pensiun</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">2)</td>
				<td>Mengundurkan diri atau diberhentikan dari dinas keprajuritan</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">3)</td>
				<td>Mendapat rumah negara atau fasilitas rumah dari dinas</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">4)</td>
				<td>Berakhirnya/habis masa berlaku SIP</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">5)</td>
				<td>Terbitnya SIP baru atas nama orang</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td style="width: 30px">6)</td>
				<td>Pencabutan SIP yang bersangkutan</td>
			</tr>
			<tr>
				<td style="width: 20px; height: 40px"></td>
				<td colspan="2" style="height: 40px">7)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bagi personel yang mutasi pindah bila di tempat baru mendapatkan 
				SIP, maka ybs harus meninggalkan rumah negara yang lama paling 
				lambat tiga bulan</td>
			</tr>
			<tr>
				<td style="width: 20px">&nbsp;</td>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 20px">d.</td>
				<td colspan="2">Masa berlaku SIP tiga tahun.</td>
			</tr>
		</table>
		</td>
	</tr>
	<?php
$prnth="SELECT * FROM tbl_rumah	WHERE ID_RUMAH='$id_rumah';";

	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal");
	$data_rumah=mysql_fetch_array($sql);
	$alamat=$data_rumah['ALAMAT'];
	$id_komplek=$data_rumah['ID_KOMPLEK'];
	$prnth="SELECT * FROM tbl_komplek WHERE ID_KOMPLEK='$id_komplek';";
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal");
	$data_komplek=mysql_fetch_array($sql);
	$komplek=$data_komplek['KOMPLEK'];
	//$komplek=ucwords($komplek);
	if ($id_komplek==1 or $id_komplek==2 or $id_komplek==8 or $id_komplek==10){
		$komplek="";
	}
?>
	<tr>
		<td style="width: 2%; height: 22px;">&nbsp;</td>
		<td colspan="3" align="justify" style="height: 22px">
		<table style="width: 100%">
			<tr>
				<td rowspan="2" style="width: 191px" style="border:thick"><br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				</td>
				<td rowspan="2" style="width: 158px"></td>
				<td class="auto-style3" style="height: 29px">Dikeluarkan di 
				Surabaya<br />
				Pada Tanggal</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 47px">a.n. Komandan Pangkalan Utama TNI AL V<br />
Wakil Komandan,<br />
<br />
<br />
				<br />
<br />
				Bambang Sutrisno<br />
Kolonel Marinir NRP 9242/P</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td class="auto-style2">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	</table>



</body>

</html>
