<?php

/**
 * @author dedyhariadi
 * @copyright 2011
 */
    $id_ovb=$_GET['id_ovb'];
	include("sambungan.php");
	$perintah_ovb="DELETE FROM TBL_OVB where ID_OVB='$id_ovb';";
    $sql_ovb=mysql_query($perintah_ovb);
    if(!$sql_ovb)
        die("Perintah menghapus Gagal");
?>
<script type="text/javascript" language="javascript">
    alert ("Proses menghapus sukses")
    location.href="ovb.php"
</script>