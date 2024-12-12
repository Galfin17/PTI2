<!DOCTYPE html>
<html>
<head>
  <title>Fashion</title>
</head>
<body>
  <h1>Berkah Fashion - Cabang Dago</h1>
  <table>
    <form action="#" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td width="100px">Url</td>
          <td><input type="text" name="url" placeholder="Masukkan url"></td>
        </tr>
      </table>
      <br>
      <tr>
        <input type="submit" value="Load" name="submit"/>
      </tr>
    </form>
  </table>

  <table>
    <br>
    <br>
    <?php
    if (isset($_POST["submit"])) {
      $url = $_POST["url"];
      // inisialisasi curl
      $ch = curl_init();
      // mengaatur URL yang ingin di load
      curl_setopt($ch, CURLOPT_URL, $url);
      // mengembalikan data pada URL dalam bentuk String
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      // mengeksekusi curl
      $output = curl_exec($ch);

      // Karena data yang di keluarkan dalam bentuk JSON
      // Maka data output tersebut harus di Decode kedalam bentuk OBJECT
      $result = json_decode($output);

      // Inisialisasi nomor urutan
      $i = 0;

      // Mengecek apakah result memiliki data atau tidak
      if (count($result->data) > 0) {
        // Melooping data result dan menampilkan data tersebut
        foreach ($result->data as $row) {
          $i++;
          echo ' <tr>
            <td width="30px"><center>' . $i . '</center></td>
            <td><img width="50px" src="' . $row->foto . '"/></td>
            <td>' . $row->nama_produk . '</td>
            <td width="100px">Rp' . number_format($row->harga, 0, '.', '.') . '</td>
          </tr>';
        }
      }
    }
    ?>
  </table>
</body>
</html>