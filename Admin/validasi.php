<?php 
include 'koneksi.php';
$query = "update isi_berita set status='publish' where id_berita='".$_GET['id']."'";
echo $query;
mysqli_query($con,$query);
 echo '<meta http-equiv="refresh" content="0;url=validasiBerita.php">';
?>