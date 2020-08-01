<div class="breadcrumbs">
    <?php 
        if ($this->session->flashdata('login')) {?>
            <div class="sufee-alert alert with-close alert-dark alert-dismissible fade show" id="alertlogin">
                <span class="badge badge-pill badge-dark">Success</span>
                <?= $this->session->flashdata('login') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
    ?>
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h4 class="mt-3">Dashboard <?= ucfirst($this->session->userdata('level')) ?></h4>
                        <h1>Halo <?= ucfirst($this->session->userdata('nama')) ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="content dashboard-content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-notebook"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $skripsi ?></span></div>
                                    <div class="stat-heading">Arsip Skripsi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                if ($this->session->userdata('level')=="admin") {
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $dosen ?></span></div>
                                    <div class="stat-heading">Dosen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $mhs ?></span></div>
                                    <div class="stat-heading">Mahasiswa</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-file"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $kategori ?></span></div>
                                    <div class="stat-heading">Kategori</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($this->session->userdata('level')=="dosen"){ ?>
            <div class="col-md-4">
                <?php if($bimbinganBaru->num_rows() > 0){ ?>
                    <div class="alert alert-success" role="alert" style="font-size:13px;">
                    <?php 
                        foreach($user as $user): 
                            if ($user->id == $bimbinganBaruLimit->id_from) {
                    ?>
                    <a href="<?= base_url('backend/bimbingan/detailBimbingan/'.$user->id) ?>" class="">Pesan Baru dari <strong><?= $user->nama ?></strong></a>
                            <?php }endforeach ?> 
                </div>
                    <?php 
                    } ?>
            </div>
                <?php
                }else if($this->session->userdata('level')=="admin"){
                    if(!empty($permintaanBaru)){
                        ?>
            <div class="col-lg-5 col-md-6">
                <div class="alert alert-success" style="font-size:14px;" role="alert">
                    Ada permintaan <a href="<?= base_url('backend/permintaan') ?>" class="alert-link">Perubahan Data Baru</a> dari Mahasiswa.
                </div>
            </div>
            <?php } 
            if($skripsiArsipBaru->num_rows() > 0){
                ?>
            <div class="col-lg-5 col-md-6">
                <div class="alert alert-success" style="font-size:14px;" role="alert">
                    Ada <a href="<?=base_url('backend/skripsi/skripsi/lulus') ?>" class="alert-link">Arsip skripsi Baru</a> untuk diPublish.
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
