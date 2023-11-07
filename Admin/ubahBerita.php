<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Portal Berita</title>
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="../assets/font.css">
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
    });
    </script>
</head>

<body>
    <?php 
include 'koneksi.php';
$query = "select * from isi_berita where id_berita='".$_GET['id']."'";
$data = mysqli_query($con,$query); 
$dt= mysqli_fetch_array($data);

if(isset($_POST['simpan'])){
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    
    $path = "../gambar/".$nama_file;
    
    if($tipe_file == "image/jpeg" ||  $tipe_file == "image/png"){ 
      if($ukuran_file <= 1000000){
       
        if(move_uploaded_file($tmp_file, $path)){ 
          $query = "update isi_berita set id_berita='".$_POST['id']."',nama_penulis='".$_POST['Nama_Penulis']."',judul_berita='".$_POST['Judul_Berita']."',kategori_berita='".$_POST['Kategori_Berita']."',tanggal_berita='".$_POST['Tanggal_Berita']."',isi_berita='".addslashes($_POST['Isi_Berita'])."',gambar_berita='".$nama_file."' where id_berita='".$_GET['id']."' ";
    
          echo $query;
    
          $sql = mysqli_query($con, $query);
          die;
          if($sql){ 
            header("location: baca.php");
            echo "<script> alert('Data Berhasil DiTambah')</script>"; 
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='berita.php'>Kembali Ke Form</a>";
          }
        }else{
          echo "Maaf, Gambar gagal untuk diupload.";
          echo "<br><a href='berita.php'>Kembali Ke Form</a>";
        }
      }else{
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><a href='berita.php'>Kembali Ke Form</a>";
      }
    }else{
      echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
      echo "<br><a href='berita.php'>Kembali Ke Form</a>";
    }

echo "<script> alert('Data Berhasil DiUBAH')</script>";
echo '<meta http-equiv="refresh" content="0;url=berita.php">';

}?>
    <section class="container-input shadow">
        <h2>Update Berita </h2>
        <form id="inputBerita" method='post' enctype="multipart/form-data">
            <div class="input">
                <label>ID</label><br>
                <input type="text" name="id" value="<?php echo $dt['id_berita'];?>" required>
            </div>
            <div class="input">
                <label>Nama Penulis</label><br>
                <input type="text" name="Nama_Penulis" value="<?php echo $dt['nama_penulis'];?>" required>
            </div>
            <div class="input">
                <label>Judul Berita</label><br>
                <input type="text" name="Judul_Berita" value="<?php echo $dt['judul_berita'];?>" required>
            </div>
            <div class="input">
                <label>Kategori Berita</label><br>
                <input type="text" name="Kategori_Berita" value="<?php echo $dt['kategori_berita'];?>" required>
            </div>
            <div class="input">
                <label>Tanggal Berita</label><br>
                <input type="date" name="Tanggal_Berita" value="<?php echo $dt['tanggal_berita'];?>" required>
            </div>
            <div class="input">
                <label>Gambar Berita</label><br>
                <input type="file" name="gambar">
            </div>
            <h2>Isi Berita</h2>
            <div class="input">
                <textarea id="full-featured" name="Isi_Berita" placeholder="Masukkan Berita!"
                    class="mce-notification"></textarea>
                <button type="submit" name="simpan">Simpan</button>
            </div>
        </form>
    </section>
</body>

</html>