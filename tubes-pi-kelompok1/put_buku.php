<?php
session_start();
include "koneksi.php";
    
    

    $id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : $_GET['id_buku'];
    $nama_buku = isset($_GET['nama_buku']) ? $_GET['nama_buku'] : $_GET['nama_buku'];
    $genre_buku = isset($_GET['genre_buku']) ? $_GET['genre_buku'] : $_GET['id_buku'];
	$stok_buku = isset($_GET['stok_buku']) ? $_GET['stok_buku'] : $_GET['stok_buku'];
    $query="UPDATE buku SET nama_buku = '$nama_buku', genre_buku = '$genre_buku', stok_buku = '$stok_buku' WHERE id_buku = '$id_buku'";
    $result=mysqli_query($conn, $query);

    $response = array(
        'Status' => '200',
        'Message' => 'Data berhasil diedit!'
      );

      header('Content-Type: application/json');
      echo json_encode($response);
    
   
?>