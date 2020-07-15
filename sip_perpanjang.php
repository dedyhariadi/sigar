<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>

<script type="text/javascript" language="javascript">
	function tampilanggota(){
			document.getElementById("nama_anggota").type = "text"		
	}

	function hideanggota(x){
			//alert (x)
			if (x<4) 
			{
				document.getElementById("nama_anggota").type = "hidden"		
				document.getElementById("teksanggota").type = "hidden"
			}else {
				document.getElementById("nama_anggota").type = "text"		
				document.getElementById("teksanggota").type = "text"

			}
			
	}

	function hapusisi(){
			document.getElementById("nama_anggota").value = ""
	}			
		
	function tglsip(){
		var tanggalsip=document.getElementById("nosip")
		var isitanggal=tanggalsip.value
		var cek=isitanggal.indexOf("/")
		if (cek>-1){
			var tglsipp=isitanggal.split("/")
			document.getElementById("nomorsip").value = tglsipp[1]
			document.getElementById("nomorsip").type = "text"
		}else{
			alert ('Salah format Nomor SIP/ Tgl SIP')
		}		
	}

	
</script>

<style type="text/css">
</style>

</head>

<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");

	$id_rumah=$_GET['id_rumah'];
	
	/*$prnth="SELECT A.*,B.*,C.*,D.*,E.*,F.*,G.*
 		 FROM TBL_SIP A,TBL_RUMAH B,TBL_PENGHUNI C, TBL_STATUS D, TBL_PANGKAT E, TBL_KORPS F,TBL_KOMPLEK G
 		 WHERE A.ID_RUMAH=B.ID_RUMAH
 		 AND G.ID_KOMPLEK=B.ID_KOMPLEK
		 AND A.NRP=C.NRP
		 AND D.KODE_STATUS=C.KODE_STATUS
		 AND E.KODE_KAT=C.KODE_KAT
		 AND F.KODE_KORPS=C.KODE_KORPS
		 AND A.ID_RUMAH = '$id_rumah';";*/
		 

	$prnth_sip="SELECT A.* FROM TBL_SIP A WHERE A.ID_RUMAH='$id_rumah' limit 1;";
	$sql_sip=mysql_query($prnth_sip,$conn);
		if (! $sql_sip) 
			die ("Perintah SIP gagal");
			
	$hasil_sip=mysql_fetch_array($sql_sip);
?>

<p class="judul">SURAT IZIN PENGHUNIAN <br />
RUMAH NEGARA<strong><br /></strong><span lang="id">==========================</span></p>
<form enctype="multipart/form-data" method="POST" action="sip_perpanjang_aksi.php">
<table style="width: 90%; margin-left: 142px;" align="center" border="0">
	<tr>
		<td style="width: 160px; height: 26px" class="standardteks">Kode Rumah</td>
		<td style="height: 26px; width: 1px;" class="standardteks">:</td>
		<td style="height: 26px; width: 593px;" ><input class="standardteks" type="text" name="id_rumah" style="border-style:none;color:maroon;" value="<?php echo $id_rumah;?>" /></td>
	</tr>`

	<tr>
		<td style="width: 160px; height: 4px;" class="standardteks">Alamat</td>
		<td style="width: 1px; height: 4px;color:maroon" class="standardteks">:</td>
		<td class="standardteks" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 593px;">
		<input size="50" name="alamat" class="standardteks" type="text" style="border-style:none;color:maroon;" value="
		 <?php 
			$perintah_rumah="SELECT * FROM TBL_RUMAH WHERE ID_RUMAH='$id_rumah';";
			$sql_rumah=mysql_query($perintah_rumah,$conn);

			$hasil_rumah=mysql_fetch_array($sql_rumah);
			echo $hasil_rumah['ALAMAT'];
		?>
		 " />
	  
	  </td>
	</tr>
	<tr>
		<td style="width: 160px; height: 26px" class="standardteks">Komplek</td>
		<td style="height: 26px; width: 1px;" class="standardteks">:</td>
		<td style="height: 26px; width: 593px; color:maroon" class="standardteks">
		<input class="standardteks" name="komplek" type="text" style="border-style:none;color:maroon;" value="
		<?php 
			$id_komplek=$hasil_rumah['ID_KOMPLEK'];
			$perintah_komplek="SELECT * FROM TBL_KOMPLEK WHERE ID_KOMPLEK='$id_komplek';";
			$sql_komplek=mysql_query($perintah_komplek,$conn);
			$hasil_komplek=mysql_fetch_array($sql_komplek);
			echo $hasil_komplek['KOMPLEK'];
		
		?>
		
		" /></td>
	</tr>
	<tr>
		<td style="width: 160px">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="standardteks" style="width: 593px;color:blue">INFORMASI SIP</td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks">Nama Penghuni</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="standardteks" style="width: 593px">
		<input name="nama_penghuni" type="text" style="width: 221px" class="standardteks" value="
		
		<?php 
			$nrp=$hasil_sip['NRP'];
			$perintah_penghuni="SELECT * FROM TBL_PENGHUNI WHERE NRP='$nrp' LIMIT 1;";
			$sql_penghuni=mysql_query($perintah_penghuni,$conn);
			$hasil_penghuni=mysql_fetch_array($sql_penghuni);
			
			echo $hasil_penghuni['NAMA_PENGHUNI'];
		?>
		
		"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="text" readonly="readonly" class="standardteks" size="17" value="Nama Anggota :" style="border-color:#FFFFFF;border-style:none" id="teksanggota"/>
		<input name="anggota" type="text" style="width: 180px" class="standardteks" value="	<?php 	echo $hasil_penghuni['NAMA_ANGGOTA'];?>" 
		" /></td>
	</tr>
	<tr>
		<td style="width: 177px" class="standardteks">Status</td>
		<td style="width: 1px">:</td>
		<td class="standardteks">
		<?php 
			
			$prnth_status="SELECT * FROM TBL_STATUS;";
			$sql_status=mysql_query($prnth_status,$conn);
				if (! $sql_status) 
				die ("Perintah gagal");
			$tanda=0;
			$id_status=$hasil_penghuni['KODE_STATUS'];		
			while ($hasil_status = mysql_fetch_array($sql_status)) 
				{ 
				if ($hasil_status['KODE_STATUS']==$id_status)
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
				
			if($id_status<4) 
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
		<td style="width: 160px; height: 23px" class="standardteks">Pangkat / 
		Golongan</td>
		<td style="height: 23px; width: 1px;" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="kode_kat" class="standardteks">
		<?php 
			//echo "Kode Pangkat : ";
			$prnth_pangkat="SELECT * FROM TBL_PANGKAT;";
			$sql_pangkat=mysql_query($prnth_pangkat,$conn);
				if (!$sql_pangkat) 
				die ("Perintah pangkat gagal");
			$tanda=0;
				
			while ($hasil_kat= mysql_fetch_array($sql_pangkat)) 
				{ 
					if($hasil_kat['Kode_kat']==$hasil_penghuni['KODE_KAT'])
					{ $tanda=1;
		?>
							<option selected="selected" value="<?php echo $hasil_kat['Kode_kat'];?>"><?php echo $hasil_kat['Pangkat'];?></option>					
		<?php  	}else{ ?>
							<option value="<?php echo $hasil_kat['Kode_kat'];?>"><?php echo $hasil_kat['Pangkat'];?></option>										
		<?php	} 
			}
			
		if ($tanda==0){?>
				<option selected="selected" value=" ">(pilih pangkat)</option>													
			<?php 
			}	
				$tanda=0;
			
		?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Korps&nbsp;
		 <?php 
		 //echo $hasil_penghuni['KODE_KORPS'];
		 ?>
		<select name="kode_korps" class="standardteks">
		<?php 
			$prnth="SELECT * FROM TBL_KORPS";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			$tanda=0;
			//echo $hasil_korps['KODE_KORPS'];
			while ($hasil_korps = mysql_fetch_array($sql)) 
				{ 
					if($hasil_korps['KODE_KORPS']==$hasil_penghuni['KODE_KORPS'])
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
		</select></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px" class="standardteks">NRP / NIP</td>
		<td style="height: 23px; width: 1px;" class="style4">:</td>
		<td style="height: 23px; width: 593px;">
		<input type="hidden" value="<?php echo $hasil_penghuni['NRP'];?>" name="NRP" />	
		<input name="NRP_tampil" type="text" class="standardteks" style="width: 202px" class="standardteks" value="		
		<?php	
		
		$hrfdepan=substr($hasil_penghuni['NRP'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo " ";	
			}else{
				echo $hasil_penghuni['NRP'];	
			}
		?>
		" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks">Satker</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="satker" type="text" style="width: 296px" class="standardteks" value="<?php echo $hasil_penghuni['SATKER'];?>"/> </td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks">Tanggal Berlaku</td>
		<td style="width: 1px" class="style4"><span lang="id">:</span></td>
		<?php 
			$tgl_berlaku=substr($hasil_sip['NO_SIP'],-6);
		?>
		<td class="standardteks" style="width: 593px"><input maxlength="8" size="8px" name="tgl_berlaku" type="text" class="standardteks" value="<?php echo $tgl_berlaku;?>" />
		ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks">Foto Penghuni</td>
		<td style="width: 1px" class="standardteks">:</td>
		<td style="width: 593px" class="standardteks"><input name="foto_penghuni" type="file" class="standardteks"/>&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	</table>

<div class="standardteks" align="center">
		<br/>
		<input name="Simpan" type="submit" value="Simpan" class="standardteks"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="hidden" value="<?php echo $_GET['tgl_expired'];?>" name="tgl_expired">
		<input name="Reset1" type="reset" value="Reset" class="standardteks" /></div>
		<?php 
		
		?>
		
</form>

</body>

</html>