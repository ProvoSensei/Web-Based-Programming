<?php
	include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Settings</title>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/Profile Settings.css">
	<link rel="shortcut icon" href="../Foto/LOGO.png">
</head>
<body class="box-up">
	<?php
      	session_start();
		if (isset($_SESSION['masuk']))
		{
			$username = $_SESSION['masuk'];
			$ambilNIM = mysqli_query($koneksi, "SELECT NIM FROM mahasiswa WHERE Username = '$username'");
			$hasilambilnim = mysqli_fetch_array($ambilNIM, MYSQLI_ASSOC);
			$nim = $hasilambilnim['NIM'];
			$ambilfoto = mysqli_query($koneksi, "SELECT profile FROM mahasiswa WHERE Username = '$username'");
			$hasilambilfoto = mysqli_fetch_array($ambilfoto, MYSQLI_ASSOC);
			$foto = $hasilambilfoto['profile'];
	?>
	<div>
		<a href="Profile.php"><img src="../Foto/left-arrow.png" id="button-back"></a>
		<div class="profile-picture">
			<a href="#"><img src="../user_profile/<?php echo "$foto"; ?>" id="user-pict" alt="Avatar"></a>
			<div id="text-middle">
				<form method="POST" enctype="multipart/form-data">
					<div id="text"><input type="file" name="updatefoto"></div>
					<input type="submit" name="changefoto">
				</form>
			</div>
		</div>
		<label id="identity2"><p><?php echo "$nim"; ?></p></label>
	</div>
	<?php
			if(isset($_POST['changefoto']))
			{
				$ekstensi_diperbolehkan	= array('png','jpg');
				$fotobaru = $_FILES['updatefoto']['name'];
				$x = explode('.', $fotobaru);
				$ekstensi = strtolower(end($x));
				$ukuran	= $_FILES['updatefoto']['size'];
				$file_tmp = $_FILES['updatefoto']['tmp_name'];	

				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, '../user_profile/'.$fotobaru);
						$query = mysqli_query($koneksi, "UPDATE mahasiswa SET profile = '$fotobaru' WHERE Username = '$username'");
						if($query){
							echo "<script>alert('Berhasil Mengubah Foto Profile')</script>";
							header("Location: Profile Settings.php");
						}else{
							echo 'GAGAL Mengubah Foto Profile';
						}
					}else{
						echo 'UKURAN FILE TERLALU BESAR';
					}
				}else{
					echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
				}
			}
		}
		else 
		{
			header("Location: Login.php");
		}
    ?>


	<div class="input-type">
		<form method="POST">
			<label id="change-pass"><h3>Change Password</h3></label>
			<hr / id="line">
			<div class="input">
				<div>
					<input type="password" name="password" placeholder="Password" class="feedback-input">  
				</div>
				<div>
					<input type="password" name="newpsw" placeholder="New-Password" class="feedback-input">  
				</div>
				<div>
					<input type="password" name="newpswcheck" placeholder="Re-type Password" class="feedback-input">  
				</div>
				<div>
					<input type="submit" name="update" value="Save" id="button-orange">
				</div>	
			</div>
		</form>
	</div>
	<?php
		if (isset($_POST['update']))
		{
			$password = md5($_POST['password']);
			$newpassword = md5($_POST['newpsw']);
			$newpassword2 = md5($_POST['newpswcheck']);
			if (empty($password) || empty($newpassword) || empty($newpassword2))
			{
				echo "<script>alert('Form harus diisi')</script>";
			}
			else
			{
				$ambilpassword = mysqli_query($koneksi, "SELECT Password FROM mahasiswa WHERE Username = '$username'");
				$hasilambilpsw = mysqli_fetch_array($ambilpassword, MYSQLI_ASSOC);
				$hasil_cekpassword = mysqli_num_rows($ambilpassword);
					if($hasil_cekpassword > 0)
					{
						$pswuser = $hasilambilpsw['Password'];
					}
				
				if ($pswuser == $password) {
					if($newpassword != $newpassword2)
					{
						echo "<script>alert('Password tidak cocok')</script>";
					}
					else if ($password == $newpassword) 
					{
						echo "<script>alert('Password sedang digunakan')</script>";
					}
					else
					{
						$updatepsw = "UPDATE mahasiswa SET Password = '$newpassword' WHERE Username = '$username'";
						$hasilupdate = mysqli_query($koneksi, $updatepsw);
						if ($hasilupdate == true)
						{
							echo "<script>alert('Berhasil mengubah password')</script>";
						}
						else
						{
							echo "<script>alert('Gagal mengubah password')</script>";
						}
					}
				}
				else
				{
					echo "<script>alert('Password Lama Salah!')</script>";
				}
			}
		}
	?>
</body>
</html>