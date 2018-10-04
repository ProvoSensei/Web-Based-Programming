<?php
	include 'Koneksi_database_insist.php';
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Penulis">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../CSS/AboutInsist.css">
		<link href="../Foto/LOGO.PNG" rel="shortcut icon">
		<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
	</head>
	<title>About Insist | Insist</title>
	<body>

		<!--<nav>
			<ul>
			  <li class="menukiri"><a href="#home"><img class="logo" src="../Foto/LOGO.PNG"></a></li>
			  <li class="menutengah"><a href="#">Universitas</a></li>
			  <li class="menutengah"><a href="#">Jual Beli</a></li>
			  <li class="menutengah"><a href="#">Lost & Found</a></li>
			  <li class="menukanan" id="login"><a href="#about">Login</a></li>
			  <li class="menukanan" id="signup"><a href="#about">Sign Up</a></li>
			</ul>
		</nav>-->

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


		<div class="kotak1">
			<h1 class="aboutinsist" style="font-size: 56px;">About Insist</h1>
		</div>

		
		<div class="kotak2">
			<div class="parallax">
				<div class="kotak2_kiri">
						<div class="kotak2_kiri_kiri">
							<a target="_blank" href="../Foto/ulis_Article.png">
								<img src="../Foto/Tulis_Article.png">
							</a>
						</div>
						<div class="kotak2_kiri_kanan">
							<a target="_blank" href="../Foto/perbincangan.png">
								<img src="../Foto/perbincangan.png">
							</a>
						</div>
				</div>
				<div class="kotak2_kanan">
					<h3 class="ket_about_insist"><b>INSIST</b> adalah sebuah platform untuk mencari dan berbagi informasi terbesar se-Telkom University</h3>
				</div>
			</div>
		</div>

		<div class="kotak3">
			<h1 class="ourteam" style="font-size: 56px;">Our Team!<br />A Dedication for Our Pride!</h1>
		</div>

		<div class="kotak4">
			<div class="parallax">
				<div class="kotak4_tengah">
					<div class="admin">
						<div class="gallery">
						  <a target="_blank" href="../Foto/Farhan.png">
						    <img src="../Foto/Farhan.png" alt="Farhan" />
						  </a>
						  <div class="desc"><h3><b>Farhan Haq</b><br />001</h3></div>
						</div>

						<div class="gallery">
						  <a target="_blank" href="../Foto/luthfi.png">
						    <img src="../Foto/luthfi.png" alt="Luthfi" />
						  </a>
						  <div class="desc"><h3><b>Nur Muhammad Luthfi</b><br />007</h3></div>
						</div>

						<div class="gallery">
						  <a target="_blank" href="../Foto/Hibban.png">
						    <img src="../Foto/Hibban.png" alt="Hibban" />
						  </a>
						  <div class="desc"><h3><b>Hibban Ramadhan</b><br />002</h3></div>
						</div>

						<div class="gallery">
						  <a target="_blank" href="../Foto/Fathih.png">
						    <img src="../Foto/Fathih.png" alt="Fathih" />
						  </a>
						  <div class="desc"><h3><b>Fathih Adawi Ahmad</b><br />007</h3></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="kotak5">
			<h3 class="support" style="font-size: 56px;">Support Us!</h3>
			<div class="kotak5_tengah">
				<a target="_blank" href="https://www.facebook.com/Insist-935827919927058/">
					<img src="../Foto/facebook.png">
				</a>
			</div>
		</div>

		<!--(<div class="kotak6">
			<h4 class="copy">&copy 2018 Insist</h4>
		</div>-->

		<div class="footer"> 
			<a href="#">&copy;<em>2018 INSIST</em></a>
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


	</body>
</html>