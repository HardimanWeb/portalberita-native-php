<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/tambahberita.css">
    <link rel="stylesheet" href="../assets/font.css">
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
    });
    </script>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo-wrapper d-flex align-items-center">
                <img src="../gambar/unika1.png">
                <h1>
                    <a href="index.php">
                        The News
                    </a>
                </h1>
            </div>
        </div>
    </header>

    <div class="container-fluid menu">
        <div class="container">
            <div class="d-flex menu-items">
                <div>
                    <a href="index.php">Home</a>
                </div>

                <div>
                    <a href="Tentang.php">Tentang Unika</a>
                </div>

                <div>
                    <a href="https://www.ust.ac.id/bpmu/">Mahasiswa</a>
                </div>

                <div>
                    <a href="http://ejournal.ust.ac.id/">Penelitian</a>
                </div>

                <div>
                    <a href="Event.php">Event</a>
                </div>

                <div>
                    <a href="Berita.php">Berita</a>
                </div>

                <div>
                    <a href="http://pmb.ust.ac.id/">Pendaftaran</a>
                </div>

                <div class="active">
                    <a href="tambaBerita.php">Tambah Berita</a>
                </div>
            </div>
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
    </main>
    <?php 
if(isset($_POST['simpan'])){
include '../koneksi.php';

// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "../gambar/".$nama_file;

if($tipe_file == "image/jpeg" ||  $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :  
      // Proses simpan ke Database
      $query = "insert into isi_berita values
      ('','".$_POST['Nama_Penulis']."','".$_POST['Judul_Berita']."','".$_POST['Kategori_Berita']."','".$_POST['Tanggal_Berita']."','".addslashes($_POST['Isi_Berita'])."','".$nama_file."','','');";

      echo $query;

      $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: index.php");// Redirectke halaman index.php
        echo "<script> alert('Data Berhasil DiTambah')</script>"; 
        
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='tambaBerita.php'>Kembali Ke Form</a>";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='tambahBerita.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    echo "<br><a href='tambahBerita.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
  echo "<br><a href='tambahBerita.php'>Kembali Ke Form</a>";
}
}
?>
    <footer>
        <div class="container-footer">
            <div class="logo-footer">
                <img src="../gambar/unikawhite.png">
            </div>

            <div class="kampus1">
                <h3>Kampus I</h3>
                <div class="liner"></div>
                <p>Jalan Setia Budi No.479 F, Tanjung Sari Medan</p>
                <p>Telepon : (061) 821 0161</p>
                <p>Fax : (061) 821 3269</p>
            </div>
            <div class="kampus2">
                <h3>Kampus II</h3>
                <div class="liner"></div>
                <p>Jalan Mataram No. 21 Perisah Hulu, Medan</p>
                <p>Baru-Kota Medan</p>
                <p> Telepon : (061) 821 0161</p>
                <p>Fax : (061) 821 3269</p>
            </div>

            <div class="social-media">
                <h3>Sosial Media</h3>
                <div class="liner"></div>
                <div class="icon-social">
                    <a href="#">
                        <img src="../gambar/sosialmedia/linkedin.png" class="icon-linkedin">
                    </a>
                    <a href="https://www.instagram.com/hardiman_simamora/">
                        <img class="icon-instagram" src="../gambar/sosialmedia/istagram.png">
                    </a>
                    <a href="#">
                        <img class="icon-twitter" src="../gambar/sosialmedia/twitter.png">
                    </a>
                </div>
            </div>
        </div>
        <div class="hr"></div>
        <div class="copyright">
            <p>Copyright © 2023 Made with 💛 Kelompok 3 TI C</p>
        </div>
    </footer>
    <script type="text/javascript">
    window.onscroll = function() {
        setSticky();
    }

    navbar = document.getElementsByClassName('menu')[0];
    var sticky = navbar.offsetTop;

    function setSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add('sticky');
        } else {
            navbar.classList.remove('sticky');
        }
    }
    </script>
</body>

</html>