
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php 
					if ($this->session->userdata('login')) {?>
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Failed</span>
							<?= $this->session->userdata('login') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php
					}
				?>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url() ?>assets/login/images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="<?= base_url('login/aksi_login') ?>" method="POST" >
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Username required: Nomor induk ">
						<input class="input100" type="text" name="username" placeholder="Nomor Induk" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" id="password" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<a href="#" class="symbolpass-input100" id="pass">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/js/main.js"></script>
	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
		}, 3000);
	</script>
	<script>
		$(document).ready(function(){
			$('#pass').click(function(){
				if ($('#password').attr('type')=="password") {
					$('#password').attr('type','text');
				}else{
					$('#password').attr('type','password');
				}
			})
		})
	</script>
</body>
</html>