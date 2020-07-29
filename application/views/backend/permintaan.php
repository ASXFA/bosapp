<div class="content users-content">
    <div class="animated fadeIn">
        <?php 
            if ($this->session->userdata('status')) {
                if ($this->session->userdata('kondisi')=="1") {
            ?>
                <div class="sufee-alert alert with-close alert-dark alert-dismissible fade show" id="alertlogin">
                    <span class="badge badge-pill badge-dark">Success</span>
                    <?= $this->session->userdata('status') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php 
                }else{
            ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="alertlogin">
                    <span class="badge badge-pill badge-danger">Failed</span>
                    <?= $this->session->userdata('status') ?>
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
        <div class="card permintaan">
            <div class="card-header">
                <h4 class="d-block">Data <?= $title ?>
                </h4>
            </div>
            <div class="table-stats order-table ov-h" >
                <table class="table" >
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Mahasiswa</th>
                            <th>Nomor Induk</th>
                            <th>Subject</th>
                            <th>Tanggal Permintaan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach($permintaan as $permintaan):
                                foreach($user as $user):
                                    if($permintaan->id_mahasiswa == $user->id ){
                        ?>
                        <tr>
                            <td><?= $no ?></td> 
                            <td><?= $user->nama ?></td> 
                            <td><?= $user->nomor_induk ?></td> 
                            <td><?= $permintaan->subject ?></td> 
                            <td><?= $permintaan->tgl_permintaan ?></td>
                            <td><?= $permintaan->keterangan ?></td> 
                            <td>
                                <?php 
                                    if($permintaan->status==0){ 
                                        echo "<span class='badge badge-warning'> Belum Direspon </span>";
                                    }else if($permintaan->status==2){
                                        echo "<span class='badge badge-danger'> Di Tolak </span>";
                                    }else if($permintaan->status== 1){
                                        echo "<span class='badge badge-success'> Sudah DiUpdate </span>";
                                    }
                                ?>
                            </td>
                            <td width="10%">
                                <?php 
                                    if ($permintaan->status == 2 || $permintaan->status == 1) {
                                
                                    }else{
                                ?>
                                    <a href="<?= base_url('backend/permintaan/gantiStatus/'.$permintaan->id.'/1/'.$user->id) ?>" class="btn btn-success btn-sm" title="Terima Permintaan"><i class="fa fa-check-circle"></i></a>
                                    <a href="<?= base_url('backend/permintaan/gantiStatus/'.$permintaan->id.'/2/'.$user->id) ?>" class="btn btn-danger btn-sm" title="Tolak Permintaan"><i class="fa fa-times-circle"></i></a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php 
                                    }
                                endforeach;
                                $no++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <?php foreach($userModal as $user): ?>
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
<?php endforeach ?> -->

<!-- <?php foreach($userModal as $user): ?>
<div class="modal fade" id="editModal<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/users/edit/'.$user->id.'/dosen')?>" method="post" enctype="multipart/form-data">
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
<?php endforeach ?> -->

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/users/tambah/'.$title)?>" method="post" enctype="multipart/form-data">
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