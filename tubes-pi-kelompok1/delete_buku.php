<?php
session_start();
include "koneksi.php";


	$id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : $_GET['id_buku'];
    $query="DELETE FROM buku WHERE id_buku = '$id_buku' ";
    $result=mysqli_query($conn, $query);

    $response = array(
        'Status' => '201',
        'Message' => 'Data berhasil dihapus!'
      );

      header('Content-Type: application/json');
      echo json_encode($response);

   
?>