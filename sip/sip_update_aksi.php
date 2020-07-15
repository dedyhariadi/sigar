<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script language="javascript">

	function buka(url)
		{
		 	window.open(url,"Sigar","navigator=no, directories=no,toolbar=no,menubar=yes,width=500,height=400,Location=no");
		}
		
</script>
</head>
<body>

<?php 
	include("menukanan.htm");
	include("sambungan.php");

	$id_rumah = $_POST['id_rumah'];
	$alamat = $_POST['alamat'];
	$komplek = $_POST['komplek'];	
	$status = $_POST['status'];
    //$nrp_ttd=$_POST['nrp_pejabat'];
    //echo $nrp_ttd;
    if ($status<4){
        $nama_penghuni = $_POST['nama_penghuni'];
        $nama_anggota = $_POST['nama_penghuni'];	    
    }else{
        $nama_penghuni = $_POST['nama_penghuni'];
        $nama_anggota = $_POST['anggota'];
    }
    //echo "status : ".$status;
    //    echo "nama anggota : ".$nama_anggota;
    //    echo "nama penghuni : ".$nama_penghuni;
	
    $nosipasli=$_POST['nosip'];
    $kode_kat = $_POST['nama_kat'];	
    
	$kode_korps = $_POST['kode_korps'];
    echo $kode_korps;
    if ($kode_korps==""){
        $kode_korps=" ";
    } 
	if ($_POST['NRP_tampil']==" "){
	   $nrp = $_POST['NRP'];
	}else{
	   $nrp = $_POST['NRP_tampil'];   
	}
    $nrptampil=$_POST['NRP_tampil'];
    $satker = $_POST['satker'];	
    $nrppejabat=$_POST['nrp_pejabat'];
       
    
	$tgl_berlaku= $_POST['tgl_berlaku'];

            $thn_akhir=substr($tgl_berlaku,-2)+3;
    		$tgl_akhir_temp="20".$thn_akhir."-".substr($tgl_berlaku,2,2)."-".substr($tgl_berlaku,0,2);
            $tgl_akhir_1=strtotime($tgl_akhir_temp);										
			$tgl_akhir_1_1=$tgl_akhir_1-24*60*60;
			$tgl_expired=date("dmy",$tgl_akhir_1_1);										
    $flag=0;
	$nrpasli=$_POST['NRP'];	    
	echo $nrpasli."<br>";
	echo $nrptampil;
	if ($nrptampil==" "){
		$nrptampil=$nrpasli;
	}
	    if($nrptampil<>$nrpasli){
	        $perintah="SELECT * FROM tbl_penghuni WHERE NRP='$nrptampil';";
		    $sql=mysql_query($perintah,$conn);
			if (! $sql) 
				die ("Proses mencari NRP gagal");
		 		
		       while ($penghuni = mysql_fetch_array($sql)) 
			      {
				    $flag=1;
				    echo "nrptampil beda dengan nrpasli";
	                $namayangpunyanrp=$penghuni['NAMA_PENGHUNI'];	
			      }
	    }
	
	//if ($flag==0){
//			echo "penghuni sudah terdaftar n kondisi update terlaksana"."<br>";
//            echo "nrp tampil : ".$nrptampil."<br>";
//            echo "nrp asli : ".$nrpasli."<br>";
//            echo $status;
//            
//			$flag=0;
//							
//
//                            
////							KODE_KORPS=$kode_korps,
////							
//                            
//				$perintahubah = " UPDATE tbl_penghuni SET NAMA_PENGHUNI='$nama_penghuni', 
//                            NAMA_ANGGOTA='$nama_anggota',							
//                            KODE_KAT=$kode_kat,
//                            SATKER='$satker',
//                            KODE_STATUS=$status
//                            WHERE NRP='$nrpasli';";
////           
//                //$perintahubah="select * from tbl_penghuni;";                 
//				$sqlubah=mysql_query($perintahubah,$conn);
//					if (!$sqlubah) 
//					die ("Proses UPDATE penghuni gagal");				
//				
//				$perintah = " UPDATE tbl_sip SET 
//							NRP='$nrp',
//							NRP_TTD='$nrppejabat',
//                            TGL_BERLAKU='$tgl_berlaku',
//                            TGL_EXPIRED='$tgl_expired'
//                        	WHERE NRP='$nrpasli' AND ID_RUMAH='$id_rumah';";
//                   
//				$sql=mysql_query($perintah,$conn);
//					if (!$sql) 
//					die ("Proses UPDATE sip gagal");				
//	
//    	}else{
//			echo "NRP Sudah Terdaftar a.n. ". $namayangpunyanrp;
//            $flag=0;
//           } 
			
?>

<p class="judul">SIP
RUMAH NEGARA<strong><br /></strong><span lang="id">================</span></p>
<table style="width: 53%; color: #003300;" align="center">
	<tr>
		<td style="width: 201px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Kode Rumah</td>
		<td style="width: 15px;" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:green" class="standardteks">&nbsp;</td>
		<td style="width: 593px; color:#003300;" class="standardteks" colspan="3"><?php echo $id_rumah;?></td>
	</tr>`

	<tr>
		<td style="width: 201px; height: 21px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Alamat</td>
		<td style="width: 15px; height: 21px; color:#003300" class="standardteks"  align="right">:</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 15px; color:green">
&nbsp;</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 593px;color:#003300;" colspan="3">
<label id="Label2"><?echo $alamat;?></label>
		  </td>
	</tr>
	<tr>
		<td style="width: 201px; height: 21px; color:white;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Komplek</td>
		<td style="height: 26px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 26px; width: 15px; color:green;" class="standardteks">
		&nbsp;</td>
		<td style="height: 26px; width: 593px; color#003300;" class="standardteks" colspan="3"><?php echo $komplek;?></td>
	</tr>
	<tr>
		<td style="width: 201px; height: 9px;"></td>
		<td style="width: 15px; height: 9px;" class="style4"></td>
		<td class="style16" style="width: 15px; height: 9px;">&nbsp;</td>
		<td class="style16" style="width: 593px; height: 9px;" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 201px" >&nbsp;</td>
		<td style="width: 15px" >&nbsp;</td>
		<td class="standardteks" style="width: 15px; color:blue">&nbsp;</td>
		<td class="standardteks" style="width: 593px;color:blue" colspan="3">INFORMASI SIP</td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">
		&nbsp;&nbsp; Nomor S I P &nbsp;</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td class="standardteks" style="width: 15px; color:#003300">&nbsp;</td>
		<td class="standardteks" style="width: 599px; color:#003300;"><?php echo $nosipasli;?></td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Nama Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td class="standardteks" style="width: 15px; color:#003300">&nbsp;</td>
		<td class="standardteks" style="width: 599px; color:#003300;"><?php echo $nama_penghuni;?></td>
		<?php if ($status>3)
			{
				?>
				<td class="standardteks" style="width: 200px; color:white; background-color: #009900;" align="center"> Nama Anggota </td>
				<td class="standardteks" style="width: 200px; color:#003300; ">: &nbsp;&nbsp;<?php echo $nama_anggota;?>&nbsp;</td>
				<?php 
			}?>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Status</td>
		<td style="width: 15px" align="right" class="standardteks">:</td>
		<td class="standardteks" style="color:#003300; width: 15px;">
		&nbsp;</td>
		<td class="standardteks" style="color:#003300" colspan="3">
		<?php 
			$prnth="SELECT * FROM TBL_STATUS WHERE KODE_STATUS=$status";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			
			$hasil_status = mysql_fetch_array($sql);
			
			echo $hasil_status['STATUS'];
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 201px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green"> &nbsp;&nbsp;&nbsp;Pangkat, 
		Korps</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px; color:#003300;" class="standardteks">
		&nbsp;</td>
		<td style="height: 23px; width: 593px; color:#003300;" class="standardteks" colspan="3">
		<?php 
			if ($kode_kat<>""){
			     $prnth="SELECT * FROM TBL_PANGKAT where Kode_kat=$kode_kat";
			     $sql=mysql_query($prnth,$conn);
				    if (! $sql) 
				    die ("Perintah gagal");
    			$hasil_kat = mysql_fetch_array($sql); 
    			echo $hasil_kat['Pangkat']." "; 
			}else{
			 echo " ";
			}
            if ($kode_korps<>""){
                $prnth="SELECT * FROM TBL_KORPS where KODE_KORPS=$kode_korps";
    			$sql=mysql_query($prnth,$conn);
    				if (! $sql) 
    				die ("Perintah gagal");
    			$tanda=0;
    			$hasil_korps = mysql_fetch_array($sql);
    			echo $hasil_korps['KORPS'];    
            }else{
                echo " ";
            }
			?>
</td>
	</tr>
	<tr>
		<td style="width: 201px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;NRP / NIP</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px;" class="standardteks" >
		&nbsp;</td>
		<td style="height: 23px; width: 593px;" class="standardteks" colspan="3" >
		<?php	
		  echo $_POST['NRP_tampil'];
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Satker</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px" class="standardteks">&nbsp;</td>
		<td style="width: 593px" class="standardteks" colspan="3"><?php 
        if ($satker==""){
            ?><font color="red">Satker tidak terecord</font>
        <?php
        }else{
        echo $satker;    
        }
        ?></td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Tanggal Berlaku</td>
		<td style="width: 15px" align="right" class="standardteks"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 15px">&nbsp;</td>
		<td class="standardteks" style="width: 593px" colspan="3"><?php 
		$bulanangka=substr($tgl_berlaku,2,2);
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
			default	   : $bulan = "Gak Jelas bulannya";
			}
		$tanggal=substr($tgl_berlaku,0,2);
		$tahun="20".substr($tgl_berlaku,4,2);
		echo $tanggal." ".$bulan." ".$tahun;?></td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Tanggal 
		Expired</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3"><?php 
		$bulanangka=substr($tgl_expired,2,2);
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
			default	   : $bulan = "Gak Jelas bulannya";
			}
		$tanggal=substr($tgl_expired,0,2);
		$tahun="20".substr($tgl_expired,4,2);
		echo $tanggal." ".$bulan." ".$tahun;?></td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Foto Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3" ><font color="red">Tidak Ada Foto</font></td>
	</tr>
	<tr>
		<td style="width: 201px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Pejabat 
		Ttd</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3" >
		<?php 
			
			if($nrppejabat<>""){
				echo $_POST['kode_katpejabat']." ".$_POST['kode_korpspejabat']. " ";
				$perintah = " SELECT * FROM tbl_pejabat WHERE NRP_TTD='$nrppejabat';";
	     	       $sql=mysql_query($perintah,$conn);
	 			   $hasilpejabat=mysql_fetch_array($sql);
				   echo $hasilpejabat['NAMA_TTD']." NRP ".$_POST['nrp_pejabat'];
			}else{?>
			<font color="red">Belum Terdata</font>
				
			<?php
				
			}
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 201px" class="standardteks" >&nbsp;</td>
		<td style="width: 15px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 15px">&nbsp;</td>
		<td class="style16" style="width: 593px" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	</table>

		<table style="width: 53%; height: 40px;" align="center">
			<tr>
				<td style="width: 97px" align="center">&nbsp;</td>
				<td style="width: 178px;color:blue;" align="center"><a href="Javascript:buka('<?php echo 'sip_cetak1.php?id_rumah='.$id_rumah.'&&nrp='.$nrp;?>')" style="color:blue">Cetak Hal. Depan</a></td>
				<td align="center" style="width: 196px;"><a href="javascript:buka('<?php echo 'sip_cetak2.php?id_rumah='.$id_rumah?>')" style="color:blue">Cetak Hal. Belakang</a></td>
				<td align="center">&nbsp;</td>
			</tr>
</table>

		</body>

</html>