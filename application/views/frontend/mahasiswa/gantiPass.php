<div id="main">
    <div class="bimbingan m-5 ">
        <div class="cards">
            <div class="card-body" data-aos="zoom-in">
                <h4 class="mb-3 text-center">GANTI PASSWORD</h4>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="<?= base_url('aksiGantiPass') ?>" method="post" class="gantiPassMHS">
                            <div class="form-group has-search">
                                <label for="old_pass" class="form-control-label">Password Lama</label>
                                <input type="password" id="old_pass" name="old_pass" class="form-control">
                                <a href="#" id="btnOldPass"><span id="addOld" class="bx bx-show form-control-feedback"></span></a>
                            </div>
                            <div class="form-group has-search">
                                <label for="new_pass" class="form-control-label">Password Baru</label>
                                <input type="password" id="new_pass" name="new_pass" class="form-control">
                                <a href="#" id="btnNewPass"><span id="addNew" class="bx bx-show form-control-feedback"></span></a>
                            </div>
                            <div class="form-group has-search">
                                <label for="conf_pass" class="form-control-label">Password Konfirmasi</label>
                                <input type="password" id="conf_pass" name="conf_pass" class="form-control">
                                <a href="#" id="btnConfPass"><span id="addConf" class="bx bx-show form-control-feedback"></span></a>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right mt-2" name="submit" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#btnOldPass').click(function(){
            if ($('#old_pass').attr('type')=="password") {
                $('#old_pass').attr('type','text');
                $('#addOld').removeClass('bx-show');
                $('#addOld').addClass('bx-hide');
            }else{
                $('#old_pass').attr('type','password');
                $('#addOld').removeClass('bx-hide');
                $('#addOld').addClass('bx-show');
            }
        });
        $('#btnNewPass').click(function(){
            if ($('#new_pass').attr('type')=="password") {
                $('#new_pass').attr('type','text');
                $('#addNew').removeClass('bx-show');
                $('#addNew').addClass('bx-hide');
            }else{
                $('#new_pass').attr('type','password');
                $('#addNew').removeClass('bx-hide');
                $('#addNew').addClass('bx-show');
            }
        });
        $('#btnConfPass').click(function(){
            if ($('#conf_pass').attr('type')=="password") {
                $('#conf_pass').attr('type','text');
                $('#addConf').removeClass('bx-show');
                $('#addConf').addClass('bx-hide');
            }else{
                $('#conf_pass').attr('type','password');
                $('#addConf').removeClass('bx-hide');
                $('#addConf').addClass('bx-show');
            }
        });
    });
</script>