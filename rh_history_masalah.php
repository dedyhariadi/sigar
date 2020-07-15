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
			window.open(url,"Sigar","navigator=no, directories=no,toolbar=no,menubar=yes,width=500,height=400");
		}
	function bukasama(url)
		{
			location.href=url;
		}
		
</script>

</head>

<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");
	$id_rumah=$_GET['id_rumah'];	
	
	$perintah_sip="SELECT * FROM tbl_sip WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
	$sql_sip=mysql_query($perintah_sip,$conn);
		if (! $sql_sip) 
			die ("Proses mencari sip gagal");
	$hasil_sip = mysql_fetch_array($sql_sip);
			
?>

<table style="width: 80%; color: #003300; margin-bottom: 0px;" align="center" border="0">
	<tr>
		<td style="color:#F8F0FF; text-align: center;font-size:x-large" class="standardteks" bgcolor="#27004F" colspan="3" rowspan="2" >
		DETAIL&nbsp; RUMAH&nbsp; NEGARA&nbsp;&nbsp;&nbsp; </td>
		<td style="width: 7%; color:#003300;" class="standardteks">&nbsp;</td>
		<td style="width: 10%; color:black" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp; Kode Rumah</td>
		<td style="width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="width: 21%; color:#003300;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php echo strtoupper($id_rumah);?></td>
	</tr>
	  <?php 
		$perintah_rumah="SELECT * FROM tbl_rumah WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
		$sql_rumah=mysql_query($perintah_rumah,$conn);
		if (! $sql_rumah) 
			die ("Proses mencari rumah gagal");
		$hasil_rumah = mysql_fetch_array($sql_rumah);
	
	  ?>
	<tr>
		<td style="height: 22px; width: 7%; color#003300;" class="standardteks">
			</td>
		<td style="width: 10%; height: 22px; color:black;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp; Komplek</td>
		<td style="height: 22px; width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="height: 22px; width: 21%; color#003300;" class="standardteks" bgcolor="#EAD5FF">&nbsp;
			<?php 
				$id_komplek=$hasil_rumah['ID_KOMPLEK'];
				$perintah_komplek="SELECT * FROM TBL_KOMPLEK WHERE ID_KOMPLEK='$id_komplek' LIMIT 1;";
				$sql_komplek=mysql_query($perintah_komplek,$conn);
					if (! $sql_komplek) 
						die ("Proses mencari komplek gagal");
				$hasil_komplek = mysql_fetch_array($sql_komplek);
				echo $hasil_komplek['KOMPLEK'];
			?>
		
		</td>
	</tr>
	<tr>
		<td style="width: 10%; height: 11px;" ></td>
		<td style="width: 1%; height: 11px;" ></td>
		<td class="standardteks" style="width: 21%; color:blue; height: 11px;">
		</td>
		<td class="standardteks" style="width: 7%; color:blue; height: 11px;">
		</td>
		<td class="standardteks" style="width: 11%; color:blue; height: 11px;">
		</td>
		<td style="width: 1%; height: 11px;" ></td>
		<td class="standardteks" style="width: 16%; color:blue; height: 11px;">
		</td>
	</tr>
	<tr>
		<td colspan="3" class="standardteks" align="center" bgcolor="#EAD5FF" style="height: 21px" >DATA PENGHUNI</td>
		<td class="standardteks" style="width: 7%; color:blue; height: 21px;">
		</td>
		<td class="standardteks" colspan="3" bgcolor="#EAD5FF" align="center" style="height: 21px">
		DATA RUMAH</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Nama Penghuni</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="color:#003300; width: 21%;" bgcolor="#EAD5FF">&nbsp;
		<?php 
			$nrp=$hasil_sip['NRP'];
				$perintah_penghuni="SELECT * FROM TBL_PENGHUNI WHERE NRP='$nrp' LIMIT 1;";
				$sql_penghuni=mysql_query($perintah_penghuni,$conn);
					if (! $sql_penghuni) 
						die ("Proses mencari penghuni gagal");
			$hasil_penghuni = mysql_fetch_array($sql_penghuni);
			echo $hasil_penghuni['NAMA_PENGHUNI'];
			$status=$hasil_penghuni['KODE_STATUS'];
		?>
		</td>
		<?php if ($status>3)
			{
				?>
				<?php 
			}else{
				?>
				<?php
			}?>
		<td class="standardteks" style="color:#003300; width: 7%;">
		&nbsp;</td>
		<td style="width: 11%; height: 21px; color:black" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp; Alamat</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="color:#003300; width: 16%;" bgcolor="#EAD5FF">&nbsp;
	  
		<?php echo $hasil_rumah['ALAMAT'];
	  ?>
		  </td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Status</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="color:#003300; width: 21%;" bgcolor="#EAD5FF">&nbsp;
		<?php 
			$prnth="SELECT * FROM TBL_STATUS WHERE KODE_STATUS=$status";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			
			$hasil_status = mysql_fetch_array($sql);
			
			echo $hasil_status['STATUS'];
		?>
		</td>
		<td class="standardteks" style="color:#003300; width: 7%;">
		&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Golongan</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php 
		echo $hasil_rumah['GOL'];
		?></td>
	</tr>
	<tr>
		<td style="width: 10%; height: 23px;color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF"> &nbsp;&nbsp;&nbsp;Pangkat, 
		Korps</td>
		<td style="height: 23px; width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="height: 23px; width: 21%; color:#003300;" class="standardteks" bgcolor="#EAD5FF">&nbsp;
		<?php 
		
			$kode_kat=$hasil_penghuni['KODE_KAT'];	
			$prnth_kat="SELECT * FROM TBL_PANGKAT where Kode_kat='	$kode_kat'";
			$sql_kat=mysql_query($prnth_kat,$conn);
				if (! $sql_kat) 
				die ("Perintah Pangkat gagal");
			$hasil_kat = mysql_fetch_array($sql_kat); 
			echo $hasil_kat['Pangkat']." ";
	
			$kode_korps=$hasil_penghuni['KODE_KORPS'];
			$prnth="SELECT * FROM TBL_KORPS where KODE_KORPS='$kode_korps';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$tanda=0;
			$hasil_korps = mysql_fetch_array($sql);
			echo $hasil_korps['KORPS'];
		?>
</td>
		<td style="height: 23px; width: 7%; color:#003300;" class="standardteks">
		&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Tahun Pembuatan</td>
		<td style="height: 23px; width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php 
			echo $hasil_rumah['THN_BUAT'];
		?></td>
	</tr>
	<tr>
		<td style="width: 10%; height: 23px;color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;NRP / NIP</td>
		<td style="height: 23px; width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="height: 23px; width: 21%;" class="standardteks" bgcolor="#EAD5FF">&nbsp;
		<?php	
		$hrfdepan=substr($nrp,0,2);
		if($hrfdepan<>"NA"){
			 echo $nrp;
		}
		?>
		</td>
		<td style="height: 23px; width: 7%;" class="standardteks" >
		&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Asal Perolehan</td>
		<td style="height: 23px; width: 1%;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php 
		echo $hasil_rumah['ASAL'];
		?></td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Satker</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="width: 21%" class="standardteks" bgcolor="#EAD5FF">&nbsp;<?php echo $hasil_penghuni['SATKER'];?></td>
		<td style="width: 7%" class="standardteks">&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;L. Bang. / Luas Tanah</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php 
		echo $hasil_rumah['L_RMH']. " M"; ?><sup>2</sup><?php echo "  /  ".$hasil_rumah['L_TNH']." M";?><sup>2</sup>
		</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Tempat, 
		Tgl Lahir</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="width: 21%" class="standardteks" bgcolor="#EAD5FF"><?php 
		if ($hasil_penghuni['TMPT_LAHIR']<>""){
			echo $hasil_penghuni['TMPT_LAHIR'].", ".$hasil_penghuni['TGL_LAHIR'];
		}
		?></td>
		<td style="width: 7%" class="standardteks">&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Kondisi Bangunan </td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php
            switch($hasil_rumah['KNDS_BANG']){
                case "RR"   :
                    echo "Rusak Ringan";
                    break;
                case "RB"   :
                    echo "Rusak Berat";
                    break;    
            } 
			//echo $hasil_rumah['KNDS_BANG'];
		?></td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Telepon</td>
		<td style="width: 1%; height: 21px;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="width: 21%; height: 21px;" class="standardteks" bgcolor="#EAD5FF"><?php echo $hasil_penghuni['TELEPON'];?></td>
		<td style="width: 7%; height: 21px;" class="standardteks"></td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Sewa</td>
		<td style="width: 1%; height: 21px;" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%; height: 21px;" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php 
		switch($hasil_rumah['SEWA']){
		  case $hasil_rumah['SEWA']="BLM_BAYAR"   :
                echo "Belum Bayar";
                break;
          case $hasil_rumah['SEWA']="SDH_BAYAR"   :
                echo "Sudah Bayar";
                break;     
          case $hasil_rumah['SEWA']="TDK_DKENAI"   :
                echo "Tidak Dikenai Sewa";
                break;
          default :
                echo "";
                break;   
		}
        
		?></td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Foto Penghuni</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td style="width: 21%; color:" class="standardteks" bgcolor="#EAD5FF"> &nbsp;<?php 
		
		if($hasil_penghuni['FOTO']==""){
		
			echo "<FONT COLOR=RED>Tidak Ada Foto</FONT>";
		}else {
			echo $hasil_penghuni['FOTO'];
		}
		
		?></td>
		<td style="width: 7%;" class="standardteks" >&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Fasdin</td>
		<td style="width: 1%" class="standardteks" align="center" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php echo $hasil_rumah['FASDIN'];?></td>
	</tr>
	<tr>
		<td style="width: 10%" >&nbsp;</td>
		<td style="width: 1%" >&nbsp;</td>
		<td class="standardteks" style="width: 21%; color:blue">
		&nbsp;</td>
		<td class="standardteks" style="width: 7%; color:blue">
		&nbsp;</td>
		<td style="width: 11%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">
		&nbsp;&nbsp;&nbsp;Denah</td>
		<td style="width: 1%" bgcolor="#EAD5FF" align="center" class="standardteks">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;&nbsp;<?php echo $hasil_rumah['DENAH'];?></td>
	</tr>
	<tr>
		<td style="height: 10px;" colspan="3" class="standardteks" align="center" bgcolor="#EAD5FF" >DATA SIP</td>
		<td class="standardteks" style="width: 7%; color:blue; height: 10px;">
		</td>
		<td class="standardteks" style="width: 11%; color:blue; height: 10px;">
		</td>
		<td style="width: 1%; height: 10px;" ></td>
		<td class="standardteks" style="width: 16%; color:blue; height: 10px;">
		</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;No. 
		SIP</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF">:</td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;<?php
        $no_sip=$hasil_sip['NO_SIP'];
        if(substr($no_sip,-4)=="9999"){
            ?>
            <font color="#009726">Proses Nomor SIP</font>
            <?php
            
        }else{
    		$jml=strlen($no_sip);
    		$nomorsip=substr($no_sip,0,$jml-7);
            $bulanromawi=substr($no_sip,-4,2);
    		switch ($bulanromawi) {
    			case '01' : $bulan = "I"; break;
    			case '02' : $bulan = "II"; break;
    			case '03' : $bulan = "III"; break;
    			case '04' : $bulan = "IV"; break;
    			case '05' : $bulan = "V"; break;
    			case '06' : $bulan = "VI"; break;
    			case '07' : $bulan = "VII"; break;
    			case '08' : $bulan = "VIII"; break;
    			case '09' : $bulan = "IX"; break;	
    			case '10' : $bulan = "X"; break;
    			case '11' : $bulan = "XI"; break;
    			case '12' : $bulan = "XII"; break;
    			default	   : $bulan = "";
    			}
            $tahunromawi=substr($no_sip,-2);
            echo "SIP/".$nomorsip."/".$bulan."/20".$tahunromawi;
        } 
        ?>
        
        </td>
		<td class="standardteks" style="width: 7%; color:blue">
		&nbsp;</td>
		<td class="standardteks" align="center" bgcolor="#FF3300" colspan="3" style="color:white">
		PERMASALAHAN</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Tanggal 
		SIP</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;<?php
        $tgl_sip=substr($hasil_sip['NO_SIP'],-6);
         
		//$tgl_berlaku=$hasil_sip['TGL_BERLAKU'];
		if(substr($tgl_sip,-4)=="9999"){
            echo "";
            
        }else{
        $jml=strlen($tgl_sip);
		$bulanangka=substr($tgl_sip,2,2);
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
		$tanggal=substr($tgl_sip,0,2);
		$tahun="20".substr($tgl_sip,4,2);
		echo $tanggal." ".$bulan." ".$tahun;
        }
        ?></td>
		<td class="standardteks" style="width: 7%">&nbsp;</td>
		<td style="color:black;vertical-align:top" class="standardteks" bgcolor="#FF3300" style="color:white" colspan="3" rowspan="4">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Tanggal 
		Berlaku</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;<?php 
		$tgl_berlaku=$hasil_sip['TGL_BERLAKU'];
		$jml=strlen($tgl_berlaku);
		if ($jml==5){
			$tgl_berlaku="0".$tgl_berlaku;
		}
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
		<td class="standardteks" style="width: 7%">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Tanggal 
		Expired</td>
		<td style="width: 1%" align="center" class="standardteks" bgcolor="#EAD5FF"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 21%" bgcolor="#EAD5FF">&nbsp;<?php 
		$tgl_berlaku=$hasil_sip['TGL_EXPIRED'];
		$jml=strlen($tgl_berlaku);
		if ($jml==5){
			$tgl_berlaku="0".$tgl_berlaku;
		}
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
		<td class="standardteks" style="width: 7%">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 10%; color:black;height:21px;" class="standardteks" bgcolor="#EAD5FF">&nbsp;&nbsp;&nbsp;Last Update 
		</td>
		<td style="width: 1%; height: 21px;" align="center" class="standardteks" bgcolor="#EAD5FF"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 21%; height: 21px;" bgcolor="#EAD5FF">&nbsp;<?php 
		$tgl_berlaku=$hasil_sip['LAST_UPDATE'];
		$jml=strlen($tgl_berlaku);
		if ($jml==5){
			$tgl_berlaku="0".$tgl_berlaku;
		}
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
			default	   : $bulan = " ";
			}
		$tanggal=substr($tgl_berlaku,0,2);
		$tahun="20".substr($tgl_berlaku,4,2);
		if($bulan<>" "){
		echo $tanggal." ".$bulan." ".$tahun;
		}?>
		</td>
		<td class="standardteks" style="width: 7%">&nbsp;</td>
	</tr>
	<tr>
		<td style="color:black;height:10px;" class="standardteks" colspan="7"> 
		</td>
	</tr>
	</table>

		<table style="width: 53%; height: 22px;" align="center">
			<tr>
				
				<td width="50%" align="center" class="standardteks">SIP (<a href="Javascript:buka('<?php echo 'cetakpdf2.php?id_rumah='.$id_rumah.'&&nrp='.$nrp?>')" style="color:#660066">
				Hal. Depan</a> / <a href="Javascript:buka('<?php echo 'cetakpdf.php?id_rumah='.$id_rumah.'&&nrp='.$nrp?>')" style="color:#660066">
				Hal. Belakang</a> )</td>
				<td width="50%" align="center" class="standardteks"><a href="javascript:bukasama('<?php echo 'updatermh.php?id_rumah='.$id_rumah?>')" style="color:#660066">
				E D I T</a></td>
				
				    
			</tr>
</table>

		</body>

</html>