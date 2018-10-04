<?php  
	
	include 'Koneksi_database_insist.php';
	session_start();
	$username = $_SESSION['masuk'];
	$id = $_SESSION['buat_thread'];
	$delete = mysqli_query($koneksi, "DELETE thread.* FROM thread INNER JOIN mahasiswa ON mahasiswa.NIM = thread.NIM AND Username = '$username' WHERE Id_thread ='$id' ");
	if ($delete == true)
	{
		echo "200";
	}
		else
	{
		echo "404";
	}
?>