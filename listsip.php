<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>

</head>

<body>
<?php 
	include("menukanan.htm");
	include("sambungan.php");
	$komplek = $_POST['pilihankomplek'];

?>
<p class="judul">Surat Izin Penempatan <br />Rumah Negara<br />
=================
</p>
<?php 

/*	$prnth="select tbl_sip.id_rumah, tbl_sip.nrp, tbl_sip.no_sip, tbl_penghuni.nama_penghuni, tbl_pangkat.pangkat, tbl_korps.korps, tbl_status.status, tbl_penghuni.satker, tbl_penghun 
			from tbl_sip, TBL_RUMAH, tbl_penghuni, tbl_status, tbl_pangkat, tbl_korps 
	    	where tbl_sip.nrp=tbl_penghuni.nrp
	    	and tbl_penghuni.kode_status=tbl_status.kode_status
	    	and tbl_penghuni.kode_kat=tbl_pangkat.kode_kat
	    	and tbl_penghuni.kode_korps=tbl_korps.kode_korps
	    	and TBL_SIP.ID_RUMAH=TBL_RUMAH.ID_RUMAH 
	    	and id_rumah like '$komplek';"; */
	    	
	    	
 $prnth="SELECT A.*,B.*,C.*,D.*,E.*,F.*,G.*
 		 FROM TBL_SIP A,TBL_RUMAH B,TBL_PENGHUNI C, TBL_STATUS D, TBL_PANGKAT E, TBL_KORPS F,TBL_KOMPLEK G
 		 WHERE A.ID_RUMAH=B.ID_RUMAH
 		 AND G.ID_KOMPLEK=B.ID_KOMPLEK
		 AND A.NRP=C.NRP
		 AND D.KODE_STATUS=C.KODE_STATUS
		 AND E.KODE_KAT=C.KODE_KAT
		 AND F.KODE_KORPS=C.KODE_KORPS
		 AND G.ID_KOMPLEK = '$komplek';";

	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
			die ("Perintah gagal");
?>

<table style="width: 100%" border="1">
	<tr>
		<td style="width: 43px">NO&nbsp;</td>
		<td style="width: 87px">KODERMH</td>
		<td style="width: 118px">NAMA</td>
		<td style="width: 158px">PANGKAT, KORPS</td>
		<td>NRP / NIP</td>
		<td>STATUS</td>
		<td>SATKER</td>
		<td>NOSIP</td>
		<td>ALAMAT</td>
		<td>STATUS SIP</td>
		<td>ACTION</td>
	</tr>
		<?php 
			$x=1;
			while ($hasil = mysql_fetch_array($sql)) 
				{ 
		?>
	<tr>
		<td><?php echo $x;?></td>
		<td><?php	echo $hasil['ID_RUMAH'];	?></td>
		<td ><?php	echo $hasil['NAMA_PENGHUNI'];	?></td>
		<td ><?php
		$panjangkorps=4;	
		$pnjngkorps=strlen($hasil['KORPS']);
		if ($pnjngkorps<3) {
			echo $hasil['Pangkat']. " Laut (" .$hasil['KORPS'] . ")" ;		
		}else{
			echo $hasil['Pangkat']. " ".$hasil['KORPS'];
		}	?></td>
		<td ><?php	
		
		$hrfdepan=substr($hasil['NRP'],0,2);
		
		if($hrfdepan=="NA") {
		echo " ";	
		}else{
		echo $hasil['NRP'];	
		} ?></td>
		<td><?php echo $hasil['STATUS'];	?></td>
		<td><?php echo $hasil['SATKER'];	?></td>
		<td><?php echo $hasil['NO_SIP'];	?></td>
		<td><?php echo $hasil['ALAMAT'];	?></td>
		<td></td>
		<td>&nbsp;</td>
	</tr>
	<?php $x=$x+1;} ?>
</table>

</body>

</html>
