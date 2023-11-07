<?php
session_start();

if (isset($_POST['LOGIN'])) {
    include '../koneksi.php';
    $sql = "SELECT * FROM user2 where npm ='" . $_POST['username'] . "' and pass ='" . $_POST['password'] . "'";

    $data = mysqli_query($con, $sql);

    $sql2 = "SELECT * FROM admin where username ='" . $_POST['username'] . "' and pass_admin ='" . $_POST['password'] . "'";

    $data2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($data) > 0) {
        $rdata = mysqli_fetch_array($data);
        $_SESSION['username'] = $rdata['npm'];
        // $_SESSION['password'] = $_POST['password'];
        $_SESSION['status'] = 'login';
        header("location: ../Tampilan User/index.php");
    } else if (mysqli_num_rows($data2) > 0) {
        $rdata1 = mysqli_fetch_array($data2);
        $_SESSION['username'] = $rdata1['username'];
        // $_SESSION['password'] = $_POST['password'];
        $_SESSION['status'] = 'login';
        header("location: ../Admin/index.php");
    } else {
        echo 'username dan password tidak tepat';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram | Login </title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <main>
        <div class="container">
            <form method='post'>
                <h1>Portal Berita</h1>
                <div class="gambar"><img src="image/login.png"></div>
                <div class="content">
                    <input type="text" placeholder="username" name="username">
                    <input type="text" placeholder="Password" name="password">
                    <button type="submit" name="LOGIN">Log In</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>