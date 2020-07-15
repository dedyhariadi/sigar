<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head> 
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KOMANDO ARMADA RI KAWASAN TIMUR</title>
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
<table style="width: 80%; font-family: Arial, Helvetica, sans-serif; font-size: 16px" align="left">
	<tr>
		<td style="text-align: center;" colspan="3">SURAT IZIN PENGHUNIAN RUMAH 
		NEGARA</td>
	</tr>	
	<tr>
		<td style="width: 30%"></td>
		<td style="width: 11px;"></td>
		<td style="width: 133px;"></td>
	</tr>
	<tr>
		<td style="width: 30%">Nomor</td>
		<td style="width: 11px;">:</td>
		<td style="width: 133px;">SIP/
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
		<td style="width: 30%">Kode Rumah</td>
		<td style="width: 11px">:</td>
		<td style="width: 133px"><?php echo $data['ID_RUMAH'];?></td>
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
		<td style="width: 30%">Kepada</td>
		<td style="width: 11px">:</td>
		<td style="width: 133px"><?php echo $data_penghuni['NAMA_PENGHUNI'];?></td>
	</tr>
	<tr>
		<td style="width: 30%">Pangkat, Korps, NRP</td>
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
		<td style="width: 30%">Jabatan,Satker</td>
		<td style="width: 2%">:</td>
		<td style="width: 133px"><?php echo $data_penghuni['SATKER'];?></td>
	</tr>
	<tr >
		<td colspan="3" style="height:10px;"></td>
	</tr>
	<tr>
		<td colspan="3">Diizinkan untuk :</td>
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
	<tr align="justify" >
		<td colspan="3" style="padding-right:30px;">

1.&nbsp;&nbsp;&nbsp; Menempati Rumah Negara di <?php 
    echo $alamat." ".ucfirst(strtolower($komplek));
    if ($id_komplek==3 or $id_komplek==4 or $id_komplek==6){
		echo " Sidoarjo";
	}else{
	   echo " Surabaya";
	}    
?> 
 bersama keluarganya yang sah mulai tanggal

<?php

if (strlen($data['TGL_BERLAKU'])==5){
	$tglberlaku="0".$data['TGL_BERLAKU'];
}else{
	$tglberlaku=$data['TGL_BERLAKU'];
}


$tgl_berlaku=substr($tglberlaku,0,2);
$bulan_berlaku=substr($tglberlaku,2,2);
$tahun_berlaku=substr($tglberlaku,-2);
switch ($bulan_berlaku) {
		case '01' : $bulan_berlaku = "Januari"; break;
		case '02' : $bulan_berlaku = "Februari"; break;
		case '03' : $bulan_berlaku = "Maret"; break;
		case '04' : $bulan_berlaku = "April"; break;
		case '05' : $bulan_berlaku = "Mei"; break;
		case '06' : $bulan_berlaku = "Juni"; break;
		case '07' : $bulan_berlaku = "Juli"; break;
		case '08' : $bulan_berlaku = "Agustus"; break;
		case '09' : $bulan_berlaku = "September"; break;	
		case '10' : $bulan_berlaku = "Oktober"; break;
		case '11' : $bulan_berlaku = "Nopember"; break;
		case '12' : $bulan_berlaku = "Desember"; break;
		default	   : $bulan_berlaku = " ";
		}

 if(substr($tahun_berlaku,0,1)=="9"){
        echo " ".$tgl_berlaku." ".$bulan_berlaku. " 19".$tahun_berlaku;
  }else{
        echo " ".$tgl_berlaku." ".$bulan_berlaku. " 20".$tahun_berlaku;
    }


?>&nbsp;
sampai 
dengan <?php
if (strlen($data['TGL_EXPIRED'])==5){
	$tglexpired="0".$data['TGL_EXPIRED'];
}else{
	$tglexpired=$data['TGL_EXPIRED'];
}

//$mont=substr($tglexpired)
$tgl_expired=substr($tglexpired,0,2);
$bulan_expired=substr($tglexpired,2,2);
$tahun_expired=substr($tglexpired,-2);
switch ($bulan_expired) {
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
		default	   : $bulan = " ";
		}
        
  if(substr($tahun_expired,0,1)=="9"){
        echo " ".$tgl_expired." ".$bulan. " 19".$tahun_expired;
  }else{
        echo " ".$tgl_expired." ".$bulan. " 20".$tahun_expired;
    }
    
//echo " ".$tgl_expired." ".$bulan. " 20".$tahun_expired;

?> &nbsp;dengan ketentuan sebagai berikut:</td>
	</tr>
	<tr align="justify">
		<td colspan="3" style="padding-left:30px;padding-right:30px;">a.&nbsp;&nbsp;&nbsp; Wajib mentaati semua larangan dan peraturan tentang rumah 
negara yang berlaku.<br />
b.&nbsp;&nbsp;&nbsp; Memperbaharui SIP ini pada 14 hari sebelum berakhir masa 
berlakunya.<br />
c.&nbsp;&nbsp;&nbsp;&nbsp; Menunjukkan SIP ini pada saat pemeriksaan dinas.<br />
d.&nbsp;&nbsp;&nbsp; Sewaktu-waktu SIP dapat dicabut untuk &nbsp;kepentingan &nbsp;dinas TNI AL</td>
	</tr>
	<tr>
		<td colspan="3">2.&nbsp;&nbsp;&nbsp; Dilaksanakan dan diindahkan.</td>
	</tr>
	<tr>
		<td colspan="3" style="text-align: center;margin-left:100px">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" style="text-align: center;padding-left:150px">Surabaya,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br />
A.n. Komandan Pangkalan Utama TNI AL V<br />
Wakil Komandan<br />
<br />
<br />
<br />
I Ketut Suardana<br />
Kolonel Marinir NRP 8712/P</td>
	</tr>
</table>



</body>

</html>
