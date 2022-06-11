<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Halaman Login</title>
</head>
<body>
	<center>
	<h1>Login Akun</h1>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Masukkan Username" /> <br><br>
		<input type="text" name="password" placeholder="Masukkan Password" /> <br><br>
		<button type="submit" name="submit">Login</button>
	</form>

	<br>
	Belum punya akun?
	<a href="register.php">Daftar Akun</a>

	</center>
</body>
</html>