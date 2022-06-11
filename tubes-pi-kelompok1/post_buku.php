<?php
session_start();
include "koneksi.php";


	$nama_buku = isset($_POST['nama_buku']) ? $_POST['nama_buku'] : $_POST['nama_buku'];
	$genre_buku = isset($_POST['genre_buku']) ? $_POST['genre_buku'] : '';
	$stok = isset($_POST['stok_buku']) ? $_POST['stok_buku'] : '';


	$cek_buku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku WHERE nama_buku = '$nama_buku'"));

if ($cek_buku > 0) {
        echo '<script language="javascript">
              alert ("Buku Sudah Ada");
              window.location="postingbuku.php";
              </script>';
              exit();
    }

   $save_buku = mysqli_query($conn, "INSERT INTO buku (nama_buku, genre_buku, stok_buku) VALUES ('$nama_buku', '$genre_buku', '$stok')");
   
    	$response = array(
    		'Status' => '201',
    		'Message' => 'Data berhasil ditambahkan!'
    	);

    	header('Content-Type: application/json');
    	echo json_encode($response);


   
    



?>