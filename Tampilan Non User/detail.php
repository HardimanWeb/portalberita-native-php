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
.story {
    font-family: Source Sans Pro, sans-serif;
}
</style>

<body>
    <?php 
		include '../koneksi.php';
		   $find_count = mysqli_query($con,"SELECT dibaca FROM isi_berita where id_berita=".$_GET['id_berita']."");
		   while($row = mysqli_fetch_assoc($find_count)){
			  $current_count = $row['dibaca'];
			  $new_count= $current_count + 1;
			  $update_count = mysqli_query($con,"UPDATE isi_berita set dibaca ='".$new_count."' where id_berita=".$_GET['id_berita']."");
		   }
		?>

    <?php 
		$query = "select * from isi_berita where id_berita=".$_GET['id_berita']."";
		$data = mysqli_query($con,$query); 
		$dt= mysqli_fetch_array($data);
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

    <div class="container main-news">
        <div class="row">
            <div class="col-8">
                <h1><?php echo $dt['judul_berita'];?></h1>
                <div>
                    <small><?php echo $dt['tanggal_berita'];?></small>
                    <img src="../gambar/view.png">
                    <small><i>Sudah Dibaca <span><?php echo $dt['dibaca'];?></span> Orang</i></small>
                </div>

                <img src="../gambar/<?php echo $dt['gambar_berita'];?>" class="mt-3 thumb">
                <div class="story mt-4">
                    <?php echo $dt['isi_berita'];?>
                </div>
                <hr>
                <div class="container section mt-4 no-pad">
                    <div class="section-title">
                        <span>Recommended</span>
                    </div>


                    <div class="row">
                        <?php
									$query1 = "SELECT * FROM `isi_berita` where status='publish'  
									ORDER BY `isi_berita`.`tanggal_berita`  DESC limit 4;"; 
									$sql1 = mysqli_query($con, $query1); 
?>
                        <?php while($data1 = mysqli_fetch_array($sql1)){ 
										?>
                        <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
                            <div class="mb-2 image image-xs">
                                <img class="thumb" src="../gambar/<?php echo $data1['gambar_berita'];?>">
                            </div>
                            <a href='detail.php?id_berita="<?php echo $data1['id_berita']; ?>"'>
                                <?php echo $data1['judul_berita'];?>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="trending mt-4">
                    <div class="section-title">
                        <span>Trending</span>
                    </div>
                    <?php 
							     $querytren = "SELECT * FROM isi_berita order by dibaca desc limit 6";
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