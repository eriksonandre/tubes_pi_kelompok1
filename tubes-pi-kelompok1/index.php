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
	<title>Halaman Login</title>
</head>
<body>
	<!-- <center>
	<h1>Login Akun</h1>
	<form action="login.php" method="POST">
		<input type="text" name="username" placeholder="Masukkan Username" /> <br><br>
		<input type="text" name="password" placeholder="Masukkan Password" /> <br><br>
		<button type="submit" name="submit">Login</button>
	</form>

	<br>
	Belum punya akun?
	<a href="register.php">Daftar Akun</a>

	</center> -->

  <div class="div-center">
    <div class="content">
      <h3>Login</h3>
      <hr />
      <form action="login.php" method="POST">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        <hr />
        <span class="text-center">Belum punya akun?&nbsp;<a href="register.php">Daftar</a></span>
			</form>
    </div>
  </div>
</body>
</html>