<?php 
include 'koneksi.php';
$query = "delete from isi_berita where id_berita='".$_GET['id']."'";
echo $query;
mysqli_query($con,$query);  
echo "<script> alert('Data Berhasil Dihapus')</script>";
echo '<meta http-equiv="refresh" content="0;url=berita.php">';
?>