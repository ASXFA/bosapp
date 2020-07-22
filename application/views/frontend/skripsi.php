<!DOCTYPE HTML>
<html lang="zxx">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prantokon - App Landing Html Template</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/bootstrap.min.css" media="all" />
		<!-- Slick nav CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/slicknav.min.css" media="all" />
		<!-- Iconfont CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/icofont.css" media="all" />
		<!-- Slick CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/slick.css">

		<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/font-awesome.min.css">
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/owl.carousel.css">
		<!-- Popup CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/magnific-popup.css">
		<!-- Switcher CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/switcher-style.css">
		<!-- Animate CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/animate.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/aos.css"> -->
		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/responsive.css" media="all" />
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="<?= base_url('assets/frontend/') ?>img/favcion.png" />
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .header{
                background: linear-gradient(to right, #000529 1%,#002055 24%,#005db5 67%,#0074d9 100%);
            }

            @keyframes zoom-in{
                0%{
                    opacity: 0;
                    transform: scaleX(0); 
                }
                100%{
                    opacity: 1;
                    transform: scaleX(1); 
                }
            }

            .isi{
                margin-top: 150px;
                opacity: 1;
                width: 100%;
                animation: zoom-in 1s;
            }


        </style>
	</head>
	<body data-spy="scroll" data-target=".header" data-offset="50">
		<!-- Page loader -->
	    <div id="preloader"></div>
		<!-- header section start -->
		<header class="header">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-4 col-md-3 col-6">
						<div class="logo">
							<a href="#home"><img width="70%" src="<?= base_url('assets/frontend/') ?>img/LOGO.png" alt="logo" /></a>
						</div>
					</div>
					<div class="col-lg-8 col-md-9 col-6">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
                  <ul id="primary-menu">
                    <li><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                    <li><a class="nav-link active" href="<?= base_url('arsipSkripsi') ?>">Arsip Skripsi</a></li>
                    <li><a class="nav-link" href="<?= base_url('login') ?>">Admin</a></li>
                  </ul>
					    </div>
					</div>
				</div>
			</div>
		</header><!-- header section end -->
    <div class="container isi mb-5">
        <div class="row justify-content-center">
            <h2 class="p-3">Tabel Arsip Skripsi Mahasiswa Prodi Informatika</h2>
            <table class="table">
                <thead class="thead-dark">
                    <th>No</th>
                    <th>Judul Skripsi</th>
                    <th>Penulis</th>
                    <th>Konsentrasi</th>
                    <th>Tahun</th>
                    <th class='text-center'>File</th>

                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($skripsi as $skripsi):
                        if($skripsi->status_skripsi=='published'):?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $skripsi->judul?></td>
                            <td><?= $skripsi->mahasiswa?></td>
                            <td><?= $skripsi->kategoriskripsi?></td>
                            <td><?= $skripsi->tahun?></td>
                            <td class='text-center'><a href="<?= base_url('assets/file/skripsi/lulus/'.$skripsi->file)?>"><i class="icofont icofont-download"></i> </a></td>
                        </tr>
                        <?php 
                        endif; $no++;
                    endforeach;?>
                </tbody>
            </table>
        </div>
    </div> <!-- .container -->
	<!-- footer section start -->
    <footer class="footer" id="contact">
			<div class="container">
				<div class="row">
                    <div class="col-lg-12">
						<div class="subscribe-form">
							<form action="#">
								<input type="text" placeholder="Your email address here">
								<button type="submit">Subcribe</button>
							</form>
						</div>
                    </div>
				</div>
				<div class="row">
          <div class="col-lg-12">
						<div class="copyright-area">
							<ul>
								<li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
								<li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
							</ul>
							<p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </p>
						</div>
          </div>
				</div>
			</div>
		</footer><!-- footer section end -->
		<a href="#" class="scrollToTop">
			<i class="icofont icofont-arrow-up"></i>
		</a>

		<!-- jquery main JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
		<!-- Slick nav JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/jquery.slicknav.min.js"></script>
		<!-- Slick JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/slick.min.js"></script>
		<!-- owl carousel JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
		<!-- Popup JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/jquery.magnific-popup.min.js"></script>
		<!-- Counter JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/jquery.counterup.min.js"></script>
		<!-- Counterup waypoints JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/waypoints.min.js"></script>
	    <!-- YTPlayer JS -->
	    <script src="<?= base_url('assets/frontend/') ?>js/jquery.mb.YTPlayer.min.js"></script>
		<!-- jQuery Easing JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/jquery.easing.1.3.js"></script>
		<!-- Gmap JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/gmap3.min.js"></script>
        <!-- Google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnKyOpsNq-vWYtrwayN3BkF3b4k3O9A_A"></script>
		<!-- Custom map JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/custom-map.js"></script>
		<!-- WOW JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/wow-1.3.0.min.js"></script>
		<!-- Switcher JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/switcher.js"></script>
		<!-- main JS -->
		<script src="<?= base_url('assets/frontend/') ?>js/main.js"></script>
		<script src="<?= base_url('assets/frontend/') ?>js/aos.js"></script>
	</body>
</html>