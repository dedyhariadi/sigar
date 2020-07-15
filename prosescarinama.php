<?php

/**
 * @author dedyhariadi
 * @copyright 2012
 */

	include("sambungan.php");
	
    //$alamat=$_GET['dataygdicari'];
    //echo "dataygdicari: ".$alamat;
    $kataygdicari=$_GET["q"];
    if (!$kataygdicari) return;
    //$kolomygdicari=$_GET['kolom'];
    
            $prnth="SELECT A.*,B.*, C.*
             		 FROM TBL_SIP A,TBL_PENGHUNI B, TBL_RUMAH C
             		 WHERE A.NRP=B.NRP 
                     AND A.ID_RUMAH=C.ID_RUMAH
             		 AND B.NAMA_PENGHUNI LIKE '%$kataygdicari%';";
                     
                    $sql=mysql_query($prnth,$conn);
            		if (! $sql) 
            			die ("Perintah gagal");
                        
            while ($r=mysql_fetch_array($sql)){
                $namapenghuni=$r['NAMA_PENGHUNI'];
                echo "$namapenghuni \n";
            }

?>