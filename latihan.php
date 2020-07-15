<html>
<head>
<title>passing javascript variable to php</title>

</head>

<body>
<?php
$MyPHPStringVar="Dedy";
$MyPHPNumVar=12345;

$tes=time();
echo "$tes"."<br>";

$hari = 15;
$bulan = 07;
$tahun = 2011;
$tes=(mktime (0,0,0,$bulan,$hari,$tahun) - mktime (0,0,0,07,17,2011))/86400;

$tes=intval($tes);

//settype($tes,integer);

echo "$tes";


?>

<script type="text/javascript"> 
    var MyJSStringVar = "<?php Print($MyPHPStringVar); ?>"; 
    var MyJSNumVar = <?php Print($MyPHPNumVar); ?>; 
    
	//document.write(MyJSStringVar);

	</script> 

	
	<?php

$variabelphp = '<script language="JavaScript" type="text/JavaScript">;

document.write(MyJSStringVar);

</script>';

echo $variabelphp;
?>
</body>
</html>