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

<body>
    <?php 
		include '../koneksi.php';
		$sql='SELECT * FROM isi_berita WHERE kategori_berita="Event"  && status="publish" ';
		$query=mysqli_query($con,$sql);
	?>
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

                <div class="active">
                    <a href="Event.php">Event</a>
                </div>

                <div>
                    <a href="Berita.php">Berita</a>
                </div>

                <div>
                    <a href="http://pmb.ust.ac.id/">Pendaftaran</a>
                </div>

                <div>
                    <a href="inputberita.php">Tambah Berita</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container main-news">
        <div class="row">
            <div class="col-8">

                <div class="mb-4 mt-4 section">
                    <div class="section-title">
                        <span>Event</span>
                    </div>
                    <?php
							    while($data= mysqli_fetch_array($query)){
							  ?>
                    <div class="row mb-3 bb-1 pt-0">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <img class="thumb" src="../gambar/<?php echo $data['gambar_berita'] ?>">
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <h5>
                                <a href='detail.php?id_berita="<?php echo $data['id_berita']; ?>"'>
                                    <?php  echo $data['judul_berita']?>
                                </a>
                            </h5>
                            <small> <?php  echo $data['tanggal_berita']?></small>
                            <p class="summary pt-3"><?php  echo $data['isi_berita']?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-4">
                <div class="trending mt-4">
                    <div class="section-title">
                        <span>Trending</span>
                    </div>
                    <?php 
							     $querytren = "SELECT * FROM isi_berita where status='publish'   order by dibaca desc limit 6";
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