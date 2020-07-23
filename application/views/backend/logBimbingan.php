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
        <div class="card">
            <div class="card-header">
                <h4 class="d-block">Data Bimbingan Mahasiswa <span id="title"></span></h4>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Mahasiswa</th>
                            <th>NPM</th>
                            <th>Judul Skripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $users=array(); foreach($user as $user): array_push($users, array('id'=>$user->id,'nama'=>$user->nama,'nomor_induk'=>$user->nomor_induk)); endforeach ?>
                        
                            <?php 
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
                                                    <a href="<?= base_url('backend/bimbingan/detailBimbingan/'.$user['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
                                endforeach 
                            ?>
                        
                    </tbody>
                        
                </table>
            </div>
        </div>
    </div>
</div>