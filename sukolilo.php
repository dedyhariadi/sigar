<?php

/**
 * @author watpers3
 * @copyright 2011
 */

	include("menuatas.php");
	include("sambungan.php");
    
    echo "skrip merubah sukolilo blok menjadi Jl. Semolowaru Bahari";
    
    $perintah="SELECT a.*, b.* FROM
                tbl_rumah a,tbl_sukolilo b 
                WHERE a.ID_RUMAH=b.ID_RUMAHSIP 
                AND a.ID_RUMAH LIKE 'SKL%'";
                
    $sql1=mysql_query($perintah,$conn);
     if(!$sql1)
                die("Perintah select gagal");

    $x=1;
    echo "<BR>";
    
    while ($hasil = mysql_fetch_array($sql1)){
        echo $hasil['ID_RUMAH'];
        echo "<br>";
        $alamatsip=$hasil['ALAMATSIP'];
        $kodermh=$hasil['ID_RUMAH'];
        
        $perintah_ubah="UPDATE tbl_rumah SET 
                         ALAMAT='$alamatsip' 
                        WHERE ID_RUMAH='$kodermh';";
                        
        $sql_ubah=mysql_query($perintah_ubah,$conn);
            if(!$sql_ubah)
                die("Perintah rubah gagal");
        
        
        }
        
    //echo $x."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$hasil['ALAMAT']."<BR>";
    //    $koderumah[$x]=$hasil['ID_RUMAH'];
//        
//        $sebelumdirubah=explode(" ",$hasil['ALAMAT']);
//        $sementara=$sebelumdirubah[2];
//        
//        $nomor=str_replace("/", " No. ", $sementara);
//        $jadi[$x]="Jl. Semolowaru Bahari ".$nomor;
//        echo $jadi[$x]."<BR>";
//        
        
       // $perintah_ubah="UPDATE tbl_rumah SET 
//                            ALAMAT='$alamatsip' 
//                        WHERE ID_RUMAH='$kodermh';";
//                        
//        $sql_ubah=mysql_query($perintah_ubah,$conn);
//            if(!$sql_ubah)
//                die("Perintah rubah gagal");
        
       // x."&nbsp;&nbsp;".$koderumah."&nbsp;&nbsp;&nbsp;".
        
        
    
    
    
   // for ($b=1;$b<$x;$b++){
//    
//        $alamatsip=$jadi[$b];
//        $kodermh=$koderumah[$b];
//        
//        $perintah_ubah="UPDATE tbl_rumah SET 
//                            ALAMAT='$alamatsip' 
//                        WHERE ID_RUMAH='$kodermh';";
//                        
//        $sql_ubah=mysql_query($perintah_ubah,$conn);
//            if(!$sql_ubah)
//                die("Perintah rubah gagal");
//            
//       }     
//        $perintahganti="UPDATE tbl_sip SET
//                            TGL_BERLAKU='$tgl_berlaku'
//                        WHERE NRP='$nrp' AND NO_SIP='$nosip';";
//                        
//        $sqlganti=mysql_query($perintahganti,$conn);
//            if(!sqlganti)
//                die("Ganti tanggal berlaku gagal");           
//    }
    

?>