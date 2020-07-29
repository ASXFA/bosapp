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
                background: #0074d9;
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
                    <li><a class="nav-link active active" href="<?= base_url('arsipSkripsi') ?>">Arsip Skripsi</a></li>
                    <li><a class="nav-link" href="<?= base_url('login') ?>">Admin</a></li>
                  </ul>
					    </div>
					</div>
				</div>
			</div>
		</header><!-- header section end -->
		<!-- breadcrumb area start -->
		<section class="hero-area breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="hero-area-content">
							<h1>Arsip Skripsi</h1>
							<hr style="background-color:#eee; height: 4px; width: 200px; border-radius: 5px;">
						</div>
					</div>
				</div>
			</div>
		</section><!-- breadcrumb area end -->
		<!-- blog section start -->
		<section class="blog-area blog-page" id="blog">
			<div class="container">
				<div class="row">
					<?php foreach($skripsi as $skripsi): ?>
					<div class="col-lg-4 col-md-6">
					    <div class="single-post">
							<div class="post-thumbnail">
								<a><img src="<?= base_url('assets/frontend/img/pdfDefault.png') ?>" alt="pdfDefault"></a>
							</div>
							<div class="post-details">
								<div class="post-author">
										<?php
											$tahun=""; 
											if(strlen($skripsi->mahasiswa)>1){
												echo "<a><i class='icofont icofont-user'></i>".$skripsi->mahasiswa."</a>";
											}else{
												foreach($users as $user){
													if($user->id == $skripsi->mahasiswa){
														echo "<a><i class='icofont icofont-user'></i>".$user->nama."</a>";
													}
												}
											}
											echo "<a><i class='icofont icofont-calendar'></i>".$skripsi->tahun."</a>";
										?>
								</div>
								<h4 class="post-title"><?= $skripsi->judul ?></h4>
								<div class="pb-3">
									<a href="<?= base_url('assets/file/skripsi/lulus/'.$skripsi->file) ?>" class="badge badge-primary float-right p-2"><i class="icofont icofont-download"></i> Download File</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<!-- <div class="row">
					<div class="col-lg-12">
					    <div class="pagination">
                            <ul>
                                <li><a href="#"><i class="icofont icofont-curved-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="icofont icofont-curved-right"></i></a></li>
                            </ul>
						</div>
					</div>
				</div> -->
			</div>
		</section><!-- blog section end -->
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