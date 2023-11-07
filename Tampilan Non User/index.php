<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>The News</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/font.css">
</head>
<style>
.login-container {
    height: 25px;
    font-family: Raleway, sans-serif;
    background: #519ac5fc;
}

.child a {
    text-decoration: none;
    color: white;
}

.child {
    float: right;
    padding-right: 15px;
    color: #ffffff;
    cursor: pointer;
}
</style>

<body>
    <div class="login-container">
        <div class="child d-flex align-items-center">
            <a href="../Login/index.php">
                <p>Login</p>
            </a>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="logo-wrapper d-flex align-items-center">
                <img src="../gambar/unika1.png">
                <h1>
                    <a href="index1.php">
                        The News
                    </a>
                </h1>
            </div>
        </div>
    </header>

    <div class="container-fluid menu">
        <div class="container">
            <div class="d-flex menu-items">
                <div class="active">
                    <a href="index1.php">Home</a>
                </div>
                <div>
                    <a href="https://www.ust.ac.id/sekilas-ust/">Tentang Unika</a>
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
            </div>
        </div>
    </div>

    <div class="container main-news section ">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
                <?php
					include "../koneksi.php";

					$query = "SELECT * FROM `isi_berita` WHERE  status='publish' 
					ORDER BY `isi_berita`.`dibaca`  DESC limit 1 ;";

					$sql = mysqli_query($con, $query); 
					?>
                <?php
						while($data = mysqli_fetch_array($sql)){ 
							?>
                <img class='thumb mb-3' src="../gambar/
							<?php 
								echo $data['gambar_berita'];
							?>">

                <h3>
                    <a class='font-large' href='detail.php?id_berita="<?php echo $data['id_berita']; ?>"'>
                        <?php 
									echo $data['judul_berita'];
								 ?>
                    </a>
                </h3>

                <?php } ?>
            </div>
            <div class="col-sm-12 col-md-6 col-xs-12 col-lg-6 right ">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6 ">
                        <?php
                        	$query = "SELECT * FROM `isi_berita`  WHERE  status='publish'
                            ORDER BY `isi_berita`.`tanggal_berita`  DESC limit 2;";
        
                            $sql = mysqli_query($con, $query); 
                            ?>
                        <?php
                                while($data = mysqli_fetch_array($sql)){ 
                        ?>
                        <div class="image image-sm mb-1">
                            <img class="thumb" src="../gambar/<?php 
								echo $data['gambar_berita'];
							?>">">
                        </div>
                        <h3 class="mb-4">
                            <a class='font-large' href='detail.php?id_berita="<?php echo $data['id_berita']; ?>"'>
                                <?php 
									echo $data['judul_berita'];
								 ?>
                            </a>
                        </h3>

                        <?php } ?>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6 ">
                        <?php
                        	$query = "SELECT * FROM `isi_berita` WHERE kategori_berita = 'event' && status='publish' limit 2;";
        
                            $sql = mysqli_query($con, $query); 
                            ?>
                        <?php
                                while($data = mysqli_fetch_array($sql)){ 
                        ?>
                        <div class="image image-sm mb-1">
                            <img class="thumb" src="../gambar/<?php 
								echo $data['gambar_berita'];
							?>">">
                        </div>
                        <h3 class="mb-4">
                            <a class='font-large' href='detail.php?id_berita="<?php echo $data['id_berita']; ?>"'>
                                <?php 
									echo $data['judul_berita'];
								 ?>
                            </a>
                        </h3>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container section mt-4">
        <div class="section-title">
            <span>Event</span>
        </div>
        <div class="row">
            <?php 
				   $query2= "SELECT * FROM `isi_berita` WHERE kategori_berita = 'event' && status='publish' limit 4;";
                   $sql2 = $sql = mysqli_query($con, $query2);
				?>
            <?php
					while($data2 = mysqli_fetch_array($sql2)){ 
					?>

            <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
                <div class="mb-2 image image-xs">
                    <img class="thumb" src="../gambar/<?php echo $data2['gambar_berita'] ?>">
                </div>
                <a href='detail.php?id_berita="<?php echo $data2['id_berita']; ?>"'>
                    <?php echo $data2['judul_berita']?>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>


    <div class="container section">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="mb-4 mt-4">
                    <div class="section-title">
                        <span>Berita Terbaru</span>
                    </div>
                    <?php
									$query1 = "SELECT * FROM `isi_berita` where status='publish'  
									ORDER BY `isi_berita`.`tanggal_berita`  DESC limit 9;"; 
									$sql1 = mysqli_query($con, $query1); 
?>
                    <?php while($data1 = mysqli_fetch_array($sql1)){ 
										?>
                    <div class="row mb-3 bb-1 pt-0">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <img class='thumb mb-3' src="../gambar/
										<?php 
											echo $data1['gambar_berita'];
										?>">
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 tes">
                            <h5>
                                <a href='detail.php?id_berita="<?php echo $data1['id_berita']; ?>"'>
                                    <?php echo $data1['judul_berita'] ?>
                                </a>
                            </h5>
                            <small><?php echo $data1['tanggal_berita'] ?></small>
                            <div class="summary pt-3">
                                <?php $ghui= $data1['isi_berita'];
											 $desc = substr($ghui,0,226);
											echo strip_tags($desc); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="trending mt-4">
                    <div class="section-title">
                        <span>Trending</span>
                    </div>
                    <?php 
							     $querytren = "SELECT * FROM isi_berita where status='publish' order by dibaca desc limit 6";
								 $sqltren = mysqli_query($con,$querytren);
								 while ($datatren = mysqli_fetch_array($sqltren)){	
								 
							 ?>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <img class="thumb" src="../gambar/<?php echo $datatren['gambar_berita'];?>">
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">

                            <a href='detail.php?id_berita="<?php echo $datatren['id_berita']; ?>"'>
                                <?php echo $datatren['judul_berita'];?>
                            </a>

                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
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
                <form>
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
                </form>
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