<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li class="menu-title">Menu</li>
                <li id="dashboard">
                    <a href="<?= base_url('admin') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown" id="akademik">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i>Akademik</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <?php if($this->session->userdata('level')=="admin"): ?>
                        <li><i class="fa fa-users"></i><a href="<?= base_url('backend/users/user/dosen') ?>">Manage Dosen</a></li>
                        <?php endif ?>
                        <li><i class="fa fa-users"></i><a href="<?= base_url('backend/users/user/mahasiswa') ?>">Manage Mahasiswa</a></li>
                    </ul>
                </li>
                <li id="log">
                    <a href="widgets.html"> <i class="menu-icon fa fa-list"></i>Log Bimbingan</a>
                </li>
                <li class="menu-item-has-children dropdown" id="akademik">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Skripsi</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-file-text-o"></i><a href="<?= base_url('backend/skripsi/skripsi/lulus') ?>">Skripsi Arsip</a></li>
                        <li><i class="fa fa-file-text-o"></i><a href="<?= base_url('backend/skripsi/skripsi/aktif') ?>">Skripsi Aktif</a></li>
                    </ul>
                </li>
                <?php if($this->session->userdata('level')=="admin"){ ?>
                <li id="cetak">
                    <a href="widgets.html"> <i class="menu-icon fa fa-print"></i>Cetak Laporan</a>
                </li>
                <li class="menu-item-has-children dropdown" id="pengaturan">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Pengaturan</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">