<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Portal Berita</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/indexxi.css">
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="../assets/font.css">
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
    });
    </script>
    <style>
    .container-input {
        width: 70%;
    }
    </style>
</head>

<body id="body">
    <header>
        <div class="icon_menu">
            <i class="fa-bars" id="btn_open"><img src="img/hamburger.png"></i>
        </div>
    </header>

    <div class="menu_side" id="menu_side">
        <div class="name_page">
            <div class="logo"><img src="img/unikawhite.png"></div>
        </div>
        <div class="option_menu">

            <a href="index.php" class="selected">
                <div class="option">
                    <i class="fa-bars"><img src="img/home.png"></i>
                    <h4 class="active">Dashboard</h4>
                </div>
            </a>

            <a href="berita.php">
                <div class="option">
                    <i class="fa-bars"><img src="img/news.png"></i>
                    <h4>Data Berita</h4>
                </div>
            </a>

            <a href="admin.php">
                <div class="option">
                    <i class="fa-bars"><img src="img/setting.png"></i>
                    <h4>Data Admin</h4>
                </div>
            </a>

            <a href="user.php">
                <div class="option">
                    <i class="fa-bars"><img src="img/user.png"></i>
                    <h4>Data User</h4>
                </div>
            </a>


            <a href="validasiBerita.php">
                <div class="option">
                    <i class="fa-bars"><img src="img/validation.png"></i>
                    <h4>Validasi Berita</h4>
                </div>
            </a>

            <a href="report/report.php">
                <div class="option">
                    <i class="fa-bars"><img src="img/report.png"></i>
                    <h4>Laporan</h4>
                </div>
            </a>

        </div>
    </div>
    <main>
        <section class="container-input shadow">
            <h2>Masukkan Berita Baru</h2>
            <form id="inputBerita" method='post' enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Penulis</label><br>
                    <input type="text" name="Nama_Penulis" required>
                </div>
                <div class="input">
                    <label>Judul Berita</label><br>
                    <input type="text" name="Judul_Berita" required>
                </div>
                <div class="input">
                    <label>Kategori Berita</label><br>
                    <input type="text" name="Kategori_Berita" required>
                </div>
                <div class="input">
                    <label>Tanggal Berita</label><br>
                    <input type="date" name="Tanggal_Berita" required>
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
        <?php 
if(isset($_POST['simpan'])){
include 'koneksi.php';

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$path = "../gambar/".$nama_file;

if($tipe_file == "image/jpeg" ||  $tipe_file == "image/png"){ 
  if($ukuran_file <= 1000000){
   
    if(move_uploaded_file($tmp_file, $path)){ 
      $query = "insert into isi_berita values
      ('','".$_POST['Nama_Penulis']."','".$_POST['Judul_Berita']."','".$_POST['Kategori_Berita']."','".$_POST['Tanggal_Berita']."','".addslashes($_POST['Isi_Berita'])."','".$nama_file."','','publish');";

      echo $query;

      $sql = mysqli_query($con, $query);
      
      if($sql){ 
        header("location: berita.php");
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
}
?>
    </main>
    <script src="js/index.js"></script>
</body>

</html>