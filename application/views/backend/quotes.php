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