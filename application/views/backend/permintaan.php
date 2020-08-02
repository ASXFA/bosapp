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
            <div class="card-header">
                <h4 class="d-block">Data <?= $title ?>
                    <a href="" data-toggle="modal" data-target="#editModal<?php if(!empty($rules)){ echo $rules->id; } ?>" class="btn btn-primary btn-sm float-right"><i class="fa fa-warning"> Rules Pengajuan Perubahan Data</i></a>
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
                                foreach($users as $user):
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
                                    <a href="<?= base_url('backend/permintaan/editPermintaan/'.$permintaan->id.'/'.$user->id) ?>" class="btn btn-success btn-sm" title="Lakukan Perubahan Data"><i class="fa fa-exclamation-circle"></i></a>
                                    <!-- <a href="<?= base_url('backend/permintaan/gantiStatus/'.$permintaan->id.'/2/'.$user->id) ?>" class="btn btn-danger btn-sm" title="Tolak Permintaan"><i class="fa fa-times-circle"></i></a> -->
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
<?php foreach($rulesEdit as $rule): ?>
<div class="modal fade bd-example-modal-lg" id="editModal<?= $rule->id ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light">
            <div class="modal-body">
                <form action="<?php echo base_url('backend/rules/edit/'.$rules->id.'/dosen')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <div class="alert alert-danger text-left" style="font-size:12px;" role="alert">
                            <h4 class="alert-heading mb-3" style="font-size:17px;">Aturan Pengajuan Permintaan Pengubahan Data </h4>
                            <div class="text-left ml-3">
                                <?= $rules->rule ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card mb-1">
                            <div class="card-header">
                                <h3>Edit Data Permintaan</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Isi Rules</label>
                                    <textarea name="rule" id="rulesPermintaan" cols="30" rows="50"><?= $rules->rule ?></textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#rulesPermintaan' ),{
            toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]
        } )
        .catch( error => {
                console.error( error );
        } );
</script>