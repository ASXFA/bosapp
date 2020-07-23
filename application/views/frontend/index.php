<!-- hero area start -->
<section class="hero-area" id="home">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="hero-area-content">
          <h1>Aplikasi Bimbingan Skripsi Online</h1>
          <p>Silahkan lakukan Login untuk menggunakan aplikasi ini</p>
          <a href="<?= base_url('login') ?>" class="appao-btn">Login Mahasiswa</a>
          <a href="<?= base_url('login') ?>" class="appao-btn">Login Dosen</a>
        </div>
      </div>
      <div class="col-lg-5">
          <div class="hand-mockup text-lg-left text-center">
          <img src="<?= base_url() ?>assets/frontend/img/hand-mockup.png" alt="Hand Mockup" />
        </div>
      </div>
    </div>
  </div>
</section><!-- hero area end -->


<!-- counter section start -->
<section class="counter-area ptb-90" id="counter">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
          <div class="single-counter-box">
          <i class="icofont icofont-users"></i>
          <h1><span class="counter"><?= $mahasiswa ?></span></h1>
          <p>Mahasiswa</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
          <div class="single-counter-box">
          <i class="icofont icofont-user"></i>
          <h1><span class="counter"><?= $dosen ?></span></h1>
          <p>Dosen</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
          <div class="single-counter-box">
          <i class="icofont icofont-file"></i>
          <h1><span class="counter"><?= $skripsi ?></span></h1>
          <p>Arsip Skripsi</p>
        </div>
      </div>
    </div>
  </div>
</section><!-- counter section end -->
<!-- team section start -->

<!-- testimonial section start -->
<section class="testimonial-area ptb-90" id="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
          <div class="sec-title">
          <h2>Quotes<span class="sec-title-border"><span></span><span></span><span></span></span></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="testimonial-wrap">
          <div class="single-testimonial-box">
            <h5>Catatan Akhir Kuliah</h5>
            <p>Skripsi sama seperti kehidupan karena hidup penuh misteri yang masih perlu diteliti. Di kuliah kita belajar untuk diuji, di kehidupan kita diuji agar belajar.</p>
            <div class="author-rating">
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
            </div>
          </div>
          <div class="single-testimonial-box">
            <h5>Anis Baswedan</h5>
            <p>“Sibuk mengerjakan skripsi itu baik, tapi menyelesaikan skripsi itu jauh lebih baik. Dan akhirnya. skripsi yg baik adalah skripsi yg selesai.”</p>
            <div class="author-rating">
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
            </div>
          </div>
          <div class="single-testimonial-box">
            <h5>Mary Balogh</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </p>
            <div class="author-rating">
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
              <i class="icofont icofont-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- testimonial section end -->