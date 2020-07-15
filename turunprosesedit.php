<?php 

include("sambungan.php"); 

$kodesurat=$_POST['kodesurat'];
$kodetrk=$_POST['kodetrk'];
$nrp=$_POST['NRP'];
$nrpawal=$_POST['nrpawal'];
$dasar=$_POST['dasar'];
$jenissl=$_POST['jenisl'];

//Dasar
$nosurat=$_POST['nosurat'];
$tglsurat=$_POST['tglsurat'];
if($dasar=="SURAT"){
    $kodedasar=$nosurat."&&".$tglsurat;
}else{
    $kodedasar="ELGB";
}

//Catatan
$note=$_POST['note'];
if($note=="nada"){
    $pomal=$_POST['pomal'];
    $diskum=$_POST['diskum'];
    $intel=$_POST['intel'];
    $perintahnote=mysql_query("UPDATE TBL_CATATAN SET POMAL='$pomal', DISKUM='$diskum', INTEL='$intel' WHERE NRP='$nrp';");
    $kodenote=1;
    //echo $kodenote;
    echo $pomal." ".$diskum." ".$intel;
}else{
    $kodenote=0;
}

echo $nrp."  ".$dasar."  ".$jenissl."  ".$note;

$perintahupdate=mysql_query("UPDATE tbl_transaksi SET
                KODE_SURAT='$kodesurat',
                NRP='$nrp',
                KODE_SL='$jenissl', 
                KODE_CATATAN='$kodenote', 
                KODE_DASAR) 
                WHERE KODE_TRX='$kodetrk';");

	if (!$perintahupdate) 
				die ("Perintah update penghuni gagal");

echo $kodetrk;

//header("location:usulanlist.php?kodesurat=$kodesurat");

?>
