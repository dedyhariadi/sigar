<?php

/**
 * @author dedyhariadi
 * @copyright 2006
 */

include("sambungan.php");
$perintah="select * from tbl_sip;";
$sql=mysql_query($perintah,$conn);
$banyakdata=0;
//echo "Dedy :".$tgl_berlaku;
while($hasil=mysql_fetch_array($sql)){
    
    $nrp=$hasil['NRP'];
    $nosip=$hasil['NO_SIP'];
    
    $tgl_nosip=explode("/",$hasil['NO_SIP']);
    
        $banyakdata++;
        echo $tgl_nosip[1]."<br>";
    $tgl_berlaku=$tgl_nosip[1];    
    
        $perintahganti="UPDATE tbl_sip SET
                            TGL_BERLAKU='$tgl_berlaku'
                        WHERE NRP='$nrp' AND NO_SIP='$nosip';";
                        
        $sqlganti=mysql_query($perintahganti,$conn);
            if(!sqlganti)
                die("Ganti tanggal berlaku gagal");            
}

echo $banyakdata;
?>