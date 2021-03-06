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
        <div class="card permintaan p-3">
            <div class="card-header mb-3">
                <h4 class="d-block">Data Bimbingan Mahasiswa <span id="title"></span></h4>
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size:15px; border:0; border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Mahasiswa</th>
                            <th>NPM</th>
                            <?php if($this->session->userdata('level')=="admin"): ?>
                            <th>Dospem 1</th>
                            <th>Dospem 2</th>
                            <?php endif ?>
                            <th>Judul Skripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $users=array(); foreach($user as $user): array_push($users, array('id'=>$user->id,'nama'=>$user->nama,'nomor_induk'=>$user->nomor_induk)); endforeach ?>
                        
                            <?php 
                            if($this->session->userdata('level')=="dosen"){
                                $no= 1;
                                foreach($skripsi as $skripsi):
                                    if($skripsi->dospem1==$this->session->userdata('id') || $skripsi->dospem2==$this->session->userdata('id')){
                                        foreach($users as $user):
                                            if($user['id'] == $skripsi->mahasiswa){
                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $user['nama'] ?></td>
                                                <td><?= $user['nomor_induk'] ?></td>
                                                <td><?= $skripsi->judul?></td>
                                                <td>
                                                    <?php $status="0"; 
                                                        foreach($cekBimbingan as $cb): 
                                                            if ($cb->id_from == $user['id'] ) {
                                                                $status="1";
                                                                break;
                                                            }
                                                        endforeach;
                                                        if ($status == "1") {

                                                        ?>
                                                    <a href="<?= base_url('backend/bimbingan/detailBimbingan/'.$user['id']) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
                                                        <?php }else{
                                                    ?>
                                                    <span class="badge badge-danger">Mahasiswa Belum Melakukan Bimbingan</span>
                                                    <?php
                                                        } ?>
                                                </td>
                                            </tr>
                            <?php
                                            } 
                                        endforeach;
                            
                                    } $no++;
                                endforeach;
                            
                            }else{
                                $no= 1;
                                foreach($skripsi as $skripsi):
                                        foreach($users as $user):
                                            if($user['id'] == $skripsi->mahasiswa){
                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $user['nama'] ?></td>
                                                <td><?= $user['nomor_induk'] ?></td>
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
                                                <td><?= $skripsi->judul?></td>
                                                <td>
                                                    <?php $status="0"; 
                                                        foreach($cekBimbingan as $cb): 
                                                            if ($cb->id_from == $user['id'] ) {
                                                                $status="1";
                                                                break;
                                                            }
                                                        endforeach;
                                                        if ($status == "1") {

                                                        ?>
                                                    <a href="<?= base_url('backend/bimbingan/cetakBimbingan/'.$user['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-file"></i> Cetak</a>
                                                        <?php }else{
                                                    ?>
                                                    <span class="badge badge-danger">Mahasiswa Belum Melakukan Bimbingan</span>
                                                    <?php
                                                        } ?>
                                                </td>
                                            </tr>
                            <?php
                                            } 
                                        endforeach;
                                     $no++;
                                endforeach;
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