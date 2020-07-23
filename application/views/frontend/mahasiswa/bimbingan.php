<div id="main">
    <div class="bimbingan m-5 ">
        <div class="cards text-center">
            <div class="card-body" data-aos="zoom-in">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="mx-auto d-block">
                            <li>
                                <img src="<?= base_url('assets/image/dosen/'.$dosen->foto) ?>" alt="">
                            </li>
                        </ul>
                        <h5><?= $dosen->nama ?></h5>
                        <h6><?= $dosen->nomor_induk ?></h6>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Rules Bimbingan !</h4>
                            <ol class="text-left">
                                <li>asdas</li>
                                <li>asdas</li>
                                <li>asdas</li>
                            </ol>
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
                                <input type="text" name="id_from_nama" class="form-control" placeholder="Your Name" value="<?= $this->session->userdata('nama') ?>" readonly />
                                <input type="text" name="id_from" class="form-control" id="id_from" placeholder="Your Name" value="<?= $this->session->userdata('id') ?>" hidden />
                                <?php if(!empty($bimbingan)){ ?>
                                <input type="text" name="idBimbingan" class="form-control" placeholder="Your Name" value="<?= $bimbingan->id ?>" hidden />
                                <?php } ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="id_to_nama" class="form-control" placeholder="Your Name" value="<?= $dosen->nama ?>" readonly />
                                <input type="text" name="id_to" class="form-control" id="id_to" placeholder="Your Name" value="<?= $dosen->id ?>" hidden />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" id="file" placeholder="File" required/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Keterangan" required></textarea>
                        </div>
                        <div class="text-center"><button class="btn btn-primary" type="submit">Kirim</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="resume-title">Pesan Terbaru</h3>
                <div class="resume-item pb-0">
                    <?php if(!empty($bimbingan)){ ?>
                    <h4><?= $bimbingan->subject ?></h4>
                    <h5><?= $bimbingan->tgl_bimbingan ?></h5>
                    <p><em><?= $bimbingan->keterangan ?></em></p>
                    <p><a href="<?= base_url('assets/bimbingan/'.$this->session->userdata('id').'/'.$bimbingan->id_from.'/'.$bimbingan->file_name) ?>" class=""><i class="bx bx-file"></i> <?= $bimbingan->file_name ?></a></p>
                    <?php }else{ ?>
                    <h4>Belum Ada Balasan Dari Pembimbing</h4>
                    <?php } ?>
                </div>

                <h3 class="resume-title">Riwayat</h3>
                <div class="resume-item">
                    <?php if(!empty($bimbinganRiwayat)){ foreach($bimbinganRiwayat as $riwayat): ?>
                    <h4><?= $riwayat->subject ?></h4>
                    <h5><?= $riwayat->tgl_bimbingan ?></h5>
                    <p><?= $riwayat->keterangan ?></p>
                    <p><a href="<?= base_url('assets/bimbingan/'.$this->session->userdata('id').'/'.$bimbingan->id_from.'/'.$riwayat->file_name) ?>" class=""><i class="bx bx-file"></i> <?= $riwayat->file_name ?></a></p>
                    <?php endforeach; }else{ ?>
                        <h4>Belum ada Riwayat Bimbingan</h4>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>

    </div>
</section><!-- End Resume Section -->
</div>