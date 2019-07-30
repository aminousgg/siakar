<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= "Login | ".APP_NAME ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<link rel="icon" href="<?= base_url('assets') ?>/assets/img/icon.ico" type="image/x-icon"/>
<!-- CSS Files -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets') ?>/assets/css/fonts.min.css']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/atlantis.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/demo.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-center">Sign In</h3>
					<?= form_open('auth/main/login') ?>
					<div id="error-add"></div>
					<div class="login-form">
						<div class="form-group form-floating-label">
							<input id="username" name="username" type="text" class="form-control input-border-bottom" autocomplete="off" required>
							<label for="username" class="placeholder">Username</label>
						</div>
						<div class="form-group form-floating-label">
							<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
							<label for="password" class="placeholder">Password</label>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
						<div class="form-action mb-3">
							<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<!-- JAVASCRIPT -->
	<!--   Core JS Files   -->
<script src="<?= base_url('assets') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Sweet Alert -->
<script src="<?= base_url('assets') ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Atlantis JS -->
<script src="<?= base_url('assets') ?>/assets/js/atlantis.min.js"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets') ?>/assets/js/setting-demo.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/auth/app.js"></script>
	<!-- JAVASCRIPT -->
</body>
</html>