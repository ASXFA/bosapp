<?php 
    if ($this->session->flashdata('status')) {
        if ($this->session->flashdata('kondisi')=="1") {
    ?>
        <script>
            swal("Bimbingan Sukses !", "<?= $this->session->flashdata('status') ?>", "success");
        </script>
    <?php 
        }else{
    ?>
        <script>
            swal("Bimbingan Gagal!", "<?= $this->session->flashdata('status') ?>", "error");
        </script>
    <?php
        }
    ?>
        
    <?php
    }
?>
<div id="main">
    <div class="bimbingan m-5 ">
        <div class="cards text-center">
            <div class="card-body" data-aos="zoom-in">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="mx-auto d-block mr-4">
                            <li>
                                <img src="<?= base_url('assets/image/dosen/'.$dosen->foto) ?>" alt="">
                            </li>
                        </ul>
                        <h5 class="namaBimb"><?= $dosen->nama ?></h5>
                        <h6 class="nikBimb"><?= $dosen->nomor_induk ?></h6>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Rules Bimbingan !</h4>
                            <div class="text-left">
                                <?= $dosen->aturan ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Resume Section ======= -->
    <section class="resume bimb">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="resume-title">Bimbingan <button id="btnBimbingan" class="btn btn-primary btn-sm float-right font-weight-bold text-white">Bimbingan Sekarang</button></h3>
                    <div id="formBimbingan" data-aos="zoom-in" >
                        <h5>Form Bimbingan </h5>
                        <form action="<?= base_url('tambahBimbingan') ?>" method="post"  class="" enctype="multipart/form-data"> 
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="id_from_nama" class="form-control form-control-sm" placeholder="Your Name" value="<?= $this->session->userdata('nama') ?>" readonly />
                                    <input type="text" name="id_from" class="form-control" id="id_from" placeholder="Your Name" value="<?= $this->session->userdata('id') ?>" hidden />
                                    <?php if(!empty($bimbingan)){ ?>
                                    <input type="text" name="idBimbingan" class="form-control form-control-sm" placeholder="Your Name" value="<?= $bimbingan->id ?>" hidden />
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="id_to_nama" class="form-control form-control-sm" placeholder="Your Name" value="<?= $dosen->nama ?>" readonly />
                                    <input type="text" name="id_to" class="form-control" id="id_to" placeholder="Your Name" value="<?= $dosen->id ?>" hidden />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="subject" id="subject" placeholder="Subject" required/>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-sm" name="file" id="file" placeholder="File"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm" name="message" rows="5" placeholder="Keterangan" required></textarea>
                            </div>
                            <div class="text-center"><button class="btn btn-primary btn-sm" type="submit">Kirim</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="resume-title">Pesan Terbaru</h3>
                        <?php if(!empty($bimbinganAll)){ 
                                foreach($bimbinganAll as $bimbingan):  ?>
                    <div class="resume-item">
                        <h4><?= $bimbingan->subject ?></h4>
                        <h5><?= date("d F Y H:i", strtotime($bimbingan->tgl_bimbingan))." wib" ?></h5>
                        <p><?= $bimbingan->keterangan ?></p>
                        <?php if($bimbingan->file_name != "") {?>
                        <p><a href="<?= base_url('assets/bimbingan/'.$this->session->userdata('id').'/'.$bimbingan->id_from.'/'.$bimbingan->file_name) ?>" class=""><i class="bx bx-file"></i> <?= $bimbingan->file_name ?></a></p>
                        <?php }else{ ?>
                        <p><em>Tidak ada file yang dikirim</em></p>
                        <?php }?>
                    </div>
                        <?php   endforeach; 
                            }else{ ?>
                    <div class="resume-item pb-0">
                        <h4>Belum Ada Balasan Dari Pembimbing</h4>
                    </div>
                        <?php } ?>

                    <h3 class="resume-title">Riwayat</h3>
                    <?php if(!empty($bimbinganRiwayat)){ foreach($bimbinganRiwayat as $riwayat): ?>
                    <div class="resume-item">
                        <h4>
                            <?= $riwayat->subject ?>
                            <span class="dari">
                               ( Dari 
                                <?php 
                                    if ($riwayat->id_from == $this->session->userdata('id')) {
                                        echo "Anda )";
                                    }else{
                                        echo "Dosen )";
                                    }
                                ?>
                            </span>
                        </h4>
                        <h5><?= date("d F Y H:i", strtotime($riwayat->tgl_bimbingan))." wib" ?></h5>
                        <p><?= $riwayat->keterangan ?></p>
                        <?php if($riwayat->file_name != "") {?>
                        <p><a href="<?= base_url('assets/bimbingan/'.$this->session->userdata('id').'/'.$riwayat->id_from.'/'.$riwayat->file_name) ?>" class=""><i class="bx bx-file"></i> <?= $riwayat->file_name ?></a></p>
                        <?php }else{ ?>
                        <p><em>Tidak ada file yang dikirim</em></p>
                        <?php }?>
                    </div>
                        <?php endforeach; }else{ ?>
                    <div class="resume-item">
                            <h4>Belum ada Riwayat Bimbingan</h4>
                    </div>
                            <?php } ?>
                </div>
            </div>
        </div>
    </section><!-- End Resume Section -->
</div>