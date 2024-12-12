<?php
$link = mysqli_connect("localhost","root","","atol_universitas");
if($link)
{
$sql="select * from mahasiswa";
$res=mysqli_query($link,$sql);
$mahasiswa=array();

while($data=mysqli_fetch_assoc($res))
{
$mahasiswa[]=$data;
}

$mahasiswa=array("Data mahasiswa"=>$mahasiswa);
mysqli_close($link);
echo json_encode($mahasiswa);
}
else
{
echo "Server error";
}

?> 