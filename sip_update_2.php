<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>

<script type="text/javascript" language="javascript">

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

</head>

<body>

<?php 
	include("menukanan.htm");
	include("sambungan.php");

	$id_rumah=strtoupper($_GET['id_rumah']);
	
	$prnth="SELECT A.*
 		 FROM TBL_SIP A
 		 WHERE A.ID_RUMAH = '$id_rumah' LIMIT 1;";

	$sql=mysql_query($prnth,$conn);
		if (!$sql) 
			die ("Perintah gagal");
			
	$hasil=mysql_fetch_array($sql);
?>

<p class="judul">SURAT IZIN PENGHUNIAN <br />
RUMAH NEGARA<strong><br /></strong><span lang="id">==========================</span></p>
<form enctype="multipart/form-data" method="POST" action="sip_update_aksi.php" name="formname">
<table style="width: 90%; margin-left: 142px;" align="center" border="0">
	<tr>
		<td style="width: 160px; height: 26px" class="standardteks">Kode Rumah</td>
		<td style="height: 26px; width: 1px;" class="standardteks">:</td>
		<td style="height: 26px; width: 593px;" ><input class="standardteks" type="text" name="id_rumah" style="border-style:none;color:maroon;" value="<?php echo $id_rumah;?>" /></td>
	</tr>`

	<tr>
		<td style="width: 160px; height: 4px;" class="standardteks">Alamat</td>
		<td style="width: 1px; height: 4px;color:maroon" class="standardteks">:</td>
		<?php 
		    $perintah_rumah="SELECT ALAMAT,ID_KOMPLEK FROM tbl_rumah WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
		    $sql_rumah=mysql_query($perintah_rumah,$conn);
			if(!$sql_rumah)
			die ("Cari alamat gagal");
		    $hasil_alamat=mysql_fetch_array($sql_rumah);
		?>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 593px;">
	    <input size="50" name="alamat" class="standardteks" type="text" style="border-style:none;color:maroon;" value="<?php echo $hasil_alamat['ALAMAT'];?>" /></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 26px" class="standardteks">Komplek</td>
		<td style="height: 26px; width: 1px;" class="standardteks">:</td>
		<td style="height: 26px; width: 593px; color:maroon" class="standardteks">
		    <?php
		    $idkomplek=$hasil_alamat['ID_KOMPLEK'];
		    $perintah_komplek="SELECT KOMPLEK FROM tbl_komplek WHERE ID_KOMPLEK='$idkomplek';";
		    $sql_komplek=mysql_query($perintah_komplek,$conn);
			if(!$sql_komplek)
			die ("Cari komplek gagal");
		    $hasil_komplek=mysql_fetch_array($sql_komplek);
		?>
		<input class="standardteks" name="komplek" type="text" style="border-style:none;color:maroon;" value="<?php echo $hasil_komplek['KOMPLEK'];?>" /></td>
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
		<td class="standardteks" style="width: 593px;color:blue">INFORMASI SIP </td>
	</tr>
	<tr>
	    <?php
	    
		    $nrp=$hasil['NRP'];
		    
		    $perintah_penghuni="SELECT * FROM tbl_penghuni WHERE NRP='$nrp' LIMIT 1;";
		    $sql_penghuni=mysql_query($perintah_penghuni,$conn);
			if(!$sql_penghuni)
			die ("Cari penghuni gagal");
		    $hasil_penghuni=mysql_fetch_array($sql_penghuni);
		?>
        
		<td style="width: 160px" class="standardteks">Nama Penghuni</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="standardteks" style="width: 593px">
		<input type="hidden" name="nosip" value="<?php echo $hasil['NO_SIP'];?>"/>
        <input name="nama_penghuni" type="text" style="width: 221px" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_PENGHUNI'];?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="text" readonly="readonly" class="standardteks" size="17" value="Nama Anggota :" style="border-color:#FFFFFF;border-style:none" id="teksanggota"/>
		<input name="anggota" type="text" style="width: 194px" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_ANGGOTA'];?>" id="nama_anggota" /></td>
	</tr>
	<tr>
		<td style="width: 177px" class="standardteks">Status</td>
		<td style="width: 1px">:</td>
		<td class="standardteks">
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
		<td style="width: 160px; height: 23px" class="standardteks">Pangkat / 
		Golongan</td>
		<td style="height: 23px; width: 1px;" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="nama_kat" class="standardteks" onchange="lebar()">
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
			echo $korps;
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
		</select></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px" class="standardteks">NRP / NIP</td>
		<td style="height: 23px; width: 1px;" class="style4">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="NRP_tampil" type="text" class="standardteks" style="width: 202px" class="standardteks" value="		
		<?php	
		
		$hrfdepan=substr($hasil['NRP'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo " ";	
			}else{
				echo $hasil['NRP'];	
			} ?>
		" /></td>
        <input type="hidden" name="NRP" value="<?php echo $hasil['NRP'];?>"/>
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
			$tgl_berlaku=substr($hasil['NO_SIP'],-6);
		?>
		<td class="standardteks" style="width: 593px"><input maxlength="8" size="8px" name="tgl_berlaku" type="text" class="standardteks" value="<?php echo $tgl_berlaku;?>" />
		ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks">Foto Penghuni</td>
		<td style="width: 1px" class="standardteks">:</td>
		<td style="width: 593px" class="standardteks"><input name="foto_penghuni" type="file"  class="standardteks"/>&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 160px" class="standardteks" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 862px;color:blue;" class="standardteks">PEJABAT TTD</td>
	</tr>
	<?php 
		$nrpttd=$hasil['NRP_TTD'];
		$x=0;
		$perintah_ttd="SELECT a.*,b.*,c.* 
						FROM TBL_PEJABAT a, TBL_PANGKAT b, TBL_KORPS c
						WHERE a.PNGKT_TTD=b.Kode_kat
						AND a.KORPS_TTD=c.KODE_KORPS;";
		$sql_ttd=mysql_query($perintah_ttd,$conn);
		$banyakdata=mysql_numrows($sql_ttd);
		//echo $banyakdata;
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
		<td style="width: 177px" class="standardteks">Nama 
		</td>
		<td style="width: 1px" class="standardteks">:</td>
		<td style="width: 809px">
		<select name="nama_pejabat" onchange="ttd()" id="id_pejabat" class="standardteks">

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
		<td style="width: 177px" class="standardteks">Pangkat, Korps</td>
		<td style="width: 1px" class="standardteks">:</td>
		<td style="width: 809px">			
		<input name="kode_katpejabat" type="text" id="kodekat" style="border-style: none; border-color: inherit; border-width: medium; width: 153px;" class="standardteks" readonly="readonly" value="<?php echo $namapangkat_pejabat[$terpilih];?>"/>	
		<input name="kode_korpspejabat" type="text" id="kodekorps" class="standardteks" style="border:none;" readonly="readonly" value="<?php echo $namakorps_pejabat[$terpilih];?>"/>	
		</td>
	</tr>
	<tr>
		<td style="width: 177px; height: 19px;" class="standardteks">NRP</td>
		<td style="width: 1px; height: 19px;" class="standardteks">:</td>
		<td style="height: 19px; width: 809px;">
		<input name="nrp_pejabat" type="text" id="nrp_pjbt" style="border:none;" class="standardteks" readonly="readonly" value="<?php echo $nrp_pejabat[$terpilih];?>"/>	
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" class="standardteks">Jabatan</td>
		<td style="width: 1px" class="standardteks">:</td>
		<td style="width: 809px">
		<input style="border-style: none; border-color: inherit; border-width: medium; width: 247px;"  name="jbtn_pejabat" type="text" id="jabatan" class="standardteks" readonly="readonly" value="<?php echo $jbtn_pejabat[$terpilih];?>"/>	
		&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 177px" >&nbsp;</td>
		<td style="width: 1px" >&nbsp;</td>
		<td style="width: 809px">&nbsp;</td>
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
		<input name="Simpan" type="submit" value="Simpan" class="standardteks"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="standardteks" /></div>
		
		
</form>

</body>

</html>
