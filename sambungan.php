   <?php
// koneksi ke mysql
	$host="localhost";
	$user="root";
	$password="";
	$dbnm="sigar";
	$conn=mysql_connect($host,$user,$password);
	if ($conn) {
		$buka=mysql_select_db($dbnm);
		if(!$buka){
			die ("database tidak dapat dibuka");
		}
	}else{
		die ("server mysql tidak terhubung");
	}
?>