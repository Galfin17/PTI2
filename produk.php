<?php
include '../koneksi.php';

// Menampilkan dalam format JSON
header('Content-Type: application/json');

// Query untuk mendapatkan data produk
$sql = "SELECT * FROM produk";

// Mengeksekusi Query
$result = $conn->query($sql);

// Output apabila berhasil mengambil data dari Database
$res["code"] = 200;

if ($result->num_rows > 0) {
  // Melooping data dan memasukkan ke dalam sebuah variable Array $Produk
  $produk = array();
  while($row = $result->fetch_assoc()) {
    $row["foto"] = "http://localhost/tokoberkah/admin/image/" . $row["foto"];
    array_push($produk, $row);
  }
  $res["data"] = $produk;
} else {
  $res["code"] = 400;
  $res["error"] = $conn->error;
}

// Menampilkan respon tadi ke dalam bentuk JSON
echo json_encode($res);