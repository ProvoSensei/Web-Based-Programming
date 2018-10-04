<?php
	include 'Koneksi_database_insist.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jual Beli</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../CSS/jualbeli.css">
	<link href="../Foto/LOGO.PNG" rel="shortcut icon">
	<script type="text/javascript" src="../Java Script/jquery-3.3.1.js"></script>
</head>
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
			   	<button id="button"><a href="Login.php">Create Thread</a></button>
			   	<button id="button"><a href="../PHP/Login.php">Login</a></button>	
			    </div>  
		</div>

	<div>
		<hr/>	
	</div>

	<div class="background">
		<h3>Jual Beli</h3>	
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
			<a target="_blank" href="Hasil Thread.php?id=<?php echo"$row[Id_thread]"; ?>">
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
		$ambilartikel = "SELECT * FROM thread WHERE Forum_id = 2";
		$hasil = mysqli_query($koneksi, $ambilartikel);
		if ($hasil == true)
		{
			while($row = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
	?>
		<div class="arc">
  			<a target="_blank" href="Hasil Thread.php?id=<?php echo"$row[Id_thread]"; ?>">
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
		<a href="About INSIST.php"><em>About INSIST</em></a>
		<a href="About INSIST.php"><em>Our Team</em></a>
		<a href="About INSIST.php"><em>Support US !</em></a>
		<a href="../Document/INSIST_USER_GUIDE.pdf"><em>User Guide</em></a>
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
	</script>
</body>
</html>