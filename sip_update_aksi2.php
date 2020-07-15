<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.: Sistem Informasi Rumah Negara :.</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<script language="javascript">
var bukajendela
	function buka(url)
		{
		 	bukajendela=window.open(url,"Sigar","navigator=no, directories=no,toolbar=no,menubar=yes,width=500,height=400,Location=no");
            bukajendela.focus()
		}
    function kembalilist(komplek)
    {
        location.href=komplek
    }
		
</script>
</head>
<body>

<?php 
	include("menuatas.php");
	include("sambungan.php");

 if (trim($_POST['nama_penghuni'])==""){
    ?>
        <script language="javascript" type="text/javascript" >
            alert ("Nama Penghuni Harus Diisi")
            history.back()
        </script>    
    <?php
    exit;
    }
//  Proses SIP
    $proses_sip=$_POST['proses'];
    if(isset($proses_sip)){
        //echo $proses_sip;    
    
        if($proses_sip==2){
            
           //echo "Proses yang dipilih adalah OVB";
           $nrp_awal=$_POST['NRP'];
           
           $perintah_awal="SELECT * FROM tbl_penghuni WHERE NRP='$nrp_awal';";
		   $sql_awal=mysql_query($perintah_awal,$conn);
           $data_awal=mysql_fetch_array($sql_awal);
           
           //simpan data awal penghuni
           $nrp_awal;
           $nama_awal=$data_awal['NAMA_PENGHUNI'];
           $kode_kat_awal=$data_awal['KODE_KAT'];
           $kode_korps_awal=$data_awal['KODE_KORPS'];
           $kode_status_awal=$data_awal['KODE_STATUS'];
           
           //echo $nrp_awal. " ".$nama_awal." ".$kode_kat_awal." ".$kode_korps_awal." ".$kode_status_awal."<br>";
        }
        

//  tbl_rumah
	$id_rumah = $_POST['id_rumah'];
	$alamat = $_POST['alamat'];
	$komplek = $_POST['komplek'];	

$status = $_POST['status'];
    
// Nomor SIP
   $nosip=trim($_POST['nosip']);
   $nosipasli=$_POST['nosipasli'];
   
   if ($nosip==""){
     if(substr($nosipasli,-4)=="9999"){
        $nosip=$nosipasli; 
     }else{
       $perintah_nosip="SELECT * FROM tbl_sip WHERE NO_SIP like '%9999';";
		    $sql_nosip=mysql_query($perintah_nosip,$conn);
            $d=1;
            while($nosementara=mysql_fetch_array($sql_nosip)){
                $nomorsip_temp=explode("/",$nosementara['NO_SIP']);
                $nomor_sementara[$d]=$nomorsip_temp[0];
                
                $d++;    
            }
                $nilaiterbesar=max($nomor_sementara);
        //$jmlnosip_temp=mysql_num_rows($sql_nosip);
        $nosip=($nilaiterbesar+1)."/999999";
        }
   }
  // echo "Nosip yang diupdate : ".$nosip."<br>";
   //echo "NOsip asli :".$nosipasli;

// NRP
$tanda=0;
   
    if (trim($_POST['NRP_tampil'])==""){
	   $nrp_temp= $_POST['NRP'];
            if(substr($nrp_temp,0,2)=="NA"){    
                $nrp=$_POST['NRP'];	
            }else{
                $perintah_nrpbaru ="select * from tbl_penghuni where NRP like 'NA%';"; //cari jumlah nrp sementara
                $sql_nrpbaru=mysql_query($perintah_nrpbaru,$conn);
                    if (!$sql_nrpbaru) 
                    die ("Proses pencarian jml nrp baru gagal");
                $d=1;
                while($nrpsementara=mysql_fetch_array($sql_nrpbaru)){
                    if (substr($nrpsementara['NRP'],0,2)=="NA"){
                        $nomorr[$d] = substr($nrpsementara['NRP'],-(strlen($nrpsementara['NRP'])-2));
                        //echo $d." ".$nomorr[$d]."<br>";
                        $nilaiterbesar=max($nomorr);
                        $d++;    
                        }  
                }
                $nrp="NA".($nilaiterbesar+1);	
            }
    $tanda=1;
	}
        
    if($tanda==0){
	   $nrp_temp = $_POST['NRP_tampil'];
       $perintah_nrpdobel="select * from tbl_sip where NRP='$nrp_temp';";
        $sql_nrpdobel=mysql_query($perintah_nrpdobel,$conn);
            if(!$sql_nrpdobel)
            die("Pencarian nrp kembar gagal");
        $jmlnrp=0;
        
        while($nrpdobel=mysql_fetch_array($sql_nrpdobel)){
            if($id_rumah==$nrpdobel['ID_RUMAH']){
                $jmlnrp;
            }else{
                $jmlnrp=$jmlnrp+1;
            }
        }
        
        if($jmlnrp==0){
            //echo "Tidak ada nrp yang kembar dengan nrp ini";
            $nrp=$nrp_temp;
        }else{
            ?>
            <script type="text/javascript" language="javascript">
               // alert("NRP yang dimasukkan kembar dengan yang lain")
                //history.back()
            
            </script>
            
        
            <?php
            $nrp=$nrp_temp;
        }   
    }  
    $nrp_utk_update=$_POST['NRP'];
    //echo "nrp asli : ".$nrp_utk_update."<br>";
    //echo "nrp yang di update :".$nrp;
     
    
// Nama Penghuni dan Nama Anggota


    if ($status<4){
        $nama_penghuni = $_POST['nama_penghuni'];
        $nama_anggota = $_POST['nama_penghuni'];	    
    }else{
        $nama_penghuni = $_POST['nama_penghuni'];
        $nama_anggota = $_POST['anggota'];
    }
    //echo "Nama Penghuni : ".$nama_penghuni."<br>";
    //echo "Nama Anggota  : ".$nama_anggota;
    
   	   
 // Menentukan Tanggal Expired
	$thn_berlakuu=substr($_POST['tahun_berlaku'],-2);
	$tgl_berlaku=$_POST['tanggal_berlaku'].$_POST['bulan_berlaku'].$thn_berlakuu;
    
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
    								
  
  
// Pangkat
    $kode_kat = $_POST['nama_kat'];	
    $kode_korps = $_POST['kode_korps'];
    $satker = $_POST['satker'];	
    $hari_ini=date("dmy");
    $telepon=$_POST['telepon'];    
    //echo "Kode Pangkat : ".$kode_kat."<br>";
    //echo "Kode Korps : ".$kode_korps."<br>";

       
    $perintahubah_penghuni = "UPDATE tbl_penghuni SET 
                                NAMA_PENGHUNI='$nama_penghuni', 
                                NAMA_ANGGOTA='$nama_anggota',							
                                SATKER='$satker',
                                KODE_KAT=$kode_kat,
                                KODE_KORPS=$kode_korps,
                                NRP='$nrp',
                                KODE_STATUS=$status,
                                TELEPON='$telepon'
                              WHERE NRP='$nrp_utk_update';";
                              
         
	$sqlubah_penghuni=mysql_query($perintahubah_penghuni,$conn);
			if (!$sqlubah_penghuni) 
			die ("Proses UPDATE PENGHUNI gagal");
            				
		
        
	$perintahubah_sip = " UPDATE tbl_sip SET 
				            NO_SIP='$nosip',
                            NRP='$nrp',
				        	NRP_TTD='8712/P',
                            TGL_BERLAKU='$tgl_berlaku',
                            TGL_EXPIRED='$tgl_expired',
                            LAST_UPDATE='$hari_ini'
                          WHERE NRP='$nrp_utk_update' AND ID_RUMAH='$id_rumah';";
                   
	$sqlubah_sip=mysql_query($perintahubah_sip,$conn);
			if (!$sqlubah_sip)
			die ("Proses UPDATE SIP gagal");
   
   //proses update sip untuk rumah baru
    $perintahubah_sip = " UPDATE tbl_sip SET 
				            NO_SIP='$nosip',
                            NRP='$nrp',
				        	NRP_TTD='8712/P',
                            TGL_BERLAKU='$tgl_berlaku',
                            TGL_EXPIRED='$tgl_expired',
                            LAST_UPDATE='$hari_ini'
                          WHERE ID_RUMAH='$id_rumah' AND LAST_UPDATE='baru';";
                   
	$sqlubah_sip=mysql_query($perintahubah_sip,$conn);
			if (!$sqlubah_sip) 
			die ("Proses UPDATE SIP baru gagal");
        
   
  /* $perintahubah_penghuni = "UPDATE tbl_penghuni SET 
                                NAMA_PENGHUNI='$nama_penghuni', 
                                NAMA_ANGGOTA='$nama_anggota',							
                                SATKER='$satker',
                                KODE_KAT=$kode_kat,
                                KODE_KORPS=$kode_korps,
                                NRP='$nrp',
                                KODE_STATUS=$status,
                                TELEPON='$telepon'
                              WHERE NRP='000000';";
         
	$sqlubah_penghuni=mysql_query($perintahubah_penghuni,$conn);
			if (!$sqlubah_penghuni) 
			die ("Proses UPDATE PENGHUNI gagal");*/
            
        
            
//   $perintahtambah_penghuni = "INSERT INTO tbl_penghuni
//                                (NAMA_PENGHUNI, NAMA_ANGGOTA, SATKER, KODE_KAT, KODE_KORPS,NRP,KODE_STATUS, TELEPON) 
//                                VALUES 
//                                ('$nama_penghuni','$nama_anggota','$satker','$kode_kat','$kode_korps','$nrp','$status','$telepon');";
//                                 
         
//	$sqltambah_penghuni=mysql_query($perintahtambah_penghuni,$conn);
//			if (!$sqltambah_penghuni) 
//			die ("Proses tambah penghuni gagal");
//    					
?>

<p class="judul">SIP
RUMAH NEGARA<strong><br /></strong><span lang="id">================</span></p>
<table style="width: 53%; color: #003300;" align="center">
	<tr>
		<td style="width: 457px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Kode Rumah</td>
		<td style="width: 15px;" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:green" class="standardteks">&nbsp;</td>
		<td style="width: 593px; color:#003300;" class="standardteks" colspan="3"><?php echo $id_rumah;?></td>
	</tr>`

	<tr>
		<td style="width: 457px; height: 21px; color:white" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Alamat</td>
		<td style="width: 15px; height: 21px; color:#003300" class="standardteks"  align="right">:</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 15px; color:green">
&nbsp;</td>
	  <td class="standardteks" style="border: 0px #FFFFFF none; height: 21px; outline-color: #FFFFFF; width: 593px;color:#003300;" colspan="3">
<label id="Label2"><?echo $alamat;?></label>
		  </td>
	</tr>
	<tr>
		<td style="width: 457px; height: 21px; color:white;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp; Komplek</td>
		<td style="height: 26px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 26px; width: 15px; color:green;" class="standardteks">
		&nbsp;</td>
		<td style="height: 26px; width: 593px; color#003300;" class="standardteks" colspan="3"><?php echo $komplek;?></td>
	</tr>
	<tr>
		<td style="width: 457px; height: 9px;"></td>
		<td style="width: 15px; height: 9px;" class="style4"></td>
		<td class="style16" style="width: 15px; height: 9px;">&nbsp;</td>
		<td class="style16" style="width: 593px; height: 9px;" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	<tr>
		<td style="width: 457px" >&nbsp;</td>
		<td style="width: 15px" >&nbsp;</td>
		<td class="standardteks" style="width: 15px; color:blue">&nbsp;</td>
		<td class="standardteks" style="width: 593px;color:blue" colspan="3">INFORMASI SIP</td>
	</tr>
    <tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Nomor SIP</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td class="standardteks" style="width: 15px; color:#003300">&nbsp;</td>
		<td class="standardteks" style="width: 599px; color:#003300;"><?php echo $_POST['nosip'];?></td>
		
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Nama Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td class="standardteks" style="width: 15px; color:#003300">&nbsp;</td>
		<td class="standardteks" style="width: 599px; color:#003300;"><?php echo $nama_penghuni;?></td>
		<?php if ($status>3)
			{
				?>
				<td class="standardteks" style="width: 380px; color:white; background-color: #009900;" align="center"> Nama Anggota </td>
				<td class="standardteks" style="width: 593px; color:#003300; ">: &nbsp;&nbsp;<?php echo $nama_anggota;?>&nbsp;</td>
				<?php 
			}else{
				?>
				<td class="standardteks" style="width: 284px; color:white;"> </td>
				<td class="standardteks" style="width: 593px; color:#003300; "> &nbsp;&nbsp;&nbsp;</td>
				<?php
			}?>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Status</td>
		<td style="width: 15px" align="right" class="standardteks">:</td>
		<td class="standardteks" style="color:#003300; width: 15px;">
		&nbsp;</td>
		<td class="standardteks" style="color:#003300" colspan="3">
		<?php 
			$prnth="SELECT * FROM TBL_STATUS WHERE KODE_STATUS=$status";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal");
			
			$hasil_status = mysql_fetch_array($sql);
			
			echo $hasil_status['STATUS'];
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 457px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green"> &nbsp;&nbsp;&nbsp;Pangkat, 
		Korps</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px; color:#003300;" class="standardteks">
		&nbsp;</td>
		<td style="height: 23px; width: 593px; color:#003300;" class="standardteks" colspan="3">
		<?php 
			if ($kode_kat<>""){
			     $prnth="SELECT * FROM TBL_PANGKAT where Kode_kat=$kode_kat";
			     $sql=mysql_query($prnth,$conn);
				    if (! $sql) 
				    die ("Perintah gagal");
    			$hasil_kat = mysql_fetch_array($sql); 
    			echo $hasil_kat['Pangkat']." "; 
			}else{
			 echo " ";
			}
            if ($kode_korps<>""){
                $prnth="SELECT * FROM TBL_KORPS where KODE_KORPS=$kode_korps";
    			$sql=mysql_query($prnth,$conn);
    				if (! $sql) 
    				die ("Perintah gagal");
    			$tanda=0;
    			$hasil_korps = mysql_fetch_array($sql);
    			echo $hasil_korps['KORPS'];    
            }else{
                echo " ";
            }
			?>
</td>
	</tr>
	<tr>
		<td style="width: 457px; height: 23px;color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;NRP / NIP</td>
		<td style="height: 23px; width: 15px;" class="standardteks" align="right">:</td>
		<td style="height: 23px; width: 15px;" class="standardteks" >
		&nbsp;</td>
		<td style="height: 23px; width: 593px;" class="standardteks" colspan="3" >
		<?php	
		  echo $_POST['NRP_tampil'];
		?>
		</td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Satker</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px" class="standardteks">&nbsp;</td>
		<td style="width: 593px" class="standardteks" colspan="3"><?php 
        if ($satker==""){
            ?><font color="red">Satker tidak terecord</font>
        <?php
        }else{
        echo $satker;    
        }
        ?></td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Tanggal Berlaku</td>
		<td style="width: 15px" align="right" class="standardteks"><span lang="id">:</span></td>
		<td class="standardteks" style="width: 15px">&nbsp;</td>
		<td class="standardteks" style="width: 593px" colspan="3"><?php 
        //echo "dedy"; 
		if($tgl_berlaku==""){
            echo "  ";
        }else{
            $bulanangka=substr($tgl_berlaku,2,2);
    		switch ($bulanangka) {
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
    			default	   : $bulan = " ";break;
   			}
    		$tanggal=substr($tgl_berlaku,0,2);
    		$tahun=substr($tgl_berlaku,4,2);
            if(substr($tgl_berlaku,4,1)=="9"){
                echo $tanggal." ".$bulan." 19".$tahun;
            }else{
                echo $tanggal." ".$bulan." 20".$tahun;    
            }
        }
        ?>
		</td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Tanggal Expired</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3"><?php 
		$bulanangka=substr($tgl_expired,2,2);
        	if($tgl_berlaku==""){
            echo "  ";
        }else{
		switch ($bulanangka) {
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
			default	   : $bulan = "";
			}
		$tanggal=substr($tgl_expired,0,2);
        if(substr($tgl_expired,-2,1)=="9"){
            $tahun="19".substr($tgl_expired,4,2);
    		
        }else{
            $tahun="20".substr($tgl_expired,4,2);
        }
        echo $tanggal." ".$bulan." ".$tahun;
        }
        ?></td>
	</tr>
    <tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Telepon</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3" ><?php echo $_POST['telepon'];?></td>
	</tr>
	<tr>
		<td style="width: 457px; color:white;height:21px;" class="standardteks" bgcolor="green">&nbsp;&nbsp;&nbsp;Foto Penghuni</td>
		<td style="width: 15px" class="standardteks" align="right">:</td>
		<td style="width: 15px; color:" class="standardteks">&nbsp;</td>
		<td style="width: 593px;color:" class="standardteks" colspan="3" ><font color="red">Tidak Ada Foto</font></td>
	</tr>
	<tr>
		<td style="width: 457px" class="standardteks" >&nbsp;</td>
		<td style="width: 15px" class="style4">&nbsp;</td>
		<td class="style16" style="width: 15px">&nbsp;</td>
		<td class="style16" style="width: 593px" colspan="3"><span lang="id">
		-----------------------------------</span></td>
	</tr>
	</table>
    <?php 
    $perintahkomplek="select * from tbl_komplek where komplek='$komplek';";
    $sql_komplek=mysql_query($perintahkomplek,$conn);
    $hasilkomplek=mysql_fetch_array($sql_komplek);
    $id_komplek=$hasilkomplek['ID_KOMPLEK'];
    ?>
		<table style="width: 53%; height: 40px;" align="center">
			<tr>
				<td style="width: 97px" align="center">&nbsp;</td>
				<td style="width: 178px;color:blue;" align="center"><a href="Javascript:buka('<?php echo 'sip_cetak1.php?id_rumah='.$id_rumah.'&&nrp='.$nrp;?>')" style="color:blue">Cetak Hal. Depan</a></td>
				<td align="center" style="width: 196px;"><a href="javascript:buka('<?php echo 'sip_cetak2.php?id_rumah='.$id_rumah;?>')" style="color:blue">Cetak Hal. Belakang</a></td>
                <td align="center" style="width: 196px;"><a href="javascript:kembalilist('<?php echo 'sip_list_update.php?pilihankomplek='.$id_komplek;?>')" style="color:blue">Kembali ke Daftar komplek</a></td>
				<td align="center">&nbsp;</td>
			</tr>
        </table>
<?php 

    if($proses_sip==2){
            
          // echo "Proses yang dipilih adalah OVB";
           //$nrp_awal=$_POST['NRP'];
           
           $nrp_akhir=$nrp;
           $nama_akhir=$nama_penghuni;
           $kode_kat_akhir=$kode_kat;
           $kode_korps_akhir=$kode_korps;
           $kode_status_akhir=$status;
           
           //echo "<br>".$id_rumah."  ";
//           echo $nrp_awal. " ".$nama_awal." ".$kode_kat_awal." ".$kode_korps_awal." ".$kode_status_awal."<br>";
//           echo $nrp_akhir. " ".$nama_akhir." ".$kode_kat_akhir." ".$kode_korps_akhir." ".$kode_status_akhir."<br>";
           
           $tgl_ovb=$_POST['tanggal_ovb'].$_POST['bulan_ovb'].$_POST['tahun_ovb'];
           
           $perintah_ovb="INSERT INTO tbl_ovb(`ID_RUMAH`, `NRP_AWAL`, `NAMA_AWAL`, `KODE_KAT_AWAL`, `KODE_KORPS_AWAL`,`KODE_STATUS_AWAL`, 
                                            `NRP_AKHIR`, `NAMA_AKHIR`, `KODE_KAT_AKHIR`, `KODE_KORPS_AKHIR`, `KODE_STATUS_AKHIR`, `TGL_OVB`) 
                         VALUES ('$id_rumah', '$nrp_awal', '$nama_awal', '$kode_kat_awal', '$kode_korps_awal', '$kode_status_awal',
                         '$nrp_akhir', '$nama_akhir', '$kode_kat_akhir', '$kode_korps_akhir', '$kode_status_akhir','$tgl_ovb');";
		   $sql_ovb=mysql_query($perintah_ovb,$conn);
           if (!$sql_ovb)
            die("peritah OVB Gagal");

           
           
        }
}else{
    ?>
        <script type="text/javascript" language="javascript">
        alert ("Proses SIP belum dipilih, Perpanjang SIP / Pengalihan SIP")
        history.back()
        </script>
<?php
}?>
</body>

</html>