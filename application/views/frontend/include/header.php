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
								<li><a class="nav-link active" href="#home">Home</a></li>
								<li><a class="nav-link" href="#counter">Informasi</a></li>
								<li><a class="nav-link" href="<?= base_url('arsipSkripsi') ?>">Arsip Skripsi</a></li>
								<li><a class="nav-link" href="<?= base_url('masuk/admin') ?>">Admin</a></li>
							</ul>
					    </div>
					</div>
				</div>
			</div>
		</header><!-- header section end -->