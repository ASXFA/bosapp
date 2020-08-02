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
        <div class="card permintaan">
            <div class="card-body">
                <h4 class="mb-3">Isi Permintaan Perubahan Data
                    <span>
                        <a href="<?= base_url('backend/permintaan/gantiStatus/'.$permintaan->id).'/1' ?>" class="btn btn-success btn-sm float-right"><i class="fa fa-check-circle"></i> Selesai </a>
                    </span>
                </h4>
                <h6><?= $permintaan->keterangan ?></h6>
            </div>
        </div>
        <div class="card permintaan">
            <div class="card-header">
                <h4 class="d-block">Data User </h4>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serial">1</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="<?= base_url('assets/image/mahasiswa/'.$user->foto) ?>" target="_blank"><img class="img-thumbnail" src="<?= base_url('assets/image/mahasiswa/'.$user->foto) ?>" alt=""></a>
                                </div>
                            </td>
                            <td><?= $user->nama ?></td>
                            <td><?= $user->nomor_induk ?></td>
                            <td><?= $user->email ?></td>
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
                            <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModalUser<?= $user->id ?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card permintaan">
            <div class="card-header">
                <h4 class="d-block">Data Skripsi </h4>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>Kategori Skripsi</th>
                            <th>Judul</th>
                            <th>Dospem 1</th>
                            <th>Dospem 2</th>
                            <th>Log Bimbingan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serial">1</td>
                            <td><?= $user->nama ?></td>
                            <td><?= $skripsi->tahun ?></td>
                            <td><?= $skripsi->kategoriskripsi ?></td>
                            <td><?= $skripsi->judul ?></td>
                            <td>
                                <?php 
                                    foreach($dosen as $dsn):
                                        if($dsn->id == $skripsi->dospem1){
                                            echo $dsn->nama;
                                        }
                                    endforeach
                                ?>
                            </td>
                            <td>
                                <?php 
                                    foreach($dosen as $dsn):
                                        if($dsn->id == $skripsi->dospem2){
                                            echo $dsn->nama;
                                        }
                                    endforeach
                                ?>
                            </td>
                            <td>
                                <a target="__blank" href="<?= base_url('backend/bimbingan/cetakBimbingan/'.$user->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-file"></i> Cetak</a>
                            </td>
                            <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModalSkripsi<?= $skripsi->id ?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModalUser<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/users/edit/'.$user->id.'/'.$this->session->userdata('id').'/'.$page.'/'.$permintaan->id)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Edit Data User</h3>
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

<div class="modal fade" id="editModalSkripsi<?= $skripsi->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/skripsi/edit/'.$skripsi->id.'/aktif/editPermintaan/'.$permintaan->id.'/'.$user->id)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Edit Data <?= $title ?></h3>
                            </div>
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="" class="form-control-label">Judul Skripsi</label>
                                    <input type="text" name="judul" class="form-control" value="<?= $skripsi->judul ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Mahasiswa</label>
                                    <?php 
                                        if($title=="lulus"){
                                    ?>
                                    <input class="form-control" name="mahasiswa" type="text" value="<?= $skripsi->mahasiswa ?>" required>
                                    <?php 
                                        }else{
                                    ?>
                                    <select name="mahasiswa" id="" class="form-control" required>
                                        <option selected disable>--PILIH--</option>
                                        <?php foreach($users as $user):
                                            if($user->level=="mahasiswa"){ 
                                                if ($skripsi->mahasiswa==$user->id) {
                                                    echo "<option value='".$user->id."' selected>";
                                                }else{
                                                    echo "<option value='".$user->id."'>";
                                                }
                                                ?>
                                                    <?= $user->nama ?></option>
                                                <?php
                                            } endforeach;
                                        ?>
                                    </select>
                                        <?php 
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Dospem 1</label>
                                    <select name="dospem1" id="" class="form-control" required>
                                        <option selected disable>--PILIH--</option>
                                        <?php foreach($users as $user):
                                            if($user->level=="dosen"){ 
                                                if ($skripsi->dospem1==$user->id) {
                                                    echo "<option value='".$user->id."' selected>";
                                                }else{
                                                    echo "<option value='".$user->id."'>";
                                                }
                                                ?>
                                                    <?= $user->nama ?></option>
                                                <?php
                                            } endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Dospem 2</label>
                                    <select name="dospem2" id="" class="form-control" required>
                                        <option selected disable>--PILIH--</option>
                                        <?php foreach($users as $user):
                                            if($user->level=="dosen"){ 
                                                if ($skripsi->dospem2==$user->id) {
                                                    echo "<option value='".$user->id."' selected>";
                                                }else{
                                                    echo "<option value='".$user->id."'>";
                                                }
                                                ?>
                                                    <?= $user->nama ?></option>
                                                <?php 
                                            } endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Kategori Skripsi</label>
                                    <select name="kategoriskripsi" id="" class="form-control" required>
                                        <option selected disable>--PILIH--</option>
                                        <?php foreach($kategori_skripsi as $kategori):
                                            if($kategori->nama==$skripsi->kategoriskripsi){ 
                                                echo "<option value='".$kategori->nama."' selected>";
                                            }else{
                                                echo "<option value='".$kategori->nama."'>";
                                            }?>
                                                    <?= $kategori->nama ?></option>
                                                <?php 
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Tahun</label>
                                    <input type="text" name="tahun" id="tahun<?= $skripsi->id ?>" class="form-control" value="<?= $skripsi->tahun ?>" required>
                                    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    
                                    <!--Local Stuff-->
                                    <script>
                                        jQuery(document).ready(function() {
                                            jQuery("#tahun<?= $skripsi->id ?>").datepicker({
                                                format: "yyyy",
                                                viewMode: "years", 
                                                minViewMode: "years"
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">File Skripsi</label>
                                    <input type="file" name="new_file" class="form-control">
                                    <input type="text" name="old_file" class="form-control" value="<?= $skripsi->file ?>" hidden>
                                    <input type="text" name="file_size" class="form-control" value="<?= $skripsi->file_size ?>" hidden>
                                    <input type="text" name="status_mahasiswa" class="form-control" value="<?= $skripsi->status_mahasiswa ?>" hidden>
                                    <input type="text" name="status_skripsi" class="form-control" value="<?= $skripsi->status_skripsi ?>" hidden>
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