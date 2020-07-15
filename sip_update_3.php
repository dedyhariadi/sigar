<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

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

var tanda;    
    function ceknamapenghuni(){
        //alert ("Dedy")
            if(document.formname.nama_penghuni.value==""){
                alert ("Nama Penghuni Tidak Boleh Kosong trus siapa yang nempatin, masak hantu...:-)")
                tanda=1
               }
    }

function kembali(){
    //alert ("Nomor sip di cek ulang")
    if(tanda==1){
        document.formname.nama_penghuni.focus()
        tanda=0    
    }else{
        document.formname.status.focus()
    }
}

function kembali2(){
    //alert ("Nomor sip di cek ulang")
    if(tanda==1){
        document.formname.nama_penghuni.focus()
        tanda=0    
    }else{
        document.formname.nama_anggota.focus()
    }
}

function perpanjang(){
    //alert ("Proses yang dipilih perpanjang")
        document.formname.nosip.select()
        document.formname.tulisantglovb.type="hidden"
        document.formname.tanggal_ovb.style.visibility="hidden"
        document.formname.bulan_ovb.style.visibility="hidden"
        document.formname.tahun_ovb.style.visibility="hidden"
        
}

function pengalihan(){
    
        document.formname.nosip.value=""
        document.formname.nama_penghuni.value=""
        document.formname.nama_anggota.value=""
        document.formname.NRP_tampil.value=""
        document.formname.satker.value=""
        document.getElementById("teksanggota").type = "hidden"
        
        document.formname.tanggal_ovb.style.visibility="visible"
        document.formname.bulan_ovb.style.visibility="visible"
        document.formname.tahun_ovb.style.visibility="visible"
        document.formname.tulisantglovb.type="text"
}
	
</script>

</head>

<body style="margin-top:1px;margin-bottom: 1px;">
<?php 
	include("menuatas.php");
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
<p class="judul" style="margin-bottom:1px;margin-top:1px;">SURAT IZIN PENGHUNIAN <span lang="id">RUMNEG TNI AL<br />
</span></p>
<form method="POST" action="sip_update_aksi.php" name="formname" style="margin-top:1px;">
<table style="width: 58%; " align="center" border="0">
	<tr bgcolor="#EEFDF3">
		<td style="width: 19%; height: 26px" class="standardteks">Kode Rumah</td>
		<td style="height: 26px; width: 20px;" align="left" class="standardteks">:</td>
		<td style="height: 26px; width: 593px;" ><input class="standardteks" type="text" name="id_rumah" style="border-style:none;color:maroon;" value="<?php echo $id_rumah;?>" /></td>
	</tr>`

	<tr bgcolor="#EEFDF3">
		<td style="width: 19%; height: 4px;" class="standardteks">Alamat</td>
		<td style="width: 20px;" align="left" class="standardteks">:</td>
		<?php 
		    $perintah_rumah="SELECT ALAMAT,ID_KOMPLEK FROM tbl_rumah WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
		    $sql_rumah=mysql_query($perintah_rumah,$conn);
			if(!$sql_rumah)
			die ("Cari alamat gagal");
		    $hasil_alamat=mysql_fetch_array($sql_rumah);
		?>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 300px;">
	    <input size="20" name="alamat" class="standardteks" type="text" style="border-style:none;color:maroon; width: 205px; height: 19px;" value="<?php echo $hasil_alamat['ALAMAT'];?>" />
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
		<td style="width: 19%; height: 22px" class="standardteks">&nbsp;</td>
		<td style="height: 22px; width: 20px;" align="left" class="standardteks">
		&nbsp;</td>
		<td style="height: 22px; width: 593px; color:red" class="standardteks">
		<input name="proses" type="radio" value="1" onclick="javascript:perpanjang();" /> Perpanjang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="proses" type="radio" value="2" onclick="javascript:pengalihan();" />Pengalihan / OVB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="tulisantglovb" value="Tgl OVB :" size="7" style="border: 0px;" class="standardteks" />
        <select name="tanggal_ovb" class="standardteks" style="visibility: hidden;">
		<?php 
		$tgl_ovb=date("dmy");
			for ($d=1;$d<=31;$d++){
					if($d<10){
						$d="0".$d;
					}
				if(substr($tgl_ovb,0,2)==$d){
				?>
				<option value="<?php echo $d;?>" selected="selected"><?php echo $d;?></option>
			<?php }else{?>
				<option value="<?php echo $d;?>"><?php echo $d;?></option>
				<?}
			}	?>
			
		</select>
        
		<select name="bulan_ovb" class="standardteks" style="visibility: hidden;">
		<?php 
		
			if(substr($tgl_ovb,2,2)=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if(substr($tgl_ovb,2,2)=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if(substr($tgl_ovb,2,2)=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if(substr($tgl_ovb,2,2)=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if(substr($tgl_ovb,2,2)=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if(substr($tgl_ovb,2,2)=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if(substr($tgl_ovb,2,2)=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php
				}

			if(substr($tgl_ovb,2,2)=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if(substr($tgl_ovb,2,2)=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if(substr($tgl_ovb,2,2)=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if(substr($tgl_ovb,2,2)=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if(substr($tgl_ovb,2,2)=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				}?>		

		
		</select>
		
		<select name="tahun_ovb" class="standardteks" style="visibility: hidden;">
			<option value="06">2006</option>
			<option value="07">2007</option>
			<option value="08">2008</option>
			<option value="09">2009</option>
			<option value="10">2010</option>
			<option value="11" selected="selected">2011</option>
			<option value="12">2012</option>
			<option value="13">2013</option>
			<option value="14">2014</option>
			<option value="15">2015</option>
			<option value="16">2016</option>
			<option value="17">2017</option>
			<option value="18">2018</option>
			<option value="19">2019</option>
			<option value="20">2020</option>
		</select>
        
        
        </td>
 
	</tr>
	<tr>
		<td></td>
		<td ></td>
		<td></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%; height: 22px;" ></td>
		<td style="width: 20px; height: 22px;" ></td>
		<td class="standardteks" style="width: 593px;color:blue; height: 22px;">INFORMASI SIP </td>
	</tr>
    <tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Nomor SIP</td>
		<td style="width: 20px" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px">
		<input type="text" name="nosip" class="standardteks" value="<?php if(substr($hasil['NO_SIP'],-4)=="9999"){echo "";}else{echo $hasil['NO_SIP'];}
        ?>"  /> Nomor / ddmmyy
        <input type="hidden" name="nosipasli" class="standardteks" value="<?php echo $hasil['NO_SIP'];?>"  />
    </tr>
	<tr bgcolor="#E1FFFF">
	    <?php
	    
		    $nrp=$hasil['NRP'];
		    
		    $perintah_penghuni="SELECT * FROM tbl_penghuni WHERE NRP='$nrp' LIMIT 1;";
		    $sql_penghuni=mysql_query($perintah_penghuni,$conn);
			if(!$sql_penghuni)
			     die ("Cari penghuni gagal");
		    $hasil_penghuni=mysql_fetch_array($sql_penghuni);
		?>
        
		<td style="width: 19%" class="standardteks">Nama Penghuni</td>
		<td style="width: 20px" align="left" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px">
	    <input name="nama_penghuni"  onblur="javascript:ceknamapenghuni();" type="text" style="width: 221px" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_PENGHUNI'];?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<input type="text" class="standardteks" size="17" value="Nama Anggota :" style="border-color:#FFFFFF;border-style:none;background:#E1FFFF" id="teksanggota"/>
		<input name="anggota" onfocus="javascript:kembali2();" type="text" size="25" class="standardteks" value="<?php echo $hasil_penghuni['NAMA_ANGGOTA'];?>" id="nama_anggota" /></td>
	</tr>
	
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Status</td>
		<td style="width: 20px;" align="left" class="standardteks">:</td>
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
							<input  onfocus="javascript:kembali();"   onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)" name="status" type="radio" value="<?php echo $hasil_status['KODE_STATUS'];?>"  CHECKED="checked"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
	
					}else{
						?>
						<input  onfocus="javascript:kembali();"  name="status" type="radio" onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)"  value="<?php echo $hasil_status['KODE_STATUS'];?>"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
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
					</script><?php 
				}		
		?>
		
		</td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%; height: 23px" class="standardteks">Pangkat / 
		Golongan</td>
		<td style="height: 23px; width: 20px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="nama_kat"  class="standardteks" onchange="lebar()">
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
				<option selected="selected" value="0">(pilih pangkat)</option>													
			<?php }	
			$tanda=0;
			?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Korps&nbsp;
		 <select name="kode_korps"  class="standardteks">
		<?php 
			$korps=$hasil_penghuni['KODE_KORPS'];
			$prnth_korps="SELECT * FROM TBL_KORPS order by KORPS";
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
							<option class="standardteks" value="<?php echo $hasil_korps['KODE_KORPS'];?>">
                            <?php echo $hasil_korps['KORPS'];?></option>										
			<?php	} 
				}
			
			if ($tanda==0){?>
				<option selected="selected" value="0">(pilih korps)</option>													
			<?php }	
			$tanda=0;
			?>
		</select></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%; height: 23px" class="standardteks">NRP / NIP</td>
		<td style="height: 23px; width: 20px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="NRP_tampil" type="text" class="standardteks" style="width: 202px" class="standardteks" value="		
		<?php	
		
		$hrfdepan=substr($hasil['NRP'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo "";	
			}else{
				echo $hasil['NRP'];	
			} ?>
		" /></td>
        <input type="hidden" name="NRP" value="<?php echo $hasil['NRP'];?>"/>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Satker</td>
		<td style="width: 20px" class="standardteks">:</td>
		<td class="style17" style="width: 593px">
		<input name="satker" type="text" style="width: 296px" class="standardteks" value="<?php echo $hasil_penghuni['SATKER'];?>"/> </td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Tanggal Berlaku</td>
		<td style="width: 20px" class="standardteks">:</td>
		<?php 
			$tgl_berlaku=$hasil['TGL_BERLAKU'];
            
		?>
		<td class="standardteks" style="width: 593px">
        
        <select name="tanggal_berlaku" class="standardteks">
		<?php 
			for ($d=1;$d<=31;$d++){
					if($d<10){
						$d="0".$d;
					}
				if(substr($tgl_berlaku,0,2)==$d){
				?>
				<option value="<?php echo $d;?>" selected="selected"><?php echo $d;?></option>
			<?php }else{?>
				<option value="<?php echo $d;?>"><?php echo $d;?></option>
				<?}
			}	?>
			
		</select>
		<select name="bulan_berlaku" class="standardteks">

		<?php 
		
			if(substr($tgl_berlaku,2,2)=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if(substr($tgl_berlaku,2,2)=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if(substr($tgl_berlaku,2,2)=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if(substr($tgl_berlaku,2,2)=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if(substr($tgl_berlaku,2,2)=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if(substr($tgl_berlaku,2,2)=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if(substr($tgl_berlaku,2,2)=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php
				}

			if(substr($tgl_berlaku,2,2)=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if(substr($tgl_berlaku,2,2)=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if(substr($tgl_berlaku,2,2)=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if(substr($tgl_berlaku,2,2)=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if(substr($tgl_berlaku,2,2)=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				}?>		

		
		</select>
		
		<!--<select name="tahun_berlaku" class="standardteks">
			<option value="06">2006</option>
			<option value="07">2007</option>
			<option value="08">2008</option>
			<option value="09">2009</option>
			<option value="10">2010</option>
			<option value="11" selected="selected">2011</option>
			<option value="12">2012</option>
			<option value="13">2013</option>
			<option value="14">2014</option>
			<option value="15">2015</option>
			<option value="16">2016</option>
			<option value="17">2017</option>
			<option value="18">2018</option>
			<option value="19">2019</option>
			<option value="20">2020</option>
		</select>-->
        
        <?php

        if(substr($tgl_berlaku,4,1)==9){
            $cetak ="19".substr($tgl_berlaku,4,2);
           }else{
            $cetak ="20".substr($tgl_berlaku,4,2);
          }
           
        ?>
		<input name="tahun_berlaku" type="text" value="<?php echo $cetak;?>" size="4" class="standardteks"  />
		
		</td>
	</tr>
    <tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Telepon</td>
		<td style="width: 20px" class="standardteks">:</td>
		<td style="width: 593px" class="standardteks"><input name="telepon" type="text"  class="standardteks"/>
		</td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Foto Penghuni</td>
		<td style="width: 20px" class="standardteks">:</td>
		<td style="width: 593px" class="standardteks"><input name="foto_penghuni" type="file"  class="standardteks"/>&nbsp;&nbsp;
		</td>
	</tr>
	</table>

<div class="standardteks" align="center">
		<br/>
		<input name="Simpan" type="submit" value="Simpan" class="standardteks"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="standardteks" /></div>
		
		
</form>

</body>

</html>
