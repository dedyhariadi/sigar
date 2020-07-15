<?php
require('fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Simple table
function BasicTable($header, $data)
{
	// Header
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		foreach($row as $col)
			$this->Cell(40,6,$col,1);
		$this->Ln();
	}
}

// Better table
function ImprovedTable($header, $data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

include("sambungan.php");
//$id_rumah= $_GET['id_rumah'];
//$nrp= $_GET['nrp'];

//Nomor SIP

$id_rumah= 'KNJ5';
$nrp= '030033837';

$prnth="SELECT * FROM TBL_SIP WHERE ID_RUMAH='$id_rumah' AND NRP='$nrp';";
 		 
$sql=mysql_query($prnth,$conn);
		if (! $sql) 
		die ("Perintah gagal");
$data=mysql_fetch_array($sql);

 if(substr($data['NO_SIP'],-4)=="9999"){
          //  echo "";
        }else{
        	$posisistrip=strpos($data['NO_SIP'],"/");
    		$nomorsip=explode("/",$data['NO_SIP']);
            //echo $nomorsip[0];
            
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
    		//echo "/".$bulanromawi."/".$tahun;
		}


//end Nomor SIP


$pdf = new PDF();
// Column headings
$pdf->SetFont('Arial','',9);
$pdf->SetMargins(0.2,0.2,0.2);

$pdf->AddPage('P','A5');

$pdf->Cell(80,5,' KOMANDO ARMADA RI KAWASAN TIMUR',0,0,'C' );
$pdf->Ln();
$pdf->Cell(80,5,' PANGKALAN UTAMA TNI AL V',0,0,'C' );
$pdf->Ln();
//$pdf->Line(1,20,20,20);

/*$pdf->Cell(40,30,'SURAT IZIN PENGHUNIAN RUMAH NEGARA' );
$pdf->Cell(40,40,'Nomor : SIP');*/

$pdf->Output();
?>
