<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= APP_NAME.' | '.$judul ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets') ?>/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
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

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/demo.css">
</head>
<body data-background-color="bg3">
	<div class="wrapper">
		<!-- header -->
		<?php $this->load->view('siswa/komponen/header'); ?>
		<!-- end header -->
		<!-- Sidebar -->
		<?php $this->load->view('siswa/komponen/sidebar'); ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<?php
					if($judul=="Menu Utama"){
						$this->load->view('siswa/komponen/panel-head');
					}
				?>
				<?php  ?>
				<!-- isi -->
				<?php $this->load->view($file) ?>
				<!-- end isi -->
			</div>
			<!-- footer -->
			<?php $this->load->view('siswa/komponen/footer'); ?>
			<!-- end footer -->
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php //$this->load->view('siswa/komponen/setting'); ?>
		<!-- End Custom template -->
	</div>
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
	<!-- <script src="<?= base_url('assets') ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url('assets') ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script> -->

	<!-- Sweet Alert -->
	<script src="<?= base_url('assets') ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url('assets') ?>/assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url('assets') ?>/assets/js/setting-demo.js"></script>
	<!-- <script src="<?= base_url('assets') ?>/assets/js/demo.js"></script> -->
<script>
$(document).ready(function(){
	var nisn = "<?= $this->session->userdata('sesi')['nisn'] ?>";
	$('#table_mapel').DataTable({
		"ajax" : "<?= base_url('siswa/akademik/get_mapelsiswa?nisn=') ?>"+nisn,
		"ordering" :false,
		"processing" : true
	});
});
</script>

</body>
</html>