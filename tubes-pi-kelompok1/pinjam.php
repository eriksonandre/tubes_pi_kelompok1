<?php
session_start();
include "koneksi.php";

  $id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : $_POST['id_buku'];
	$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : ''];

	$cek_buku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id_buku'"));

if ($cek_buku > 0) {
        echo '<script language="javascript">
              alert ("Buku Sudah Ada");
              window.location="pinjambuku.php";
              </script>';
              exit();
    }

   $save_buku = mysqli_query($conn, "INSERT INTO pinjaman (id_user, id_buku) VALUES ('$id_user', '$id_buku')");
   
    	$response = array(
    		'Status' => '201',
    		'Message' => 'Data berhasil ditambahkan!'
    	);

    	header('Content-Type: application/json');
    	echo json_encode($response);


   
    



?>