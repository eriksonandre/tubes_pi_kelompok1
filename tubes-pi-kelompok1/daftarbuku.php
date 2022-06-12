<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Halaman Beranda</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <ul class="navbar-nav ms-md-auto gap-2">
      <li class="nav-item rounded">
        <a class="nav-link" aria-current="page" href="beranda.php"><i class="bi bi-house-fill me-2"></i>Home</a>
      </li>
			<?php
				//membuat fitur khusus admin
				$level = $_SESSION['level'] ==  'admin';
				if($level){
				  ?>
				}
				<li class="nav-item rounded">
      	  <a class="nav-link" href="postingbuku.php"><i class="bi bi-plus-square me-2"></i>Posting Buku</a>
      	</li>
      	<li class="nav-item rounded">
      	  <a class="nav-link" href="editbuku.php"><i class="bi bi-pencil-square me-2"></i>Edit Buku</a>
      	</li>
				<li class="nav-item rounded">
      	  <a class="nav-link" href="hapusbuku.php"><i class="bi bi-trash3 me-2"></i>Hapus Buku</a>
      	</li>
			<?php
				}
			?>
			<li class="nav-item rounded">
        <a class="nav-link active" href="daftarbuku.php"><i class="bi bi-list-ul me-2"></i>Daftar Buku</a>
      </li>
			<?php 
				if($_SESSION['level'] == 'user'){
				?>
					<li class="nav-item rounded">
        	  <a class="nav-link" href="pinjambuku.php"><i class="bi bi-plus-square me-2"></i>Pinjam Buku</a>
        	</li>
					<li class="nav-item rounded">
        	  <a class="nav-link" href="bukudipinjam.php"><i class="bi bi-card-list me-2"></i>Buku Yang Dipinjam</a>
        	</li>
				<?php
					}
				?>
        <li class="nav-item dropdown rounded">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="div-center">
		<h4>Daftar Buku</h4>
		<hr />
		<form action="get_buku.php" method="GET">
		<div class="form-group">
			<label for="genre_buku">Pilih genre:</label>
			<select class="form-control mb-3" name="genre_buku" id="genre_buku">
				<?php 
				include "koneksi.php";
				  $sql=mysqli_query($conn, "SELECT * FROM genre_buku");
				  while ($data=mysqli_fetch_array($sql)) {
				 ?>
				   <option value="<?=$data['id_genre']?>"> <?=$data['nama_genre']?></option> 
				 <?php
				  }
				 ?>
			</select>
		<button type="submit" class="btn btn-primary mt-3" name="submit">Ambil Daftar Buku</button>
	</form>
	</div>
</body>
</html>