<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="icon" href="<?= base_url('assets/frontend/') ?>img/topi.png" type="image/png">
    <title>Panel Mahasiswa Bimbingan Online Skripsi IF UNLA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/frontend/mahasiswa') ?>/css/style.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- =======================================================
  * Template Name: MyResume - v2.1.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
<header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
        <ul>
            <?php if($title=="bimbingan" || $title=="Ajukan" || $title=="GantiPassword"){ ?>
                <li><a href="<?= base_url('mahasiswa') ?>"><i class="bx bx-undo"></i> <span>Back</span></a></li>
                <li><a href="<?= base_url('login/logout') ?>"><i class="bx bx-log-out-circle"></i> <span>Logout</span></a></li>
            <?php }else{ ?>
                <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
                <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="#resume"><i class="bx bx-group"></i> <span>Dosen Pembimbing</span></a></li>
                <li><a href="#services"><i class="bx bx-book-content"></i> <span>Log Bimbingan</span></a></li>
                <li><a href="<?= base_url('login/logout') ?>"><i class="bx bx-log-out-circle"></i> <span>Logout</span></a></li>
            <?php } ?>
        </ul>
    </nav><!-- .nav-menu -->
</header><!-- End Header -->