<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Sistem Informasi Rumah Negara 1.1</title>
		<?php 
			include("menuatas.php");
		?>
		<link rel="stylesheet" type="text/css" href="menucss.css" title="Style" />
		<script src="jquery-1.11.1.js"></script>
		<script>
			$(document).ready(function(){
			$('#koderumah').focus();
			//alert("prcobaan");
			//fungsi untuk menampilkan data
			function tampildata(){
				$.ajax({
					type	: "POST",
					url		: "proseslamp.php",
					data	: "aksi=tampil",
					success	: function(data){
						$("#tampilkan").html(data);
					}
				});
			}
			tampildata();
			
			//Tekan enter terus tambah data
			$("#koderumah").keypress(function(e){
				var tekan=e.which;
				if (tekan==13) {
					 var koderumah=$("#koderumah").val();
					 $.ajax({
						 type	:"POST",
						 url	:"proseslamp.php",
						 data	:"aksi=tambah&koderumah="+koderumah,
						 success:function(data){
							$("#berita").html(data);
							tampildata();
						 }
					});
					//alert(koderumah)
					//$("#berita").show();
					//$("#berita").fadeOut(1500);
					$("#koderumah").val("");
					
				}
			});
		});
		</script>
	</head>
	<body>
		
	<p align="center" bgcolor="#F2E6FF" cellspacing="0"><input  class="standardteks" style="width: 45%; height: 20px; border-color:white;" type="text" value="" id="koderumah"/></p>

	<div id="tampilkan"></div>

</body>
</html>
