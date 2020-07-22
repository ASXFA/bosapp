<div id="main">
    <div class="bimbingan m-5 ">
        <div class="cards text-center">
            <div class="card-body" data-aos="zoom-in">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="mx-auto d-block">
                            <li>
                                <img src="<?= base_url('assets/image/dosen/'.$dosen->foto) ?>" alt="">
                            </li>
                        </ul>
                        <h5><?= $dosen->nama ?></h5>
                        <h6><?= $dosen->nomor_induk ?></h6>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Rules Bimbingan !</h4>
                            <ol class="text-left">
                                <li>asdas</li>
                                <li>asdas</li>
                                <li>asdas</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- ======= Resume Section ======= -->
<section class="resume bimb">
    <div class="container" data-aos="zoom-in">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="resume-title">Bimbingan <button id="btnBimbingan" class="btn btn-info btn-sm float-right font-weight-bold text-white">Bimbingan Sekarang</button></h3>
                <table class="table table-hover mt-1">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div id="formBimbingan" data-aos="zoom-in" >
                    <h3 class="resume-title">Form Bimbingan </h3>
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="id_from_nama" class="form-control" placeholder="Your Name" value="<?= $this->session->userdata('nama') ?>" readonly />
                                <input type="text" name="id_from" class="form-control" id="id_from" placeholder="Your Name" value="<?= $this->session->userdata('id') ?>" hidden />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="id_to_nama" class="form-control" placeholder="Your Name" value="<?= $dosen->nama ?>" readonly />
                                <input type="text" name="id_to" class="form-control" id="id_to" placeholder="Your Name" value="<?= $dosen->id ?>" hidden />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" id="file" placeholder="File" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Keterangan" ></textarea>
                        </div>
                        <div class="text-center"><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Kirim Pesan" ></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="resume-title">Pesan Terbaru</h3>
                <div class="resume-item pb-0">
                    <h4>Brandon Johnson</h4>
                    <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
                </div>

                <h3 class="resume-title">Education</h3>
                <div class="resume-item">
                    <h4>Master of Fine Arts &amp; Graphic Design</h4>
                    <h5>2015 - 2016</h5>
                    <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                    <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
                </div>
                <div class="resume-item">
                    <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                    <h5>2010 - 2014</h5>
                    <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                    <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
                </div>
            </div>
            
        </div>
    </div>

    </div>
</section><!-- End Resume Section -->
</div>