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
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">3</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 3 Notification</p>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-check"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-info"></i>
                            <p>Server #2 overloaded.</p>
                        </a>
                        <a class="dropdown-item media" href="#">
                            <i class="fa fa-warning"></i>
                            <p>Server #3 overloaded.</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($this->session->userdata('level')!="admin") {
                    ?>
                    <img class="user-avatar rounded-circle" src="<?= base_url('assets/image/').$this->session->userdata('level').'/'.$this->session->userdata('foto') ?>" alt="User Avatar">
                    <?php }else{
                    ?>
                    <img class="user-avatar rounded-circle" src="<?= base_url('assets/image/').$this->session->userdata('foto') ?>" alt="User Avatar">
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