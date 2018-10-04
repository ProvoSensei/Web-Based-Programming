<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<link href="../Foto/LOGO.PNG" rel="shortcut icon">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/Sign Up.css">
	<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
</head>
<body>

	<center><a href="#"><img class="logo" src="../foto/LOGO.png"></a></center>
	
	

		<div id="form-main">
			<div id="form-div">

				<label><h2>Sign Up</h2></label>

					<hr id="line">

				<fieldset id="in-box">

					<form class="form" method="POST">
							
						<label id="text-label">NIM</label>
						<input type="number" name="nim" class="feedback-input" placeholder="NIM" id="nim">

						<label id="text-label">Name</label>
						<input type="text" name="nama" class="feedback-input" placeholder="Name" id="name">	
				
						<label id="text-label">Username</label>
						<input type="text" name="username" class="feedback-input" placeholder="Username" id="username">
				
						<label id="text-label">Password</label>
						<input type="password" name="password" class="feedback-input" placeholder="Password" id="password">
				
						<label id="text-label">Email</label>
						<input type="email" name="email" class="feedback-input" placeholder="Patrickl123@mail.com" id="email">

						<input type="checkbox" name="checkbox" id="cek-box" required><label id="cek-box-text">Setuju mengikuti ketentuan yang berlaku</label> 

						<div class="submit">
							<input type="submit" name="submit" value="SUBMIT" id="button-orange">	
						</div>					

					</form>	

				</fieldset>

				
			</div>
		</div>
		<div class="footer">
			<a href=""></a>
		</div>

		<span class="to_top"><img src="../Foto/BackToTop.png"></span>

		<?php
		include 'Koneksi_database_insist.php';
		if($koneksi == false)
  		{
  			die("Failed to Connect");
  		} else {
			if (isset($_POST['submit'])) {
				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$enkripsi = md5($password);
				$email = $_POST['email'];
				$foto = "profile.png";

				if (empty($nim) || empty($nama) || empty($username) || empty($enkripsi) || empty($email))
				{
					echo "<script>alert('Maaf, semua field harus di isi.')</script>";
				}
				else 
				{
					//cek username yang sama
				    $cekusername = mysqli_query($koneksi, "SELECT Username FROM mahasiswa WHERE Username = '$username'");
				    $hasil_cek = mysqli_num_rows($cekusername);
					$ceknim = mysqli_query($koneksi, "SELECT NIM FROM mahasiswa WHERE NIM = '$nim'");
				    $hasil_cek2 = mysqli_num_rows($ceknim);
				    $cekemail = mysqli_query($koneksi, "SELECT Email FROM mahasiswa WHERE Email = '$email'");
				    $hasil_cek3 = mysqli_num_rows($cekemail);
				    if($hasil_cek > 0)
				    {
					    echo "<script> alert('Maaf, Username telah digunakan.')</script>"; 
					    echo"<script>location.assign('Sign Up.php')</script>";		
					}
				    else if($hasil_cek2 > 0)
				    {
					    echo "<script> alert('Maaf, NIM telah digunakan.')</script>"; 
					    echo"<script>location.assign('Sign Up.php')</script>";		
					}
					else if($hasil_cek3 > 0)
					{
						echo "<script> alert('Maaf, Email telah digunakan.')</script>"; 
						echo"<script>location.assign('Sign Up.php')</script>";		
					}
					else 
					{
						$tambahuser = "INSERT INTO mahasiswa (NIM, Nama_mahasiswa, Username, Password, Email, profile) VALUES ('$nim', '$nama', '$username', '$enkripsi', '$email', '$foto')";
				        $hasil_tambah = mysqli_query($koneksi, $tambahuser);
				        }
				        if($hasil_tambah == true)
				        {
				            echo "<script> alert('Selamat. Anda telah terdaftar. Silahkan login dengan username dan password Anda.')</script>"; 
				            echo"<script>location.assign('Index.php')</script>";	
				        }
				        // else
				        // {
				        // 	echo "<script> alert('Data Sudah Ada') </script>"; 
				        // }
					}
				}
			}
		// }else{
				     //  //cek username yang sama
				   		// 	$cekusername = "SELECT username FROM mahasiswa WHERE username='$username'";
				   		// 	$hasil = mysqli_query($koneksi, $cekusername);
				     // 	 //$query = mysqli_fetch_array(mysqli_query("SELECT username FROM mahasiswa WHERE username='$username'"));

					    //   	if($hasil == true){
					    //      echo "<script> alert('Maaf, Username telah digunakan.'); location = 'signup.php'; </script>";
					    //   	}
				     // 	}
				     //  	else{
				     //     	$tambah = "INSERT INTO mahasiswa (NIM, Nama_mahasiswa, Username, Password, Email) VALUES ('$nim', '$nama', '$username', '$password', '$email')";
				     //     	$hasil2 = mysqli_query($koneksi, $tambah);
				     //    }if($hasil2 == true){
				     //        echo "<script> alert('Selamat. Anda telah terdaftar. Silahkan login dengan username dan password Anda.'); location = '../HTML/Index.php'; </script>";
				     //    }
				     //    else {
				     //        echo "<script> alert('Data gagal disimpan'); location = 'signup.php'; </script>";
				     //    }
		?>		   
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
</body>
</html>