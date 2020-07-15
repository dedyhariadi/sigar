<html>
<head>
<script type="text/javascript" language="javascript">
    function ubahwarna(){
        var f=0;
        //var objek2=pilihan+f;
        with(document.form_satu){
         if (pilihan[f].checked){
            alert ("cekbok satu terpilih");
         }else{
            alert ("cekbok satu tidak terpilih");
         }       
        }
    }
</script>
</head>
<body>
<form name="form_satu">
    <input type="checkbox" name="pilihan" /><br />
    <input type="checkbox" name="pilihan" />
    <input type="button" onclick="ubahwarna()" />
</form>
</body>
</html>