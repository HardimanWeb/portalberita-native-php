<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Portal Berita</title>
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="../assets/font.css">
</head>
<body>
<?php 
include 'koneksi.php';
$query = "select * from user1 where id='".$_GET['id']."'";
$data = mysqli_query($con,$query); 
$dt= mysqli_fetch_array($data);


if(isset($_POST['simpan'])){
$query = "update user1 set id='".$_POST['id']."',Nama_mhs='".$_POST['Nama']."',npm='".$_POST['Npm']."',pass='".$_POST['Password']."' where id='".$_GET['id']."' ";
;
echo $query;

$data = mysqli_query($con,$query); 
echo "<script> alert('Data Berhasil DiUBAH')</script>";
echo '<meta http-equiv="refresh" content="0;url=user.php">';

}?>
<section class="container-input shadow">
        <h2>Ubah Data Mahasiswa</h2>
        <form id="inputBerita" method='post'>
        <div class="input">
                <label>ID</label><br>
                <input type="text" name="id" value="<?php echo $dt['id'];?>" required>
              </div>
            <div class="input">
                <label>Nama Mahasiwa</label><br>
                <input type="text" name="Nama" value="<?php echo $dt['Nama_mhs'];?>" required>
              </div>
              <div class="input">
                <label>NPM</label><br>
                <input type="text" name="Npm" value="<?php echo $dt['npm'];?>" required>
              </div>
              <div class="input">
                <label>PASSWORD</label><br>
                <input type="text" name="Password" value="<?php echo $dt['pass'];?>" required>
              </div>
              <div class="input">
              <button type="submit" name="simpan">Simpan</button>
              </div>
        </form>
    </section>
    
</body>
</html>