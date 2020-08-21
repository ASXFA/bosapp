<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="icon" href="<?= base_url('assets/frontend/') ?>img/topi.png" type="image/png">
		<title>Bimbingan Skripsi Online IF UNLA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="<?= base_url('assets/frontend/') ?>https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/') ?>assets/vendor/aos/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/frontend/') ?>css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/') ?>css/responsive.css" media="all" />
  <link href="<?= base_url('assets/frontend/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume - v2.1.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  	<style>
		.header{
			background: #0074d9;
		}
	</style>
</head>

<body data-spy="scroll" data-target=".header" data-offset="50">
	
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
				<li><a class="nav-link" href="<?= base_url('masuk/admin') ?>">Admin</a></li>
				</ul>
					</div>
				</div>
			</div>
		</div>
	</header><!-- header section end -->
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
	</section>
	<!-- ======= Portfolio Section ======= -->
	<section id="portfolio" class="portfolio section-bg">
		<div class="container" data-aos="fade-up">
			<div class="row">
			<div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
				<ul id="portfolio-flters">
				<li data-filter="*" class="filter-active">All</li>
				<li data-filter=".filter-app">Management Data</li>
				<li data-filter=".filter-card">Jaringan</li>
				<li data-filter=".filter-web">Security</li>
				</ul>
			</div>
			</div>

			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
			<?php foreach($skripsi as $skripsi): ?>
				<div class="col-lg-3 col-md-6 portfolio-item <?php if($skripsi->kategoriskripsi == "Management Data"){ echo "filter-app"; }else if($skripsi->kategoriskripsi == "Jaringan"){ echo "filter-card"; }else if($skripsi->kategoriskripsi == "Security"){ echo "filter-web"; } ?>">
					<div class="single-post" style="width:270px;">
						<div class="post-thumbnail mt-2">
							<a><img class="mx-auto d-block" src="<?= base_url('assets/frontend/img/pdfDefault.png') ?>" width="120px" alt="pdfDefault"></a>
						</div>
						<div class="post-details">
							<div class="post-author">
									<?php
										$tahun=""; 
										if(strlen($skripsi->mahasiswa)>4){
											echo "<a><i class='icofont icofont-user'></i>".$skripsi->mahasiswa."</a>";
										}else{
											foreach($users as $user){
												if($user->id == $skripsi->mahasiswa){
													echo "<a><i class='icofont icofont-user'></i>".$user->nama."</a>";
												}
											}
										}
										echo "<a><i class='fa fa-graduation-cap'></i>".$skripsi->tahun."</a>";
									?>
							</div>
							<h5 class="post-title"><?= $skripsi->judul ?></h5>
							<hr>
							<div class="pb-3">
								<a href="<?= base_url('assets/file/skripsi/lulus/'.$skripsi->file) ?>" class="badge badge-primary float-right p-2"><i class="icofont icofont-download"></i> Download File</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			<!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap">
					<img src="<?= base_url('assets/frontend/') ?>assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4>App 1</h4>
						<p>App</p>
						<div class="portfolio-links">
						<a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
						<a href="portfolio-details.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 portfolio-item filter-web">
					<img src="<?= base_url('assets/frontend/') ?>assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
					<h4>Web 3</h4>
					<p>Web</p>
					<div class="portfolio-links">
					<a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
					<a href="portfolio-details.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
				</div>
			</div> -->

			</div>

		</div>
	</section><!-- End Portfolio Section -->
	<footer class="footer" id="contact">
			<div class="container">
				<div class="row">
                    <div class="col-lg-12">
						<div class="subscribe-form">
							<!-- <form action="#">
								<input type="text" placeholder="Your email address here">
								<button type="submit">Subcribe</button>
							</form> -->
						</div>
                    </div>
				</div>
				<div class="row">
                    <div class="col-lg-12">
						<div class="copyright-area">
							<!-- <ul>
								<li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
								<li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
								<li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
							</ul> -->
							<p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
							</p>
						</div>
                    </div>
				</div>
			</div>
		</footer><!-- footer section end -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/frontend/') ?>assets/js/main.js"></script>

</body>

</html>