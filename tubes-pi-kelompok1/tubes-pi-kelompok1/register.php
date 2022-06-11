<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
</head>
<body>
	<center>
	<h1>Daftar Akun</h1>
	<form method="POST">
		<input type="text" name="name" placeholder="Masukkan Nama Kamu" /> <br><br>
		<input type="text" name="username" placeholder="Masukkan Username"  /> <br><br>
		<input type="text" name="password" placeholder="Masukkan Password" /> <br><br>
		<button type="submit" name="submit">Daftar</button>
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