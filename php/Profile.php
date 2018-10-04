<?php
	include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/Profile.css">
	<link rel="shortcut icon" href="../Foto/LOGO.png">
</head>
<body class="box-left">
	<?php
      	session_start();
		if (isset($_SESSION['masuk']))
		{
			$username = $_SESSION['masuk'];
			$ambilnama = mysqli_query($koneksi, "SELECT Nama_mahasiswa FROM mahasiswa WHERE Username = '$username'");
			$hasilambilnama = mysqli_fetch_array($ambilnama, MYSQLI_ASSOC);
			$nama = $hasilambilnama['Nama_mahasiswa'];
			$ambilNIM = mysqli_query($koneksi, "SELECT NIM FROM mahasiswa WHERE Nama_mahasiswa = '$nama'");
			$hasilambilnim = mysqli_fetch_array($ambilNIM, MYSQLI_ASSOC);
			$nim = $hasilambilnim['NIM'];
			$ambilfoto = mysqli_query($koneksi, "SELECT profile FROM mahasiswa WHERE Username = '$username'");
			$hasilambilfoto = mysqli_fetch_array($ambilfoto, MYSQLI_ASSOC);
			$foto = $hasilambilfoto['profile'];
	?>
	<div class="side-part">
		<div>
			<a href="index login.php"><img src="../Foto/left-arrow.png" id="button-back"></a>
			<a href="Profile Settings.php"><img src="../Foto/settings.png" id="button-setting"></a>
		</div>
		<img src="../user_profile/<?php echo "$foto"; ?>" id="user-pict">
		<div class="user-identity">
			<label id="identity1"><P><?php echo "$nama"; ?></P></label>
			<label id="identity2"><p><?php echo "$nim"; ?></p></label>	
		</div>
		<a href="logout.php"><input type="submit" name="Signout" value="Sign Out" id="button-signout"></a>
		<div>
			<img src="../Foto/Tag.png" id="tag">
			<img src="../Foto/Arrow-point.png" id="arrow-point">
		</div>
	</div>
	<?php
		}
			else 
		{
			header("Location: Login.php");
		}
    ?>
</body>
</html>