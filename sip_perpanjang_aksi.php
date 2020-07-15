<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>

<script language="javascript">
	function buka(url)
		{
			window.open(url,"Sigar","navigator=no, directories=no,toolbar=no,menubar=yes,fullscreen=yes");
		}
		
</script>

</head>

<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");

	$id_rumah = $_POST['id_rumah'];
	$alamat = $_POST['alamat'];
	$komplek = $_POST['komplek'];	
	$nama_penghuni = $_POST['nama_penghuni'];	
	$nama_anggota = $_POST['anggota'];	
	$status = $_POST['status'];	
	$kode_kat = $_POST['kode_kat'];	
	$kode_korps = $_POST['kode_korps'];	
	$nrp = $_POST['NRP'];	
	$satker = $_POST['satker'];	
	$tgl_berlaku= $_POST['tgl_berlaku'];
	$tgl_expired= $_POST['tgl_expired'];
	//$fotopenghuni= $_POST['foto_penghuni_name'];	
		
	$perintah="SELECT * FROM tbl_penghuni WHERE NRP='$nrp';";
	$sql=mysql_query($perintah,$conn);
		if (! $sql) 
			die ("Proses mencari NRP gagal");
	$flag=0;
	
//	while ($penghuni = mysql_fetch_array($sql)) 
//		{
//			$flag=1;	
//		}
//	
//	if ($flag==1){
//			echo "penghuni sudah terdaftar";
//			$flag=0;
//				$perintah = " UPDATE tbl_penghuni SET 
//							NAMA_PENGHUNI='$nama_penghuni', 
//							NAMA_ANGGOTA='$nama_anggota',
//							KODE_KAT=$kode_kat,
//							KODE_KORPS=$kode_korps,
//							SATKER='$satker',
//							KODE_STATUS=$status
//							WHERE NRP='$nrp';";
//				$sql=mysql_query($perintah,$conn);
//					if (!$sql) 
//					die ("Proses UPDATE gagal");				
//				$flag=0;
//		}else{
//			echo "penghuni tidak terdaftar";
//			$perintah = " INSERT INTO tbl_penghuni 
//							(NAMA_PENGHUNI, NAMA_ANGGOTA, KODE_KAT, KODE_KORPS, SATKER, KODE_STATUS, NRP)
//							VALUES
//							('$nama_penghuni', '$nama_anggota', $kode_kat, $kode_korps, '$satker', $status,	'$nrp'); ";
//							  
//				$sql=mysql_query($perintah,$conn);
//					if (! $sql) 
//					die ("Proses Entry Anggota gagal") ;
//		}
//
//			$perintah = " INSERT INTO tbl_sip
//							(NRP, ID_RUMAH, TGL_BERLAKU, TGL_EXPIRED)
//							VALUES
//							('$nrp', '$id_rumah', $tgl_berlaku, $kode_korps, '$satker', $status,	'$nrp'); ";
//							  
//				$sql=mysql_query($perintah,$conn);
//					if (! $sql) 
//					die ("Proses Entry Anggota gagal") ;
//
//					
////	echo $id_rumah."  ".$alamat." ".$komplek;
//	
///*	$prnth="SELECT A.*,B.*,C.*,D.*,E.*,F.*,G.*
// 		 FROM TBL_SIP A,TBL_RUMAH B,TBL_PENGHUNI C, TBL_STATUS D, TBL_PANGKAT E, TBL_KORPS F,TBL_KOMPLEK G
// 		 WHERE A.ID_RUMAH=B.ID_RUMAH
// 		 AND G.ID_KOMPLEK=B.ID_KOMPLEK
//		 AND A.NRP=C.NRP
//		 AND D.KODE_STATUS=C.KODE_STATUS
//		 AND E.KODE_KAT=C.KODE_KAT
//		 AND F.KODE_KORPS=C.KODE_KORPS
//		 AND A.ID_RUMAH = '$id_rumah';";
//
//	$sql=mysql_query($prnth,$conn);
//		if (! $sql) 
//			die ("Perintah gagal");
//			
//	$hasil=mysql_fetch_array($sql);*/
?>

<p class="judul">SIP
RUMAH NEGARA<strong><br /></strong><span lang="id">================</span></p>
<table style="width: 53%; color: #003300;" align="center">
	<tr>
		<td style="width: 457px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Kode Rumah</td>
		<td style="width: 15px;" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:green" class="standardteks">&nbsp;</td>
		<td style="width: 593px; color:#003300;" class="standardteks" colspan="3"><?php echo $id_rumah;?></td>
	</tr>`

	<tr>
		<td style="width: 457px; height: 21px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Alamat</td>
		<td style="width: 15px; height: 21px; color:#003300" class="standardteks"  align="right">:</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 15px; color:green">
&nbsp;</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 593px;color:#003300;" colspan="3">
<label id="Label2"><?echo $alamat;?></label>
		  </td>
	</tr>
	<tr>
		<td style="width: 457px; height: 21px; color:white;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Komplek</td>
		<td style="height: 26px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 26px; width: 15px; color:green;" class="standardteks">
		&nbsp;</td>
		<td style="height: 26px; width: 593px; color#003300;" class="standardteks" colspan="3"><?php echo $komplek;?></td>
	</tr>
	<tr>
		<td style="width: 457px; height: 9px;"></td>
		<td style="width: 15px; height: 9px;" class="style4"></td>
		<td class="style16" style="width: 15px; height: 9px;">&nbsp;</td>
		<td class="style16" style="width: 593px; height: 9px;" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 457px" >&nbsp;</td>
		<td style="width: 15px" >&nbsp;</td>
		<td class="standardteks" style="width: 15px; color:blue">&nbsp;</td>
		<td class="standardteks" style="width: 593px;color:blue" colspan="3">INFORMASI SIP</td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Nama Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td class="standardteks" style="width: 15px; color:#003300">&nbsp;</td>
		<td class="standardteks" style="width: 599px; color:#003300;"><?php echo $nama_penghuni;?></td>
		<?php if ($status>3)
			{
				?>
				<td class="standardteks" style="width: 380px; color:white; background-color: #009900;" align="center"> Nama Anggota </td>
				<td class="standardteks" style="width: 593px; color:#003300; ">: &nbsp;&nbsp;<?php echo $nama_anggota;?>&nbsp;</td>
				<?php 
			}else{
				?>
				<td class="standardteks" style="width: 284px; color:white;"> </td>
				<td class="standardteks" style="width: 593px; color:#003300; "> &nbsp;&nbsp;&nbsp;</td>
				<?php
			}?>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Status</td>
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
		<td style="width: 457px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green"> &nbsp;&nbsp;&nbsp;Pangkat, 
		Korps</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px; color:#003300;" class="standardteks">
		&nbsp;</td>
		<td style="height: 23px; width: 593px; color:#003300;" class="standardteks" colspan="3">
		<?php 
			$prnth_pangkat="SELECT * FROM TBL_PANGKAT where Kode_kat=$kode_kat";
			$sql_pangkat=mysql_query($prnth_pangkat,$conn);
				if (! $sql_pangkat) 
				die ("Perintah pangkat gagal");
			$hasil_kat = mysql_fetch_array($sql_pangkat); 
			//echo $hasil_kat['Pangkat']." ";
	
			$prnth_korps="SELECT * FROM TBL_KORPS where KODE_KORPS=$kode_korps";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah korps gagal");
			$tanda=0;
			$hasil_korps = mysql_fetch_array($sql);
			//echo $hasil_korps['KORPS'];
		?>
</td>
	</tr>
	<tr>
		<td style="width: 457px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;NRP / NIP</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px;" class="standardteks" >
		&nbsp;</td>
		<td style="height: 23px; width: 593px;" class="standardteks" colspan="3" >
		<?php	
		
		$hrfdepan=substr($nrp,0,2);
		
		if($hrfdepan=="NA") 
			{
				echo " ";	
			}else{
				echo $nrp;	
			} 
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Satker</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px" class="standardteks">&nbsp;</td>
		<td style="width: 593px" class="standardteks" colspan="3"><?php echo $satker;?></td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Tanggal Berlaku</td>
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
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Foto Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:red;" class="standardteks" colspan="3"><?php 
		$filename=$_FILES['foto_penghuni']['name'];
	$filesize=$_FILES['foto_penghuni']['size'];
	$fileerror=$_FILES['foto_penghuni']['error'];
	if($filesize>0 || $fileerror==0){
		$move=move_uploaded_file($_FILES['foto_penghuni']['tmp_name'],'C:/xampp/htdocs/Sigar/denah/'.$filename);
		if($move){
			//echo "Foto terupload sukses";
			$perintah="INSERT INTO tbl_image VALUES ('$nrp','$filename','denah/$filename')";
			$hasil_gambar=mysql_query($perintah);
			$perintah="SELECT location FROM tbl_image WHERE nrp='$nrp'";
			$hasil_tmplgambar=mysql_query($perintah);
			while ($data_gambar=mysql_fetch_array($hasil_tmplgambar))
			{
				
				$loc=$data_gambar['location'];
				echo $loc;
				//sleep(1);
				//$namabaru=rename($filename,'fotopenghuni/dedy.jpg');
				//echo "Nama file baru :".$namabaru;
							
				?>
				
				<br />
				<img src="<?php echo $loc;?>" width="200px" height="200px"/>&nbsp;
				<?php
			}
		}else {?>
			Tidak Ada Foto
			<?php
		}
	}else{?>
		Tidak Ada Foto
			<?php
		}
		?></td>
	</tr>
	<tr>
		<td style="width: 457px" class="standardteks" >&nbsp;</td>
		<td style="width: 15px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 15px">&nbsp;</td>
		<td class="style16" style="width: 593px" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	</table>

		<table style="width: 53%; height: 40px;" align="center">
			<tr>
				<td style="width: 97px" align="center">&nbsp;</td>
				<td style="width: 178px;color:blue;" align="center"><a href="Javascript:buka('<?php echo 'sip_cetak1.php?id_rumah='.$id_rumah.'&nrp='.$nrp?>')" style="color:blue">Cetak Hal. Depan</a></td>
				<td align="center" style="width: 196px;"><a href="javascript:buka('<?php echo 'sip_cetak2.php?id_rumah='.$id_rumah?>')" style="color:blue">Cetak Hal. Belakang</a></td>
				<td align="center">&nbsp;</td>
			</tr>
</table>

		</body>

</html>
