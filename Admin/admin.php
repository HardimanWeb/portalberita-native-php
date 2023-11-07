<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Portal Berita</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/indexxi.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
</head>
<style>
    * {
        margin: 0;
        box-sizing: border-box;
    }

    .aksi {
        width: 20%;
    }

    table img {
        max-height: 80px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        border: 1px solid #ddd;
        margin: 10px auto;
    }

    th,
    td {
        text-align: center;
        padding: 10px;
    }

    th {
        background-color: #277BC0;
        color: white;
        font-weight: 400;
    }

    tr:nth-child(even) {
        background-color: #d2d2d2;
    }

    a {
        color: white;
        text-decoration: none;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        padding: 30px;
        margin-top: 20px;

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
                    <h4 class="active">Data Admin</h4>
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
        <a href="inputAdmin.php">
            <div>
                <button class="btn btn-success mb-3">Tambah</button>
            </div>
        </a>
        <div class="tabel">
            <table border="1" id="table_id">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Akun Admin</th>
                        <th>PASSWORD</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $sql = "Select * from admin";
                    $data = mysqli_query($con, $sql);
                    while ($rd = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $rd['id_admin']; ?></td>
                            <td><?php echo $rd['username']; ?></td>
                            <td><?php echo $rd['pass_admin']; ?></td>
                            <td class="aksi"><button class="btn btn-danger"><a href="delete.php?id=<?php echo $rd['id'] ?>">hapus</a></button>
                                <button class="btn btn-primary"><a href="ubahUser.php?id=<?php echo $rd['id']; ?>">ubah</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                <tbody>
            </table>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>