<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script type="text/javascript" language="javascript">

	function edit(idovb){
		location.href="edit.php?id_ovb="+idovb
	}
	
	function hapus(idovb,alamat){
		jawaban = confirm("apakah yakin akan dihapus untuk  "+alamat)
		if (jawaban){
		  location.href="hapus.php?id_ovb="+idovb  
		}
	}
	
	function jumprumah(){
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="sip_list_update.php?pilihankomplek="+pilihankmplk;
	}
	
	function jumpaksi(bariske){
		alert (bariske);
		idd="aksiid["+bariske+"]";

//		var tabell=document.getElementById("tabelku");
		hasil = document.forms[bariske].selects[bariske].value
		alert (hasil)
		
//		var formm=document.getElementById("formid");
		hasil = document.form[bariske].selekaksi.options[document.form[bariske].selekaksi.selectedIndex].value
		alert (hasil);
	}	
			
	function ubahwarna(bariske){
		//alert ("sukses")
        var tabell=document.getElementById("tabelku")
		tabell.rows[bariske].style.backgroundColor="#DDBBFF";
		tabell.rows[bariske].style.color="#000000";    
		}
	
	
	function balikwarna(bariske){
		
		var tabell=document.getElementById("tabelku")
		var jenisbaris=(bariske)%2;
		if (jenisbaris==1){
			tabell.rows[bariske].style.backgroundColor="#F8F0FF";
			tabell.rows[bariske].style.color="#000000";
		}else{
			tabell.rows[bariske].style.backgroundColor="#FFFFFF";
			tabell.rows[bariske].style.color="#000000";
		}
	//alert (warnabg)
	}
	
</script>
</head>

<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");
?>
<p class="judul">DAFTAR PENGHUNI RUMAH NEGARA<br /><span lang="id">=========================</span></p>

<p class="standardteks" align="center">Tahun :&nbsp;
	<select name="pilihankomplek" style="width: 60px" id="kmplk" class="standardteks">
			<option value="2018" selected="selected">2018</option>
	</select> <?php  $tahunpilih="18";?> </p>

<table style="width: 100%" border="0" id="tabelku" align="center" class="standardteks" border="1">

	<tr style="text-align: center; color: #000000; background-color: #DDBBFF;">
		<td style="text-align:center" rowspan="2">NO&nbsp;</td>
		<td rowspan="2" colspan="3">KODE<br />RMH</td>
		<td style="width: 15%; " rowspan="2">ALAMAT</td>
		<td width="14%" style="height: 30px; width: 19%;" colspan="2">D A R I</td>
		<td style="height: 30px; " colspan="2">K E P A D A</td>
		<td style="width: 11%;" rowspan="2">TGL OVB</td>
	</tr>
		<?php 
			$x=3;
			$tandabaris=0;
            $nomor=1;
        ?>
	<tr style="background-color: #DDBBFF; height: 30px;text-align:center; color: #000000;" class="standardteks">
		<td width="14%" >NAMA</td>
        <td style="width: 131px; text-align: center;" >PANGKAT, KORPS, NRP/NIP</td>
		<td width="14%" style="text-align: center">NAMA</td>
		<td style="width: 131px; text-align: center;" >PANGKAT, KORPS, NRP/NIP</td>
    </tr>
   
   <!--//Januari-->
   <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
        <td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
   </tr>              
   <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
        <td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JANUARI</td>
   </tr>
   <?php 
        $bulanovb="__01".$tahunpilih;
        include("blnovb.php");
   ?>
   
   <!--//Februari-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FEBRUARI</td>
    </tr>
   <?php
         $bulanovb="__02".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
   	
   <!--//Maret-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MARET</td>
    </tr>
   <?php
         $bulanovb="__03".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
   
   <!--//April-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APRIL</td>
    </tr>
   <?php
         $bulanovb="__04".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
   
   <!--//Mei-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEI</td>
    </tr>
   <?php
         $bulanovb="__05".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
   
   <!--//Juni-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUNI</td>
    </tr>
   <?php
         $bulanovb="__06".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>

    <!--//Juli-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JULI</td>
    </tr>
   <?php
         $bulanovb="__07".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>       			
   
   <!--//Agustus-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AGUSTUS</td>
    </tr>
   <?php
         $bulanovb="__08".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
   
   <!--//September-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEPTEMBER</td>
    </tr>
   <?php
         $bulanovb="__09".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
    
   <!--//Oktober-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OKTOBER</td>
    </tr>
   <?php
         $bulanovb="__10".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>

    <!--//November-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOVEMBER</td>
    </tr>
   <?php
         $bulanovb="__11".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>

    <!--//Desember-->
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" ></td>
     </tr>              
    <tr style="background-color: #DDBBFF; height: 30px; color: #000000;">
		<td style="text-align:left;font-size:25px;color:maroon;" colspan="10" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESEMBER</td>
    </tr>
   <?php
         $bulanovb="__12".$tahunpilih;
         $x=$x+2;
         include("blnovb.php");
   ?>
                
</table>

<script language="javascript">
		
	var tabell=document.getElementById("tabelku")
	var jmlbaris=tabell.rows.length
	var tanda=0;
	
	for (t=2; t<=jmlbaris; t++){
		if (tanda==1){
			tabell.rows[t].style.backgroundColor="#F8F0FF";
			tanda=0;
		}else {
			tabell.rows[t].style.backgroundColor="#FFFFFF";
			tanda=1;
		}
	}
	</script>
</body>

</html>