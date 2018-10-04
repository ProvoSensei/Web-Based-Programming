<?php
include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/Login.css">
	<link href="../Foto/LOGO.PNG" rel="shortcut icon">
	<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
</head>
<body>
	
	<center><a href="#"><img class="logo" src="../foto/LOGO.png"></a></center>

	<div id="login-main">
		<div id="login-div">
			
			<label><h2>Login</h2></label>
			<hr / id="line">

			<fieldset id="in-box">

				<form class="form" method="POST">
					<label id="text-label">Username</label>
					<input type="text" name="username" class="feedback-input" placeholder="Username" id="nim" required="">

					<label id="text-label">Password</label>
					<input type="password" name="password" class="feedback-input" placeholder="Password" id="password" required="">

					<label><center>Don't have an account ? <a href="../PHP/Sign Up.php">Sign Up</a> free !</center></label>
					<div class="login">
						<input type="submit" name="masuk" value="LOGIN" id="button-orange">
					</div>
				</form>

			</fieldset>
		</div>
	</div>

	<div class="footer">
		<a href=""></a>
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
	<?php
	session_start();
	if (isset($_POST['masuk']))
	{
		$pass = md5($_POST['password']);
		$username = $_POST['username'];
		$cekuser = "SELECT * FROM mahasiswa WHERE Username = '$username' AND Password = '$pass'";

		$hasilcek = mysqli_query($koneksi, $cekuser);
		$hasil_cek2 = mysqli_num_rows($hasilcek);
		if($hasil_cek2 > 0)
		{
			$_SESSION['masuk'] = $username;
			$data = mysqli_fetch_array($hasilcek, MYSQLI_ASSOC);
			header("location: ../PHP/index login.PHP");
		}
		else
		{
			// $ambilusername = "SELECT Username FROM mahasiwa WHERE NIM = '$nim'";
			// $hasilcek2 = mysqli_query($koneksi, $hasilcek2);
			// if ($hasilcek2 == true)
			// {
				echo "<script>alert('Username atau Password Anda salah')</script>";
			//}
		}
	}
	?>
</body>
</html>