<?php

/**
 * @author subdiswatpers
 * @copyright 2013
 */

require('fpdf.php');
include("sambungan.php");

// Nulis NOMOR SIP
$id_rumah= $_GET['id_rumah'];
$nrp= $_GET['nrp'];
$prnth="SELECT * FROM TBL_SIP WHERE ID_RUMAH='$id_rumah' AND NRP='$nrp';";
 		 
$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal 1");
$data=mysql_fetch_array($sql);

if(substr($data['NO_SIP'],-4)=="9999"){
            $nosipcetak="";
        }else{
        	$posisistrip=strpos($data['NO_SIP'],"/");
    		$nomorsip=explode("/",$data['NO_SIP']);
            $nosipcetak=$nomorsip[0];
            
    		//echo trim($nomorsip);
    		$tanggal=substr($data['NO_SIP'],$posisistrip+1,2);
    		$bulan=substr($data['NO_SIP'],$posisistrip+3,2);
    		$tahun=substr($data['NO_SIP'],$posisistrip+5,2);
    		switch ($bulan) {
    			case '01' : $bulanromawi = "I"; break;
    			case '02' : $bulanromawi = "II"; break;
    			case '03' : $bulanromawi = "III"; break;
    			case '04' : $bulanromawi = "IV"; break;
    			case '05' : $bulanromawi = "V"; break;
    			case '06' : $bulanromawi = "VI"; break;
    			case '07' : $bulanromawi = "VII"; break;
    			case '08' : $bulanromawi = "VIII"; break;
    			case '09' : $bulanromawi = "IX"; break;	
    			case '10' : $bulanromawi = "X"; break;
    			case '11' : $bulanromawi = "XI"; break;
    			case '12' : $bulanromawi = "XII"; break;
    			default	  : $bulanromawi = "  ";
    			}
    		$awalangkatahun=substr($data['NO_SIP'],$posisistrip+5,1);
    		if($awalangkatahun==9){
    			$tahun="19".$tahun;
    		}else{
    			$tahun="20".$tahun;
    		}
    		$nosipcetak=$nosipcetak."/".$bulanromawi."/".$tahun;
		}

// Batas Nulis SIP

//Nama Penghuni
$prnth="SELECT * FROM tbl_penghuni
				WHERE NRP='$nrp';";
				  		 
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal 2");
			$data_penghuni=mysql_fetch_array($sql);
			$kode_statuss=$data_penghuni['KODE_STATUS'];
            $cetaknamapenghuni=$data_penghuni['NAMA_PENGHUNI'];
            $cetaksatker=$data_penghuni['SATKER'];
            $cetakjabatan=$data_penghuni['JABATAN'];
// Batas Nulis Nama Penghuni

//Alamat

$prnth="SELECT * FROM tbl_rumah	WHERE ID_RUMAH='$id_rumah';";

	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal 3");
	$data_rumah=mysql_fetch_array($sql);
	$alamat=$data_rumah['ALAMAT'];
	$id_komplek=$data_rumah['ID_KOMPLEK'];
	$prnth="SELECT * FROM tbl_komplek WHERE ID_KOMPLEK='$id_komplek';";
	$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal 4 ");
	$data_komplek=mysql_fetch_array($sql);
	$komplek=$data_komplek['KOMPLEK'];
	//$komplek=ucwords($komplek);
	if ($id_komplek==1 or $id_komplek==2 or $id_komplek==8 or $id_komplek==10){
		$komplek="";
	}

    $cetakalamat=$alamat." ".ucfirst(strtolower($komplek));
    if ($id_komplek==3 or $id_komplek==4 or $id_komplek==6){
		$cetakalamat=$cetakalamat." Sidoarjo";
	}else{
	   $cetakalamat=$cetakalamat." Surabaya";
	}    
//batas alamat

//tgl berlaku

if (strlen($data['TGL_BERLAKU'])==5){
	$tglberlaku="0".$data['TGL_BERLAKU'];
}else{
	$tglberlaku=$data['TGL_BERLAKU'];
}


$tgl_berlaku=substr($tglberlaku,0,2);
$bulan_berlaku=substr($tglberlaku,2,2);
$tahun_berlaku=substr($tglberlaku,-2);
switch ($bulan_berlaku) {
		case '01' : $bulan_berlaku = "Januari"; break;
		case '02' : $bulan_berlaku = "Februari"; break;
		case '03' : $bulan_berlaku = "Maret"; break;
		case '04' : $bulan_berlaku = "April"; break;
		case '05' : $bulan_berlaku = "Mei"; break;
		case '06' : $bulan_berlaku = "Juni"; break;
		case '07' : $bulan_berlaku = "Juli"; break;
		case '08' : $bulan_berlaku = "Agustus"; break;
		case '09' : $bulan_berlaku = "September"; break;	
		case '10' : $bulan_berlaku = "Oktober"; break;
		case '11' : $bulan_berlaku = "Nopember"; break;
		case '12' : $bulan_berlaku = "Desember"; break;
		default	   : $bulan_berlaku = " ";
		}

 if(substr($tahun_berlaku,0,1)=="9"){
        $cetaktglberlaku=$tgl_berlaku." ".$bulan_berlaku. " 19".$tahun_berlaku;
  }else{
        $cetaktglberlaku=$tgl_berlaku." ".$bulan_berlaku. " 20".$tahun_berlaku;
    }

// terakhir berlaku

//tgl expired

if (strlen($data['TGL_EXPIRED'])==5){
	$tglexpired="0".$data['TGL_EXPIRED'];
}else{
	$tglexpired=$data['TGL_EXPIRED'];
}

//$mont=substr($tglexpired)
$tgl_expired=substr($tglexpired,0,2);
$bulan_expired=substr($tglexpired,2,2);
$tahun_expired=substr($tglexpired,-2);
switch ($bulan_expired) {
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
		default	   : $bulan = " ";
		}
        
  if(substr($tahun_expired,0,1)=="9"){
        $cetaktglexpired=$tgl_expired." ".$bulan. " 19".$tahun_expired;
  }else{
        $cetaktglexpired=$tgl_expired." ".$bulan. " 20".$tahun_expired;
    }

//terakhir expired

//pangkat

$kode_kat=$data_penghuni['KODE_KAT'];
		$kode_korps=$data_penghuni['KODE_KORPS'];
		$cetakpangkatkorps="";
		//cari pangkat	
		$prnth="SELECT * FROM tbl_pangkat
			WHERE Kode_kat='$kode_kat';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal 5");
			$data_pangkat=mysql_fetch_array($sql);
			$pangkat=$data_pangkat['Pangkat'];
			
			
		//cari korps
		$prnth="SELECT * FROM tbl_korps
			WHERE KODE_KORPS='$kode_korps';";
			$sql=mysql_query($prnth,$conn);
				if (! $sql) 
				die ("Perintah gagal 6 ");
			$data_korps=mysql_fetch_array($sql);
			
			$korps=$data_korps['KORPS'];
			
            if($kode_statuss==1){
                $cetakpangkatkorps=$pangkat." ".$korps;
    			$hrfdepan=substr($nrp,0,2);
    			if($hrfdepan=="NA") 
    			{
    				$cetakpangkatkorps=$cetakpangkatkorps." ";	
    			}else{
    			    if($kode_kat<=27){
    			         if ($kode_kat<=6){
    			             $cetakpangkatkorps=$cetakpangkatkorps." ";    
    			         }else{
    			             $cetakpangkatkorps=$cetakpangkatkorps." ".$nrp;
    			         }
    			    }else{
    			         $cetakpangkatkorps=$cetakpangkatkorps." ".$nrp;
    			    } 
    			}
            }
            
            if($kode_statuss==2 || $kode_statuss==3){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                $cetakpangkatkorps=$cetakpangkatkorps.$pangkat." (".$hasil_statuss['STATUS'].")";
            }
            
            if($kode_statuss==4 || $kode_statuss==5 || $kode_statuss==6){
    			$perintah_status="SELECT * FROM TBL_STATUS WHERE KODE_STATUS='$kode_statuss';";
                $sql_statuss=mysql_query($perintah_status,$conn);
                    if (!$sql_statuss)
                        die("Perintah status gagal");
                $hasil_statuss=mysql_fetch_array($sql_statuss);              
                $cetakpangkatkorps=$hasil_statuss['STATUS']." ".$pangkat;
                if($data_penghuni['NAMA_ANGGOTA']==$data_penghuni['NAMA_PENGHUNI']){
                    $cetakpangkatkorps=$cetakpangkatkorps." ";
                }else{
                    $cetakpangkatkorps=$cetakpangkatkorps." ".$data_penghuni['NAMA_ANGGOTA'];
                }
            }			


//terakhir pangkat


$pdf=new FPDF('P','mm','A5');
$pdf->SetMargins(12,10,10);
$pdf->AddPage();
$pdf->setAutoPageBreak(True,10);
$pdf->SetFont('Arial','',9.5);
$pdf->Cell(65,4,'KOMANDO ARMADA RI KAWASAN TIMUR',0,1,'C');
$pdf->Cell(65,4,'PANGKALAN UTAMA TNI AL V',0,1,'C');
$pdf->Ln();
//$pdf->Cell(70,4,'',1,'R');
$pdf->Line(12,18,77,18);
$pdf->Ln();
$pdf->Image('gambar/tnial.jpg',69,19,17,15);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(132,4,'SURAT IZIN PENGHUNIAN RUMAH NEGARA',0,1,'C');
if($nosipcetak<>""){
    $pdf->Cell(132,4,'Nomor : SIP/'.$nosipcetak,0,1,'C');    
}else{
    $pdf->Cell(40,4,'',0,0,'L');
    $pdf->Cell(70,4,'Nomor : SIP/',0,1,'L');
}

$pdf->Ln();
$pdf->Cell(132,4,'1.   Diizinkan kepada :',0,1,'L');
$pdf->Cell(45,4,'      Nama ',0,0,'L');
$pdf->Cell(20,4,':  '.$cetaknamapenghuni,0,1,'L');
$pdf->Cell(45,4,'      Pangkat, Korps, NRP/NIP',0,0,'L');
$pdf->Cell(20,4,':  '.$cetakpangkatkorps,0,1,'L');
$pdf->Cell(45,4,'      Jabatan',0,0,'L');
$pdf->Cell(20,4,':  '.$cetakjabatan,0,1,'L');
$pdf->Cell(45,4,'      Satker',0,0,'L');
$pdf->Cell(20,4,':  '.$cetaksatker,0,1,'L');
$pdf->Ln();
$pdf->Cell(132,4,'2.   Untuk Menempati rumah :',0,1,'L');
$pdf->Cell(45,4,'      Alamat ',0,0,'L');
$pdf->Cell(3,4,':   ',0,0,'L');
$pdf->MultiCell(90,4,$cetakalamat.'  ('.$id_rumah.')',0,'J');
$pdf->Cell(45,4,'      Sebagian/Seluruhnya ',0,0,'L');
$pdf->Cell(20,4,':  Seluruhnya',0,1,'L');
$pdf->Cell(45,4,'      Tipe rumah ',0,0,'L');
$pdf->Cell(20,4,':  '.$data_rumah['L_RMH'],0,1,'L');
$pdf->Cell(45,4,'      Dipakai untuk ',0,0,'L');
$pdf->Cell(20,4,':  Tempat Tinggal',0,1,'L');
$pdf->Cell(45,4,'      Terhitung mulai',0,0,'L');
$pdf->Cell(20,4,':  '.$cetaktglberlaku,0,1,'L');
$pdf->Cell(45,4,'      Berlaku sampai ',0,0,'L');
$pdf->Cell(20,4,':  '.$cetaktglexpired,0,1,'L');
$pdf->Ln();

$pdf->Cell(132,4,'3.   Jumlah Keluarga ',0,1,'L');
//
$pdf->Ln();

// Proses tabel keluarga

$pdf->Cell(7,4,'',0,0,'C');
$pdf->Cell(6,8,'NO',1,0,'C');
$pdf->Cell(45,8,'NAMA KELUARGA',1,0,'C');

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(8,4,'LK / PR',1,'C');
$pdf->SetXY($x+8,$y);

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(30,4,'TEMPAT, TGL LAHIR',1,'C');
$pdf->SetXY($x+30,$y);

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(26,4,'HUBUNGAN KELUARGA',1,'C');
$pdf->SetXY($x+26,$y);

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Cell(9,8,'KET',1,1,'C');



//$pdf->Cell(30,4,'KELUARGA',1,0,'C');
//$pdf->Cell(6,4,'LK/PR',1,0,'C');
//$pdf->Cell(30,4,'TEMPAT, TGL LAHIR',1,0,'C');
//$pdf->Cell(30,4,'HUBUNGAN KELUARGA',1,0,'C');
//$pdf->Cell(10,4,'KET',1,1,'C');

$pdf->Cell(7,4,'',0,0,'C');
$pdf->Cell(6,4,'1',1,0,'C');
$pdf->Cell(45,4,'2',1,0,'C');
$pdf->Cell(8,4,'3',1,0,'C');
$pdf->Cell(30,4,'4',1,0,'C');
$pdf->Cell(26,4,'5',1,0,'C');
$pdf->Cell(9,4,'6',1,1,'C');
//

$prnth="SELECT * FROM tbl_keluarga WHERE NRP='$nrp' ORDER BY ID_KELUARGA ASC;";
 		 
$sql=mysql_query($prnth,$conn);
		if (!$sql) 
		die ("Perintah gagal 7");
        
    $nokeluarga=0;
        
while($datakeluarga=mysql_fetch_array($sql)){
    $nokeluarga++;
    $pdf->Cell(7,4,'',0,0,'C');
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->Cell(6,4,$nokeluarga,'LTR',2,'C');
    $pdf->Cell(6,4,'','LBR',0,'L');
     
      
    $panjangnama=strlen($datakeluarga['NAMAKELUARGA']);
    $pdf->SetXY($x+6,$y);
    if ( $panjangnama < 28 ){
        $pdf->Cell(45,4,$datakeluarga['NAMAKELUARGA'],'LTR',2,'L');
        $pdf->Cell(45,4,'','LBR',1,'L');
    }
        
    
    
    //$pdf->Cell(45,4,$panjangnama,1,1,'C');
    
    //$pdf->drawTextBox($datakeluarga['NAMAKELUARGA'], 45, 8, 'L', 'T', 1);
    //$pdf->MultiCell(45,8,$datakeluarga['NAMAKELUARGA'],1,'L');
    $pdf->SetXY($x+51,$y);

    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->Cell(8,4,$datakeluarga['GENDER'],'LTR',2,'C');
    $pdf->Cell(8,4,'','LBR',1,'L');
    $pdf->SetXY($x+8,$y);
    
    
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    
    if (strlen($datakeluarga['TGLLAHIR'])==5){
	$tglberlaku="0".$datakeluarga['TGLLAHIR'];
    }else{
	$tglberlaku=$datakeluarga['TGLLAHIR'];
}


    $tgl_berlaku=substr($tglberlaku,0,2);
$bulan_berlaku=substr($tglberlaku,2,2);
$tahun_berlaku=substr($tglberlaku,-4);
switch ($bulan_berlaku) {
		case '01' : $bulan_berlaku = "Januari"; break;
		case '02' : $bulan_berlaku = "Februari"; break;
		case '03' : $bulan_berlaku = "Maret"; break;
		case '04' : $bulan_berlaku = "April"; break;
		case '05' : $bulan_berlaku = "Mei"; break;
		case '06' : $bulan_berlaku = "Juni"; break;
		case '07' : $bulan_berlaku = "Juli"; break;
		case '08' : $bulan_berlaku = "Agustus"; break;
		case '09' : $bulan_berlaku = "September"; break;	
		case '10' : $bulan_berlaku = "Oktober"; break;
		case '11' : $bulan_berlaku = "Nopember"; break;
		case '12' : $bulan_berlaku = "Desember"; break;
		default	   : $bulan_berlaku = " ";
		}

// if(substr($tahun_berlaku,0,1)<>"0" || substr($tahun_berlaku,0,1)<>"1"){
//        $cetaktgllahir=$tgl_berlaku." ".$bulan_berlaku. " 19".$tahun_berlaku;
//  }else{
//        $cetaktgllahir=$tgl_berlaku." ".$bulan_berlaku. " 20".$tahun_berlaku;
//    }
    $cetaktgllahir=$tgl_berlaku." ".$bulan_berlaku." ".$tahun_berlaku;
    $ttl=$datakeluarga['TEMPATLHR'].', '.$cetaktgllahir;
    //$pdf->MultiCell(26,4,$ttl,1,'L');
    if($datakeluarga['TEMPATLHR']<>""){
        $pdf->Cell(30,4,$datakeluarga['TEMPATLHR'],'LTR',2,'L');
        $pdf->Cell(30,4,$cetaktgllahir,'BLR',1,'L');    
    }else{
        $pdf->Cell(30,4,$cetaktgllahir,'LTR',2,'L');
        $pdf->Cell(30,4,'','BLR',1,'L');
    }
    
    
    $pdf->SetXY($x+30,$y);
    
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $tandahubungan=0;
    if ($datakeluarga['HUBUNGAN']=="ak"){
        $hubungankel="Anak Kandung";
        $tandahubungan=1;
    }
    
    if ($datakeluarga['HUBUNGAN']=="at"){
        $hubungankel="Anak Tiri";
        $tandahubungan=1;
    }
    
    if($tandahubungan==0){
        $hubungankel=$datakeluarga['HUBUNGAN'];
    }
    
    $pdf->Cell(26,4,$hubungankel,'LTR',2,'L');
    $pdf->Cell(26,4,'','LBR',1,'L');
    $pdf->SetXY($x+26,$y);
    
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    if ($datakeluarga['KET']==0){
        $cetakket="-";
    }else{
        $cetakket=$datakeluarga['KET'];    
    }
    
    $pdf->Cell(9,8,$cetakket,1,1,'C');
    //$pdf->Cell(45,8,'NAMA KELUARGA',1,0,'C');
    
}


// end Proses Tabel Keluarga
$pdf->Ln();

$pdf->Cell(132,4,'4.   Dengan catatan :',0,1,'L');
$pdf->Cell(6,4,'',0,0,'L');
$pdf->MultiCell(126,4,'a.  Surat izin ini berlaku dan sah apabila ditandatangani oleh pejabat yang diberi wewenang dalam penerbitan SIP rumah negara.',0,'J');
$pdf->Ln();
$pdf->Cell(6,4,'',0,0,'L');
$pdf->MultiCell(126,4,'b.  Surat izin ini tidak berlaku untuk/anggota lain kecuali yang ditunjuk dalam surat izin ini.',0,'J');
$pdf->Ln();
$pdf->Cell(6,4,'',0,0,'L');
$pdf->MultiCell(126,4,'c.  Bersedia mengosongkan, meninggalkan dan menyerahkan rumah negara yang ditempati tanpa syarat serta dalam keadaan baik dan lengkap apabila personel yang ditunjuk dalam SIP sebagai berikut :',0,'J');
$pdf->Ln();
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'1)  Pensiun.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'2)  Mengundurkan diri atau diberhentikan dari dinas keprajuritan.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'3)  Mendapat rumah negara atau fasilitas rumah dinas.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'4)  Berakhirnya / habis masa berlakunya SIP.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'5)  Terbitnya SIP baru atas nama orang lain.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'6)  Pencabutan SIP yang bersangkutan.',0,'J');
$pdf->Cell(11,4,'',0,0,'L');
$pdf->MultiCell(121,4,'7) Bagi personel yang mutasi pindah bila di tempat baru mendapatkan SIP, maka ybs harus meninggalkan rumah negara yang lama paling lambat tiga bulan.',0,'J');
$pdf->Ln();
$pdf->Cell(6,4,'',0,0,'L');
if ($id_komplek==12){
	$pdf->MultiCell(126,4,'d.  Masa berlaku SIP satu tahun.',0,'J');
}else{
	$pdf->MultiCell(126,4,'d.  Masa berlaku SIP tiga tahun.',0,'J');
}


$pdf->Ln();
$pdf->Cell(65,4,'',0,0,'L');
$pdf->MultiCell(67,4,'Dikeluarkan di Surabaya',0,'J');
$pdf->Cell(65,4,'',0,0,'L');
//$pdf->SetFont('Arial','U',9.5);
$pdf->MultiCell(67,3,'pada tanggal',0,'J');
$pdf->Cell(65,1,'',0,0,'L');
$pdf->MultiCell(70,1,'___________________________________',0,'J');
$pdf->Cell(65,6,'',0,0,'L');
$pdf->MultiCell(67,6,'a.n. Komandan Pangkalan Utama TNI AL V',0,'C');
$pdf->Cell(65,4,'',0,0,'L');
$pdf->MultiCell(67,4,'Wakil Komandan,',0,'C');
$pdf->Cell(65,4,'',0,0,'L');
//$pdf->MultiCell(67,4,'mewakili,',0,'C');
//$pdf->Ln();
$pdf->Ln();
$yy=$pdf->GetY();
//$pdf->Image('gambar/ttdwadan.png',83,$yy-2,45,18);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(65,4,'',0,0,'L');
$pdf->MultiCell(67,4,'Nana Rukmana, S.E.',0,'C');
$pdf->Cell(65,4,'',0,0,'L');
$pdf->MultiCell(67,4,'Kolonel Marinir NRP 9893/P',0,'C');

$pdf->Output();

?>