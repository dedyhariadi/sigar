<?php
//session_destroy();
//session_name("AUTHEN");

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Sistem Informasi Personel Lantamal V ::..</title>

<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />

<link href="Gambar/logo.png" rel="SHORTCUT ICON" />

<style type="text/css">
<!--
body {
	background-color: #FBFBF9;
}
#form1 table {

	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}

.style1 {
	text-align: left;
}
.style2 {
	text-align: center;
}
.style3 {
	font-family: Meiryo;
	text-align: center;
	border-bottom-style: groove;
}
.style4 {
	letter-spacing: 3pt;
	font-size: x-large;
	background-color: #C0C0C0;
}
.style5 {
	font-family: "Plantagenet Cherokee";
	font-size: medium;
}
.style6 {
	letter-spacing: 3pt;
	font-size: xx-large;
}
.style7 {
	text-align: center;
	background-color: #FFFFFF;
	padding: 0px;
	height: 27px;
}
.style3 {
	border-bottom-style:ridge ;
	height: 58px;
}
.style9 {
	font-family: "Plantagenet Cherokee";
	font-size: 3pt;
	color: #FFFFFF;
	height: 7px;
}
.style10 {
	background-color: #FFFFFF;
}
.style11 {
	letter-spacing: -3pt;
	font-size: x-large;
	background-color: #FFFFFF;
	vertical-align: middle;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="POST" action="proses.php">

<table style="width: 495px; height: 206px;" align="center">
	<!-- MSTableType="layout" -->
	<tr>
		<td rowspan="4">
		<img alt="Disminpers" src="Gambar/logotransparan.png" width="220" height="137" /></td>
    	<td>
		&nbsp;<td colspan="3" class="style3"><span class="style6">LOG</span><strong><span class="style11"><span class="style10">IN</span></span><span class="style4"><span class="style10"><br>
		</span></span></strong></td>
	</tr>
	<tr>
		<td ></td>
		<td class="style9" colspan="3">a</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="standardteks">User</td>
		<td>:</td>
		<td class="style7">
			<input name="nama_pengguna" type="text" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="standardteks">Password</td>
		<td>:</td>
		<td style="height: 29px">
			<input name="kata_kunci" type="password" />
		</td>
	</tr>
	<tr>
		<td style="width: 220px;">&nbsp;</td>
		<td style="width: 44px">&nbsp;</td>
		<td style="width: 77px">&nbsp;</td>
		<td style="width: 4px">&nbsp;</td>
		<td style="height: 22px">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4">

			<input style="margin-left: 300px;" name="simpan" type="submit" value="Masuk" />
		</td>
		<td style="height: 34px; width: 128px">&nbsp;</td>
	</tr>
</table>
</form>
</body>
</html>
