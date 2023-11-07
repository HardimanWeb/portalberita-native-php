<?php 
include 'koneksi.php';
$query = "delete from user1 where id='".$_GET['id']."'";
echo $query;
mysqli_query($con,$query);  
echo "<script> alert('Data Berhasil Dihapus')</script>";
echo '<meta http-equiv="refresh" content="0;url=user.php">';
?>