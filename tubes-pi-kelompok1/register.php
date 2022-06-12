<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Halaman Registrasi</title>
</head>
<body>

<div class="div-center">
    <div class="content">
      <h3>Daftar Akun</h3>
      <hr />
      <form method="POST">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Kamu">
        </div>
				<div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Daftar</button>
        <hr />
        <span class="text-center">Sudah punya akun?&nbsp;<a href="index.php">Login</a></span>
			</form>
    </div>
  </div>
	</form>
<?php

include "koneksi.php";
if(isset($_POST['submit'])){
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$password = isset($_POST['password']) ? $_POST['username'] : '';


$cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'"));

if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="register.php";
              </script>';
              exit();
    }

   $save_register = mysqli_query($conn, "INSERT INTO akun (nama, username, password) VALUES ('$name', '$username', '$password')");
   
    	echo '<script language="javascript">
              alert ("Registrasi Akun Berhasil Di Lakukan!");
              window.location="index.php";
              </script>';
              exit();
   
    
}


?>
	</center>
</body>
</html>