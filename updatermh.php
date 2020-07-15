<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Penambahan Data Rumah Negara </title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
<script type="text/javascript" language="javascript">
	function tampilanggota(){
			document.getElementById("nama_anggota").type = "text"		
	}

	function hideanggota(x){
			if (x<4) 
			{
				document.getElementById("nama_anggota").type = "hidden"		
				document.getElementById("teksanggota").type = "hidden"
			}else {
				document.getElementById("nama_anggota").type = "text"		
				document.getElementById("teksanggota").type = "text"
			}
	}
	
	function ttd(){
		var pejabat=document.getElementById("id_pejabat")
		var pilihanpjbt=pejabat.options[pejabat.selectedIndex].value
		var k=10;
		var t=0;
		
			document.getElementById("nrp_pjbt").value = nrp_pejabat_js[pilihanpjbt]
			document.getElementById("kodekat").value = namapangkat_pejabat_js[pilihanpjbt]
			document.getElementById("kodekorps").value = namakorps_pejabat_js[pilihanpjbt]
			document.getElementById("jabatan").value = jbtn_pejabat_js[pilihanpjbt]
		}
	
</script>

</head>

<body>
<?php 
	include("menukanan.htm");
	include("sambungan.php");
	
	$idrumah=$_GET['id_rumah'];
	$perintah_rumah="SELECT * FROM tbl_rumah where ID_RUMAH='$idrumah';";
	$sql_rumah=mysql_query($perintah_rumah,$conn);
	$hasil_rumah=mysql_fetch_array($sql_rumah);
	
	$idkomplek=$hasil_rumah['ID_KOMPLEK'];
	$perintah_komplek="SELECT * FROM tbl_komplek where ID_KOMPLEK='$idkomplek';";
	$sql_komplek=mysql_query($perintah_komplek,$conn);
	$hasil_komplek=mysql_fetch_array($sql_komplek);
 
?>
<p class="judul"><span >DATA RUMAH NEGARA <br />
WILAYAH SURABAYA</span></p>

<form method="post" action="update_aksi.php">
<input type="hidden" value="<?php echo $idrumah;?>" name="id_rumah" />
<table style="width: 90%; margin-left: 110px; margin-right: 0px;" class="standardteks" align="center">
	<tr>
		<td style="width: 177px; height: 23px">Komplek</td>
		<td style="height: 23px; width: 1px;">:</td>
		<td style="height: 23px; width: 862px;"><?php echo $hasil_komplek['KOMPLEK'];?></td>
	</tr>
	<tr>
		<td style="width: 177px; height: 4px;" >Kode Rumah</td>
		<td style="width: 1px; height: 4px" >:</td>
		<td style="height: 4px; width: 862px;"><?php echo $idrumah;?></td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px; height: 20px;">&nbsp;</td>
		<td style="width: 1px; height: 20px;"td>
		<td style="height: 20px; width: 862px;color:blue;">DATA PENGHUNI</td>
	</tr>
	<tr>
		<?php
		$perintah_sip="SELECT * FROM tbl_sip where ID_RUMAH='$idrumah' LIMIT 1;";
		$sql_sip=mysql_query($perintah_sip,$conn);
		$hasil_sip=mysql_fetch_array($sql_sip);
		
		$nrp=$hasil_sip['NRP'];
		$perintah_penghuni="SELECT * FROM tbl_penghuni where NRP='$nrp' LIMIT 1;";
		$sql_penghuni=mysql_query($perintah_penghuni,$conn);
		$hasil_penghuni=mysql_fetch_array($sql_penghuni);
		
		?>

		<td style="width: 177px; height: 28px;" >Nama Penghuni</td>
		<td style="width: 1px; height: 28px;" >:</td>
		<td style="height: 28px; width: 862px;">
		<input name="nama_penghuni" type="text" style="width: 221px" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_PENGHUNI'];?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="text" readonly="readonly" class="standardteks" size="17" value="Nama Anggota :" style="border-color:#FFFFFF;border-style:none" id="teksanggota"/>
		<input name="nama_anggota" type="text" style="width: 194px" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_ANGGOTA'];?>" id="nama_anggota" />
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >Status</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px"><span class="style8">
		
		<?php
			$idstatus=$hasil_penghuni['KODE_STATUS'];
			$prnth_status="SELECT * FROM TBL_STATUS;";
			$sql_status=mysql_query($prnth_status,$conn);
				if (! $sql_status) 
				die ("Perintah status gagal");
			
			//$hasil_statuspenghuni=mysql_fetch_array(sql_status);
			$tanda=0;
			while ($hasil_status = mysql_fetch_array($sql_status)) 
				{ 
				if ($hasil_status['KODE_STATUS']==$idstatus)
					{
						?>
							<input onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)" name="status" type="radio" value="<?php echo $hasil_status['KODE_STATUS'];?>"  CHECKED="checked"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					
					}else{
						?>
						<input name="status" type="radio" onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)"  value="<?php echo $hasil_status['KODE_STATUS'];?>"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					}
				} 
			if($idstatus<4) 
				{
					?>
					<script language="javascript">
						document.getElementById("nama_anggota").type = "hidden"		
						document.getElementById("teksanggota").type = "hidden"		
					</script>
					<?php
				}else{
					?>
					<script language="javascript">
						document.getElementById("nama_anggota").type = "text"		
						document.getElementById("teksanggota").type = "text"		
					</script>
					<?php 
				}		
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >Pangkat, Korps</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		
		<select name="kode_kat" class="standardteks" onchange="lebar()">
		<?php
			$pangkat=$hasil_penghuni['KODE_KAT'];
			$prnth_kat="SELECT * FROM tbl_pangkat";
			$sql_kat=mysql_query($prnth_kat,$conn);
				if (! $sql_kat) 
				die ("Perintah gagal");
			$tanda=0;
			while ($hasil_kat = mysql_fetch_array($sql_kat)) 
				{ 
					if($hasil_kat['Kode_kat']==$pangkat)
					{ $tanda=1;
					?>
							<option selected="selected" value="<?php echo $hasil_kat['Kode_kat'];?>"><?php echo $hasil_kat['Pangkat'];?></option>					
					<?php  	}else{ ?>
							<option value="<?php echo $hasil_kat['Kode_kat'];?>"><?php echo $hasil_kat['Pangkat'];?></option>										
			<?php	} 
				}
			
			if ($tanda==0){?>
				<option selected="selected" value=" ">(pilih pangkat)</option>													
			<?php }	
			$tanda=0;
			?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Korps&nbsp;
		 <select name="kode_korps" class="standardteks">
		<?php 
			$korps=$hasil_penghuni['KODE_KORPS'];
			$prnth_korps="SELECT * FROM TBL_KORPS";
			$sql_korps=mysql_query($prnth_korps,$conn);
				if (! $sql_korps) 
				die ("Perintah korps gagal");
			$tanda=0;
			
			while ($hasil_korps = mysql_fetch_array($sql_korps)) 
				{ 
					if($hasil_korps['KODE_KORPS']==$korps)
					{ $tanda=1;
					?>
							<option selected="selected" class="standardteks" value="<?php echo $hasil_korps['KODE_KORPS'];?>"><?php echo $hasil_korps['KORPS'];?></option>					
					<?php  	}else{ ?>
							<option class="standardteks" value="<?php echo $hasil_korps['KODE_KORPS'];?>"><?php echo $hasil_korps['KORPS'];?></option>										
			<?php	} 
				}
			
			if ($tanda==0){?>
				<option selected="selected" value="">(pilih korps)</option>													
			<?php }	
			$tanda=0;
			?>
		</select>		
		
		
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >NRP / NIP</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="nrplama" type="hidden" style="width: 148px" value="<?php echo $hasil_penghuni['NRP'];?>"/>
		<?php
		if(substr($hasil_penghuni['NRP'],0,2)=='NA'){
			?>
			<input name="nrpbaru" type="text"  class="standardteks" style="width: 148px" value=""/>
			<?php
		}else{
		?>
		<input name="nrpbaru" type="text" class="standardteks" style="width: 148px" value="<?php echo $hasil_penghuni['NRP']; ?>"/>
		
		<?php	}	?>
	
		
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >Satker</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="satker" type="text" style="width: 275px" value="<?php echo $hasil_penghuni['SATKER'];  ?>" class="standardteks"/></td>
	</tr>
	<tr>
		<td style="width: 177px" >Tempat Lahir</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="tmpt_lahir" type="text" style="width: 114px" value="<?php echo $hasil_penghuni['TMPT_LAHIR'];  ?>" class="standardteks" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Tanggal Lahir : &nbsp;
		<input name="tgl_lahir" type="text" style="width: 64px" value="<?php echo $hasil_penghuni['TGL_LAHIR'];  ?>" class="standardteks" />ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 177px" >Telepon</td>
		<td style="width: 1px" >:</td>
		<td style="width: 862px"><input name="telepon" type="text" value="<?php echo $hasil_penghuni['TELEPON'];  ?>" class="standardteks" /></td>
	</tr>
	<tr>
		<td style="width: 177px; height: 23px;" >Foto Penghuni</td>
		<td style="width: 1px; height: 23px">:</td>
		<td style="height: 23px; width: 862px;"><input name="foto_penghuni" type="file" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px;color:blue">DATA RUMAH</td>
	</tr>
	<tr>
		<td style="width: 177px" >Alamat</td>
		<td style="width: 1px" >:</td>
		<td style="width: 862px">
		<input name="alamat" type="text" style="width: 327px" value="<?php echo $hasil_rumah['ALAMAT'];  ?>" class="standardteks"/></td>
	</tr>
	<tr>
		<td style="width: 177px; height: 23px" >Golongan</td>
		<td style="height: 23px; width: 1px;" >:</td>
		<td style="height: 23px; width: 862px;">
			<?php
				//echo $hasil_rumah['GOL'];
				
				if ($hasil_rumah['GOL']=="I")
					{
						?>
						<input name="golongan" type="radio" value="I" CHECKED/>I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					}else{
						?>
						<input name="golongan" type="radio" value="I"/>I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					}	
					
				if ($hasil_rumah['GOL']=="II")
					{?>
					<input name="golongan" type="radio" value="II" CHECKED/>II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
				<?php    }else {
						?>
						<input name="golongan" type="radio" value="II"/>II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					}	
				if ($hasil_rumah['GOL']=="IIA")
					{?>
					<input name="golongan" type="radio" value="IIA" CHECKED/>IIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
				<?php    }else {
						?>
						<input name="golongan" type="radio" value="IIA"/>IIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					
				}
			?>
				
		
		</td>
	</tr>
	<tr>
		<td style="width: 177px; height: 23px">Tahun Pembuatan</td>
		<td style="height: 23px; width: 1px;">:&nbsp;</td>
		<td style="height: 23px; width: 862px;">
		<input name="tahunbuat" type="text" size="4" value="<?php echo $hasil_rumah['THN_BUAT'];  ?>" class="standardteks"/></td>
	</tr>
	<tr>
		<td style="width: 177px; height: 23px" >Asal Perolehan</td>
		<td style="height: 23px; width: 1px;" >:</td>
		<td style="height: 23px; width: 862px;">
		<input name="asal" type="text" value="<?php echo $hasil_rumah['ASAL'];  ?>" class="standardteks" style="width: 202px" /></td>
	</tr>
	<tr>
		<td style="width: 177px" >Luas Bangunan / Luas Tanah</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="l_rumah" type="text" style="width: 100px" value="<?php echo $hasil_rumah['L_RMH'];  ?>" class="standardteks" /> M2&nbsp;&nbsp; /&nbsp;&nbsp;
		<input name="l_tanah" type="text" style="width: 100px" value="<?php echo $hasil_rumah['L_TNH'];  ?>" class="standardteks" />&nbsp; M2</td>
	</tr>
	<tr>
		<td style="width: 177px" >Kondisi Bangunan</td>
		<td style="width: 1px" >:</td>
		<td style="width: 862px">
		<?php
	
		if($hasil_rumah['KNDS_BANG']=='B')
			{?>
				<input name="kondisi_bangunan" type="radio" checked="checked" value="<?php echo $hasil_rumah['KNDS_BANG'];?>"/>Baik&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}else{
				?>
				<input name="kondisi_bangunan" value="<?php echo $hasil_rumah['KNDS_BANG'];?>" type="radio"/>Baik&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
		}
		if($hasil_rumah['KNDS_BANG']=='RR')
			{?>
				<input name="kondisi_bangunan" type="radio" checked="checked" value="<?php echo $hasil_rumah['KNDS_BANG'];?>"/>Rusak Ringan&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}else{
				?>
				<input name="kondisi_bangunan" type="radio" value="<?php echo $hasil_rumah['KNDS_BANG'];?>"/>Rusak Ringan&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}

		if($hasil_rumah['KNDS_BANG']=='RB')
			{?>
				<input name="kondisi_bangunan" type="radio" checked="checked" value="<?php echo $hasil_rumah['KNDS_BANG'];?>"/>Rusak Berat
				<?php
			}else{
				?>
				<input name="kondisi_bangunan" type="radio" value="<?php echo $hasil_rumah['KNDS_BANG'];?>"/>Rusak Berat
				<?php
			}
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >Sewa</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		
		<?php
	
		if($hasil_rumah['SEWA']=='SDH_BAYAR')
			{?>
				<input name="sewa" type="radio" checked="checked" value="<?php echo $hasil_rumah['SEWA'];?>"/>Sudah Bayar&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}else{
				?>
				<input name="sewa" value="<?php echo $hasil_rumah['SEWA'];?>" type="radio"/>Sudah Bayar&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
		}
		if($hasil_rumah['SEWA']=='BLM_BAYAR')
			{?>
				<input name="sewa" type="radio" checked="checked" value="<?php echo $hasil_rumah['SEWA'];?>"/>Belum Bayar&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}else{
				?>
				<input name="sewa" type="radio" value="<?php echo $hasil_rumah['SEWA'];?>"/>Belum Bayar&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
			}

		if($hasil_rumah['SEWA']=='TDK_DKENAI')
			{
//		echo $hasil_rumah['SEWA']."logika benar";
			?>
				
				<input name="sewa" type="radio" checked="checked" value="<?php echo $hasil_rumah['SEWA'];?>"/>Tidak Dikenai Sewa
				<?php
			}else{
				?>
				<input name="sewa" type="radio" value="<?php echo $hasil_rumah['SEWA'];?>"/>Tidak Dikenai Sewa
				<?php
			}

		?>
		
		</td>		
	</tr>
	<tr>
		<td style="width: 177px">Fasdin</td>
		<td style="width: 1px">:&nbsp;</td>
		<td style="width: 862px"><input name="fasdin" type="text" value="<?php echo $hasil_rumah['FASDIN'];  ?>" class="standardteks" /></td>
	</tr>
	<tr>
		<td style="width: 177px;vertical-align:top;">Denah </td>
		<td style="width: 1px;vertical-align:top;">:</td>
		<td style="width: 862px;vertical-align:top;">
		<?php 
			$denah = "Denah/" .$hasil_rumah['ID_RUMAH']. ".JPG";
		?>
		<img src="<?php echo $denah;?>" width="200" height="200" />
		<input name="denah" type="file" />
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >Foto Rumah</td>
		<td style="width: 1px" >:</td>
		<td style="width: 862px"><input name="foto_rumah" type="file" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td  style="width: 862px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td  style="width: 862px;color:blue;">DATA SIP</td>
	</tr>
	<tr>
		<td style="width: 177px" >No SIP</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<?php
			$banyakhhuruf=strlen($hasil_sip['NO_SIP'])-7;
			$nomorsip=substr($hasil_sip['NO_SIP'],0,$banyakhhuruf);
			$tglsip=substr($hasil_sip['NO_SIP'],-6);
			//echo $banyakhhuruf;
		?>	
		<input name="no_sip" type="text" style="width: 62px" value="<?php echo $nomorsip;  ?>" class="standardteks"/></td>
	</tr>
	<tr>
		<td style="width: 177px" >Tanggal SIP</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="tgl_sip" type="text" style="width: 62px" value="<?php echo $tglsip;  ?>" class="standardteks" />ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 177px" >Tanggal Berlaku</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="tgl_berlaku" type="text" class="standardteks" style="width: 62px" value="<?php 
		if(strlen($hasil_sip['TGL_BERLAKU'])==5){
			echo "0".$hasil_sip['TGL_BERLAKU'];
		}else{
			echo $hasil_sip['TGL_BERLAKU'];
		}
		
		?>" />ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 177px" >Tanggal Expired</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="tgl_expired" type="text" class="standardteks" style="width: 62px" value="<?php 
		if(strlen($hasil_sip['TGL_EXPIRED'])==5){
			echo "0".$hasil_sip['TGL_EXPIRED'];
		}else{
			echo $hasil_sip['TGL_EXPIRED'];
		}

		?>" />ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 177px" >Tanggal Cetak</td>
		<td style="width: 1px" >:</td>
		<td  style="width: 862px">
		<input name="tgl_cetak" type="text" style="width: 62px" class="standardteks" value="<?php echo $hasil_sip['TGL_CETAK'];?>" />ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px;color:blue;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px;color:blue;">PEJABAT TTD</td>
	</tr>
	<?php 
		$nrpttd=$hasil_sip['NRP_TTD'];
		$x=0;
		$perintah_ttd="SELECT a.*,b.*,c.* 
						FROM TBL_PEJABAT a, TBL_PANGKAT b, TBL_KORPS c
						WHERE a.PNGKT_TTD=b.Kode_kat
						AND a.KORPS_TTD=c.KODE_KORPS;";
		$sql_ttd=mysql_query($perintah_ttd,$conn);
        $banyakdata=mysql_num_rows($sql_ttd);
        
        
		
        
	?>
			<script language="javascript">
				banyakdata="<?php echo $banyakdata;?>"
				var nrp_pejabat_js=new Array(banyakdata+1)		
				var p_js=0;
				var nama_pejabat_js=new Array(banyakdata+1)		
				var pngkt_pejabat_js=new Array(banyakdata+1)		
				var korps_pejabat_js=new Array(banyakdata+1)		
				var jbtn_pejabat_js=new Array(banyakdata+1)		
				var namapangkat_pejabat_js=new Array(banyakdata+1)
				var namakorps_pejabat_js=new Array(banyakdata+1)
			</script>

		<?php
			while($hasil_ttd=mysql_fetch_array($sql_ttd)){
			$x=$x+1;
			$nrp_pejabat[$x]=$hasil_ttd['NRP_TTD'];
			$nama_pejabat[$x]=$hasil_ttd['NAMA_TTD'];
			$pngkt_pejabat[$x]=$hasil_ttd['PNGKT_TTD'];
			$korps_pejabat[$x]=$hasil_ttd['KORPS_TTD'];
			$jbtn_pejabat[$x]=$hasil_ttd['JBTN_TTD'];
			$namapangkat_pejabat[$x]=$hasil_ttd['Pangkat'];
			$namakorps_pejabat[$x]=$hasil_ttd['KORPS'];
			?>
			
			<script language="javascript">
				p_js=p_js+1;
				nrp_pejabat_js[p_js]	="<?php echo $nrp_pejabat[$x];?>"
				nama_pejabat_js[p_js]	="<?php echo $nama_pejabat[$x];?>"		
				pngkt_pejabat_js[p_js]	="<?php echo $pngkt_pejabat[$x];?>"				
				korps_pejabat_js[p_js]	="<?php echo $korps_pejabat[$x];?>"				
				jbtn_pejabat_js[p_js]	="<?php echo $jbtn_pejabat[$x];?>"				
				namapangkat_pejabat_js[p_js]="<?php echo $namapangkat_pejabat[$x];?>"
				namakorps_pejabat_js[p_js]="<?php echo $namakorps_pejabat[$x];?>"				
			</script>
		<?php
		}
			
	?>
	
	<script language="javascript">
				p_js=p_js+1;
				nrp_pejabat_js[p_js]	=""
				nama_pejabat_js[p_js]	=""		
				pngkt_pejabat_js[p_js]	=""				
				korps_pejabat_js[p_js]	=""				
				jbtn_pejabat_js[p_js]	=""				
				namapangkat_pejabat_js[p_js]=""
				namakorps_pejabat_js[p_js]=""				
			</script>
	<tr>
		<td style="width: 177px" >Nama 
		</td>
		<td style="width: 1px" >:</td>
		<td style="width: 809px">
		<select name="nama_pejabat" onchange="ttd()" id="id_pejabat">

		<?php 
			$terpilih=0;
			for ($k=1;$k<=$x;$k++){
				if ($nrpttd==$nrp_pejabat[$k]){
					?>
					<option value="<?php echo $k;?>" selected="selected"><?php 
					echo $nama_pejabat[$k];
					$terpilih=$k;
					?></option>		
					<?}else{?>		
				<option value="<?php echo $k;?>" ><?php echo $nama_pejabat[$k];?></option>			
					<?php
					}
			}
			if($terpilih==0)
				{
					?>
					<option value="<?php echo $x+1;?>" selected="selected">(Pilih Pejabat TTD)</option>	
					
					<?php 
					$nrp_pejabat[$terpilih]="";
					$nama_pejabat[$terpilih]="";
					$pngkt_pejabat[$terpilih]="";
					$korps_pejabat[$terpilih]="";
					$jbtn_pejabat[$terpilih]="";
					$namapangkat_pejabat[$terpilih]="";
					$namakorps_pejabat[$terpilih]="";
				}else{
					?>
					<option value="<?php echo $x+1;?>">(Pilih Pejabat TTD)</option>			
					<?php
				}	
		?>
		</select></td>
	</tr>
	<tr>
		<td style="width: 177px" >Pangkat, Korps</td>
		<td style="width: 1px" >:</td>
		<td style="width: 809px">			
		<input name="kode_katpejabat" type="text" id="kodekat" class="tulisantabel" readonly="readonly" value="<?php echo $namapangkat_pejabat[$terpilih];?>"/>	
		<input name="kode_korpspejabat" type="text" id="kodekorps" class="tulisantabel" readonly="readonly" value="<?php echo $namakorps_pejabat[$terpilih];?>"/>	
		</td>
	</tr>
	<tr>
		<td style="width: 177px; height: 19px;" >NRP</td>
		<td style="width: 1px; height: 19px;" >:</td>
		<td style="height: 19px; width: 809px;">
		<input name="nrp_pejabat" type="text" id="nrp_pjbt" class="tulisantabel" readonly="readonly" value="<?php echo $nrp_pejabat[$terpilih];?>"/>	
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >Jabatan</td>
		<td style="width: 1px" >:</td>
		<td style="width: 809px">
		<input name="jbtn_pejabat" type="text" id="jabatan" class="tulisantabel" readonly="readonly" value="<?php echo $jbtn_pejabat[$terpilih];?>"/>	
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 809px">&nbsp;</td>
	</tr>
</table>
<p align=center>
		<input name="Simpan" type="submit" value="Simpan" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" /></p>
</form>


</body>

</html>