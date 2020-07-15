<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>


<form method="get" action="latihan3.php">
<?php 
$a=1;
for($a=1;$a<10;$a++){?>
	<input name="<?php echo "nama".$a?>" type="text" /><br>
<?php }?>
<input name="Submit1" type="submit" value="submit" />
</form>

</body>

</html>
