<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Portal Berita</title>
    <link rel="stylesheet" href="css/indexxi.css">
</head>
<style>
    .kotak {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .container-kotak {
        display: flex;
        margin-bottom: 20px;
    }

    .kotak1,
    .kotak2,
    .kotak3,
    .kotak4,
    .kotak5,
    .kotak6 {
        height: 120px;
        flex-basis: 30%;
        margin-right: 20px;
        border: 1px solid grey;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
    }
</style>

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
        <?php include 'koneksi.php'; ?>
        <h1>Dashboard</h1>
        <div class="kotak">
            <div class="container-kotak">
                <div class="kotak1">
                    <h1><?php
                        $sql = "SELECT COUNT(id_berita) as total FROM `isi_berita` where status='publish';";
                        $data = mysqli_query($con, $sql);
                        $rd = mysqli_fetch_array($data);
                        echo $rd['total'];
                        ?></h1>
                    <p>Total Berita Dipublish</p>
                </div>
                <div class="kotak2">
                    <h1><?php
                        $sql = "SELECT COUNT(id_berita) as total FROM `isi_berita` where status='';";
                        $data = mysqli_query($con, $sql);
                        $rd = mysqli_fetch_array($data);
                        echo $rd['total'];
                        ?></h1>
                    <p>Menunggu Konfirmasi Berita</p>
                </div>
                <div class="kotak3">
                    <h1><?php
                        $sql = "SELECT COUNT(id_user) as total FROM user2;";
                        $data = mysqli_query($con, $sql);
                        $rd = mysqli_fetch_array($data);
                        echo $rd['total'];
                        ?></h1>
                    <p>Data User</p>
                </div>

            </div>
            <div class="container-kotak">
                <div class="kotak4">
                    <h1><?php
                        $sql = "SELECT COUNT(id_admin) as total FROM admin;";
                        $data = mysqli_query($con, $sql);
                        $rd = mysqli_fetch_array($data);
                        echo $rd['total'];
                        ?></h1>
                    <p>Data Admin</p>
                </div>
            </div>
    </main>
    <script src="js/index.js"></script>
</body>

</html>