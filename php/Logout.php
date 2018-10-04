<?php
	include 'Koneksi_database_insist.php';
	session_start();
	if (isset($_SESSION['masuk']))
	{
		unset($_SESSION);
		session_destroy();

		echo "<script>alert('Berhasil Logout')</script>";
	}
		header("location: index.php");
?>