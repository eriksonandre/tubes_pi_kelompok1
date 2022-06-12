<?php
session_start();
include "koneksi.php";

  //Cek Stok
$id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : $_GET['id_buku'];




$stok_buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id_buku'");


  $data_db = mysqli_fetch_array($stok_buku);



$banyak_buku=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku_dipinjam WHERE id_buku = '$id_buku'"));





$username = $_SESSION['username'];
$userr = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");


$data_user = mysqli_fetch_array($userr);

$stok_buku_baru = $data_db['stok_buku'] + $banyak_buku;
$id_user = $data_user['id'];
$id_buku = $data_db['id_buku'];
$nama_buku = $data_db['nama_buku'];

//Stok Bertambah Setelah Buku Dikembalikan
$query="UPDATE buku SET stok_buku = '$stok_buku_baru' WHERE id_buku = '$id_buku'";
  
$result=mysqli_query($conn, $query);

$queryy = mysqli_query($conn, "DELETE FROM buku_dipinjam WHERE id_buku = '$id_buku'");
  

header("location: bukudipinjam.php");


   
    



?>