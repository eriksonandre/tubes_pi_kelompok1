<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Halaman Beranda</title>
</head>
<body>
	<ul>
		<li><a href="beranda.php">Home</a></li>

		<?php
		//membuat fitur khusus admin
		$level = $_SESSION['level'] ==  'admin';
		if($level){
		  ?>
		}
		<li><a href="postingbuku.php">Posting Buku</a></li>
		<li><a href="editbuku.php">Edit Buku</a></li>
		<li><a href="hapusbuku.php">Hapus Buku</a></li>
		<?php
			}
		?>
		<li><a href="daftarbuku.php">Daftar Buku</a></li>
		

		<?php 
		if($_SESSION['level'] == 'user'){
		?>
		<li><a href="pinjambuku.php">Pinjam Buku</a></li>
		<li><a href="bukudipinjam.php">Buku Yang Dipinjam</a></li>
		<?php
			}
		?>
		<li><a href="logout.php">Logout</a></li>


	</ul>
	<br><br>
	<br><br>
	<center>
		<h1>Delete Buku</h1>
		<form action="delete_buku.php" method="POST">
		
		<?php 
		include "koneksi.php";

		  $sql=mysqli_query($conn, "SELECT * FROM buku");
		  echo '
		  <table style="border: 1px solid black;"> 
		  <thead> 

		  	<tr>
		  		<th>Id Buku</th>
		  		<th>Nama Buku</th>
		  		<th>Genre Buku</th>
		  		<th>Stok Buku</th>
		  	</tr>
		  </thead>
		  <tbody>';
		  while ($row = mysqli_fetch_array($sql))
			{
				echo '<tr>
						<td>'.$row['id_buku'].'</td>
						<td>'.$row['nama_buku'].'</td>
						<td>'.$row['genre_buku'].'</td>
						<td>'.$row['stok_buku'].'</td>
						
						
						
					</tr>';
			}
			echo '
				</tbody>

		  </table>

		  '


		  
		 ?>
		   <br><br>
		   <h5>Masukkan id:</h5>
		 <input type="text" name="id_buku" placeholder="Masukkan id buku yang ingin dihapus"> <br>
		<button type="submit" name="submit" onclick="return confirm('Apa anda yakin ingin menghapus?');">Hapus Buku</button>

		 
		

		</form>
	</center>
</body>
</html>