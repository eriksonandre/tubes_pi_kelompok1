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
	<br><br><br><br>

	<center>
		<h1>Tambah Buku Baru</h1>
		<form action="post_buku.php" method="POST">
		Pilih genre:
		<select name="genre_buku" id="genre_buku">
		<?php 
		include "koneksi.php";
		  $sql=mysqli_query($conn, "SELECT * FROM genre_buku");
		  while ($data=mysqli_fetch_array($sql)) {
		 ?>
		   <option value="<?=$data['id_genre']?>"> <?=$data['nama_genre']?></option> 
		 <?php
		  }
		 ?>
		 </select> <br><br>
		<input type="text" name="nama_buku" placeholder="Masukkan Nama Buku" /> <br><br>
		<input type="number" name="stok" placeholder="Masukkan Stok" /> <br><br>
		<button type="submit" name="submit">Tambah Buku</button>
	</form>
	</center>
</body>
</html>