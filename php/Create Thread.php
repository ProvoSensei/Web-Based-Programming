<?php
	include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<title>Create Thread | Insist</title>
	<meta charset="utf-8">
	<meta name="author" content="Penulis">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/Create Thread.css">
	<link href="../Foto/LOGO.PNG" rel="shortcut icon">
	<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
</head>
<body>

	<!--<div class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#"><img class="logo" src="../Foto/LOGO.PNG"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Universitas</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Jual Beli</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Lost & Found</a>
		      </li>
			    <a class="nav-link" href="#" id="create-thread">Create Thread</a>
			    <h4 class="usm">Hello, Luthfi</h4>
		  </div>
		</nav>
	</div>-->
	<?php
      	session_start();
		if (! isset($_SESSION['masuk']))
		{
			header("Location: Login.php");
		}
	?>
	<div class="header">
			<div class="header-logo">
				<img src="../Foto/LOGO.PNG" class="logo">
			</div>
		  	<div class="header-right">
		    	<a href="Universitas Login.php">Universitas</a>
			    <a href="jual beli login.php">Jual Beli</a>
			    <a href="lost and found login.php">Lost & Found</a>
			</div>
			<div class="header-button" class="dropdown">
			   	<button id="button"><a href="Create Thread.php">Create Thread</a></button>
			   	<button id="button" class="dropbtn" onclick="myFunction()"><a href="Profile.php"><?php echo "{$_SESSION['masuk']}"; ?><i class="fa fa-caret-down"></i></a>
			   	<!-- <div class="dropdown-content" id="myDropdown">
			   		<a href="Logout.php">Logout</a>
			   	</div> -->
			   	</button>
			</div>  
		</div>

	<div>
		<hr/>	
	</div>

	<div class="create_thread">
		<p class="text_create_thread">Create Thread</p>
	</div>

	<div class="main">
		<div class="kotakform">
			<form method="POST" action="" enctype="multipart/form-data">
				<span id="pilih">Pilih Forum: </span>
				<select name="kategori">
					<option value="1">Universitas</option>
				    <option value="2">Forum Jual Beli</option>
				    <option value="3">Lost & Found</option>
				</select>
				<div class="kotakupload">
					<h3 class="teks_cover">Cover Image</h3>
					<input type="file" name="foto" required="">
				</div>
				<input type="text" name="judul" placeholder=" Judul Thread" required="">
				<input type="text" name="deskripsi" placeholder=" Deskripsi Thread" required="">
				<textarea name="isi" rows="10" cols="128" placeholder=" Isi Thread Anda" required=""></textarea>
				<input type="submit" name="buat_thread" id="create" value="Submit Thread" required="">
			</form>
		</div>
	</div>

	<div class="footer">
		<a href="About INSIST Login.php"><em>About INSIST</em></a>
		<a href="About INSIST Login.php"><em>Our Team</em></a>
		<a href="About INSIST Login.php"><em>Support US !</em></a>
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
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		    document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(e) {
		  if (!e.target.matches('.dropbtn')) {
		    var myDropdown = document.getElementById("myDropdown");
		      if (myDropdown.classList.contains('show')) {
		        myDropdown.classList.remove('show');
		      }
		  }
		}
	</script>

	<?php
			if (isset($_POST['buat_thread'])) 
			{
				$ekstensi_diperbolehkan	= array('png','jpg');
				$foto = $_FILES['foto']['name'];
				$x = explode('.', $foto);
				$ekstensi = strtolower(end($x));
				$ukuran	= $_FILES['foto']['size'];
				$file_tmp = $_FILES['foto']['tmp_name'];	
				$kategori = $_POST['kategori'];
				$judul = $_POST['judul'];
				$deskripsi = $_POST['deskripsi'];
				$isi = $_POST['isi'];
				$tgl= date('l, d-m-Y');
				$user = $_SESSION['masuk'];
				$nim = "";
				$ambilnim = mysqli_query($koneksi, "SELECT NIM from mahasiswa WHERE Username = '$user'");
				$hasil = mysqli_fetch_array($ambilnim, MYSQLI_ASSOC);
				$nim = $hasil['NIM'];

				if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					    if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, '../Thread/'.$foto);
							$query = mysqli_query($koneksi,"INSERT INTO thread VALUES ('', '$tgl','$deskripsi','$judul','$isi','$foto', '0','$kategori', '$nim')");
							if ($query == true)
							{
								if ($kategori == 1) {
									echo"<script>location.assign('Universitas Login.php')</script>";								
								}
								if ($kategori == 2) {
									echo"<script>location.assign('jual beli Login.php')</script>";	
								}
								if ($kategori == 3) {
									echo"<script>location.assign('lost and found login.php')</script>";	
								}
							}
							else
							{
								echo "<script>alert('Thread gagal dibuat')</scirpt>";
							}
					    }else{
						echo "<script>alert('Size file terlalu besar')</scirpt>";
					    }
				    }else{
					echo "<script>alert('Jenis file tidak didukung')</scirpt>";
				    }
			    }


			// 	$buatthread = "INSERT INTO thread VALUES ('', '$tgl','$deskripsi','$judul','$foto','$kategori', '6706170054')";
			// 	$hasil_buat_thread = mysqli_query($koneksi, $buatthread);
			// 	if ($hasil_buat_thread == true) {
			// 		echo "<script>alert('Berhasil Memuat Thread')</script>";
			// 	}
			// 	else if ($hasil_buat_thread == false)
			// 	{
			// 		echo "Gagal membuat thread";
			// 	}
			// }
	?>
	
</body>
</html>