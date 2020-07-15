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
var namapenghuni_sementara=""
var namaanggota_sementara=""
var nrp_sementara=""
var satker_sementara=""
var status_sementara=1

function perpanjang(){
        
        document.formname.tanggal_ovb.style.visibility="hidden"
        document.formname.bulan_ovb.style.visibility="hidden"
        document.formname.tahun_ovb.style.visibility="hidden"
        document.formname.tulisantglovb.type="hidden"
        
        if (status_sementara==1){
            document.formname.nosip.value=""
            
        }
        if (status_sementara==3){
            document.formname.nosip.value=""
            document.formname.nama_penghuni.value=namapenghuni_sementara
            document.formname.nama_anggota.value=namaanggota_sementara
            document.formname.NRP_tampil.value=nrp_sementara
            document.formname.satker.value=satker_sementara   
        }
        
}

function pengalihan(){
    
        status_sementara=2
            
        if (status_sementara==2){
            namapenghuni_sementara=document.formname.nama_penghuni.value
            namaanggota_sementara=document.formname.nama_anggota.value
            nrp_sementara=document.formname.NRP_tampil.value
            satker_sementara=document.formname.satker.value
            document.formname.nosip.value=""
            status_sementara=3   
        }
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
	include("sambungan.php");
	include("menuatas.php");

	$id_ovb=$_GET['id_ovb'];
	
	$prnth="SELECT A.*
 		 FROM TBL_OVB A
 		 WHERE A.ID_OVB= '$id_ovb' LIMIT 1;";

	$sql=mysql_query($prnth,$conn);
		if (!$sql) 
			die ("Perintah gagal");
			
	$hasil=mysql_fetch_array($sql);
?>
<p class="judul" style="margin-bottom:1px;margin-top:1px;">
&nbsp;EDITING 
OVB</p>
<p class="judul" style="margin-bottom:1px;margin-top:1px;"><span lang="id">=============</span></p>
<form method="POST" action="ovb_prosesedit.php" name="formname" style="margin-top:1px;">
        <input type="hidden" name="nosipasli" class="standardteks" value="<?php echo $hasil['NO_SIP'];?>"  />
<table style="width: 60%;border-color:#FFCCFF;border-width:1px;border-color:green" align="center" border="0" align="center">
	<tr bgcolor="#CCFFFF">
		<td style="height: 14px;font-size: 20px;color:#3366FF;margin-left: 100px;" class="standardteks" colspan="3" >
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D A T A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O V B</td>
	</tr>
	<tr bgcolor="#CCFFFF">
		<td style="width: 21%; height: 14px" class="standardteks">&nbsp;&nbsp; Kode Rumah</td>
		<td style="height: 14px; width: 5px;" align="left" class="standardteks">:</td>
		<td style="height: 14px; width: 593px;" >
		<input class="standardteks" type="text" name="id_rumah" style="border-style:none;color:maroon;" value="<?php echo $hasil['ID_RUMAH'];?>" /></td>
	</tr>`

	<tr bgcolor="#CCFFFF">
		<td style="width: 21%; height: 23px;" class="standardteks">&nbsp;&nbsp; Alamat</td>
		<td style="width: 5px; height: 23px;" align="left" class="standardteks">:</td>
		<?php 
			$id_rumah=$hasil['ID_RUMAH'];
		    $perintah_rumah="SELECT ALAMAT,ID_KOMPLEK FROM tbl_rumah WHERE ID_RUMAH='$id_rumah' LIMIT 1;";
		    $sql_rumah=mysql_query($perintah_rumah,$conn);
			if(!$sql_rumah)
			die ("Cari alamat gagal");
		    $hasil_alamat=mysql_fetch_array($sql_rumah);
		    
		    $idkomplek=$hasil_alamat['ID_KOMPLEK'];
		    $perintah_komplek="SELECT KOMPLEK FROM tbl_komplek WHERE ID_KOMPLEK='$idkomplek';";
		    $sql_komplek=mysql_query($perintah_komplek,$conn);
			if(!$sql_komplek)
			die ("Cari komplek gagal");
		    $hasil_komplek=mysql_fetch_array($sql_komplek);
		?>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 23px; outline-color: #FFFFFF; width: 300px;">
	    <input size="20" name="alamat" class="standardteks" type="text" style="border-style:none;color:maroon; width: 273px;" value="<?php echo $hasil_alamat['ALAMAT'];?>" />
    	    <?php
		    
		?>
        <input class="standardteks" name="komplek" type="text" style="border-style:none;color:maroon;" value="<?php echo $hasil_komplek['KOMPLEK'];?>" /></td>
	</tr>
<tr bgcolor="#CCFFFF">
		<td style="width: 21%" class="standardteks">&nbsp;&nbsp;Tanggal OVB</td>
		<td style="width: 5px" class="standardteks">:</td>
		<?php 
			$tgl_ovb=$hasil['TGL_OVB'];
            
		?>
		<td class="standardteks" style="width: 593px">
        
        <select name="tanggal_ovb" class="standardteks">
		<?php 
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
			}?>
			
		</select>
		<select name="bulan_ovb" class="standardteks">

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
		
		<select name="tahun_ovb" class="standardteks">
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
		<td style="width: 21%; height: 4px;" class="standardteks">&nbsp;</td>
		<td style="width: 5px;" align="left" class="standardteks">&nbsp;</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 300px;">
	    &nbsp;</td>
	</tr>
	<tr style="background-color: #FFCCFF">
		<td style="height: 23px;font-size: 20px;color:#CC0099;border-color:#FFCCFF;" colspan="3" class="standardteks" align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D A R I</td>
	</tr>
	<tr style="background-color: #FFCCFF;border-color:#FFCCFF;border-style:solid">
	    <?php
	    
		    $nrp=$hasil['NRP_AWAL'];
		    
		    $perintah_penghuni="SELECT * FROM tbl_penghuni WHERE NRP='$nrp' LIMIT 1;";
		    $sql_penghuni=mysql_query($perintah_penghuni,$conn);
			if(!$sql_penghuni)
			     die ("Cari penghuni gagal");
		    $hasil_penghuni=mysql_fetch_array($sql_penghuni);
		?>
        
		<td style="width: 21%; height: 27px;" class="standardteks" >&nbsp;&nbsp; Nama Penghuni</td>
		<td style="width: 5px; height: 27px;" align="left" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px; height: 27px;">
	    <input name="nama_penghuni_awal"  onblur="javascript:ceknamapenghuni();" type="text" style="width: 221px" class="standardteks" value="<?php echo $hasil['NAMA_AWAL'];?>" /></td>
	</tr>
	
	<tr bgcolor="#FFCCFF">
		<td style="width: 21%" class="standardteks">&nbsp;&nbsp; Status</td>
		<td style="width: 5px;" align="left" class="standardteks">:</td>
		<td class="standardteks">
		<?php
			$idstatus=$hasil['KODE_STATUS_AWAL'];
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
							<input  onfocus="javascript:kembali();"onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)" name="status_awal" type="radio" value="<?php echo $hasil_status['KODE_STATUS'];?>3"  CHECKED="checked"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
	
					}else{
						?>
						<input  onfocus="javascript:kembali();"  name="status_awal" type="radio" onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)"  value="<?php echo $hasil_status['KODE_STATUS'];?>"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
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
	<tr bgcolor="#FFCCFF">
		<td style="width: 21%; height: 23px" class="standardteks">&nbsp;&nbsp; Pangkat / 
		Golongan</td>
		<td style="height: 23px; width: 5px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="nama_kat_awal"  class="standardteks" onchange="lebar()">
		<?php
			$pangkat=$hasil['KODE_KAT_AWAL'];
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
		 <select name="kode_korps_awal"  class="standardteks">
		<?php 
			$korps=$hasil['KODE_KORPS_AWAL'];
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
							<option class="standardteks" value="<?php echo $hasil_korps['KODE_KORPS'];?>"><?php echo $hasil_korps['KORPS'];?></option>										
			<?php	} 
				}
			
			if ($tanda==0){?>
				<option selected="selected" value="0">(pilih korps)</option>													
			<?php }	
			$tanda=0;
			?>
		</select></td>
	</tr>
	<tr bgcolor="#FFCCFF">
		<td style="width: 21%; height: 23px" class="standardteks">&nbsp;&nbsp; NRP / NIP</td>
		<td style="height: 23px; width: 5px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="NRP_tampil_awal" type="text" class="standardteks" style="width: 202px" class="standardteks" value="<?php	
		
		$hrfdepan=substr($hasil['NRP_AWAL'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo "";	
			}else{
				echo $hasil['NRP_AWAL'];} ?>" /></td>
        <input type="hidden" name="NRP" value="<?php echo $hasil['NRP'];?>"/>
	</tr>
	
	<tr bgcolor="#FFFFFF">
		<td style="width: 21%" class="standardteks">&nbsp;</td>
		<td style="width: 5px" class="standardteks">&nbsp;</td>
		<td class="standardteks" style="width: 593px">
        
        &nbsp;</td>
	</tr>
    <tr bgcolor="#CCFFCC">
		<td style="height: 23px;font-size: 20px;color:#336600" colspan="3" class="standardteks" align="left"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;K E P A D A</td>
	</tr>
	<tr bgcolor="#CCFFCC">
        
		<td style="width: 21%; height: 27px;" class="standardteks" style="border-left-color:lime;">&nbsp;&nbsp; Nama Penghuni</td>
		<td style="width: 5px; height: 27px;" align="left" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px; height: 27px;">
	    <input name="nama_penghuni_akhir"  onblur="javascript:ceknamapenghuni();" type="text" style="width: 221px" class="standardteks" value="<?php echo $hasil['NAMA_AKHIR'];?>" /></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 21%" class="standardteks">&nbsp;&nbsp; Status</td>
		<td style="width: 5px;" align="left" class="standardteks">:</td>
		<td class="standardteks">
		<?php
			$idstatus=$hasil['KODE_STATUS_AKHIR'];
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
							<input  onfocus="javascript:kembali();"   onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)" name="status_akhir" type="radio" value="<?php echo $hasil_status['KODE_STATUS'];?>1" checked="checked"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
	
					}else{
						?>
						<input  onfocus="javascript:kembali();"  name="status_akhir" type="radio" onclick="hideanggota(<?php echo $hasil_status['KODE_STATUS'];?>)"  value="<?php echo $hasil_status['KODE_STATUS'];?>2"/>&nbsp;<?php echo $hasil_status['STATUS'];?>&nbsp;&nbsp;&nbsp;&nbsp;
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
	<tr bgcolor="#CCFFCC">
		<td style="width: 21%; height: 23px" class="standardteks">&nbsp;&nbsp; Pangkat / 
		Golongan</td>
		<td style="height: 23px; width: 5px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="nama_kat_akhir"  class="standardteks" onchange="lebar()">
		<?php
			$pangkat=$hasil['KODE_KAT_AKHIR'];
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
		 <select name="kode_korps_akhir"  class="standardteks">
		<?php 
			$korps=$hasil['KODE_KORPS_AKHIR'];
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
							<option class="standardteks" value="<?php echo $hasil_korps['KODE_KORPS'];?>"><?php echo $hasil_korps['KORPS'];?></option>										
			<?php	} 
				}
			
			if ($tanda==0){?>
				<option selected="selected" value="0">(pilih korps)</option>													
			<?php }	
			$tanda=0;
			?>
		</select></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 21%; height: 23px" class="standardteks">&nbsp;&nbsp; NRP / NIP</td>
		<td style="height: 23px; width: 5px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="NRP_tampil_akhir" type="text" class="standardteks" style="width: 202px" class="standardteks" value="<?php	
		
		$hrfdepan=substr($hasil['NRP_AKHIR'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo "";	
			}else{
				echo $hasil['NRP_AKHIR'];} ?>" /></td>
        </tr>
	<tr bgcolor="#FFFFFF">
		<td style="width: 21%" class="standardteks">&nbsp;</td>
		<td style="width: 5px" class="standardteks">&nbsp;</td>
		<td class="standardteks" style="width: 593px">
        
        &nbsp;</td>
	</tr>
    </table>

<div class="standardteks" align="center">
		<br/>
		<input name="Simpan" type="submit" value="Simpan" class="standardteks"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="standardteks" /></div>
		
		
</form>

</body>

</html>
