<?php 
    if ($this->session->flashdata('login')) {
    ?>
        <script>
            swal("Sukses Login !", " Selemat Datang kembali <?= $this->session->userdata('nama') ?>", "success");
        </script>

    <?php
    }
?>
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1><?= $user->nama ?> - <span class="font-weight-light nip"><?= $user->nomor_induk ?></span> </h1>
      <p><span class="typed" data-typed-items="<?= ucfirst($user->level) ?>"></span></p>
      <div class="row">
        <div class="col-md-4">
          <?php 
            if(!empty($bimbinganBaruDospem1) || !empty($bimbinganBaruDospem2) ){
              foreach($bimbinganBaruDospem1 as $bimbingan):
          ?>
          <div class="alert alert-secondary" role="alert">
            <div class="pl-1"> <i class="bx bx-message-square-error"></i> Pesan baru dari <a href="<?= base_url('bimbingan/'.$bimbingan->id_from) ?>" class="alert-link">Dosen Pembimbing 1 </a>. </div>
          </div>
          <?php 
            endforeach;
            foreach($bimbinganBaruDospem2 as $bimbingan2):
          ?>
          <div class="alert alert-secondary" role="alert">
            <div class="pl-1"> <i class="bx bx-message-square-error"></i> Pesan baru dari <a href="<?= base_url('bimbingan/'.$bimbingan2->id_from) ?>" class="alert-link">Dosen Pembimbing 2 </a>. </div>
          </div>
          <?php
          endforeach;}
          ?>
        </div>
      </div>
      <!-- <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>tentang</h2>
        </div>
          
        <div class="row abouts">
          <div class="col-lg-4">
            <img src="<?= base_url() ?>assets/image/mahasiswa/<?= $user->foto ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3><?= strtoupper($user->nama) ?> <a href="" class=""> 
              <div class="btn-group dropright">
                <a type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-info-circle"></i>
                </a>
                <div class="dropdown-menu">
                  <a href="<?= base_url('editMahasiswa') ?>" class="dropdown-item" >Permintaan Ganti Data</a>
                  <a href="<?= base_url('gantiPassMHS') ?>" class="dropdown-item" >Ganti Password</a>
                </div>
              </div>
            </h3>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong>Jenis Kelamin:</strong> <?= $user->jenis_kelamin ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong>Angkatan:</strong> <?= $user->angkatan ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong>Konsentrasi:</strong> <?= $user->konsentrasi ?></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong>NPM:</strong> <?= $user->nomor_induk ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> <?= $user->email ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong>Telepon:</strong> <?= $user->telepon ?></li>
                </ul>
              </div>
            </div>
            <h5 class="font-weight-bold">Judul Skripsi</h5>
            <p>
              <?= $skripsi->judul ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dosen Pembimbing</h2>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title text-center">Dosen Pembimbing 1</h3>
            <div class="card p-5 ml-3">              
              <?php foreach($dosen as $dosen): if($dosen->id == $skripsi->dospem1){ ?>
              <ul>
                <li><img src="<?= base_url('assets/image/dosen/'.$dosen->foto) ?>" alt="" class="mx-auto d-block"></li>
              </ul>
              <div class="ml-4">
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-user mr-4 ml-3 mb-2"></i> <?= $dosen->nama ?> </h4>
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-id-card mr-4 ml-3 mb-2"></i> <?= $dosen->nomor_induk ?></h4>
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-phone mr-4 ml-3 mb-2"></i> <?= $dosen->telepon ?></h4>
              </div>
              <div class="text-center mt-5"> <a href="<?= base_url('bimbingan/'.$dosen->id) ?>" class="btn btn-primary dosen">Mulai Bimbingan</a>  </div>
              <?php } endforeach; ?>
            </div>
          </div>

          <!-- batas -->
          <!-- <div class="col-md-1">

          </div> -->
          <!-- endbatas -->
          <!-- batas -->
          <!-- <div class="col-md-1">
            <h3 class="resume-title text-white"> sda  </h3>
            <div class="resume-item">
              <?php for ($i=0; $i < 25 ; $i++) { 
                  echo "<br>";
              } ?>
            </div>
            <div class="resume-item"></div>
          </div> -->
          <!-- endbatas -->

          <div class="col-lg-6">
            <h3 class="resume-title text-center">Dosen Pembimbing 2</h3>
            <div class="card p-5 ml-3">              
              <?php foreach($dosen2 as $dosen): if($dosen->id == $skripsi->dospem2){ ?>
              <ul>
                <li><img src="<?= base_url('assets/image/dosen/'.$dosen->foto) ?>" alt="" class="mx-auto d-block"></li>
              </ul>
              <div class="ml-4">
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-user mr-4 ml-3 mb-2"></i> <?= $dosen->nama ?></h4>
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-id-card mr-4 ml-3 mb-2"></i> <?= $dosen->nomor_induk ?></h4>
                <h4 class="font-weight-bold ml-5"> <i class="bx bx-phone mr-4 ml-3 mb-2"></i> <?= $dosen->telepon ?></h4>
              </div>
              <div class="text-center mt-5"> <a href="<?= base_url('bimbingan/'.$dosen->id) ?>" class="btn btn-primary dosen">Mulai Bimbingan</a>  </div>
              <?php } endforeach; ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kartu Bimbingan</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-8 offset-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a target="__blank" href="<?= base_url('cetakBimbingan') ?>">Cetak Kartu Bimbingan</a></h4>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->