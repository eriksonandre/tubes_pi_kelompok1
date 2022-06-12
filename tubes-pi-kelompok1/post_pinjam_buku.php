<?php
session_start();
include "koneksi.php";

  //Cek Stok
$id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : $_POST['id_buku'];


$stok_buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id_buku'");


  $data_db = mysqli_fetch_array($stok_buku);

if ($data_db['stok_buku'] == 0) {
        echo '<script language="javascript">
              alert ("Stok Kosong");
              window.location="pinjambuku.php";
              </script>';
              exit();
    }

$stok_buku_baru = $data_db['stok_buku'] - 1;
$id_user = $_SESSION['id'];
$id_buku = $data_db['id_buku'];
$nama_buku = $data_db['nama_buku'];

$query="UPDATE buku SET stok_buku = '$stok_buku_baru' WHERE id_buku = '$id_buku'";
  
$result=mysqli_query($conn, $query);

$queryy = mysqli_query($conn, "INSERT INTO buku_dipinjam (id_user, id_buku, nama_buku) VALUES ('$id_user', '$id_buku', '$nama_buku')");
  

	


   
    



?>