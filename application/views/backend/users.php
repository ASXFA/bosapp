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
        <div class="card">
            <div class="card-header">
                <h4 class="d-block">Data <?= $title ?>
                    <?php if($this->session->userdata('level')=="admin"){ 
                    ?>
                    <span class="float-right"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Data</a></span>
                    <?php } ?>
                </h4>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Avatar</th>
                            <th>Name</th>
                            <th>Nomor Induk</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach($user as $user):
                        ?>
                        <tr>
                            <td class="serial"><?= $no ?></td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="<?= base_url('assets/image/'.$title.'/'.$user->foto) ?>" target="_blank"><img class="img-thumbnail" src="<?= base_url('assets/image/'.$title.'/'.$user->foto) ?>" alt=""></a>
                                </div>
                            </td>
                            <td> <?= $user->nama ?> </td>
                            <td> <?= $user->nomor_induk ?> </td>
                            <td> <?= $user->email ?> </td>
                            <td>
                                <?php 
                                    if ($user->status=="aktif") {
                                ?>
                                <span class="badge badge-complete"><?= $user->status ?></span>
                                <?php 
                                    }else if($user->status=="tidak aktif"){
                                ?>
                                <span class="badge badge-danger"><?= $user->status ?></span>
                                <?php
                                    }else{
                                ?>
                                <span class="badge badge-warning"><?= $user->status ?></span>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($this->session->userdata('level')=="admin"){
                                        if ($user->status == "aktif") {
                                ?>
                                <a href="<?= base_url('backend/users/gantiStatus/'.$user->id.'/block/'.$title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk mengganti Status Akun <?= $title ?> ?')"><i class="fa fa-times"></i> Block</a>
                                <?php
                                        }else{
                                ?>
                                <a href="<?= base_url('backend/users/gantiStatus/'.$user->id.'/activate/'.$title) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin untuk mengganti Status Akun <?= $title ?> ?')"><i class="fa fa-check"></i> Activate</a>
                                <?php
                                        }
                                    }
                                ?>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $user->id ?>" ><i class="fa fa-eye"></i></a>
                                <?php if($this->session->userdata('level')=="admin"){ ?>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $user->id ?>"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('backend/users/delete/'.$user->id.'/'.$title.'/'.$page) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau delete data ini ? ')"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                            $no++;
                            endforeach
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php foreach($userModal as $user): ?>
<div class="modal fade" id="detailModal<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h3>Data <?= ucfirst($title) ?>
            <button type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal">x</button></h3>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card p-2 mb-1">
                        <img class="card-img-top" src="<?= base_url('assets/image/'.$title.'/'.$user->foto) ?>"  width="35% !important" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="mb-2"><?= $user->nama ?> ( <?= $user->nomor_induk ?> ) </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-7">
                                    <p><i class="fa fa-intersex mr-2"></i> <?= $user->jenis_kelamin ?></p>
                                    <p><i class="fa fa-phone mr-2"></i> <?= $user->telepon ?></p>
                                    <p><i class="fa fa-envelope mr-2"></i> <?= $user->email ?></p>
                                    <?php 
                                        if ($user->konsentrasi!="") {
                                    ?>
                                        <p><i class="fa fa-book mr-2"></i> <?= $user->konsentrasi ?></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="col-md-5">
                                    <p><i class="fa fa-exclamation-triangle mr-2"></i> <?= $user->status ?></p>
                                    <p><i class="fa fa-user mr-2"></i> <?= $user->level ?></p>
                                    <p><i class="fa fa-briefcase mr-2"></i> <?= $user->jabatan ?></p>
                                    <?php 
                                        if ($user->konsentrasi!="") {
                                    ?>
                                        <p><i class="fa fa-graduation-cap mr-2"></i> <?= $user->angkatan ?></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<?php foreach($userModal as $user): ?>
<div class="modal fade" id="editModal<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/users/edit/'.$user->id.'/'.$this->session->userdata('id').'/'.$page)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Edit Data <?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $user->nama?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nomor Induk</label>
                                    <input type="text" name="nomor_induk" class="form-control" value="<?= $user->nomor_induk?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <?php 
                                            if ($user->jenis_kelamin=="Laki-Laki") {
                                        ?>
                                        <option value="Laki-Laki" selected> Laki-Laki </option>
                                        <option value="Perempuan"> Perempuan </option>
                                        <?php 
                                            }else{
                                        ?>
                                        <option value="Laki-Laki"> Laki-Laki </option>
                                        <option value="Perempuan" selected> Perempuan </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="<?= $user->telepon?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user->email?>" required>
                                </div>
                                <?php 
                                    if($title=="dosen"){
                                ?>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= $user->jabatan?>" readonly>
                                </div>
                                    <?php }else if($title=="mahasiswa"){ ?>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Konsentrasi</label>
                                        <select name="konsentrasi" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <?php 
                                            foreach($kategori as $k):
                                                if($k->nama == $user->konsentrasi){
                                                    echo "<option value='".$k->nama."' selected>";
                                                }else{
                                                    echo "<option value='".$k->nama."'>";
                                                }
                                                echo $k->nama;
                                        ?>
                                        </option>
                                        <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Angkatan</label>
                                        <input type="number" min="1990" max="2030" name="angkatan" class="form-control" value="<?= $user->angkatan?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" value="<?= $user->jabatan?>" readonly>
                                    </div>
                                    <?php } ?>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Foto</label>
                                    <input type="text" name="old_foto" class="form-control" value="<?= $user->foto?>" hidden>
                                    <input type="file" name="new_foto" class="form-control" >
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

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/users/tambah/'.$title.'/'.$page)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Tambah Data <?= ucfirst($title) ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Nomor Induk</label>
                                    <input type="text" name="nomor_induk" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Laki-Laki"> Laki-Laki </option>
                                        <option value="Perempuan"> Perempuan </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= ucfirst($title) ?>" readonly >
                                </div>
                                <?php if($title=="mahasiswa"){ ?>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Konsentrasi</label>
                                    <select name="konsentrasi" id="" class="form-control" required>
                                        <option selected disabled>-- PILIH --</option>
                                        <?php foreach($kategori as $k): ?> 
                                        <option value="<?= $k->nama ?>"><?= $k->nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Angkatan</label>
                                    <input type="number" min="1990" max="2030" name="angkatan" class="form-control" required >
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" required>
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