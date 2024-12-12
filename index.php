<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Fashion</title>
</head>
<body>
<?php
if (isset($_GET["hapus"])) {
// Query untuk menghapus data
$sql = "DELETE FROM produk WHERE id_produk = " . $_GET["hapus"];
if ($conn->query($sql) === TRUE) {
// Mengalihkan halaman
header("Location: http://localhost/tokoberkah/admin");
}
}
?>

<h1>Berkah Fashion - Admin</h1>
<table >
<?php
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$i++;
echo ' <tr>
<td width="30px"><center>'.$i.'</center></td>
<td><img width="100px" src="image/'.$row["foto"].'"/></td>
<td width="200px">'.$row["nama_produk"].'</td>
<td width="100px">Rp'.number_format($row["harga"], 0, '.', '.').'</td>
<td>
<button><a href="ubah.php?id='.$row["id_produk"].'">Ubah</a></button>
<button
onclick="hapus('.$row["id_produk"].',`'.$row["nama_produk"].'`)">Hapus</button>
</td>
</tr>';
}
} else {
echo "Belum ada produk";
}
?>
</table>

<br>

<button><a href="tambah.php">Tambah Produk baru</a></button>

</body>

<script>
function hapus(id, nama_produk) {
if (confirm('Apakah anda yakin ' + nama_produk + ' akan di hapus? ')) {
window.location.replace(`<?= getBaseUrl("index.php?hapus=") ?>`+ id);

}
}
</script>
</html>
