  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <!-- <h3>Brandon Johnson</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
      <div class="copyright">
        &copy; Copyright <strong><span>AplikasiBimbinganSkripsiIFUNLA</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/jquery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#btnBimbingan").click(function(){
        if ($('#btnBimbingan').text()=="Bimbingan Sekarang") {
          $('#btnBimbingan').html('Tutup Form');
        }else{
          $('#btnBimbingan').html('Bimbingan Sekarang');
        }
        $('#formBimbingan').slideToggle(1000);
      });
    });
  </script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/frontend/mahasiswa') ?>/js/main.js"></script>


</body>

</html>