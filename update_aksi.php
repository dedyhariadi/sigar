<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>

	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Penambahan Data Rumah Negara </title>
	<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
</head>

<body>
<?php 
	include("menukanan.htm");
	include("sambungan.php");
?>
	<p class="judul">PROSES UPDATING<br />
		----------------------
	</p>


<?php 
		/*tbl_sip
		echo $_POST['id_rumah']."<br>";
		echo $_POST['no_sip']."<br>";
		echo $_POST['tgl_sip']."<br>";
		echo $_POST['tgl_berlaku']."<br>";
		echo $_POST['tgl_expired']."<br>";
		echo $_POST['tgl_cetak']."<br>";
		echo $_POST['nrp_pejabat']."<br>";*/
		
		$id_rumah=$_POST['id_rumah'];
		$no_sip= $_POST['no_sip'];
		$tgl_sip= $_POST['tgl_sip'];
		$nosip=$no_sip."/".$tgl_sip;
		$tgl_berlaku= $_POST['tgl_berlaku'];
		$tgl_expired= $_POST['tgl_expired'];
		$tgl_cetak= $_POST['tgl_cetak'];
		$nrp_ttd = $_POST['nrp_pejabat'];
		
		$nrplama 		= $_POST['nrplama'];
		$nrpbaru 		= $_POST['nrpbaru'];
		
		$perintah_sip= "UPDATE tbl_sip
						SET NRP='$nrpbaru', 
						NO_SIP='$nosip',
						NRP_TTD='$nrp_ttd',
						TGL_BERLAKU='$tgl_berlaku',
						TGL_EXPIRED='$tgl_expired',
						TGL_CETAK='$tgl_cetak'
						WHERE NRP='$nrplama' AND ID_RUMAH='$id_rumah';";
						
		$sql_sip=mysql_query($perintah_sip,$conn);
			if(!$sql_sip)
				die ('perintah update sip gagal');
		
		/*tbl_penghuni
		echo $_POST['nama_penghuni']."<br>";		
		echo $_POST['nama_anggota']."<br>";
		echo $_POST['status']."<br>";
		echo $_POST['kode_kat']."<br>";
		echo $_POST['kode_korps']."<br>";
		
		echo $_POST['satker']."<br>";
		echo $_POST['tmpt_lahir']."<br>";
		echo $_POST['tgl_lahir']."<br>";
		echo $_POST['foto_penghuni']."<br>";
		echo $_POST['nrplama']."<br>";
		echo $_POST['nrpbaru']."<br>";*/
		
		
		$namapenghuni 	= $_POST['nama_penghuni'];		
		$namaanggota 	= $_POST['nama_anggota'];
		$kodestatus 	= $_POST['status'];
		$kode_kat 		= $_POST['kode_kat'];
		$kode_korps 	= $_POST['kode_korps'];
		
		$satker 		= $_POST['satker'];
		$tmpt_lahir 	= $_POST['tmpt_lahir'];
		$tgl_lahir 		= $_POST['tgl_lahir'];
		$telepon 		= $_POST['telepon'];
		$foto_penghuni 	= $_POST['foto_penghuni'];
		

		$perintah_penghuni= "UPDATE tbl_penghuni 
						SET NAMA_PENGHUNI='$namapenghuni', 
						NAMA_ANGGOTA='$namaanggota',
						KODE_STATUS='$kodestatus',
						KODE_KAT='$kode_kat',
						KODE_KORPS='$kode_korps',
						NRP='$nrpbaru',
						SATKER='$satker',
						TMPT_LAHIR='$tmpt_lahir',
						TGL_LAHIR='$tgl_lahir',
						TELEPON='$telepon'
						WHERE NRP='$nrplama';";
						
		$sql_penghuni=mysql_query($perintah_penghuni,$conn);
			if(!$sql_penghuni)
				die ('perintah update penghuni gagal');
	
	
		/*tbl_rumah
		echo $_POST['tahunbuat']."<br>";
		echo $_POST['asal']."<br>";
		echo $_POST['l_rumah']."<br>";
		echo $_POST['l_tanah']."<br>";
		echo $_POST['kondisi_bangunan']."<br>";
		echo $_POST['sewa']."<br>";
		echo $_POST['fasdin']."<br>";
		echo $_POST['denah']."<br>";
		echo $_POST['foto_rumah']."<br>";*/
		
		
		$alamat= $_POST['alamat'];
		$thn_buat= $_POST['tahunbuat'];
		$golongan= $_POST['golongan'];
		$asal= $_POST['asal'];
		$l_rmh= $_POST['l_rumah'];
		$l_tanah= $_POST['l_tanah'];
		$knds_bang= $_POST['kondisi_bangunan'];
		$sewa= $_POST['sewa'];
		$fasdin= $_POST['fasdin'];
		$denah= $_POST['denah'];
		$foto_rumah =$_POST['foto_rumah'];
		
		$perintah_rumah= "UPDATE tbl_rumah 
						SET ALAMAT='$alamat', 
						THN_BUAT='$thn_buat',
						ASAL='$asal',
						L_RMH='$l_rmh',
						L_TNH='$l_tanah',
						KNDS_BANG='$knds_bang',
						SEWA='$sewa',
						FASDIN='$fasdin'
						WHERE ID_RUMAH='$id_rumah';";
						
		$sql_rumah=mysql_query($perintah_rumah,$conn);
			if(!$sql_rumah)
				die ('perintah update rumah gagal');
		
			
		
?>

</body>

</html>