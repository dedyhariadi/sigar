<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Penambahan Data Rumah Negara </title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

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
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		var k=10;
		var t=0;
			jmlpenghuniJS[pilihankmplk]=jmlpenghuniJS[pilihankmplk]+1;
			document.getElementById("koderumah").value=kodee[pilihankmplk]+jmlpenghuniJS[pilihankmplk];		
			jmlpenghuniJS[pilihankmplk]=jmlpenghuniJS[pilihankmplk]-1;
	}
			
</script>

</head>
<body>
<?php 
	include("menuatas.php");
	include("sambungan.php");
?><p style="margin-top:1px;margin-bottom: 1px;" class="judul">DATA RUMAH NEGARA TNI AL</p>

<table style="width: 54%" align="center" style="margin-top:1;">
	<tr bgcolor="#CCFFFF">
		<td style="width: 160px; height: 26px" class="standardteks">Komplek</td>
		<td style="height: 26px; width: 1px;">:</td>
		<td style="height: 26px; width: 593px;">
		<?php
			$perintah="SELECT id_komplek,count(*) as jml_rumah FROM tbl_rumah group by id_komplek";
			$sql=mysql_query($perintah);
	
			$x=0;
			while ($hasil = mysql_fetch_array($sql)) 
				{ 
				 $id_tblrumah[$x]=$hasil[0];
				 $jml_penghuni[$x]=$hasil[1];
				$x=$x+1;
			}

			$perintah="SELECT * FROM tbl_komplek";
			$sql=mysql_query($perintah);
							
			$x=0;
			
			while ($prntah= mysql_fetch_array($sql)) 
				{ 
				 $id_tblkmplk[$x]=$prntah[0];
				 $namakmplksql[$x]=$prntah[1];
				 $kodekmplksql[$x]=$prntah[2];
				 $x=$x+1;				 
			}
			$x=$x-1;
			
			for ($k=0; $k<=$x; $k++){
				for ($j=0; $j<=$x; $j++){
					if ($id_tblrumah[$k]==$id_tblkmplk[$j])
					{
						$kodekomplek[$k]=$kodekmplksql[$j];
						$namakomplek[$k]=$namakmplksql[$j];
						$jmlpenghuniphp[$k]=$jml_penghuni[$j];
					}
				}
			}
			
	?>
		
		<script language="javascript">
			
			kodee=new Array(10)
			komplekJS=new Array(10)
			jmlpenghuniJS=new Array(10)
			
			kodee[1] = "<?php print($kodekomplek[0]); ?>"; 
			kodee[2] = "<?php print($kodekomplek[1]); ?>"; 
			kodee[3] = "<?php Print($kodekomplek[2]); ?>"; 			
			kodee[4] = "<?php Print($kodekomplek[3]); ?>"; 			
			kodee[5] = "<?php Print($kodekomplek[4]); ?>"; 			
			kodee[6] = "<?php Print($kodekomplek[5]); ?>"; 			
			kodee[7] = "<?php Print($kodekomplek[6]); ?>"; 			
			kodee[8] = "<?php Print($kodekomplek[7]); ?>"; 			
			kodee[9] = "<?php Print($kodekomplek[8]); ?>"; 			
			kodee[10] = "<?php Print($kodekomplek[9]); ?>"; 					

			komplekJS[1] = "<?php Print($namakomplek[0]); ?>"; 
			komplekJS[2] = "<?php Print($namakomplek[1]); ?>"; 
			komplekJS[3] = "<?php Print($namakomplek[2]); ?>"; 
			komplekJS[4] = "<?php Print($namakomplek[3]); ?>"; 
			komplekJS[5] = "<?php Print($namakomplek[4]); ?>"; 
			komplekJS[6] = "<?php Print($namakomplek[5]); ?>"; 
			komplekJS[7] = "<?php Print($namakomplek[6]); ?>"; 
			komplekJS[8] = "<?php Print($namakomplek[7]); ?>"; 
			komplekJS[9] = "<?php Print($namakomplek[8]); ?>"; 
			komplekJS[10] = "<?php print($namakomplek[9]); ?>"; 
			
			jmlpenghuniJS[1]=<?php print($jmlpenghuniphp[0]); ?>;
			jmlpenghuniJS[2]=<?php Print($jmlpenghuniphp[1]); ?>;
			jmlpenghuniJS[3]=<?php Print($jmlpenghuniphp[2]); ?>;
			jmlpenghuniJS[4]=<?php Print($jmlpenghuniphp[3]); ?>;
			jmlpenghuniJS[5]=<?php Print($jmlpenghuniphp[4]); ?>;
			jmlpenghuniJS[6]=<?php Print($jmlpenghuniphp[5]); ?>;
			jmlpenghuniJS[7]=<?php Print($jmlpenghuniphp[6]); ?>;
			jmlpenghuniJS[8]=<?php Print($jmlpenghuniphp[7]); ?>;
			jmlpenghuniJS[9]=<?php Print($jmlpenghuniphp[8]); ?>;
			jmlpenghuniJS[10]=<?php Print($jmlpenghuniphp[9]); ?>;
			

		</script>
				
		&nbsp;<select name="pilihankomplek" style="width: 146px" onchange="kdrmh()" id="kmplk" class="standardteks">
		<option value=" ">(pilih komplek)</option>
		
		<?php
			$perintah="SELECT * FROM tbl_komplek";
			$sql=mysql_query($perintah);
			while ($hasil = mysql_fetch_array($sql)) { 
		?>		
		<option value="<?php echo $hasil[0];?>"><?php echo $hasil[1];?></option>
		<?php }?>
		</select></td>
	</tr>`

	<tr bgcolor="#CCFFFF">
		<td style="width: 160px; height: 4px;" class="standardteks">Kode Rumah</td>
		<td style="width: 1px; height: 4px" class="style4">:</td>
	  <td class="style30" style="border: 0px #FFFFFF none; height: 4px; outline-color: #FFFFFF; width: 593px;">

		  <span lang="id">&nbsp; </span>
				<input name="kode_rumah" type="text" id="koderumah" class="tulisantabel" readonly="readonly" style="background:#CCFFFF"/>
		  </td>
	</tr>
	<tr>
		<td style="width: 160px; height: 12px;" class="style29"></td>
		<td style="width: 1px; height: 12px;" class="style4"></td>
		<td class="style16" style="width: 593px; height: 12px;"></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="style29" >&nbsp;</td>
		<td style="width: 1px" class="style4">&nbsp;</td>
		<td class="standardteks" style="width: 593px" style="color:#003300;font-size:medium">
		DATA RUMAH</td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Alamat</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="alamat" type="text" style="width: 327px" /></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px; height: 23px" class="standardteks">Golongan</td>
		<td style="height: 23px; width: 1px;" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<input name="golongan" type="radio" value="I" />I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="golongan" type="radio" checked="checked" value="II" />II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="golongan" type="radio" value="IIA" />IIA</td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px; height: 23px" class="standardteks">Tahun 
		Pembuatan</td>
		<td style="height: 23px; width: 1px;" >:</td>
		<td style="height: 23px; width: 593px;" class="standardteks">
		<input name="tahun_buat" type="text" size="4" /></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px; height: 23px" class="standardteks">Asal 
		Perolehan</td>
		<td style="height: 23px; width: 1px;" class="standardteks">:</td>
		<td style="height: 23px; width: 593px;">
		<input name="asal_perolehan" type="text" class="standardteks" style="width: 202px" /></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Luas Bangunan</td>
		<td style="width: 1px" class="style4">:</td>
		<td class="style17" style="width: 593px">
		<input name="luas_bangunan" type="text" style="width: 34px" class="standardteks"/> <span class="standardteks">
		M2</span>&nbsp;&nbsp;
		<span lang="id" class="standardteks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Luas 
		Tanah</span>&nbsp;&nbsp;
		<input name="luas_tanah" type="text" style="width: 34px" class="standardteks" /><span class="standardteks">&nbsp; 
		M2</span></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Kondisi Bangunan</td>
		<td style="width: 1px" >:</td>
		<td class="standardteks" style="width: 593px">
		<input name="kondisi_bangunan" type="radio" value="B" />Baik&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="kondisi_bangunan" type="radio" value="RR" checked="checked" />Rusak 
		Ringan&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="kondisi_bangunan" type="radio" value="RB" />Rusak Berat</td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Sewa</td>
		<td style="width: 1px">:</td>
		<td class="standardteks" style="width: 593px">
		<input name="sewa" type="radio" value="SDH_BAYAR" />Sudah Bayar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="sewa" type="radio" value="BLM_BAYAR" checked="checked" />Belum Bayar&nbsp;&nbsp;
		<input name="sewa" type="radio" value="TDK_DKENAI" style="width: 20px" />Tidak 
		Dikenai Sewa</td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Fasdin</td>
		<td style="width: 1px" class="style4"><span lang="id">:</span></td>
		<td class="style17" style="width: 593px"><input name="fasdin" type="text" /></td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Denah </td>
		<td style="width: 1px">:</td>
		<td class="style17" style="width: 593px"><input name="denah" type="file" />&nbsp;&nbsp;
		</td>
	</tr>
	<tr bgcolor="#CCFFCC">
		<td style="width: 160px" class="standardteks">Foto Rumah</td>
		<td style="width: 1px">:</td>
		<td class="style17" style="width: 593px"><input name="foto_rumah" type="file" />&nbsp;&nbsp;
		<span lang="id" class="standardteks">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tgl Foto Rumah&nbsp; :&nbsp;&nbsp; </span>
		<input name="tgl_foto_rumah" type="text" style="width: 62px" /><span lang="id" class="standardteks">&nbsp;ddmmyy</span></td>
	</tr>
	</table>
<form method="POST" action="tmbhrmh_action.php">

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
<div class="standardteks" align="center">
		<input name="Simpan" type="submit" value="Simpan" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="Reset1" type="reset" value="Reset" class="style7" /></div>
</form>

</body>

</html>
