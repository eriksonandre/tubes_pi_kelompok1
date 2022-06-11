<?php
session_start();
include "koneksi.php";

	$genre_buku = isset($_GET['genre_buku']) ? $_GET['genre_buku'] : '';
    $query="SELECT * FROM buku WHERE genre_buku = '$genre_buku' ";
    $data=array();
    $result=mysqli_query($conn, $query);
    while($row=mysqli_fetch_object($result)){
      $data[]=$row;
    }
    if(!$data==null){


    $response=array(
      'status' => 200,
      'message' => "Berhasil mengambil data buku.",
      'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
	}else{
		$response=array(
	      'status' => 204,
	      'message' => "Data tidak ada.",
	      'data' => $data
	    );
	    header('Content-Type: application/json');
	    echo json_encode($response);
	}
   
?>