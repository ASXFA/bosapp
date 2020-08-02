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
            $this->session->set_userdata('status','');
            $this->session->set_userdata('kondisi','');
        ?>
        <?php if (empty($bimbinganRiwayatCek)) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Mahasiswa belum melakukan Bimbingan !');
            redirect('backend/bimbingan');
        } ?>
        <div class="row">
            <div class="col-md-5">
                <div class="card" style="font-size:13px;">
                    <div class="card-header bg-info text-white">
                        <table class="detailBimbinganTable">
                        <?php foreach($user as $user): if($user->id == $bimbingan->id_from){  ?>
                            <tr>
                                <td rowspan="3" width="30%"><img class="rounded d-block" src="<?= base_url('assets/image/mahasiswa/'.$user->foto) ?>" width="40px" alt=""></td>
                            </tr>
                            <tr>
                                <td class="text-white"><?= $user->nama ?></td>
                                <td rowspan="3" width="5px"><span class="badge badge-light"><?= date("d F Y h:i:s", strtotime($bimbingan->tgl_bimbingan))." wib" ?></span></td>
                            </tr>
                            <tr>
                                <td class="text-white"><?= $user->nomor_induk ?></td>
                            </tr>
                        <?php $nama = $user->nama; $iduser = $user->id;  }endforeach ?>
                        </table>
                    </div>
                    <div class="card-header">
                        <?php foreach($skripsi as $skripsi): if($skripsi->mahasiswa == $bimbingan->id_from){echo $skripsi->judul;}endforeach ?>
                    </div>
                    <div class="card-header">
                        <?= $bimbingan->subject ?>
                    </div>
                    <div class="card-body text-justify">
                        <div>
                            <?= $bimbingan->keterangan ?>
                        </div>
                        <?php 
                            if ($bimbingan->file_name != "") {
                        ?>
                        <a href="<?= base_url('assets/bimbingan/'.$bimbingan->id_from.'/'.$bimbingan->id_to.'/'.$bimbingan->file_name) ?>" class="btn btn-info btn-sm mt-4 float-right"><i class="fa fa-download"></i> Download File</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="card" style="font-size:13px;">
                    <div class="card-header bg-info">
                        <table class="detailBimbinganTable">
                            <tr>
                                <td rowspan="3"><img class="rounded d-block" src="<?= base_url('assets/image/dosen/'.$this->session->userdata('foto')) ?>" width="35px" alt=""></td>
                            </tr>
                            <tr>
                                <td class="text-white"><?= $this->session->userdata('nama') ?></td>
                            </tr>
                            <tr>
                                <td class="text-white"><?= $this->session->userdata('nomor_induk') ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-header">
                        Form Balas Pesan
                    </div>
                    <div class="card-body text-justify">
                        <form action="<?= base_url('tambahBimbingan') ?>" method="post"  class="" enctype="multipart/form-data"> 
                            <div class="form-row" >
                                <div class="col-md-6 form-group" >
                                    <input type="text" name="idBimbingan" class="form-control" placeholder="Your Name" value="<?= $bimbingan->id ?>" hidden />
                                    <input type="text" style="width='20px;'" name="id_from_nama" class="form-control form-control-sm" placeholder="Your Name" value="<?= $this->session->userdata('nama') ?>" readonly />
                                    <input type="text" name="id_from" class="form-control" id="id_from" placeholder="Your Name" value="<?= $this->session->userdata('id') ?>" hidden />
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="id_to_nama" class="form-control form-control-sm" placeholder="Your Name" value="<?= $nama ?>" readonly />
                                    <input type="text" name="id_to" class="form-control" id="id_to" placeholder="Your Name" value="<?= $iduser ?>" hidden />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="subject" id="subject" placeholder="Subject" value="<?= $bimbingan->subject ?>" readonly required/>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-sm" name="file" id="file" placeholder="File"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-sm"  name="message" rows="2" placeholder="Keterangan" required></textarea>
                            </div>
                            <div class="text-center"><button class="btn btn-info btn-sm float-right" type="submit"> <i class="fa fa-send"> </i> Kirim</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card riwayat">
                    <div class="card-header bg-info" style="font-size:13px;">
                        <h5 class="text-white">Riwayat Bimbingan 
                            <span class="badge badge-light float-right ml-1"><i class="fa fa-send"></i> : Pesan Terkirim </span>
                            <span class="badge badge-light float-right ml-1"><i class="fa fa-check-circle"></i> : Sudah dibalas </span>
                            <span class="badge badge-light float-right"><i class="fa fa-comment"></i> : Pesan Baru </span> 
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th width="50%">Subject</th>
                                        <th>Dari</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($bimbinganRiwayat as $riwayat): ?>
                                        <tr>
                                            <td ><?= $no ?></td>
                                            <td>
                                                <?php 
                                                    if($riwayat->id_from!=$this->session->userdata('id')){
                                                ?>
                                                <a href="<?= base_url('backend/bimbingan/detailBimbinganRiwayat/'.$riwayat->id_from.'/'.$riwayat->id) ?>" class=""><?= $riwayat->subject ?></a> 
                                                <?php 
                                                    }else{
                                                ?>
                                                <a href="" data-toggle="modal" data-target="#detailPesan<?= $riwayat->id ?>" class=""><?= $riwayat->subject ?></a> 
                                                <?php
                                                    }
                                                ?>
                                                <?php if($riwayat->status == "0" && $riwayat->id_from!=$this->session->userdata('id')){ ?>
                                                <span class=""><i class="fa fa-comment"></i></span>
                                                <?php }else if($riwayat->status == "1" && $riwayat->id_from!=$this->session->userdata('id')){ ?>
                                                <span class=""><i class="fa fa-check-circle"></i></span>
                                                <?php }else if($riwayat->id_from==$this->session->userdata('id')){ ?>
                                                <span class=""><i class="fa fa-send"></i></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($riwayat->id_from==$this->session->userdata('id')) {
                                                        echo "Anda";
                                                    }else{
                                                        echo "Mahasiswa";
                                                    }
                                                ?>
                                            </td>
                                            <td><?= date("d F Y H:i", strtotime($riwayat->tgl_bimbingan))." wib" ?></td>
                                        </tr>
                                    <?php $no++; endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php foreach($bimbinganDetail as $detail): ?>
<div class="modal fade" id="detailPesan<?= $detail->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card" style="font-size:13px;">
            <div class="card-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <table class="detailBimbinganTable">
                    <tr>
                        <td rowspan="3"><img class="rounded d-block" src="<?= base_url('assets/image/dosen/'.$this->session->userdata('foto')) ?>" width="35px" alt=""></td>
                    </tr>
                    <tr>
                        <td class="text-white"><?= $this->session->userdata('nama') ?></td>
                    </tr>
                    <tr>
                        <td class="text-white"><?= $this->session->userdata('nomor_induk') ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-header">
                <table class="table table-borderless">
                    <tr>
                        <td class="font-weight-bold">From</td>
                        <td> : </td>
                        <td> <?= $this->session->userdata('nama') ?> </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">To</td>
                        <td> : </td>
                        <td>
                            <?php 
                                foreach($userModal as $user){
                                    if($user->id == $detail->id_to){
                                        echo $user->nama;
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Subject</td>
                        <td> : </td>
                        <td> <?= $detail->subject ?> </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Pesan</td>
                        <td> : </td>
                    </tr>
                    <tr>
                        <td colspan="3"><?= $detail->keterangan ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">
                        <?php 
                            if ($detail->file_name != "") {
                        ?>
                        <a href="<?= base_url('assets/bimbingan/'.$detail->id_to.'/'.$detail->id_from.'/'.$detail->file_name) ?>" class="btn btn-info btn-sm mt-4"><i class="fa fa-download"></i> Download File</a>
                        <?php
                            }
                        ?>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#txtareabimbingan' ),{
            toolbar: [ 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
                    