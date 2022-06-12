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
		<h1>Edit Buku</h1>
		<form action="delete_buku.php" method="GET">
		
		<?php 
		include "koneksi.php";
		  $sql=mysqli_query($conn, "SELECT * FROM buku");
		?>
		  <table style="border: 1px solid black;"> 
		  <thead> 
		  	<tr>
		  		<th>Id Buku</th>
		  		<th>Nama Buku</th>
		  		<th>Genre Buku</th>
		  		<th>Stok Buku</th>
		  		<th>Action</th>
		  	</tr>
		  </thead>
		  <tbody>
		  <?php
		  while ($row = mysqli_fetch_array($sql))
			{ ?>
				<tr>
						<td><?php echo $row['id_buku']?></td>
						<td><?php echo $row['nama_buku']?></td>
						<td><?php echo $row['genre_buku']?></td>
						<td><?php echo $row['stok_buku']?></td>
						<td>
                        <button class="submit" value="id_buku">
                          <div class="fa fa-trash"></div> Delete
                        </button>
                      </td>
			</tr>
			<?php } ?>
		

		</form>
	</center>
</body>
</html>