<?php
		session_start();
		if (!isset($_SESSION['user']))
    {
    echo "Anda belum login";
    exit;
    }else{
	?>

<head>
<link href="Gambar/logotransparan.png" rel="SHORTCUT ICON" />
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
<script type="text/javascript" language="javascript">
    function terpilih(){
        if(document.pencarian.cari.value=="Cari Nama Penghuni / Alamat / NRP / Kode Rumah"){
            document.pencarian.cari.value="";
            document.pencarian.cari.style.color="black";
        }
    }
    
    function tdkterpilih(){
        if(document.pencarian.cari.value==""){
            document.pencarian.cari.style.color="#CFCFCF";
            document.pencarian.cari.value="Cari Nama Penghuni / Alamat / NRP / Kode Rumah";
        }
    }
    function kolom_pilih(){
        document.pencarian.kolom.style.color="black";
    }
    
    function kolom_tdkpilih(){
        document.pencarian.kolom.style.color="#CFCFCF";
    }
</script>

<style type="text/css">
.style2 {
	font-family: "Berlin Sans FB";
}
</style>
</head>

<body style="margin-top:0px;">
<form name="pencarian" method="get" action="pencarian.php">
<table border="0" style="margin-top:1px; width: 100%; height: 48px;" bgcolor="#F2E6FF">
		<tr>
				<td rowspan="2" style="width: 80%;color:#003300" class="standardteks">
					<img src="Gambar/logotransparan.png" width="198" height="62" /><br />&nbsp;&nbsp;&nbsp;&nbsp;Ⓒ Disminpers Lantamal V
				</td>
				<td valign="middle"> 
				<select name="kolom"  style="color: #CFCFCF;" onfocus="kolom_pilih()" onblur="kolom_tdkpilih()">
                    <option value="0" style="color: #CFCFCF;">Berdasarkan</option>
					<option value="1" selected="selected">Nama Penghuni</option>
					<option value="2">Alamat</option>
					<option value="3">NRP</option>
					<option value="4">Kode Rumah</option>
				</select> &nbsp;&nbsp;<input type="submit" value="Cari" style="width: 72px;" />
				
				
				</td>
				<td style="width: 102px;font-size:small" ><a href="utama.php">Home</a> </td> 
				<td style="width: 20px">||</td>
				<td align="center" style="width: 110px"><a href="keluar.php">Keluar</a></td> 
				<td style="width: 21px">||</td>
				<td>
				<a href="laporan_list_satker.php?pilihankomplek=Kobangdikal">Per Satker</a> </td>
			</tr>
			<tr>
				<td valign="top" style="width: 80%; height: 52px;">
				<input type="text" name="cari" size="33" style="color: #CFCFCF;" value="Cari Nama Penghuni / Alamat / NRP / Kode Rumah" onfocus="terpilih()" onblur="tdkterpilih()" />
				</td>
				<td colspan="5" valign="top" class="standardteks" colspan="5" style="height: 52px" ><p style="color:#660066;margin-top:0px;" align="center">
				<?php

	$day=date("D");
	switch ($day) {
		case 'Sun' : $hari = "Minggu"; break;
		case 'Mon' : $hari = "Senin"; break;
		case 'Tue' : $hari = "Selasa"; break;
		case 'Wed' : $hari = "Rabu"; break;
		case 'Thu' : $hari = "Kamis"; break;
		case 'Fri' : $hari = "Jum'at"; break;
		case 'Sat' : $hari = "Sabtu"; break;
		default	   : $hari = "Gak Jelas Harinya";
	}

	$mont=date("m");
	switch ($mont) {
		case '01' : $bulan = "Januari"; break;
		case '02' : $bulan = "Februari"; break;
		case '03' : $bulan = "Maret"; break;
		case '04' : $bulan = "April"; break;
		case '05' : $bulan = "Mei"; break;
		case '06' : $bulan = "Juni"; break;
		case '07' : $bulan = "Juli"; break;
		case '08' : $bulan = "Agustus"; break;
		case '09' : $bulan = "September"; break;	
		case '10' : $bulan = "Oktober"; break;
		case '11' : $bulan = "Nopember"; break;
		case '12' : $bulan = "Desember"; break;
		default	  : $bulan = "Gak Jelas bulannya";
		}
$tgl=date("d");
$tahun=date("y");


					echo "Hallo, "?> <font color="#663300"><?php echo $_SESSION['user'];?></font><br />
					<font color="#660066">
					<?php echo $hari.", ".$tgl." ".$bulan." 20".$tahun;?></font>
				</p>
			</td> 
			</tr>
</table>
</form>
</body>
<?php }?>