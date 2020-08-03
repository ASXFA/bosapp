<div class="content users-content">
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
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card permintaan" style="font-size:13px;">
                    <div class="card-header">
                        <h4 class="d-block">Ganti Password
                        </h4>
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
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm float-right mb-3" value="Simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">Edit Profil Form</div>
                    <div class="card-body card-block">
                        <form action="<?= base_url('backend/users/edit/'.$this->session->userdata('id').'/admin/'.$title) ?>" method="post" class="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="nama" name="nama" placeholder="Nama" value="<?= $userSekarang->nama ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                    <input type="file" name="new_foto" placeholder="Foto" class="form-control">
                                    <input type="text" name="old_foto" placeholder="Foto" value="<?= $userSekarang->foto ?>" hidden class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm float-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card permintaan">
            <div class="card-header">
                <h4 class="d-block">Data <?= $title ?>
                    <span class="float-right"><a href="" data-toggle="modal" data-target="#modalTambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></span>
                </h4>
            </div>
            <div class="table-stats order-table ov-h" >
                <table class="table" >
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Judul</th>
                            <th width="50%">Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($quotes as $quote): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $quote->judul ?></td>
                            <td><?= $quote->isi ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modalEdit<?= $quote->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('backend/quotes/delete/'.$quote->id) ?>" onclick="return confirm('Yakin akan menghapus data ? ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                            <?php $no++; endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php foreach($quotesModal as $quote): ?>
<div class="modal fade" id="modalEdit<?= $quote->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/quotes/edit/'.$quote->id)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Edit Data <?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $quote->judul?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Isi</label>
                                    <textarea name="isi" class="form-control" cols="30" rows="10" required><?= $quote->isi ?></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/quotes/tambah/')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Tambah Data <?= ucfirst($title) ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Isi</label>
                                    <textarea name="isi" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
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