<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="id" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
<title>RUMNEG BERMASALAH</title>
</head>

<body>
<?php 
	include("menuatas.php");
	include("sambungan.php");
    
	
?>

<p style="margin-bottom:2px;margin-top:2px;color:#003300" class="judul" >RUMNEG BERMASALAH<br />
<br /></p>
<table style="width: 100%;font-size:large; height:100px;" class="standardteks"  >
	<tr>
		<td style="width: 25%; height: 39px;"></td>
		<td width="3%" bgcolor="#F2E6FF" style="height: 39px; text-align: center;">1.</td>
		<td style="width: 37%; height: 39px;" bgcolor="#F2E6FF">&nbsp;<a href="masalah_nonaktif.php?pilihankomplek=1">Anggota Non Aktif (Purna, Wreda, Wari, Janda, Duda)</a></td>
		<td width="2%" bgcolor="#F2E6FF" style="height: 39px; text-align: center;">:</td>
		<?php 
			$perintah_jmlnonaktif="	SELECT KODE_STATUS,COUNT(*) AS JML
						FROM TBL_PENGHUNI
						WHERE KODE_STATUS<>1
						GROUP BY KODE_STATUS;";
			$sql_jmlnonaktif=mysql_query($perintah_jmlnonaktif,$conn);
			$jumlahnonaktif=0;
			while($hasil_jmlnonaktif=mysql_fetch_array($sql_jmlnonaktif))
			      {
				$jumlahnonaktif=$jumlahnonaktif+$hasil_jmlnonaktif['JML'];
			     }
			
		?>	
		<td bgcolor="#F2E6FF" style="width: 123px; height: 39px;" align="right">&nbsp;<a href="masalah_nonaktif.php?pilihankomplek=1"><?php echo $jumlahnonaktif;?> Orang&nbsp;&nbsp;&nbsp;</a></td>
		<td style="width: 234px; height: 39px;"></td>
	</tr>
	
	<!--
<tr>
		<?php
		// $prnth_tdksesuai="SELECT * FROM TBL_PENGHUNI WHERE ID_MASALAH<>'';";
// 		 $sql_tdksesuai=mysql_query($prnth_tdksesuai,$conn);
//			if (! $sql_tdksesuai) 
//			die ("Perintah tdk sesuai gagal");
//		//$hasil_tdksesuai=mysql_fetch_array($sql_tdksesuai);
//		$jmlperstdksesuai=mysql_num_rows($sql_tdksesuai);
				
		?>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">2.</td>
		<td style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 50%;">
		&nbsp;<a href="masalah_tdksesuai_list.php?">Rumneg Tidak Sesuai Peruntukannya</a></td>
		<td width="2%">:</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="masalah_tdksesuai_list.php?"><?php echo $jmlperstdksesuai;?> Orang</a></td>
	</tr>
-->
	
	<tr>
		<?php
			$tgl_today=date("d");
			$bulan_today=date("m");
			$tahun_today="20".date("y");
			//echo $tahun_today;
			
			$prnth_expired="SELECT TGL_EXPIRED FROM TBL_SIP;";
			$sql_expired=mysql_query($prnth_expired,$conn);
			if (!$sql_expired) 
			die ("Perintah expired gagal");
			$h=0;
            $jd1=gregoriantojd($bulan_today,$tgl_today,$tahun_today);
			while($hasil_expired=mysql_fetch_array($sql_expired)){
				
				$tglexpired=$hasil_expired['TGL_EXPIRED'];
					
				$thn_akhir=substr($tglexpired,-2);
				
                if(substr($thn_akhir,0,1)=="9"){
                    $thn_akhir= "19".$thn_akhir;
                }else{
                    $thn_akhir= "20".$thn_akhir;    
                }
                $bln_akhir=substr($tglexpired,2,2);
				$tgl_akhir=substr($tglexpired,0,2);
				
                $jd2=gregoriantojd($bln_akhir,$tgl_akhir,$thn_akhir);
                
                				
				$selisih=$jd2-$jd1;
			//	echo $tglexpired." selisih kedua tanggal today dgn expired : ".$selisih." hari"."<br>";
				
				if($selisih<0){
					$h=$h+1;
				}
			}
			
		//echo $h;
		$jmlpersexpired=mysql_num_rows($sql_expired);
		?>
		<td style="width: 25%; height: 33px;"></td>
		<td width="3%" bgcolor="#F2E6FF" style="height: 33px; text-align: center;">2.</td>
		<td bgcolor="#F2E6FF" style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 37%; height: 33px;">
		&nbsp;<a href="masalah_expired_list.php?pilihankomplek=1">SIP habis masa berlakunya <font color="#FF0000">(EXPIRED)</font></a></td>
		<td bgcolor="#F2E6FF" width="2%" style="height: 33px; text-align: center;">:</td>
		<td bgcolor="#F2E6FF" style="width: 123px; height: 33px;" align="right"><a href=masalah_expired_list.php?pilihankomplek=1><?php echo $h;?> Orang&nbsp;&nbsp;&nbsp;</a></td>
		
		<td style="width: 234px; height: 33px;"></td>
		
	</tr>
	<!--
	<tr>
		<td style="width: 15%">&nbsp;</td>
		<td width="3%">4.</td>
		<td style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 50%;">
		&nbsp;Rumneg yang mendapatkan <font color="red">Surat Peringatan</font></td>
		<td width="2%">:</td>
		<td>Orang</td>
	</tr>-->
	<?php 
	
		 $prnth_rmhganda="select nrp,count(*) as jml from tbl_sip group by nrp having jml > 1;";
 		 $sql_rmhganda=mysql_query($prnth_rmhganda,$conn);
			if (! $sql_rmhganda) 
			die ("Perintah rumah ganda gagal");
		//$hasil_tdksesuai=mysql_fetch_array($sql_rmhganda);
		$jmlpersrmhganda=mysql_num_rows($sql_rmhganda);
	
	
	?>
	<tr>
		<td style="width: 25%; height: 46px;"></td>
		<td width="3%" bgcolor="#F2E6FF" style="height: 46px; text-align: center;">3.</td>
		<td bgcolor="#F2E6FF" style="background-repeat: repeat; background-attachment: scroll; background-position: 0px 0px; width: 37%; height: 46px;">
		<a href="masalah_rumahganda.php">Penghuni dengan rumah lebih dari satu</a></td>
		<td bgcolor="#F2E6FF" width="2%" style="height: 46px; text-align: center;">:</td>
		<td bgcolor="#F2E6FF" style="width: 123px; height: 46px;" align="right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $jmlpersrmhganda;?>&nbsp;Orang&nbsp;&nbsp;&nbsp;</td>
		
		<td style="width: 234px; height: 46px;"></td>
		
	</tr>
		
</table>

</body>

</html>
