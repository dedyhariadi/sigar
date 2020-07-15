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
    $banyakdata++;
    $nrp=$hasil['NRP'];
    $nosip=$hasil['NO_SIP'];
    $tgl_berlaku=$hasil['TGL_BERLAKU'];
    
    $thn_akhir=substr($tgl_berlaku,-2)+3;
   	//echo $thn_akhir." ";
     if(strlen($thn_akhir)==1){
        $thn_akhir="0".$thn_akhir;
    }
    
    $awalangkatahun=substr($tgl_berlaku,-2,1);
    		if($awalangkatahun=="9"){
    			$tahunn="19";
    		}else{
    			$tahunn="20";
    		}
    
    $tgl_akhir_temp=$tahunn.$thn_akhir."-".substr($tgl_berlaku,2,2)."-".substr($tgl_berlaku,0,2);
    $tgl_akhir_1=strtotime($tgl_akhir_temp);										
    $tgl_akhir_1_1=$tgl_akhir_1-24*60*60;
	$tgl_expired=date("dmy",$tgl_akhir_1_1);	
    echo $tgl_berlaku."  ".$tgl_expired."<br>";
        $perintahganti="UPDATE tbl_sip SET
                            TGL_EXPIRED='$tgl_expired'
                        WHERE NRP='$nrp' AND NO_SIP='$nosip';";
        $sqlganti=mysql_query($perintahganti,$conn);
            //if(!sqlganti)
//                die("GAnti tanggal expired gagal");            
}

echo $banyakdata;
?>