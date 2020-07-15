<html>
<head>
<script language="javascript" type="text/javascript">
function percobaan(){
    document.form1.coba.style.visibility="hidden"    
}

function tampil(){
    document.form1.coba.style.visibility="visible"    
}


</script>
</head>
<body>
<form name="form1">
<input type="radio" name="radio" onclick="javascript:percobaan()"/>
<input type="radio" name="radio" onclick="javascript:tampil()"/>
<select name="coba" style="visibility: hidden;">
<option value="satu"> satu</option>
</select>
</form>
</body>
</html>