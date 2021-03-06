<div class="content users-content">
    <div class="animated fadeIn">
        <?php 
            if ($this->session->flashdata('status')) {
                if ($this->session->flashdata('kondisi')=="1") {
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
        <div class="card permintaan p-3">
            <div class="card-header mb-3">
                <h4 class="d-block">Data Skripsi Mahasiswa <span id="title"><?= ucfirst($title) ?></span>
                    <?php if($this->session->userdata('level')=="admin"){ ?>
                    <span class="float-right"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModalSkripsi"><i class="fa fa-plus"></i> Tambah Data</a></span>
                    <?php } ?>
                </h4>
            </div>
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size:14px; border:0; border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Judul Skripsi</th>
                            <th>Tahun</th>
                            <th>Mahasiswa</th>
                            <?php if($title=="lulus"): ?>
                            <th>Status</th>
                            <?php endif ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (empty($skripsi)) {
                                echo "<tr> <td colspan='6' class='text-center'> Data tidak tersedia ! </td></tr>";
                            }else{
                                if($this->session->userdata('level')=="dosen" && $title=="aktif"){
                                    $no = 1;
                                    foreach($skripsi as $skripsi){
                                        if($skripsi->dospem1 == $this->session->userdata('id') || $skripsi->dospem2 ==$this->session->userdata('id')){
                        ?>
                                            <tr>
                                                <td class="serial"><?= $no ?></td>
                                                <td width="20%"> <?= $skripsi->judul ?> </td>
                                                <td> <?= $skripsi->tahun ?> </td>
                                                <td> 
                                                    <?php 
                                                        foreach($users as $user):
                                                            if($user->id == $skripsi->mahasiswa){
                                                                echo $user->nama;
                                                            }
                                                        endforeach;
                                                    ?> 
                                                </td>
                                                <td width="25%">
                                                    <a href="<?= base_url('backend/skripsi/gantiStatus/'.$skripsi->id.'/lulus/'.$title) ?>" class="btn btn-success btn-sm" onclick="return confirm('Pastikan Mahasiswa anda benar benar telah menyelesaikan kegiatan skripsi dengan penuh !')" alt="anu"><i class="fa fa-check-circle"></i> Selesai</a>
                                                    
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $skripsi->id ?>" ><i class="fa fa-eye" title="Detail"></i></a>
                                                    <?php if($this->session->userdata('level')=="admin"){ ?>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $skripsi->id ?>"><i class="fa fa-edit" title="Edit"></i></a>
                                                    <?php } ?>
                                                    <a href="<?= base_url('backend/skripsi/delete/'.$skripsi->id.'/'.$title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau delete data ini ? ')" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                        <?php
                                        }$no++;
                                    }
                                    // echo "<tr> <td colspan='6' class='text-center'> Anda tidak membimbing mahasiswa aktif ! </td></tr>";
                                }else{
                                    $no = 1;
                                    foreach($skripsi as $skripsi){
                        ?>
                                        <tr>
                                            <td class="serial"><?= $no ?></td>
                                            <td width="25%"> <?= $skripsi->judul ?> </td>
                                            <td> <?= $skripsi->tahun ?> </td>
                                            <td> 
                                                <?php 
                                                    if(strlen($skripsi->mahasiswa)>1){
                                                        echo $skripsi->mahasiswa;
                                                    }else{
                                                        foreach($users as $user):
                                                            if($user->id == $skripsi->mahasiswa){
                                                                echo $user->nama;
                                                            }
                                                        endforeach;
                                                    }
                                                ?> 
                                            </td>
                                            <?php if($title=="lulus"){ ?>
                                            <td>
                                                <?php 
                                                    
                                                    if ($skripsi->status_skripsi=="published") {
                                                ?>
                                                <span class="badge badge-complete"><?= $skripsi->status_skripsi ?></span>
                                                <?php 
                                                    }else {
                                                ?>
                                                <span class="badge badge-warning"><?= $skripsi->status_skripsi ?></span>
                                            </td>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            <td width="25%">
                                                <?php 
                                                if($this->session->userdata('level')=="admin"){
                                                    if($title=="lulus"){
                                                        if ($skripsi->status_skripsi == "published") {
                                                ?>
                                                <a href="<?= base_url('backend/skripsi/gantiStatus/'.$skripsi->id.'/unpublish/'.$title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk mengganti Status Skripsi ?')" alt="anu"><i class="fa fa-times"></i> Unpublish</a>
                                                <?php
                                                        }else{
                                                ?>
                                                <a href="<?= base_url('backend/skripsi/gantiStatus/'.$skripsi->id.'/published/'.$title) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin untuk mengganti Status Skripsi ?')"><i class="fa fa-check"></i> Publish</a>
                                                <?php
                                                        }
                                                    }else{
                                                ?>
                                                <a href="<?= base_url('backend/skripsi/gantiStatus/'.$skripsi->id.'/lulus/'.$title) ?>" class="btn btn-success btn-sm" onclick="return confirm('Pastikan Mahasiswa benar benar telah menyelesaikan kegiatan skripsi dengan penuh !')" alt="anu"><i class="fa fa-check-circle"></i> Selesai</a>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $skripsi->id ?>" title="Detail" ><i class="fa fa-eye" title="Detail"></i></a>

                                                <?php if($this->session->userdata('level')=="admin"){ ?>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $skripsi->id ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                                <?php } ?>

                                                <a href="<?= base_url('backend/skripsi/delete/'.$skripsi->id.'/'.$title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau delete data ini ? ')" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                        <?php
                                    $no++;} 
                                }
                            }      
                        ?>
                    </tbody>
                </table>
                <script src="<?= base_url() ?>assets/js/lib/data-table/datatables.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/jszip.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/vfs_fonts.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/buttons.print.min.js"></script>
                <script src="<?= base_url() ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
                <script src="<?= base_url() ?>assets/js/init/datatables-init.js"></script>


                <script type="text/javascript">
                    $(document).ready(function() {
                    $('#bootstrap-data-table-export').DataTable();
                } );
                </script>
        </div>
    </div>
</div>
<?php foreach($skripsiModal as $skripsi): ?>
<div class="modal fade" id="detailModal<?= $skripsi->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
        <div class="modal-header">
            <h3>Data Skripsi Mahasiswa <?= ucfirst($title) ?>
            <button type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal">x</button></h3>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    <div class="corner-ribon blue-ribon">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <img class="align-self-center mr-3" style="width:200px; height:200px;" alt="" src="<?= base_url('assets/image/file_Default.png') ?>">
                                    <table class="mt-4 ml-1 align-center text-left text-small">
                                        <tr>
                                            <td width="55%"><p>Nama File </p></td>
                                            <td width="45%"><p><?= $skripsi->file ?></p></td>
                                        </tr>
                                        <tr>
                                            <td width="55%"><p>Ukuran File</p></td>
                                            <td><p><?php $ukuran = $skripsi->file_size; $ukuran = (double)$ukuran; $ukuran = $ukuran / 1024; echo number_format($ukuran,1);  ?> MB</p></td>
                                        </tr>
                                        <tr>
                                            <td width="55%"><p>Tahun</p></td>
                                            <td><p><?= $skripsi->tahun ?></p></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center"><p><a href="<?= base_url('assets/file/skripsi/'.$title.'/'.$skripsi->file) ?>"><i class="fa fa-download"></i> Download Now</a></p></td>
                                        </tr>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="feed-box text-center">
                            <section class="card">
                                <div class="card-body">
                                    <table class="table text-left">
                                        <thead class="thead-dark">
                                            <th colspan="4" class="text-center">Informasi Skripsi</th>
                                        </thead>
                                        <tr>
                                            <td>Nama Mahasiswa </td>
                                            <td>
                                            <?php 
                                                    if(strlen($skripsi->mahasiswa)>1){
                                                        echo $skripsi->mahasiswa;
                                                    }else{
                                                        foreach($users as $user):
                                                            if($user->id == $skripsi->mahasiswa){
                                                                echo $user->nama;
                                                            }
                                                        endforeach;
                                                    }
                                                ?> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dospem 1 </td>
                                            <td>
                                            <?php 
                                                    if(strlen($skripsi->dospem1)>1){
                                                        echo $skripsi->dospem1;
                                                    }else{
                                                        foreach($users as $user):
                                                            if($user->id == $skripsi->dospem1){
                                                                echo $user->nama;
                                                            }
                                                        endforeach;
                                                    }
                                                ?> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dospem 2 </td>
                                            <td><?php 
                                                    if(strlen($skripsi->dospem2)>1){
                                                        echo $skripsi->dospem2;
                                                    }else{
                                                        foreach($users as $user):
                                                            if($user->id == $skripsi->dospem2){
                                                                echo $user->nama;
                                                            }
                                                        endforeach;
                                                    }
                                                ?> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kategori Skripsi </td>
                                            <td><?= $skripsi->kategoriskripsi ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>

<?php foreach($skripsiModal as $skripsi): ?>
<div class="modal fade" id="editModal<?= $skripsi->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/skripsi/edit/'.$skripsi->id.'/'.$title)?>" method="post" enctype="multipart/form-data">
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
<?php endforeach ?>

<div class="modal fade" id="tambahModalSkripsi" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/skripsi/tambah/'.$title)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Tambah Data Skripsi Mahasiswa <?= ucfirst($title) ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Judul Skripsi</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Mahasiswa</label>
                                    <?php 
                                        if($title=="lulus"){
                                    ?>
                                    <input class="form-control" name="mahasiswa" type="text" required>
                                    <?php 
                                        }else{
                                    ?>
                                    <select name="mahasiswa" id="" class="form-control" required>
                                        
                                        <?php 
                                        foreach($users as $user):
                                            for($i=0; $i<count($mhsTersedia); $i++){
                                                if ($mhsTersedia[$i] == $user->id) {
                                        ?>
                                        <option value="<?= $user->id ?>"><?= $user->nama ?></option>
                                        <?php
                                                }
                                            }
                                        endforeach; 
                                        ?>
                                    </select>
                                        <?php 
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Dospem 1</label>
                                    <select name="dospem1" id="" class="form-control" required>
                                        <?php foreach($users as $user):
                                            if($user->level=="dosen" && $user->status=="aktif"){ ?>
                                        <option value="<?= $user->id ?>"><?= $user->nama ?></option>
                                        <?php }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Dospem 2</label>
                                    <select name="dospem2" id="" class="form-control" required>
                                        <?php foreach($users as $user):
                                            if($user->level=="dosen" && $user->status=="aktif"){ ?>
                                        <option value="<?= $user->id ?>"><?= $user->nama ?></option>
                                        <?php }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Kategori Skripsi</label>
                                    <select name="kategoriskripsi" id="" class="form-control" required>
                                        <?php foreach($kategori_skripsi as $kategori):?>
                                        <option value="<?= $kategori->nama ?>"><?= $kategori->nama ?></option>
                                        <?php 
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Tahun</label>
                                    <input type="number" min="1990" max="2030" name="tahun" class="form-control" id="tahun" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">File Skripsi 
                                        <small>
                                            <?php if($title=="aktif"){
                                                echo "( Masukan data DUMMY saja ! )";
                                            } ?>
                                        </small>
                                    </label>
                                    <input type="file" name="file" class="form-control">
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