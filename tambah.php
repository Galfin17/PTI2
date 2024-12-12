<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Fashion</title>
</head>
<body>

  <h1>Tambah Baju</h1>

  <?php
  if (isset($_POST["submit"])) {
    $target_dir = "image/";
    $nama_produk = $_POST["nama"];
    $harga = $_POST["harga"];
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek format foto
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "Gagal, format yang di ijinkan hanya JPG, JPEG, dan PNG";
      return;
    }

    // Cek ukuran foto
    if ($_FILES["foto"]["size"] > 500000) {
      echo "Gagal, gambar terlalu besar";
      return;
    }

    // Memindahkan foto ke folder Image
    $foto = basename($_FILES["foto"]["name"]);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
      //Simpan ke database
      $sql = "INSERT INTO produk (nama_produk, foto, harga) VALUES ('$nama_produk', '$foto', '$harga')";
      if ($conn->query($sql) === TRUE) {
        header('Location: '.getBaseUrl());
      }
    } else {
      echo "error";
    }
  }
  ?>

  <form action="#" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td width="100px">Nama</td>
        <td><input type="text" name="nama" placeholder="Masukkan nama produk"></td>
      </tr>
      <tr>
        <td width="100px">Harga</td>
        <td><input type="text" name="harga" placeholder="Masukkan harga produk"></td>
      </tr>
      <tr>
        <td width="100px">Foto</td>
        <td><input type="file" name="foto"></td>
      </tr>
    </table>
    <br>
    <input type="submit" value="Tambah" name="submit">
  </form>

  <script>
    function hapus() {
      if (confirm('Apakah anda yakin ?')) {
        alert('Hapus')
      }
    }
  </script>

</body>
</html>