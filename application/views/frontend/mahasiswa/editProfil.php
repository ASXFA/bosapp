<?php 
    if ($this->session->flashdata('status')) {
        if ($this->session->flashdata('kondisi')=="1") {
    ?>
        <script>
            swal("Permintaan sukses diajukan !", "Silahkan tunggu 1x24 jam untuk proses pengubahan data atau hubungi admin PRODI IF UNLA", "success");
        </script>
    <?php 
        }else{
    ?>
        <script>
            swal("Permintaan Gagal!", "Gagal melakukan permintaan, silahkan ulangi", "error");
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
                        <div class="alert alert-danger text-left" role="alert">
                            <h4 class="alert-heading">Aturan Pengajuan Permintaan Pengubahan Data </h4>
                            <div class="text-left">
                                <?= $rules->rule ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3">FORM AJUKAN PERMINTAAN PERUBAHAN DATA</h4>
                        <form action="<?= base_url('tambahPermintaan') ?>" method="post" >
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" value="<?= $this->session->userdata('nama') ?>"  readonly/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="nomor_induk" id="nomor_induk" value="<?= $this->session->userdata('nomor_induk') ?>" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="Perubahan Data" readonly/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="5" ></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-primary btn-sm">Kirim</button></div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>