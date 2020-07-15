<?php 
//include("sambungan .php");
mysql_connect("localhost","root","");
mysql_select_db("sigar");
$nomer=0;
if($_POST['aksi']=="tampil"){
echo "<table width='50%' border='1' cellspacing='2' cellpadding='2'>";
    echo "<tr>";
        echo "<td>NO</td>";
        echo "<td>KODE RUMAH</td>";
        echo "<td>UPDATE TERAKHIR</td>";
    echo "</tr>";

	$tampil=mysql_query("select * from tbl_lampiran order by LAST_UPDATE DESC");
	while($r=mysql_fetch_array($tampil))
	{
		$nomer++;
		echo "<tr>
				<td>$nomer</td>
				<td><b>$r[KODE_RUMAH]</b></td>
				<td><i>$r[LAST_UPDATE]</i></td>
				<td><input type=button value='hapus$nomer' id='hapus$nomer'></td>
			</tr>";
		
		//echo "<li>$r[NO]. <b>$r[KODE_RUMAH]</b> di update pada :(<i>$r[LAST_UPDATE]</i>)";
	}
echo "</table>";
}

elseif($_POST['aksi']=="tambah"){
$koderumah=$_POST['koderumah'];
$masukan=mysql_query("insert into tbl_lampiran(KODE_RUMAH) 
					  values('$koderumah')");
if ($masukan){
	echo "data berhasil disimpan......";
	}else{
	echo "data gagal disimpan......";
}
}
?>