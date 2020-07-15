<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style"></link>
<script type="text/javascript" language="javascript">
	function buka_baru(){
        var idrumah=document.forms[0].id_rumah.value
        if (idrumah==""){
        var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="update_list.php?pilihankomplek="+pilihankmplk;    
        }else{
       		location.href="updatermh.php?id_rumah="+idrumah;    
        }
	}

</script>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
</head>

<body>
<?php 
	include("menuatas.php");
	include ("sambungan.php");
?>

<p class="judul">Berkas-Berkas Rumah Negara<br />
======================
</p>


<table style="width: 60%" align="center" class="standardteksd">
	<tr>
		<td colspan="2" style="height: 24px;color:#FF0000">&nbsp;</td>
		<td style="height: 24px;color:#FF0000" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" style="height: 24px;color:#FF0000"><strong>&nbsp;&nbsp;&nbsp; PENGALIHAN</strong></td>
		<td style="height: 24px;color:#FF0000" colspan="2"><strong>&nbsp;&nbsp;&nbsp; 
		PERPANJANGAN</strong></td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px; height: 30px;">1.</td>
		<td style="width:44%; height: 30px;"><a href="Berita Acara.doc">Berita Acara Serah Terima</a></td>
		<td class="auto-style1" style="width: 40px; height: 30px;">1.</td>
		<td style="height: 30px"><a href="Nyatapanjang.docx">Surat Pernyataan</a></td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px">2.</td>
		<td style="width: 44%"><a href="Daftar Susunan Keluarga.doc">Daftar Susunan Keluarga</a></td>
		<td style="width: 40px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px; height: 24px;">3.</td>
		<td style="width: 44%; height: 24px;"><a href="Formulir Pendaftaran.docx">Formulir Pendaftaran</a></td>
		<td style="height: 24px;color:#FF0000" colspan="2"><strong>&nbsp;&nbsp;&nbsp; BERKAS&nbsp; 
		LAIN</strong></td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px">4.</td>
		<td style="width: 44%"><a href="Surat Pernyataan OVB.docx">Surat Pernyataan</a></td>
		<td style="width: 40px" class="auto-style1">1.</td>
		<td><a href="Tanda Terima.doc">Tanda Terima</a></td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px; height: 31px;">&nbsp;</td>
		<td style="width: 44%; height: 31px;">&nbsp;</td>
		<td class="auto-style1" style="width: 40px; height: 31px;">2.</td>
		<td style="width: 44%; height: 31px;"><a href="SIP Manual.docx">SIP Manual</a></td>
	</tr>
	<tr>
		<td class="auto-style1" style="width: 40px">&nbsp;</td>
		<td style="width: 44%">&nbsp;</td>
		<td style="width: 40px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
</body>

</html>
