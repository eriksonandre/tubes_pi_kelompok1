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
		<form action="kembalikan_buku.php" method="GET">
		
		<?php 
		include "koneksi.php";


		$username = $_SESSION['username'];
		$userr = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");


		$data_user = mysqli_fetch_array($userr);
		$id_user = $data_user['id'];
		  $sql=mysqli_query($conn, "SELECT * FROM buku_dipinjam WHERE id_user = '$id_user'");
		  echo '
		  <table style="border: 1px solid black;"> 
		  <thead> 

		  	<tr>
		  		<th>No Peminjaman</th>
		  		<th>Id Buku</th>
		  		<th>Nama Buku</th>
		  		<th>Tanggal Peminjaman</th>
		  	</tr>
		  </thead>
		  <tbody>';
		  while ($row = mysqli_fetch_array($sql))
			{
				echo '<tr>
						<td>'.$row['id'].'</td>
						<td>'.$row['id_buku'].'</td>
						<td>'.$row['nama_buku'].'</td>
						<td>'.$row['tanggal_pinjam'].'</td>
						
						
						
					</tr>';
			}
			echo '
				</tbody>

		  </table>

		  '


		  
		 ?>
		   <br><br>
		   <h5>Masukkan id:</h5>
		 <input type="text" name="id_buku" placeholder="Masukkan id buku"> <br>
		 
		<button type="submit" name="submit" onclick="return confirm('Apa anda yakin ingin mengembalikan?');">Kembalikan Buku</button>


		 
		

		</form>
	</center>
</body>
</html>