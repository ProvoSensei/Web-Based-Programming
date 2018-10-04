<?php
	include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Universitas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/Universitas.css">
	<link href="../Foto/LOGO.PNG" rel="shortcut icon">
	<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
</head>
<body>

	<?php
      	session_start();
		if (isset($_SESSION['masuk']))
		{
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
	<?php
		}
			else 
		{
			header("Location: Login.php");
		}
    ?>

	<div>
		<hr/>	
	</div>
<div class="background">
		<h3>UNIVERSITAS</h3>	
	</div>

	<div class="title">
		<label><h2>Promoted</h2><hr id="line-limit"/></label>
	</div>

	<div class="promoted">
		<?php
			$ambilartikel = "SELECT * FROM thread WHERE iklan = 1";
			$hasil = mysqli_query($koneksi, $ambilartikel);
			if ($hasil == true)
			{
				while($row = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
		?>
		<div class="highlight">
			<a target="_blank" href="Hasil Thread Login.php?id=<?php echo"$row[Id_thread]"; ?>">
				<img src="../Thread/<?php echo "$row[Thread_pict]"; ?>" alt="INSIST">
			  </a>
		</div>	
		<?php
				}
			}
		?>
	</div>

	<div class="title">
		<label><h2>Artikel Terkini</h2><hr id="line-limit"/></label>
	</div>
	
	<div class="article">
	<?php
		$ambilartikel = "SELECT * FROM thread WHERE Forum_id = 1";
		$hasil = mysqli_query($koneksi, $ambilartikel);
		if ($hasil == true)
		{
			while($row = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
	?>
		<div class="arc">
  			<a target="_blank" href="Hasil Thread Login.php?id=<?php echo"$row[Id_thread]"; ?>">
				<img src="../Thread/<?php echo "$row[Thread_pict]"; ?>" alt="INSIST">
		  	</a>
  			<div class="desc"><?php echo "$row[Desc_thread]"; ?></div>
		</div>
		<?php
			}
		}
	?>
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
</body>
</html>