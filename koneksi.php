<?php
function koneksi_db()
{
$host="localhost";
$username="root";
$password="";
$database="atol_universitas";

$link=mysqli_connect($host,$username,$password,$database);

if(!$link)
{
die("Tidak Bisa Konek database".mysqli_error());
}
return $link;
}
?> 