<?php

/**
 * @author watpers3
 * @copyright 2011
 */

include("sambungan.php");

	echo $id_rumah=$_POST['id_rumah'];
	echo "<br>";
	echo $alamat=$_POST['alamat'];
	echo "<br>";
	echo $komplek=$_POST['komplek'];
	echo "<br>";
	echo $tanggal_ovb=$_POST['tanggal_ovb'];
	echo "<br>";
	echo $bulan_ovb=$_POST['bulan_ovb'];
	echo "<br>";
	echo $tahun_ovb=$_POST['tahun_ovb'];	
	echo "<br>";
	echo $nama_penghuni_awal=$_POST['nama_penghuni_awal'];	
	echo "<br>";
	echo "kode status :".$status_awal=$_POST['status_awal'];
	echo "<br>";
    echo $kode_kat_awal=$_POST['nama_kat_awal'];
    echo "<br>";
    echo $kode_korps_awal=$_POST['kode_korps_awal'];
	echo "<br>";
    echo $nrp_awal=$_POST['NRP_tampil_awal'];
    
 	// penghuni akhir
	echo "<br>";
	echo $nama_penghuni_awal=$_POST['nama_penghuni_akhir'];	
	echo "<br>";
	echo "kode status :".$status_akhir=$_POST['status_akhir'];
	echo "<br>";
    echo $kode_kat_akhir=$_POST['nama_kat_akhir'];
    echo "<br>";
    echo $kode_korps_akhir=$_POST['kode_korps_akhir'];
	echo "<br>";
    echo $nrp_akhir=$_POST['NRP_tampil_akhir'];

    
    	
//	echo 
	
    
//	echo $nama_awal;
	
	
	//$prnth="SELECT A.*
// 		 FROM TBL_OVB A
// 		 WHERE A.ID_OVB= '$id_ovb' LIMIT 1;";
//
//	$sql=mysql_query($prnth,$conn);
//		if (!$sql) 
//			die ("Perintah gagal");
//			
//	$hasil=mysql_fetch_array($sql);


?>