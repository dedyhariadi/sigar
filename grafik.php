<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Komplek</title>
<link rel="stylesheet" type="text/css" href="menucss.css" title="Style">


<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="moris/morris.css">
<script src="moris/jquery.min.js"></script>
<script src="moris/raphael-min.js"></script>
<script src="moris/morris.min.js"></script>
<script type="text/javascript">
    
    function jumprumah(){
		var daftarkmplk=document.getElementById("kmplk")
		var pilihankmplk=daftarkmplk.options[daftarkmplk.selectedIndex].value
		location.href="grafik.php?pilihankomplek="+pilihankmplk;
	}
    
</script>

</head>

<body>
<?php 
	include("menuatas.php");
	include ("sambungan.php");
    function ubahnama($angkabulan){
        
        switch ($angkabulan){
                
                    case "01":
                        $nmabulan="Januari";
                        break;
                    case "02":
                        $nmabulan="Februari";
                        break;
                    case "03":
                        $nmabulan="Maret";
                        break;
                    case "04":
                        $nmabulan="April";
                        break;
                    case "05":
                        $nmabulan="Mei";
                        break;
                    case "06":
                        $nmabulan="Juni";
                        break;
                    case "07":
                        $nmabulan="Juli";
                        break;
                    case "08":
                        $nmabulan="Agustus";
                        break;
                    case "09":
                        $nmabulan="September";
                        break;
                    case "10":
                        $nmabulan="Oktober";
                        break;
                        
                    case "11":
                        $nmabulan="Nopember";
                        break;
                        
                    case "12":
                        $nmabulan="Desember";
                        break;
                }

        return $nmabulan;
    }
    
    ?>

<p class="judul">SIP Expired </p>

    
<p style="font-family:'Berlin Sans FB';" align="center">&nbsp;</p>
    <table border="0" width=100%>
    <thead>
        <td style="width:20%;"></td>
        <td align="center">
            <select name="pilihankomplek" style="width: 146px;" onchange="jumprumah()" id="kmplk" class="standardteks">
            <?php
            $komplekcari="";
			$komplek = $_GET['pilihankomplek'];	    	
			$perintahkomplek="SELECT * FROM tbl_komplek";
			$sqlkomplek=mysql_query($perintahkomplek);
		
			     while ($kompleksql = mysql_fetch_array($sqlkomplek)) { 
				        if($komplek==$kompleksql[0]){?>
                            <option value="<?php echo $kompleksql[0];?>" selected="selected"><?php echo $kompleksql[1];?></option>

				            <?php
                            $komplekcari=$kompleksql[2];                         
                         }else{
                            ?>
					       <option value="<?php echo $kompleksql[0];?>" ><?php echo $kompleksql[1];?></option>				
				            <?php
				            }
			         }	
                ?>
          </select>
            
        <div id="grafik1" style="height: 250px;width:100%;align:center" align="center"></div>
        </td>
        <td style="width:20%;"></td>
        </thead>
        
    </table>
    
    <?php 
            
          $prnth_expired="SELECT * FROM TBL_SIP where ID_RUMAH like '$komplekcari%' ORDER BY NO_URUT ASC";
        
		  $sql_expired=mysql_query($prnth_expired,$conn);
			if (! $sql_expired) 
			die ("Perintah expired gagal");
            
		$tgl_today=date("d");
		$bulan_today=date("m");
		$tahun_today=date("y");
		$h=1;
		

            $tgl_today=date("d");
			$bulan_today=date("m");
			$tahun_today="20".date("y");
            $jd1=gregoriantojd($bulan_today,$tgl_today,$tahun_today);
    
        while($hasil_expired=mysql_fetch_array($sql_expired)){
		  
        	
         $tglexpired=$hasil_expired['TGL_EXPIRED'];
					
				$thn_akhir=substr($tglexpired,-2);
				
                if(substr($thn_akhir,0,1)=="9"){
                    $thn_akhir= "19".$thn_akhir;
                }else{
                    $thn_akhir= "20".$thn_akhir;    
                }
                $bln_akhir=substr($tglexpired,2,2);
				$tgl_akhir=substr($tglexpired,0,2);
				
                $jd2=gregoriantojd($bln_akhir,$tgl_akhir,$thn_akhir);
                		
				$selisih=$jd2-$jd1;
                
		if($selisih<0){
	        $hasilkoderumah[$h]=$hasil_expired['ID_RUMAH'];
        //    $hasilnrp[$h]=$hasil_expired['NRP'];
        //    $hasilsip[$h]=$hasil_expired['NO_SIP'];
            $hasiltglexpired[$h]=$hasil_expired['TGL_EXPIRED'];
            $h=$h+1;
            
		  }
		}
    for ($t=1;$t<$h;$t++){
        echo $t." ".$hasilkoderumah[$t]." ".$hasiltglexpired[$t]."  ";
        $bulanexpired[$t]=substr($hasiltglexpired[$t],2,2);
        echo $bulanexpired[$t]."<br/>";
    }

//    $hasilgrup=array_group_by($bulanexpired[$t]

    ?>

    <table align=center class="standardteks">
        <thead>
            <tr style="background-color:#DDBBFF" align="center">
                <td style="width:20%" align=center>No</td>
                <td>Bulan</td>
                <td style="width:50%">SIP Expired</td>
            </tr>
        </thead>

        <tbody>
            <!--
            <?php 
              //  $jumlah=0;
           //     for ($e=1;$e<=$h-1;$e++){
                    
            ?>
            <tr style="background-color: #F8F0FF;" >
                
                <td align=center><?php// echo $e;?></td>
                <td>&nbsp;&nbsp;<?php //echo $namabulan[$e];?></td>
                <td align="right"><?php //echo $jmlexpired[$e];?> Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <?php // $jumlah=$jumlah+$jmlexpired[$e];?>
            </tr>        
    
            
            <?php
              //  }?>
                <td align=center></td>
                <td>&nbsp;&nbsp;JUMLAH</td>
                <td align="right"><?php //echo $jumlah;?> Rumah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            
            
        </tbody>-->
    </table>
    
<script type="text/javascript">

new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'grafik1',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?php 
      for ($t= 1; $t <= $a-1; $t++)
      { 
     ?>
		{ Bulan: '<?php echo $namabulan[$t]; ?>', jmlexpired : <?php echo $jmlexpired[$t];?> },
        
     <?php } ?>
         
  ],
  
  // The name of the data record attribute that contains x-values.
  xkey: 'Bulan',
    
  // A list of names of data record attributes that contain y-values.
  ykeys: ['jmlexpired'],
  
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['jmlexpired'],
  
  parseTime : false,
        resize : true,
        xLabelAngle: '50',
       // pointFillColors: ['#ffffff'],
        //pointStrokeColors: ['black'],
       // lineColors: ['gray', 'red'],
       // padding : 5,
        fillOpacity: 0.2
});
</script>

</body>

</html>
