<?php
$link = mysqli_connect("localhost", "root", "", "db_insist"); 
	session_start();
		if (isset($_SESSION['masuk']))
		{
			$username = $_SESSION['masuk'];
			$ambilnim = mysqli_query($link, "SELECT NIM FROM mahasiswa WHERE Username = '$username'");
			$hasilambilnim = mysqli_fetch_array($ambilnim, MYSQLI_ASSOC);
			$nim = $hasilambilnim['NIM'];
			if(isset($_GET['action']))
		  	{
			    if($_GET['action'] == "insert")
			    {
			      	$komen = $_GET['isi_komen'];
			      	$tgl= date('l, d-m-Y');
			      	$id_thrd  = $_GET['id'];
			      	$sql = "INSERT INTO threadinfo VALUES ('', '$tgl', '$komen', '$nim', '$id_thrd')";
			      	$hasil = mysqli_query($link, $sql);
			     	if ($hasil == true)
			     	{
			        	echo "200";
			      	}
			      	else
			      	{ 
			        	echo "404";
			      	}
		    	}	
		    	else if($_GET['action'] == "select")
			    {
			  //   	$username = $_SESSION['masuk'];
			  //   	$ambilnim = mysqli_query($link, "SELECT NIM FROM mahasiswa WHERE Username = '$username'");
					// $hasilambilnim = mysqli_fetch_array($ambilnim, MYSQLI_ASSOC);
					// $nim = $hasilambilnim['NIM'];
					// $ambilnama = mysqli_query($link, "SELECT Nama_mahasiswa FROM mahasiswa WHERE NIM = '$nim'"); 
					// $hasilambilnama = mysqli_fetch_array($ambilnama, MYSQLI_ASSOC);
					// $nama = $hasilambilnama['Nama_mahasiswa'];
					// $ambilnamafoto = mysqli_query($link, "SELECT Nama_mahasiswa, profile FROM mahasiswa INNER JOIN threadinfo ON mahasiswa.NIM = threadinfo.NIM");
					// $hasilambilnamafoto = mysqli_fetch_array($ambilnamafoto, MYSQLI_ASSOC);
					// $nama = $hasilambilnamafoto['Nama_mahasiswa']; 
					// $foto = $hasilambilnamafoto['profile'];
			    	$id = $_SESSION['buat_thread'];
			       	$ambilkomen = "SELECT Date_comment, Comment_thread, Nama_mahasiswa, profile, id_komen FROM threadinfo INNER JOIN mahasiswa ON mahasiswa.NIM = threadinfo.NIM WHERE Id_thread = '$id'";
			       	$hasilambilkomen = mysqli_query($link, $ambilkomen);
			      	if($hasilambilkomen == true)
			       	{
			        	while ($row = mysqli_fetch_array($hasilambilkomen, MYSQLI_ASSOC))
			        	{
			        	echo "<div class='kotak4dalem'>
					        	<div class='profileorang'>
									<div class='kotak4kiri'>
										<img src='../user_profile/$row[profile]' class='fotoorang'>
										<p class='namaorang'>$row[Nama_mahasiswa]</p>
									</div>
									<div class='kotak4kanan'>
											<p class='tglkomen'>$row[Date_comment]</p>
									</div>
								</div>
									<div class='formkomenorang'>
									<p class='isiformkomenorang'>$row[Comment_thread]</p>
									</div>";
									$nama = $row['Nama_mahasiswa'];
									$username = $_SESSION['masuk'];
									$ceknama = mysqli_query($link, "SELECT Nama_mahasiswa FROM mahasiswa WHERE username = '$username'");
									$hasilambilnama = mysqli_fetch_array($ceknama, MYSQLI_ASSOC);
									$ambilnama = $hasilambilnama['Nama_mahasiswa'];
									if ($ambilnama == $nama) 
									{
									echo "<button class='delete_komen' name='hapus' onclick='delete_komentar($row[id_komen])'>DELETE COMMENT</button>";
									}
							echo "</div>";	
						}
			      	}
			    }
			    else if($_GET['action'] == "remove")
			    {
			    	$username = $_SESSION['masuk'];
				      $id_komen = $_GET['tampilkankomen'];
				      $sql = "DELETE threadinfo.* FROM threadinfo INNER JOIN mahasiswa ON mahasiswa.NIM = threadinfo.NIM AND Username = '$username' WHERE id_komen = '$id_komen'";
				      $hasil = mysqli_query($link, $sql);
				      if ($hasil == true)
				      {
				        echo "200";
				      }
				      else
				      {
				        echo "404";
				      }
			    }
			}
		}
		else
		{
			if($_GET['action'] == "select")
			{
				$id = $_SESSION['buat_thread'];
				$ambilkomen = "SELECT Date_comment, Comment_thread, Nama_mahasiswa, profile, id_komen FROM threadinfo INNER JOIN mahasiswa ON mahasiswa.NIM = threadinfo.NIM WHERE Id_thread = '$id'";
			    $hasilambilkomen = mysqli_query($link, $ambilkomen);
			    if($hasilambilkomen == true)
			    {
			    	while ($row = mysqli_fetch_array($hasilambilkomen, MYSQLI_ASSOC))
			        {
			        echo "<div class='kotak4dalem'>
					        	<div class='profileorang'>
									<div class='kotak4kiri'>
										<img src='../user_profile/$row[profile]' class='fotoorang'>
										<p class='namaorang'>$row[Nama_mahasiswa]</p>
									</div>
									<div class='kotak4kanan'>
											<p class='tglkomen'>$row[Date_comment]</p>
									</div>
								</div>
								<div class='formkomenorang'>
									<p class='isiformkomenorang'>$row[Comment_thread]</p>
								</div>
									</div>";	
					}
			    }
			}	
		}
?>
