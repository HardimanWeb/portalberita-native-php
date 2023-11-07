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
                    <h4>Dashboard</h4>
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
            <h2>Masukkan User Baru</h2>
            <form id="inputBerita" method='post'>
                <div class="input">
                    <label>Username</label><br>
                    <input type="text" name="username" required>
                </div>
                <div class="input">
                    <label>PASSWORD</label><br>
                    <input type="text" name="Password" required>
                </div>
                <div class="input">
                    <button type="submit" name="simpan">Simpan</button>
                </div>
            </form>
        </section>
        <?php 
if(isset($_POST['simpan'])){
include 'koneksi.php';
      $query = "insert into admin values
      ('','".$_POST['username']."','".$_POST['Password']."');";
      echo $query;
      $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: admin.php");// Redirectke halaman index.php
        echo "<script> alert('Data Berhasil DiTambah')</script>"; 
        
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='admin.php'>Kembali Ke Form</a>";
      }
}
?>
    </main>
    <script src="js/index.js"></script>
</body>

</html>