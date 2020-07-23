<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <!-- <a class="navbar-brand" href="./"><img src="..." alt="Logo"></a> -->
            <!-- <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">

                <div class="dropdown for-notification">
                    <?php $jumlah = $bimbinganBaru->num_rows(); ?>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger"><?php echo $jumlah; ?></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Kamu Punya <?php echo $jumlah ?> Notifikasi</p>
                        <?php foreach($bimbinganBaru->result() as $notif): 
                                foreach($userNotif as $user):
                                    if($user->id == $notif->id_from){
                        ?>
                        <a class="dropdown-item media" href="<?= base_url('backend/bimbingan/detailBimbingan/'.$user->id.'/'.$notif->id) ?>">
                            <i class="fa fa-envelope"></i>
                            <p>Pesan Baru dari <strong><?= $user->nama ?></strong></p>
                        </a>
                        <?php } endforeach; endforeach ?>
                    </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($this->session->userdata('level')!="admin") {
                    ?>
                    <img class="user-avatar img-thumbnail" src="<?= base_url('assets/image/').$this->session->userdata('level').'/'.$this->session->userdata('foto') ?>" alt="User Avatar">
                    <?php }else{
                    ?>
                    <img class="user-avatar img-thumbnail" src="<?= base_url('assets/image/').$this->session->userdata('foto') ?>" alt="User Avatar">
                    <?php
                    } ?>
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                    <a class="nav-link" href="<?= base_url('login/logout') ?>"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- /#header -->