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

<style type="text/css">
.auto-style2 {
	font-family: "Berlin Sans FB";
	font-size: large;
	text-align: center;
}
.auto-style3 {
	font-family: "Berlin Sans FB";
	font-size: 15px;
	text-align: center;
	text-align: center;
}
.auto-style5 {
	text-align: center;
}
.auto-style6 {
	font-family: "Berlin Sans FB";
	font-size: 15px;
}
</style>

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
			die ("Perintah gagal 1");
			
	$hasil=mysql_fetch_array($sql);
?>
<p class="judul" style="margin-bottom:1px;margin-top:1px;">SURAT IZIN PENGHUNIAN RUMNEG TNI AL</p>
<form method="POST" action="sip_update_aksi.php" name="formname" style="margin-top:1px;">
<table style="width: 60%; " align="center" border="0">
	<tr bgcolor="#EEFDF3">
		<td style="width: 19%; height: 26px" class="standardteks">Kode Rumah</td>
		<td style="height: 26px; width: 19px;" align="left" class="standardteks">:</td>
		<td style="height: 26px; width: 593px;" ><input class="standardteks" type="text" name="id_rumah" style="border-style:none;color:maroon;" value="<?php echo $id_rumah;?>" /></td>
	</tr>`

	<tr bgcolor="#EEFDF3">
		<td style="width: 19%; height: 4px;" class="standardteks">Alamat</td>
		<td style="width: 19px;" align="left" class="standardteks">:</td>
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
		<td style="height: 22px; width: 19px;" align="left" class="standardteks">
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
			<?php }else{ ?>
				<option value="<?php echo $d;?>"><?php echo $d;?></option>
				<?php }
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
				} ?>		

		
		</select>
		
		<select name="tahun_ovb" class="standardteks" style="visibility: hidden;">
			<option value="06">2006</option>
			<option value="07">2007</option>
			<option value="08">2008</option>
			<option value="09">2009</option>
			<option value="10">2010</option>
			<option value="11">2011</option>
			<option value="12">2012</option>
			<option value="13">2013</option>
			<option value="14">2014</option>
			<option value="15">2015</option>
			<option value="16">2016</option>
			<option value="17">2017</option>
			<option value="18" selected="selected">2018</option>
			<option value="19">2019</option>
			<option value="20">2020</option>
		</select>
        
        
        </td>
 
	</tr>
	<tr>
		<td></td>
		<td style="width: 19px" ></td>
		<td></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%; height: 22px;" ></td>
		<td style="width: 19px; height: 22px;" ></td>
		<td class="standardteks" style="width: 593px;color:blue; height: 22px;">INFORMASI SIP </td>
	</tr>
    <tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Nomor SIP</td>
		<td style="width: 19px" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px">
		<input type="text" name="nosip" class="standardteks" value="<?php if(substr($hasil['NO_SIP'],-4)=="9999"){echo "";}else{echo $hasil['NO_SIP'];}
        ?>"  /> Nomor / ddmmyy
        <input type="hidden" name="nosipasli" class="standardteks" value="<?php echo $hasil['NO_SIP'];?>"  />
		<input type="hidden" name="nouruttblsip" class="standardteks" value="<?php echo $hasil['NO_URUTSIP']; ?>" />
    </tr>
	<tr bgcolor="#E1FFFF">
	    <?php
		    $nrp=$hasil['NRP'];
		    $perintah_penghuni="SELECT * FROM tbl_penghuni WHERE NRP='$nrp' LIMIT 1;";
		    $sql_penghuni=mysql_query($perintah_penghuni,$conn);
			if(!$sql_penghuni)
			     die ("Cari penghuni gagal");
		    $hasil_penghuni=mysql_fetch_array($sql_penghuni);
            
            if (eregi("blacklist",$hasil_penghuni['NAMA_PENGHUNI']) & $_SESSION['user']<>"Kasirum"){
				
                ?>
                <script type="text/javascript">
                alert ("BLACKLIST, Mhn Laporan Kasirum dulu BRO......")
                window.history.back()
                </script>
                <?php
				
            }else{
		?>
        
		<td style="width: 19%" class="standardteks">Nama Penghuni</td>
		<td style="width: 19px" align="left" class="standardteks">:</td>
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
		<td style="height: 23px; width: 19px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<select name="nama_kat"  class="standardteks" onchange="lebar()">
		<?php
			$pangkat=$hasil_penghuni['KODE_KAT'];
			$prnth_kat="SELECT * FROM tbl_pangkat";
			$sql_kat=mysql_query($prnth_kat,$conn);
				if (! $sql_kat) 
				die ("Perintah gagal 2");
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
			
			if ($tanda==0){ ?>
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
			
			if ($tanda==0){ ?>
				<option selected="selected" value="0">(pilih korps)</option>													
			<?php }	
			$tanda=0;
			?>
		</select></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%; height: 23px" class="standardteks">NRP / NIP</td>
		<td style="height: 23px; width: 19px;" align="left" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="NRP_tampil" type="text" class="standardteks" style="width: 202px" class="standardteks" value="<?php	
		
		$hrfdepan=substr($hasil['NRP'],0,2);
		
		if($hrfdepan=="NA") 
			{
				echo "";	
			}else{
				echo $hasil['NRP'];	
			} ?>"/></td>
        <input type="hidden" name="NRP" value="<?php echo $hasil['NRP'];?>"/>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Jabatan</td>
		<td style="width: 19px" class="standardteks">:</td>
		<td class="style17" style="width: 593px">
		<input name="jabatan" type="text" style="width: 296px" class="standardteks" value="<?php echo $hasil_penghuni['JABATAN'];?>"/></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Satker</td>
		<td style="width: 19px" class="standardteks">:</td>
		<td class="standardteks" style="width: 593px"><input name="satker" type="text" style="width: 296px" class="standardteks" value="<?php echo $hasil_penghuni['SATKER'];?>"/></td>
	</tr>
	<tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Tanggal Berlaku</td>
		<td style="width: 19px" class="standardteks">:</td>
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
			<?php }else{ ?>
				<option value="<?php echo $d;?>"><?php echo $d;?></option>
				<?php }
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
					<?php }

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
				} ?>		

		
		</select>
		
		        
        <?php
        if(substr($tgl_berlaku,4,1)==9){
            $cetak ="19".substr($tgl_berlaku,4,2);
           }else{
            $cetak ="20".substr($tgl_berlaku,4,2);
          }
		  $tahunsekarang=getdate();
		  
        ?>
		<input name="tahun_berlaku" type="text" value="<?php echo $tahunsekarang['year'];?>" size="4" class="standardteks"  />
		
		</td>
	</tr>
    <tr bgcolor="#E1FFFF">
		<td style="width: 19%" class="standardteks">Sewa</td>
		<td style="width: 19px" class="standardteks">:</td>
		
		<td style="width: 593px" class="standardteks">
        <select name="sewa" class="standardteks">
        <?php 
        if($hasil_penghuni['SEWA']=="0"){?>
        <option value="1">Tidak Dikenai</option>
		<option value="2">Sudah Bayar</option>
		<option value="3">Belum Bayar</option>
		<option selected="selected" value="0">-</option>
        <?php  
        }
        if($hasil_penghuni['SEWA']=="1"){?>
        <option value="1" selected="selected">Tidak Dikenai</option>
		<option value="2">Sudah Bayar</option>
		<option value="3">Belum Bayar</option>
		<option value="0">-</option>
        <?php     
        } if($hasil_penghuni['SEWA']=="2"){?>
        <option value="1">Tidak Dikenai</option>
		<option value="2" selected="selected" >Sudah Bayar</option>
		<option value="3">Belum Bayar</option>
		<option value="0">-</option><?php 
        }
        if($hasil_penghuni['SEWA']=="3"){?>
        <option value="1">Tidak Dikenai</option>
		<option value="2" >Sudah Bayar</option>
		<option value="3" selected="selected" >Belum Bayar</option>
		<option value="0">-</option>
        <?php 
        }
        ?>
  
        </select>
		</td>
	</tr>
    </table><table border="0" colspan="1">
	<tr bgcolor="#E1FFFF">
		<td style="width: 20%" bgcolor="#FFFFFF"></td>
		<td style="width: 11%" class="standardteks">Telepon</td>
		<td style="width: 19px" class="standardteks">&nbsp;&nbsp;:</td>
		<td style="width: 593px" class="standardteks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="telepon" type="text"  class="standardteks"/>	</td>
		<td style="width: 7%" class="standardteks">Foto Penghuni</td>
		<td style="width: 19px" class="standardteks">:</td>
		<td style="width: 593px" class="standardteks"><input name="foto_penghuni" type="file"  class="standardteks"/>&nbsp;&nbsp;
		<td style="width: 20%" bgcolor="#FFFFFF"></td>
		</td>
	</tr>
	</table>
	<table style="width: 80%; " align="center" border="0">
	<tr bgcolor="#EEFDF3">
		<td style="height: 26px" class="auto-style2" colspan="6">INFORMASI&nbsp; KELUARGA</td>
	</tr>`
	<tr bgcolor="#CEF7D6">
		<td class="auto-style3" style="width: 256px">NAMA KELUARGA</td>
		<td class="auto-style3">GENDER</td>
		<td class="auto-style3">TEMPAT LAHIR</td>
		<td class="auto-style6">TGL LAHIR</td>
		<td style="width: 75px" class="auto-style3">HUBUNGAN KELUARGA</td>
		<td class="auto-style3">KET</td>
	</tr>
	<?php
	$prnth="SELECT * FROM tbl_keluarga WHERE NRP='$nrp' ORDER BY ID_KELUARGA ASC;";
 		 
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal 3");
		
	$jmlkeluarga=0;
    $namakel=array();    
	$gend=array();
	$tmptlahir=array();
	$tgllhr=array();
	$blnlhr=array();
	$thnlhr=array();
	$hubkel=array();
	$kete=array();
	while($datakeluarga=mysql_fetch_array($sql)){
		$jmlkeluarga++;
        $namakel[$jmlkeluarga]=$datakeluarga[2];
        $gend[$jmlkeluarga]=$datakeluarga[3];
        $tmptlahir[$jmlkeluarga]=$datakeluarga[4];
        $tgllhr[$jmlkeluarga]=substr($datakeluarga[5],0,2);
        $blnlhr[$jmlkeluarga]=substr($datakeluarga[5],2,2);
        $thnlhr[$jmlkeluarga]=substr($datakeluarga[5],4,4);
        $hubkel[$jmlkeluarga]=$datakeluarga[6];
        $kete[$jmlkeluarga]=$datakeluarga[7];
	}
	
    // BARIS KELUARGA KE SATU
    ?>
    
 
    
	<tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga1" type="text" value="<?php 
        if  ($jmlkeluarga<>0){
            echo $namakel[1];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender1" class="standardteks">
        <?php 
        if($jmlkeluarga>=1){
            if($gend[1]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option selected value=Pr>Perempuan</option>";
               echo "<option value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir1" type="text" value="<?php 
        if ($jmlkeluarga<>0){
           echo $tmptlahir[1];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir1">

		<?php 
            if ($jmlkeluarga<>0){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[1]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir1" class="standardteks">

		<?php 
        if ($jmlkeluarga==0){
           ?>
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}else{
			if($blnlhr[1]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[1]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[1]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[1]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[1]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[1]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[1]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[1]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[1]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if($blnlhr[1]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[1]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[1]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }   ?>		
		
		</select> 
		<input name="thnlahir1" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=1){
           echo $thnlhr[1];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan1" class="standardteks">
		<?php 
        if ($jmlkeluarga==0){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }else{
            if($hubkel[1]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[1]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[1]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[1]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket1" value="<?php 
        if ($jmlkeluarga<>0){
                if($kete[1]=="0"){
                    echo "";
                }else{
                    echo $kete[1];    
                }    
        }else{
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>

<?php 
//BARIS KELUARGA KE DUA
?>

<tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga2" type="text" value="<?php 
        if  ($jmlkeluarga>=2){
            echo $namakel[2];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender2" class="standardteks">
        <?php 
        if($jmlkeluarga>=2){
            if($gend[2]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option value=Pr>Perempuan</option>";
               echo "<option selected value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir2" type="text" value="<?php 
        if ($jmlkeluarga>=2){
           echo $tmptlahir[2];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir2">

		<?php 
            if ($jmlkeluarga>=2){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[2]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir2" class="standardteks">

		<?php 
        if ($jmlkeluarga>=2){
            
			if($blnlhr[2]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[2]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[2]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[2]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[2]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[2]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[2]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[2]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[2]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if($blnlhr[2]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[2]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[2]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }  else{ ?>		
		
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}
        ?>
        
		</select> 
		<input name="thnlahir2" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=2){
           echo $thnlhr[2];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan2" class="standardteks">
		<?php 
        if ($jmlkeluarga>=2){
              if($hubkel[2]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }

            if($hubkel[2]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[2]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[2]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }else{
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option  selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket2" value="<?php 
        if ($jmlkeluarga>=2){
                if($kete[2]=="0"){
                    echo "";
                }else{
                    echo $kete[2];    
                }    
        }else{  
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>
    <?php 
    //BARIS KELUARGA KE TIGA
    ?>
    <tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga3" type="text" value="<?php 
        if  ($jmlkeluarga>=3){
            echo $namakel[3];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender3" class="standardteks">
        <?php 
        if($jmlkeluarga>=3){
            if($gend[3]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option value=Pr>Perempuan</option>";
               echo "<option selected value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir3" type="text" value="<?php 
        if ($jmlkeluarga>=3){
           echo $tmptlahir[3];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir3">

		<?php 
            if ($jmlkeluarga>=3){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[3]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir3" class="standardteks">

		<?php 
        if ($jmlkeluarga>=3){
            
			if($blnlhr[3]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[3]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[3]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[3]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[3]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[3]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[3]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[3]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[3]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if($blnlhr[3]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[3]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[3]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }  else{ ?>		
		
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}
        ?>
        
		</select> 
		<input name="thnlahir3" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=3){
           echo $thnlhr[3];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan3" class="standardteks">
		<?php 
        if ($jmlkeluarga>=3){
              if($hubkel[3]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[3]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[3]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[3]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }else{
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option  selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket3" value="<?php 
        if ($jmlkeluarga>=3){
                if($kete[3]=="0"){
                    echo "";
                }else{
                    echo $kete[3];    
                }    
        }else{  
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>
    <?php
    //BARIS KELUARGA KE EMPAT
	?>
     <tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga4" type="text" value="<?php 
        if  ($jmlkeluarga>=4){
            echo $namakel[4];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender4" class="standardteks">
        <?php 
        if($jmlkeluarga>=4){
            if($gend[4]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option value=Pr>Perempuan</option>";
               echo "<option selected value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir4" type="text" value="<?php 
        if ($jmlkeluarga>=4){
           echo $tmptlahir[4];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir4">

		<?php 
            if ($jmlkeluarga>=4){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[4]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir4" class="standardteks">

		<?php 
        if ($jmlkeluarga>=4){
            
			if($blnlhr[4]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[4]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[4]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[4]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[4]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[4]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[4]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[4]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[4]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if($blnlhr[4]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[4]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[4]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }  else{ ?>		
		
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}
        ?>
        
		</select> 
		<input name="thnlahir4" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=4){
           echo $thnlhr[4];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan4" class="standardteks">
		<?php 
        if ($jmlkeluarga>=4){
              if($hubkel[4]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[4]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[4]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[4]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }else{
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option  selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket4" value="<?php 
        if ($jmlkeluarga>=4){
                if($kete[4]=="0"){
                    echo "";
                }else{
                    echo $kete[4];    
                }    
        }else{  
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>
    
    <?php
	// BARIS KELUARGA KE LIMA
	?>
	
     <tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga5" type="text" value="<?php 
        if  ($jmlkeluarga>=5){
            echo $namakel[5];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender5" class="standardteks">
        <?php 
        if($jmlkeluarga>=5){
            if($gend[5]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option value=Pr>Perempuan</option>";
               echo "<option selected value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir5" type="text" value="<?php 
        if ($jmlkeluarga>=5){
           echo $tmptlahir[5];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir5">

		<?php 
            if ($jmlkeluarga>=5){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[5]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir5" class="standardteks">

		<?php 
        if ($jmlkeluarga>=5){
            
			if($blnlhr[5]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[5]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[5]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[5]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[5]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[5]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[5]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[5]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[5]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}


						if($blnlhr[5]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[5]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[5]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }  else{ ?>		
		
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}
        ?>
        
		</select> 
		<input name="thnlahir5" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=5){
           echo $thnlhr[5];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan5" class="standardteks">
		<?php 
        if ($jmlkeluarga>=5){
              if($hubkel[5]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[5]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[5]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[5]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }else{
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option  selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket5" value="<?php 
        if ($jmlkeluarga>=5){
                if($kete[5]=="0"){
                    echo "";
                }else{
                    echo $kete[5];    
                }    
        }else{  
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>
	<?
	//BARIS KELUARGA ENAM
	?>
	
     <tr bgcolor=#F1E0DA style="height:40px">
		<td style="width: 256px" class="auto-style5">
		<input name="namakeluarga6" type="text" value="<?php 
        if  ($jmlkeluarga>=6){
            echo $namakel[6];    
        }else{
            echo "";
        }  
       ?>"  class="standardteks" style="width: 224px"  maxlength="27" size="27"/></td>
		<td class="auto-style5"><select name="gender6" class="standardteks">
        <?php 
        if($jmlkeluarga>=6){
            if($gend[6]=="Pr") {
                echo "<option selected value=Pr>Perempuan</option>";
                echo "<option value=Lk>Laki-laki</option>";
            }else{
                echo "<option value=Pr>Perempuan</option>";
                echo "<option selected value=Lk>Laki-laki</option>";
            }
        }else{
               echo "<option value=Pr>Perempuan</option>";
               echo "<option selected value=Lk>Laki-laki</option>";
        }
        ?>
		
		</select>&nbsp;</td>
		<td class="auto-style5">
		<input name="tempatlahir6" type="text" value="<?php 
        if ($jmlkeluarga>=6){
           echo $tmptlahir[6];    
        }else{
            echo "";
        }  
        //$tanggallahir1=substr($tgllahir1,0,2);
//        echo $gend[1].$blnlhr[1].$thnlhr[1];
        ?>" class="standardteks" style="width: 170px"/></td>
		<td><select name="tgllahir6">

		<?php 
            if ($jmlkeluarga>=6){
                for ($tt=1;$tt<=31;$tt++){
                    if ($tgllhr[6]==$tt){
                        if($tt<10){ 
                            echo "<option value=0".$tt." selected>0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt." selected>".$tt."</option>";
                        }
                    }else{
                        if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                        }
                    }
                }   
            }else{
                for ($tt=1;$tt<=31;$tt++){
                  if($tt<10){
                            echo "<option value=0".$tt.">0".$tt."</option>";
                        }else{
                            echo "<option value=".$tt.">".$tt."</option>";
                     }      
                }
            }  
        ?>
		</select>&nbsp;<select name="bulanlahir6" class="standardteks">

		<?php 
        if ($jmlkeluarga>=6){
            
			if($blnlhr[6]=="01")
				{
					?>
					<option value="01" selected="selected">Januari</option>
					<?php 
				}else{
					?>
					<option value="01">Januari</option>		
					<?php
				}
				
			if($blnlhr[6]=="02")
				{
					?>
					<option value="02" selected="selected">Februari</option>
					<?php 
				}else{
					?>
					<option value="02">Februari</option>		
					<?php
				}

					if($blnlhr[6]=="03")
				{
					?>
					<option value="03" selected="selected">Maret</option>
					<?php 
				}else{
					?>
					<option value="03">Maret</option>		
					<?php
				}
				
			if($blnlhr[6]=="04")
				{
					?>
					<option value="04" selected="selected">April</option>
					<?php 
				}else{
					?>
					<option value="04">April</option>		
					<?php
				}

				if($blnlhr[6]=="05")
				{
					?>
					<option value="05" selected="selected">Mei</option>
					<?php 
				}else{
					?>
					<option value="05">Mei</option>		
					<?php
				}
				
						if($blnlhr[6]=="06")
				{
					?>
					<option value="06" selected="selected">Juni</option>
					<?php 
				}else{
					?>
					<option value="06">Juni</option>		
					<?php
				}
		
			if($blnlhr[6]=="07")
				{
					?>
					<option value="07" selected="selected">Juli</option>
					<?php 
				}else{
					?>
					<option value="07">Juli</option>		
					<?php }

			if($blnlhr[6]=="08")
				{
					?>
					<option value="08" selected="selected">Agustus</option>
					<?php 
				}else{
					?>
					<option value="08">Agustus</option>		
					<?php
				}

			if($blnlhr[6]=="09")
				{
					?>
					<option value="09" selected="selected">September</option>
					<?php 
				}else{
					?>
					<option value="09">September</option>		
					<?php
				}
						if($blnlhr[6]=="10")
				{
					?>
					<option value="10" selected="selected">Oktober</option>
					<?php 
				}else{
					?>
					<option value="10">Oktober</option>		
					<?php
				}

						if($blnlhr[6]=="11")
				{
					?>
					<option value="11" selected="selected">Nopember</option>
					<?php 
				}else{
					?>
					<option value="11">Nopember</option>		
					<?php
				}

						if($blnlhr[6]=="12")
				{
					?>
					<option value="12" selected="selected">Desember</option>
					<?php 
				}else{
					?>
					<option value="12">Desember</option>		
					<?php
				} 
            }  else{ ?>		
		
           <option value="01" selected="selected">Januari</option>
           <option value="02">Februari</option>
           <option value="03">Maret</option>
           <option value="04">April</option>
           <option value="05">Mei</option>
           <option value="06">Juni</option>
           <option value="07">Juli</option>
           <option value="08">Agustus</option>
           <option value="09">September</option>
           <option value="10">Oktober</option>
           <option value="11">Nopember</option>
           <option value="12">Desember</option>
           <?php    
		}
        ?>
        
		</select> 
		<input name="thnlahir6" size="4" type="text" maxlength="4" class="standardteks" value="<?php 
        if ($jmlkeluarga>=6){
           echo $thnlhr[6];    
        }else{
            echo "";
        }          
        ?>" style="width: 45px"/></td>
		<td style="width: 75px"><select name="hubungan6" class="standardteks">
		<?php 
        if ($jmlkeluarga>=6){
              if($hubkel[6]=="Istri"){
                echo "<option selected value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[6]=="Suami"){
                echo "<option value=Istri>Istri</option>";
                echo "<option selected value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[6]=="ak"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";                
            }
            
            if($hubkel[6]=="at"){
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option value=ak>Anak Kandung</option>";
		        echo "<option selected value=at>Anak Tiri</option>";                
            }
          }else{
                echo "<option value=Istri>Istri</option>";
                echo "<option value=Suami>Suami</option>";
		        echo "<option selected value=ak>Anak Kandung</option>";
		        echo "<option value=at>Anak Tiri</option>";  
        }
        ?>
        
		</select></td>
		<td class="auto-style5">
		<input name="ket6" value="<?php 
        if ($jmlkeluarga>=6){
                if($kete[6]=="0"){
                    echo "";
                }else{
                    echo $kete[6];    
                }    
        }else{  
            echo "";
        } 
        ?>" type="text" class="standardteks" size="20" style="width: 85px" /></td>
	</tr>
	</table>
	&nbsp;<div class="standardteks" align="center">
		<input name="Simpan" type="submit" value="Simpan" class="standardteks"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="standardteks" /></div>
		
		
</form>
<?php
}
?>
</body>

</html>