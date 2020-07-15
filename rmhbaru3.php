<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Penambahan Data Rumah Negara </title>
<style type="text/css">
@import url("a");

.style1 {
	text-align: center;
	font-family: "Palatino Linotype";
}
.style4 {
	font-size: x-small;
}
.style5 {
	margin-right: 0px;
}
.style6 {
	text-align: center;
	font-size: x-small;
}
.style7 {
	margin-left: 0px;
}
.style8 {
	font-family: "Book Antiqua";
}
.style9 {
	font-size: xx-small;
}
.style10 {
	font-size: medium;
}
.style11 {
	font-size: small;
}
.style14 {
	font-family: "Goudy Old Style";
}
.style16 {
	font-family: Gisha;
}
.style17 {
	font-family: Gisha;
	font-size: small;
}
.style18 {
	font-family: "Book Antiqua";
	font-size: small;
	text-align: right;
}
a:link {
	text-decoration:none;
	}
a:visited {
	text-decoration:none;
	}
	
a:hover {
	font-weight:bold;
}

}
.style21 {
	font-size: x-small;
	color: #FFFFFF;
	}
.style26 {
	font-family: Gisha;
	font-size: small;
	background-color: #FFFFFF;
}
.style28 {
	font-family: Gisha;
	background-color: #FFFFFF;
}
.style29 {
	background-color: #FFFFFF;
}
.style30 {
	font-family: Gisha;
	border: 0cm none #FFFFFF;
	padding: 0px;
	clear: none;
	width: 0px;
	color: #FFFFFF;
	text-decoration: none;
}
.style31 {
	font-family: Gisha;
	color: #0000FF;
}
.style33{
	border-style:none;
	background:#FFFFFF;
	
}

.style34 {
	font-family: Gisha;
	background-color: #FFFFFF;
	color: #0000FF;
}

</style>
<?php 
	//$komplek=Array();
?>

<script type="text/javascript" language="javascript">
	function tampilpenghuni(){
			document.getElementById("namapnghni").type = "text"		
	}

	function hidepenghuni(){
			document.getElementById("namapnghni").type = "hidden"		
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

	function hapusisi(){
			document.getElementById("namapnghni").value = ""
	}
	
	function kdrmh()
	{
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].text
		var k=10;
		var t=0;
		
		for (x=0;x<=9;x++)
			{	
				if (pilihankmplk==komplekJS[x])
				{
					jmlpenghuniJS[x]=jmlpenghuniJS[x]+1;
					document.getElementById("koderumah").value=kodee[x]+jmlpenghuniJS[x];		
					jmlpenghuniJS[x]=jmlpenghuniJS[x]-1;
					t=1;			
				}
			}
		
		if (t==0){
				document.getElementById("koderumah").value=' ';		
		}
		t=0;
		
		//alert(komplekJS[k]);	
	}
		
	/*	var MyJSStringVar = "<?php Print($komplek[1]); ?>"; 
        alert(MyJSStringVar);	*/
		alert(komplekJS[6]);
		if (pilihankmplk==komplekJS[6])
			{
				alert('cocok')
			}
				
		/*var komplekJS = "<?php Print($komplek[2]); ?>"; 
		var MyJSStringVar = "<?php Print($komplek[0]); ?>"; 
   		var jmlpenghuniJS[x] = <?php Print($jml_penghuni); ?>; 		*/
		
		
</script>


<link href="a" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 

//koneksi ke mysql

$host="localhost";
$user="root";
$password="";
$dbnm="sigar";
$conn=mysql_connect($host,$user,$password);
if ($conn) {
	$buka=mysql_select_db($dbnm);
	if(!$buka){
		die ("database tidak dapat dibuka");
	}
}else{
	die ("server mysql tidak terhubung");
}


?>
<p class="style18"><a href="index.php"><span class="style16">Home</span></a><span class="style8"> 
</span>  
<span lang="id" class="style16">|</span><span class="style8"><span class="style16">|<span lang="id"> 
Administrasi ||</span> </span> </span> <a href="login.php">
<span class="style16">Keluar</span></a><span class="style8"></span></p>
<p class="style1"><span class="style10"><strong>DATA RUMAH NEGARA<span lang="id"> 
TNI AL</span><br />
WILAYAH SURABAYA<br />
</strong><span lang="id">---------------------------------------------------</span></span></p>
<form method="POST" action="tmbhrmh_action.php">
<table style="width: 90%" class="style11" align="center">
	<tr>
		<td style="width: 160px; height: 26px" class="style26">Komplek</td>
		<td style="height: 26px; width: 1px;">:</td>
		<td style="height: 26px; width: 593px;" class="style17">
		<?php
		$perintah="SELECT komplek,count(*) as jml_rumah FROM tbl_rumah group by komplek";
		$sql=mysql_query($perintah);
	
		$x=0;
		while ($hasil = mysql_fetch_array($sql)) { 
			 $komplek[$x]=$hasil[0];
			 $jml_penghuni[$x]=$hasil[1];
			$x=$x+1;
		}
				
		/*echo $komplek[5];
		$posisii=array_search('HANGTUAH',$komplek);
		$hasil=mysql_fetch_row($sql);
		echo $hasil[1];
		echo $posisii;
		$komplek_select='<script language="JavaScript" type="text/JavaScript">;
							document.write(MyJSStringVar);
						</script>';				
		echo $komplek_select;*/
		
		
		?>
		<script type="text/javascript" language="javascript">
			komplekJS=new Array(10)
			jmlpenghuniJS=new Array(10)
			
			komplekJS[0] = "<?php Print($komplek[0]); ?>"; 
			komplekJS[1] = "<?php Print($komplek[1]); ?>"; 
			komplekJS[2] = "<?php Print($komplek[2]); ?>"; 
			komplekJS[3] = "<?php Print($komplek[3]); ?>"; 
			komplekJS[4] = "<?php Print($komplek[4]); ?>"; 
			komplekJS[5] = "<?php Print($komplek[5]); ?>"; 
			komplekJS[6] = "<?php Print($komplek[6]); ?>"; 
			komplekJS[7] = "<?php Print($komplek[7]); ?>"; 
			komplekJS[8] = "<?php Print($komplek[8]); ?>"; 
			komplekJS[9] = "<?php Print($komplek[9]); ?>"; 
			
			jmlpenghuniJS[0]=<?php Print($jml_penghuni[0]); ?>;
			jmlpenghuniJS[1]=<?php Print($jml_penghuni[1]); ?>;
			jmlpenghuniJS[2]=<?php Print($jml_penghuni[2]); ?>;
			jmlpenghuniJS[3]=<?php Print($jml_penghuni[3]); ?>;
			jmlpenghuniJS[4]=<?php Print($jml_penghuni[4]); ?>;
			jmlpenghuniJS[5]=<?php Print($jml_penghuni[5]); ?>;
			jmlpenghuniJS[6]=<?php Print($jml_penghuni[6]); ?>;
			jmlpenghuniJS[7]=<?php Print($jml_penghuni[7]); ?>;
			jmlpenghuniJS[8]=<?php Print($jml_penghuni[8]); ?>;
			jmlpenghuniJS[9]=<?php Print($jml_penghuni[9]); ?>;
			
			var kodee=new Array(10)
				kodee[0]='DBL'
				kodee[1]='GDG'	
				kodee[2]='HTH'	
				kodee[3]='JDA'	
				kodee[4]='KNJ'	
				kodee[5]='LKM'	
				kodee[6]='PNG'	
				kodee[7]='SKL'	
				kodee[8]='TTK'	
				kodee[9]='WNS'	
			
			for (d=0;d<=9;d++)
				{
					komplekJS[d]=komplekJS[d].toUpperCase()
				}
				
			//besar=nama.toUpperCase()
			//alert(komplekJS[6]);
						
		</script>
		
		&nbsp;<select name="pilihankomplek" style="width: 146px" onchange="kdrmh(komplekJS)" id="kmplk">
		<option>(pilih komplek)</option>
		<?php
			$perintah="SELECT * FROM tbl_komplek";
			$sql=mysql_query($perintah);
			while ($hasil = mysql_fetch_array($sql)) { 
		?>		
		<option><?php echo $hasil[1];?></option>
		<?php }?>
		</select></td>
	</tr>`

	<tr>
		<td style="width: 160px; height: 4px;" class="style26">Kode Rumah</td>
		<td style="width: 1px; height: 4px" class="style4">:</td>
	  <td class="style30" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 593px;">

		  <span lang="id">&nbsp; </span>
				<input name="kode_rumah" type="text" id="koderumah" class="style33" readonly="readonly"/>
		  </td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style6">&nbsp;</td>
		<td class="style31" style="width: 593px"><strong>DATA PENGHUNI</strong></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 28px;" class="style26">Nama<span lang="id"> 
		Personel </span></td>
		<td style="width: 1px; height: 28px;" class="style4">:</td>
		<td class="style17" style="height: 28px; width: 593px;">
			<input name="nama_anggota" type="text" style="width: 298px;"/>
			<span lang="id">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
			</span>
			<input name="nama_penghuni" type="hidden" style="width: 204px" value="(Nama Penghuni)" id="namapnghni" onFocus="hapusisi()"/></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Status</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px"><span class="style8">
		<span class="style9"><span class="style4"><span class="style14">
		<span class="style16"><span class="style11">
		<input name="status" type="radio" value=1 checked="checked" onchange="hidepenghuni()" /></span></span></span></span></span></span><span class="style17">Aktif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11">
		<input name="status" type="radio" value=2 onchange="hidepenghuni()"/></span></span></span></span></span></span><span class="style17">Purnawirawan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8">
		<span class="style9"><span class="style4"><span class="style14">
		<span class="style16"><span class="style11">
		<input name="status" type="radio" style="width: 22px" value=3 onchange="hidepenghuni()"/></span></span></span></span></span></span><span class="style17">Wredatama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11">
		<input name="status" type="radio" value=4 onchange="tampilpenghuni()" /></span></span></span></span></span></span><span class="style17">Wari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11">
		<input name="status" type="radio" value=5 onchange="tampilpenghuni()" /></span></span></span></span></span></span><span class="style17">Janda&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11">
		<input name="status" type="radio" style="height: 20px" value=6 onchange="tampilpenghuni()" /></span></span></span></span></span></span><span class="style17">Duda</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Pangkat, Korps</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		
		<select name="pangkat_penghuni" style="width: 178px">
		<option selected="selected">(Pilih Pangkat)</option>
		<?php
		$prnth="SELECT * FROM tbl_pangkat";
		$sqlpngkt=mysql_query($prnth);
		while ($pngkt = mysql_fetch_array($sqlpngkt)) { 
				?>		
		<option value="<?php echo $pngkt[0];?>"><?php echo $pngkt[1];?></option>
		<?php }?>
		</select><span lang="id"> Korps&nbsp;
			<select name="korps_penghuni" style="width: 68px">
		<option selected="selected">(Korps)</option>
		<?php
		$prnth="SELECT * FROM tbl_korps";
		$sqlkorps=mysql_query($prnth);
		while ($korps = mysql_fetch_array($sqlkorps)) { 
				?>		
		<option value="<?php echo $korps[0];?>"><?php echo $korps[1];?></option>
		<?php }?>
		</select></span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">NRP / NIP</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="NIP" type="text" style="width: 148px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Satker</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="satker" type="text" style="width: 275px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Tempat<span lang="id"> 
		Lahir</span></td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="tempat_lahir" type="text" style="width: 114px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span lang="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Tanggal Lahir</span>&nbsp;
		<input name="tgl_lahir" type="text" style="width: 64px" /><span lang="id">
		</span>ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 160px; height: 26px;" class="style28"><span lang="id">
		Agama</span></td>
		<td style="width: 1px; height: 26px;" class="style4"><span lang="id">:</span></td>
		<td class="style17" style="height: 26px; width: 593px;">
		<select name="agama">
		<option selected="selected">Islam</option>
		<option>Protestan</option>
		<option>Katolik</option>
		<option>Hindu</option>
		<option>Budha</option>
		<option>Kong Hu Chu</option>
		</select>&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 160px; height: 26px;" class="style28">Telepon</td>
		<td style="width: 1px; height: 26px;" class="style4">:</td>
		<td class="style17" style="height: 26px; width: 593px;">
		<input name="telepon" type="text" style="width: 168px" /></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px;" class="style28">Foto Penghuni</td>
		<td style="width: 1px; height: 23px"><span lang="id">:</span></td>
		<td style="height: 23px; width: 593px;" class="style17">
		<input name="foto_penghuni" type="file" style="width: 290px" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style31" style="width: 593px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style31" style="width: 593px"><strong>DATA RUMAH</strong></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Alamat</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="alamat" type="text" style="width: 327px" /></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px" class="style28">Golongan</td>
		<td style="height: 23px; width: 1px;" class="style4">:</td>
		<td style="height: 23px; width: 593px;" class="style17"><span class="style8">
		<span class="style9"><span class="style4"><span class="style14">
		<span class="style16"><span class="style11">
		<input name="golongan" type="radio" /></span></span></span></span></span></span><span class="style17">I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11">
		<input name="golongan" type="radio" checked="checked" value="II" /></span></span></span></span></span></span><span class="style17">II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
		<span class="style8"><span class="style9"><span class="style4">
		<span class="style14"><span class="style16"><span class="style11"><input name="golongan" type="radio" /></span></span></span></span></span></span><span class="style17">IIA</span></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px" class="style28">Tahun Pembuatan</td>
		<td style="height: 23px; width: 1px;" class="style4"><span lang="id">:</span></td>
		<td style="height: 23px; width: 593px;" class="style17">
		<input name="tahun_buat" type="text" size="4" /></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 23px" class="style28">Asal Perolehan</td>
		<td style="height: 23px; width: 1px;" class="style4">:</td>
		<td style="height: 23px; width: 593px;" class="style17">
		<input name="asal_perolehan" type="text" class="style5" style="width: 202px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Luas Bangunan</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="luas_bangunan" type="text" style="width: 34px" /> M2&nbsp;&nbsp;
		<span lang="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Luas Tanah</span>&nbsp;&nbsp;
		<input name="luas_tanah" type="text" style="width: 34px" />&nbsp; M2</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Kondisi Bangunan</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="kondisi_bangunan" type="radio" value="B" />Baik&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="kondisi_bangunan" type="radio" value="RR" checked="checked" />Rusak Ringan&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="kondisi_bangunan" type="radio" value="RB" />Rusak Berat</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Sewa</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="sewa" type="radio" value="SB" />Sudah Bayar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="sewa" type="radio" value="BB" />Belum Bayar&nbsp;&nbsp;
		<input name="sewa" type="radio" value="TDS" style="width: 20px" checked="checked" />Tidak Dikenai Sewa</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Fasdin</td>
		<td style="width: 1px" class="style4"><span lang="id">:</span></td>
		<td class="style17" style="width: 593px"><input name="fasdin" type="text" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Denah </td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px"><input name="denah" type="file" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Foto Rumah</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px"><input name="foto_rumah" type="file" />&nbsp;&nbsp;
		<span lang="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		Tanggal Foto Rumah&nbsp; :&nbsp;&nbsp; </span>
		<input name="tgl_foto_rumah" type="text" style="width: 62px" /><span lang="id">
		</span>&nbsp;ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style31" style="width: 593px">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 160px" class="style29">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style31" style="width: 593px"><strong>DATA SIP</strong></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">No<span lang="id">mor</span> 
		SIP<span lang="id"> / Tgl SIP</span></td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="no_sip_tgl" type="text" style="width: 118px" onchange="tglsip()" id="nosip" /><span lang="id"> 
		NoSIP/ddmmyy&nbsp;&nbsp; Misal&nbsp; : 144/310610&nbsp;&nbsp;&nbsp;
		</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Tanggal Berlaku</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="tgl_berlaku" type="text" style="width: 62px" /><span lang="id">
		</span>ddmmyy<span lang="id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Misal : 10 
		Juni 1984 ==&gt; 100684</span></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style28">Tanggal Expired</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="tgl_expired" type="text" style="width: 62px" /><span lang="id">
		</span>ddmmyy</td>
	</tr>
	<tr>
	<?php
	$tgltoday=date('dmy');
	?>
		<td style="width: 160px" class="style26">Tanggal Cetak</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="tgl_cetak" style="width: 62px" id="nomorsip" type="hidden"/><span lang="id">
		</span>ddmmyy</td>
	</tr>
	<tr>
		<td style="width: 160px; height: 19px;" class="style34"><strong>PEJABAT TTD SIP</strong></td>
		<td style="width: 1px; height: 19px;" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px; height: 19px;"></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Nama</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="nama_pejabat_ttd" type="text" style="width: 263px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Pangkat, Korps</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		
			<select name="pangkat_ttd" style="width: 146px">
		<option selected="selected">(Pilih Pangkat)</option>
		<?php
		
		$prnth="SELECT * FROM tbl_pangkat";
		$sqlpngkt=mysql_query($prnth);
		while ($pngkt = mysql_fetch_array($sqlpngkt)) { 
				?>		
		<option value="<?php echo $pngkt[0];?>"><?php echo $pngkt[1];?></option>
		<?php }?>
		</select><span lang="id">&nbsp; Korps
			<select name="korps_ttd" style="width: 68px">
		<option selected="selected">(Korps)</option>
		<?php
		$prnth="SELECT * FROM tbl_korps";
		$sqlkorps=mysql_query($prnth);
		while ($korps = mysql_fetch_array($sqlkorps)) { 
				?>		
		<option value="<?php echo $korps[0];?>"><?php echo $korps[1];?></option>
		<?php }?>
		</select></span></td>
	</tr>
	<tr>
		<td style="width: 160px; height: 19px;" class="style28">NRP</td>
		<td style="width: 1px; height: 19px;" class="style4">:</td>
		<td class="style17" style="height: 19px; width: 593px;">
		<input name="NRP_ttd" type="text" style="width: 62px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style26">Jabatan</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="jabatan_ttd" type="text" style="width: 269px" /></td>
	</tr>
	<tr>
		<td style="width: 160px" class="style21">&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 593px">&nbsp;</td>
	</tr>
</table>
		
<p align="center" class="style14">Masukkan Kode Dibawah ini</p>
<?php

// fungsi grafis pada PHP
$kanvas=imagecreate(80,30);
$putih=imagecolorallocate($kanvas,000,000,255);
$kuning=imagecolorallocate($kanvas,255,255,144);

// untuk membangkitkan string secara acak
srand((double)microtime()*1000000);

// enkripsi string baru sebanyak 32 karakter dengan kombinasi huruf dan angka kecil
$string=md5(rand(0,9999));

// karakter acak yang diambil dimulai dari karakter ke-15 sebanyak 5 digit
$data_string=substr($string,15,5);

// menampilkan kode acak di atas gambar
imagefill($kanvas,0,10,$kuning);
imagestring($kanvas,20,20,10,$data_string,$putih);
imagepng($kanvas,"verify.png");
imagedestroy($kanvas);
?>
<div class="style6">
		<img src="verify.png" /><input name="antispamentry" type="text" style="width: 66px" /><br/><br/>
		<input name="data_string" type="hidden" style="width: 95px" value="<?php echo $data_string;?>"/>



		<input name="Simpan" type="submit" value="Simpan" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="style7" /></div>
		
		
</form>

</body>

</html>
