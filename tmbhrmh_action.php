<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Penambahan Data Rumah Negara </title>
	<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
</head>

<body>
<?php 
	include("menuatas.php");
	include("sambungan.php");
    $koderumah=$_POST['kode_rumah'];
?>
	<p class="judul">DATA RUMAH NEGARA TNI AL<br />
		WILAYAH SURABAYA<br />
		-----------------------------------
	</p>

<form name="tambahform" method="POST">
    <input type="text" value="<?php echo $koderumah;?>" name="koderumah" />
</form>
        

<?php 


			$perintah="SELECT NO from tbl_rumah;";
			$sql=mysql_query($perintah);
			$x=0;
			while ($hasil = mysql_fetch_array($sql)){
				$hasil_nomor[$x]=$hasil['NO'];
				$x=$x+1;
			}

			echo "nomor terbesar : ".$nomor_terbesar=max($hasil_nomor);

            $nomor=$nomor_terbesar+1;
            
		/*echo $_POST['pilihankomplek'];
		echo $_POST['kode_rumah'];
		echo $_POST['alamat'];
		echo $_POST['golongan'];
		echo $_POST['tahun_buat'];
		echo $_POST['asal_perolehan'];
		echo $_POST['luas_bangunan'];
		echo $_POST['luas_tanah'];
		echo $_POST['kondisi_bangunan'];
		echo $_POST['sewa'];
		echo $_POST['fasdin'];
		echo $_POST['denah'];
		echo $_POST['foto_rumah'];
		echo $_POST['tgl_foto_rumah'];*/
		
		$prnth = "INSERT INTO tbl_rumah(NO,ID_RUMAH,ALAMAT,ID_KOMPLEK,GOL,THN_BUAT, ASAL, L_RMH, L_TNH, KNDS_BANG, SEWA, FASDIN, DENAH, FOTO_RMH, TGL_FOTO) VALUES
				($nomor, '$_POST[kode_rumah]', '$_POST[alamat]', '$_POST[pilihankomplek]', '$_POST[golongan]', '$_POST[tahun_buat]', 
				'$_POST[asal_perolehan]', '$_POST[luas_bangunan]', '$_POST[luas_tanah]','$_POST[kondisi_bangunan]', 
				'$_POST[sewa]', '$_POST[fasdin]', '$_POST[denah]', '$_POST[foto_rumah]', '$_POST[tgl_foto_rumah]')";
		
		$sql=mysql_query($prnth,$conn);
		if (! $sql) 
			die ("Perintah Tabel Rumah gagal");
		
        $prnth_tbl_sip="INSERT INTO tbl_sip(ID_RUMAH,LAST_UPDATE) VALUES('$_POST[kode_rumah]','baru');";
        $sql_sip=mysql_query($prnth_tbl_sip,$conn);
        if (!$sql_sip) 
			die ("Perintah Tabel SIP gagal");
            
        $prnth_tbl_penghuni="INSERT INTO tbl_penghuni(NRP) VALUES('000000');";
        $sql_penghuni=mysql_query($prnth_tbl_penghuni,$conn);
        if (!$sql_penghuni) 
			die ("Perintah Tabel penghuni gagal");
            
?>

        <script language="javascript" type="text/javascript">
            var idrmh=document.tambahform.koderumah.value
            alert ("data rumah telah tersimpan ")
            location.href="sip_update.php?id_rumah="+idrmh
        </script>
</body>

</html>