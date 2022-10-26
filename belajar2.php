<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="refresh" content="60" />
<style type="text/css">
html, body{
		height:100%;
		padding:0;
		background:#C0C0C0;
		margin:0;
		}
/*HEADER LAYOUT*/
#header{
		background:#ffffff;
		padding:8px;
		box-shadow: 0 4px 2px -2px #aaaaaa;
		}
#header h1{
		padding:4px;
		margin:0;
		}
#header h3{
		margin:0;
		padding:4px;
		}
/*MAIN LAYOUT*/
#main{
		height:80%;
		background:#eeeeee;
		padding:5px;
		overflow-y:scroll;
		margin:8px;
		}
#main #left{
		height:100%;
		width:40%;
		background:pink;
		float:left;
		}
#main #left h3{
		padding:8px;
		background:white;
		margin:0;
		}
#main #left #qrCode{
		width:100%;
		background:red;
		padding:0;
		}
#main #right{
		height:100%;
		width:60%;
		float:right;
		background:#ffffff;
		}
#time{
		font-size:25px;
		padding:16px;
		clear:both;
		overflow:hidden;
	}
#date{
	width:60%;
	float:left;
	}
#clock{
	overflow:hidden;
	float:right;
	width:130px;
	}
#informasi{
	background:#eeeeee;
	height:100%;
	width:96%;
	margin:0px 2%;
	}
/*FOOTER LAYOUT*/
#footer{
		height:5%;
		background:#555555;
		}
</style>
</head>
<body>
<div id="header">
	<h1>HeppyBee Studios</h1>
	<h3>ABSENSI</h3>
</div>
<div id="main">
	<div id="left"><?php
	// memanggil library php qrcode
	include "phpqrcode/qrlib.php"; 
	
	// nama folder tempat penyimpanan file qrcode
	$penyimpanan = "temp/";
	
	// membuat folder dengan nama "temp"
	if (!file_exists($penyimpanan))
	mkdir($penyimpanan);
	
	// timezone
	date_default_timezone_set('Asia/Jakarta');
	
	// isi qrcode yang ingin dibuat. akan muncul saat di scan
	$isi = 'HappyBee Studios
tanggal = '.date('d-m-Y').'
jam = '.date('H:i:s'); 
	
	// perintah untuk membuat qrcode dan menyimpannya dalam folder temp
	// atur level pemulihan datanya dengan QR_ECLEVEL_L | QR_ECLEVEL_M | QR_ECLEVEL_Q | QR_ECLEVEL_H
	// atur pixel qrcode pada parameter ke 4
	QRcode::png($isi, $penyimpanan.'004_4.png', QR_ECLEVEL_H, 10); 
	
	echo '<h3 align="center">Scan QR untuk melakukan Absensi</h3>';
	// menampilkan qrcode 
	echo '<img id="qrCode"src="'.$penyimpanan.'004_4.png">';
	?></div>
	<div id="right">
	<div id="time">
		<div id="date">
			<script language="JavaScript">
				var tanggallengkap = new String();
				var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
				namahari = namahari.split(" ");
				var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
 				namabulan = namabulan.split(" ");
					var tgl = new Date();
				var hari = tgl.getDay();
				var tanggal = tgl.getDate();
				var bulan = tgl.getMonth();
				var tahun = tgl.getFullYear();
				tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
				document.getElementById('date').innerHTML = tanggallengkap;
			</script>
			<span id="date"></span> 
		</div>
		<div id="clock">
			<span id="jam"></span><span> :</span>
			<span id="menit"></span><span> :</span>
			<span id="detik"></span>
		</div>
	</div>
	<div id="informasi">
	
	</div>
	</div>
	
	<script>
		window.setTimeout("waktu()", 1000);	
		function waktu() {
			var waktu = new Date();
			setTimeout("waktu()", 1000);
			document.getElementById("jam").innerHTML = waktu.getHours();
			document.getElementById("menit").innerHTML = waktu.getMinutes();
			document.getElementById("detik").innerHTML = waktu.getSeconds();
		
		}
	</script>
	</div>
</div>
<div id="footer"></div>
</body>
</html>