<?php
	include 'Koneksi_database_insist.php';
	$id = $_GET['id'];
	session_start();
	$_SESSION['buat_thread'] = $id;
	$ambilnim = mysqli_query($koneksi, "SELECT NIM FROM thread WHERE Id_thread = '$id'"); 
	$hasilambil = mysqli_fetch_array($ambilnim, MYSQLI_ASSOC);
	$nim = $hasilambil['NIM'];
	$ambilnama = mysqli_query($koneksi, "SELECT Nama_mahasiswa FROM mahasiswa WHERE NIM = '$nim'"); 
	$hasilambil2 = mysqli_fetch_array($ambilnama, MYSQLI_ASSOC);
	$nama = $hasilambil2['Nama_mahasiswa'];
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Penulis">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../CSS/Hasil Thread.css">
		<link href="../Foto/LOGO.PNG" rel="shortcut icon">
		<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
	</head>
	<?php
	$ambilthread2 = "SELECT * FROM thread WHERE Id_thread = '$id'";
	$hasil2 = mysqli_query($koneksi, $ambilthread2);
	if ($hasil2 == true)
		{
			while($row2 = mysqli_fetch_array($hasil2, MYSQLI_ASSOC)) 
			{
	?>
	<title><?php echo "$row2[Title_thread]"; ?></title>
	<?php
			}
		}
	?>

	<body>
		<div class="header">
			<div class="header-logo">
				<img src="../Foto/LOGO.PNG" class="logo">
			</div>
		  	<div class="header-right">
		    	<a href="Universitas.php">Universitas</a>
			    <a href="jualbeli.php">Jual Beli</a>
			    <a href="lost and found.php">Lost & Found</a>
			</div>
			<div class="header-button">
			   	<button id="button"><a href="Create Thread.php">Create Thread</a></button>
			   	<button id="button"><a href="Login.php">Login</a></button>
			    </div>  
			</div>
		</div>

	<div>
		<hr/>	
	</div>

	<?php
		$ambilthread = "SELECT * FROM thread WHERE Id_thread = '$id'";
		$hasil = mysqli_query($koneksi, $ambilthread);
		$ambilfoto = mysqli_query($koneksi, "SELECT profile FROM mahasiswa NATURAL JOIN thread WHERE NIM = '$nim' ");
		$hasil3 = mysqli_fetch_array($ambilfoto, MYSQLI_ASSOC);
		$profile = $hasil3['profile'];
		if ($hasil == true)
		{
			while($row = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) 
			{
	?>
	<div class="kotak1">
		<p class="teks_kategori_teks"><?php echo "$row[Title_thread]"; ?></p>
	</div>

	<div class="coverimg">
		<img src="../Thread/<?php echo "$row[Thread_pict]"; ?>" class="cover">
	</div>

	<div class="kotak2">
		<div class="kotak2_dalem">
			<div class="ts">
				<div class="profile">
					<img src="../user_profile/<?php echo "$profile"; ?>" class="foto">
					<p class="namats"><?php echo "$nama"; ?></p>
				</div>
				<div class="waktu">
					<p class="tgl"><?php echo "$row[Date_thread]"; ?></p>
				</div>
			</div>
			<div class="formjudulthread">
				<p class="teksformjudulthread"><?php echo "$row[Title_thread]"; ?></p>
			</div>
			<div class="formisithread">
				<p class="teksformisithread"><?php echo "$row[isi_thread]"; ?></p>
			</div>
		</div>
	</div>
	<?php
			}
		}
	?>

	<div class="kotak3">
		<button class="komentar" type="button">Beri Komentar</button>
	</div>

	<div class="kotak5">
		<div class="kotak5dalem">
			<form method="GET">
				<textarea id="isi_komen" placeholder="Komentar Anda"></textarea>
				<!-- <input type="submit" class="tambah" onclick="insert()"> -->
				<input type="hidden" id="id_thr" value="<?php echo $id ?>">
				<button type="button" onclick="insert()" class="tambah">Submit</button>
			</form>
		</div>
	</div>

	<div class="kotak4" id="tampilkankomen">
		
	</div>
	
	<div class="footer">
		<a href="About INSIST.php"><em>About INSIST</em></a>
		<a href="About INSIST.php"><em>Our Team</em></a>
		<a href="About INSIST.php"><em>Support US !</em></a>
		<a href="../Document/INSIST_USER_GUIDE.pdf"><em>User Guide</em></a>
		<a href="">&copy;<em>2018 INSIST</em></a>	
	</div>

	<span class="to_top"><img src="../Foto/BackToTop.png"></span>

	<script type="text/javascript">
		$(function(){
		    $('.to_top').hide().on('click', function(){
		        $('body,html').animate({scrollTop : 0}, 800);
		    });
		    $(window).on('scroll', function(){
		        if($(this).scrollTop() > 50){
		            $('.to_top').show();
		        }else{
		            $('.to_top').hide();
		        }
		    });
		});
	</script>
	<script type="text/javascript" src="../Java Script/komen.js"></script>
	<script type="text/javascript">
		display();
	</script>
	</body>
</html>