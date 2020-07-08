        <br>
        <br>
        <br>
        <br>
    <div class="container mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row justify-content-center">
            <h2 class="p-3">Tabel Arsip Skripsi Mahasiswa Prodi Informatika</h2>
            <table class="table">
                <thead class="thead-dark">
                    <th>No</th>
                    <th>Judul Skripsi</th>
                    <th>Penulis</th>
                    <th>Konsentrasi</th>
                    <th>Tahun</th>
                    <th class='text-center'>File</th>

                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($skripsi as $skripsi):
                        if($skripsi->status_skripsi=='published'):?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $skripsi->judul?></td>
                            <td><?= $skripsi->mahasiswa?></td>
                            <td><?= $skripsi->kategoriskripsi?></td>
                            <td><?= $skripsi->tahun?></td>
                            <td class='text-center'><a href="<?= base_url('assets/file/skripsi/lulus/'.$skripsi->file)?>"><i class="ion-android-attach"></i> </a></td>
                        </tr>
                        <?php 
                        endif;
                    endforeach;?>
                </tbody>
            </table>
        </div>
    </div> <!-- .container -->
