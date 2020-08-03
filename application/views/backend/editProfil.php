<!-- <div class="breadcrumbs">
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
</div> -->
<!-- Content -->
<div class="content dashboard-content">
    <!-- Animated -->
    <div class="animated fadeIn">
    <?php 
            if ($this->session->flashdata('status')) {
                if ($this->session->flashdata('kondisi')=="1") {
            ?>
                <div class="sufee-alert alert with-close alert-dark alert-dismissible fade show" id="alertlogin">
                    <span class="badge badge-pill badge-dark">Success</span>
                    <?= $this->session->flashdata('status') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php 
                }else{
            ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="alertlogin">
                    <span class="badge badge-pill badge-danger">Failed</span>
                    <?= $this->session->flashdata('status') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
            ?>
                
            <?php
            }
            $this->session->set_userdata('status','');
            $this->session->set_userdata('kondisi','');
        ?>
        <div class="row">
            <div class="col-md-4">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <a style="width: 80px;">
                                    <img class="img-thumbnail rounded mr-3" style="border: 1px;"  alt="" src="<?= base_url('assets/image/dosen/'.$user->foto) ?>">
                                </a>
                                <div class="media-body ml-3">
                                    <h4 class="text-light"><?= $user->nama ?></h4>
                                    <h6 class="text-light"><?= $user->nomor_induk ?></h6>
                                    <p><?= $user->jabatan ?></p>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a> <?= $user->jenis_kelamin ?> <span class="badge badge-secondary pull-right"><i class="fa fa-intersex"></i></span>
                            </li>
                            <li class="list-group-item">
                                <a> <?= $user->telepon ?> <span class="badge badge-secondary pull-right"><i class="fa fa-phone"></i></span></a>
                            </li>
                            <li class="list-group-item">
                                <a> <?= $user->email ?> <span class="badge badge-secondary pull-right"><i class="fa fa-envelope"></i></span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" data-toggle="modal" data-target="#gantiPassModal" class="btn btn-info btn-sm"><i class="fa fa-key"></i> Ganti Password </a><span><a href="#" id="btnEditProfil" class="btn btn-secondary btn-sm float-right"><i class="fa fa-edit"></i>  Edit Profil </a></span>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>
            <div class="col-md-8 offset-md-0">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-body">
                            <div class="editProfil alert alert-danger" role="alert">
                                <h3 class="alert-heading">Aturan Bimbingan</h3>
                                <hr>
                                <?= $user->aturan ?>
                            </div>
                            <a href="#" id="btnEditAturanBimbingan" class="btn btn-danger btn-sm float-right"><i class="fa fa-edit"></i> Edit Aturan Bimbingan </a>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div id="editProfilForm">
                    <div class="card">
                        <div class="card-header">Edit Profil Form</div>
                        <div class="card-body card-block">
                            <form action="<?= base_url('backend/users/edit/'.$this->session->userdata('id').'/dosen/users') ?>" method="post" class="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="nama" name="nama" placeholder="Nama" value="<?= $user->nama ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                        <input type="text" id="nik" name="nomor_induk" placeholder="Nomor Induk" value="<?= $user->nomor_induk ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-intersex"></i></div>
                                        <select name="jenis_kelamin" class="form-control">
                                            <?php 
                                                if($user->jenis_kelamin == "Perempuan"){
                                            ?>
                                            <option value="Laki-Laki"> Laki-Laki </option>
                                            <option value="Perempuan" selected> Perempuan </option>
                                            <?php 
                                                }else{
                                            ?>
                                            <option value="Laki-Laki" selected> Laki-Laki </option>
                                            <option value="Perempuan"> Perempuan </option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id="telepon" name="telepon" value="<?= $user->telepon ?>" placeholder="Telepon" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" value="<?= $user->email ?>" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                        <input type="file" name="new_foto" placeholder="Foto" class="form-control">
                                        <input type="text" name="old_foto" placeholder="Foto" value="<?= $user->foto ?>" hidden class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm float-right">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="formAturanBimbingan">
                    <div class="card" >
                        <div class="card-header">Edit Aturan Bimbingan Form</div>
                        <div class="card-body card-block">
                            <form action="<?= base_url('backend/users/editAturan') ?>" method="post" class="">
                                <div class="form-group">
                                    <textarea name="aturan" id="aturanBimbingan" cols="30" rows="10"><?= $user->aturan ?></textarea>
                                </div>
                                <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm float-right">Edit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

<div class="modal fade" id="gantiPassModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Form Ganti Password <span class="float-right">
                </h5>
            </div>
            <form action="<?= base_url('backend/users/gantiPassword') ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="old_pass" class="form-control-label">Password Lama</label>
                    <div class="input-group">
                        <input type="password" id="old_pass" name="old_pass" class="form-control" required>
                        <a href="#" id="btnOldPass"><div class="input-group-addon"><i id="addOld" class="fa fa-eye"></i></div></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="old_pass" class="form-control-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" id="new_pass" name="new_pass" class="form-control" required>
                        <a href="#" id="btnNewPass"><div class="input-group-addon"><i id="addNew" class="fa fa-eye"></i></div></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="old_pass" class="form-control-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" id="conf_pass" name="conf_pass" class="form-control" required>
                        <a href="#" id="btnConfPass"><div class="input-group-addon"><i id="addConf" class="fa fa-eye"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#aturanBimbingan' ),{
            toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#btnEditProfil').click(function(){
            $('#editProfilForm').slideToggle();
            $('#formAturanBimbingan').slideUp();
        });
        $('#btnEditAturanBimbingan').click(function(){
            $('#formAturanBimbingan').slideToggle();
            $('#editProfilForm').slideUp();
        });

        $('#btnOldPass').click(function(){
            if ($('#old_pass').attr('type')=="password") {
                $('#old_pass').attr('type','text');
                $('#addOld').removeClass('fa-eye');
                $('#addOld').addClass('fa-eye-slash');
            }else{
                $('#old_pass').attr('type','password');
                $('#addOld').removeClass('fa-eye-slash');
                $('#addOld').addClass('fa-eye');
            }
        });
        $('#btnNewPass').click(function(){
            if ($('#new_pass').attr('type')=="password") {
                $('#new_pass').attr('type','text');
                $('#addNew').removeClass('fa-eye');
                $('#addNew').addClass('fa-eye-slash');
            }else{
                $('#new_pass').attr('type','password');
                $('#addNew').removeClass('fa-eye-slash');
                $('#addNew').addClass('fa-eye');
            }
        });
        $('#btnConfPass').click(function(){
            if ($('#conf_pass').attr('type')=="password") {
                $('#conf_pass').attr('type','text');
                $('#addConf').removeClass('fa-eye');
                $('#addConf').addClass('fa-eye-slash');
            }else{
                $('#conf_pass').attr('type','password');
                $('#addConf').removeClass('fa-eye-slash');
                $('#addConf').addClass('fa-eye');
            }
        });


    });
</script>