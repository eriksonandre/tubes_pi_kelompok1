<?php
session_start();
include "koneksi.php";

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$data_user = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username' AND password ='$password'");


	$data_db = mysqli_fetch_array($data_user);
	//jika username tidak ada di db maka variabel di bawah ini diisi kosong namun tidak null
	$user = isset($data_db['username']) ? $data_db['username'] : '';
	$pass = isset($data_db['password']) ? $data_db['password'] : '';
	$level = isset($data_db['level']) ? $data_db['level'] : '';

	if($username == $user && $password == $pass){
		$_SESSION['level'] = $level;
		header('location:beranda.php');
	}else{

		echo 'Username atau Password salah!';

	}


}

?>