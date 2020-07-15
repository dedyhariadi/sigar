<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
<script type="text/javascript" language="javascript">
	
	function buka_update(){
        var alamat=document.forms[0].datasearch.value
        //if (idrumah==""){
        var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
           
        //alert (pilihankmplk)
        var teks1="sip_list_update.php?pilihankomplek="
        var sambungan="sip_list_update.php?pilihankomplek=" + pilihankmplk +"&&dataygdicari=" + alamat
        
        //alert (sambungan)
        location.href=sambungan    
        //}else{
       	//	location.href="sip_update.php?id_rumah="+idrumah;    
        //}
	}
    
    function jumprumah(){
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="sip_list_update.php?pilihankomplek="+pilihankmplk;
	}

</script>
</head>

<body>
<?php 
	include("menuatas.php");
	include ("sambungan.php");
?>

<p class="judul">Surat Izin Penghunian<br />Rumah Negara<br />
======================
</p>


<form name="formkomplek" action="sip_list_update.php?pilihankomplek=2" method="get">
<p style="font-family:'Berlin Sans FB'; margin-left:400px; width: 448px;" align="left">Kode Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="datasearch" type="text" style="font-family:'Berlin Sans FB';"/></p>
<p style="font-family:'Berlin Sans FB';color:green" align="center">ATAU&nbsp; </p>
<p align="left" style="font-family:'Berlin Sans FB'; margin-left:400px; width: 448px;">Daftar Rumah di Komplek&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<select name="pilihankomplek" style="width: 146px" class="standardteks" onchange="jumprumah()" id="kmplk">
		<option value=" ">(pilih komplek)</option>
		
		<?php
			$perintah="SELECT * FROM tbl_komplek";
			$sql=mysql_query($perintah);
			while ($hasil = mysql_fetch_array($sql)) { 
		?>		
		<option value="<?php echo $hasil[0];?>"><?php echo $hasil[1];?></option>
		<?php }?>
		</select></p>
<p style="font-family:'Berlin Sans FB'; margin-left:400px; width: 448px;" align="left">
&nbsp;</p>
<p align="center" style="font-family:'Berlin Sans FB'; margin-left:422px; width: 430px; height: 19px;"><a href="Javascript:buka_update()"></a> </p>
</form>
</body>

</html>
