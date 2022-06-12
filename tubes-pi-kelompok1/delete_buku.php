<?php
session_start();
include "koneksi.php";


	$id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : $_POST['id_buku'];
    $query="DELETE FROM buku WHERE id_buku = '$id_buku' ";
    $result=mysqli_query($conn, $query);

    header("location: hapusbuku.php");
    
   
?>