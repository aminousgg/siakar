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
	<style>
	.w3-animate-top{animation:animatetop 0.4s}@keyframes animatetop{from{top:-100px;opacity:0} to{top:0;opacity:1}}
	.animate-zoom {animation:animatezoom 0.6s}@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}}
	</style>
</head>
<body data-background-color="bg3">
	<div class="wrapper">
		<!-- header -->
		<?php $this->load->view('guru/komponen/header'); ?>
		<!-- end header -->
		<!-- Sidebar -->
		<?php $this->load->view('guru/komponen/sidebar'); ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<?php
					if($judul=="Menu Utama"){
						$this->load->view('guru/komponen/panel-head');
					}
				?>
				<!-- isi -->
				<div class="page-inner">
					<?php $this->load->view($file); ?>
				</div>
				<!-- end isi -->
			</div>
			<!-- footer -->
			<?php $this->load->view('guru/komponen/footer'); ?>
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
	// mengajar
	$('#table_mengajar').DataTable({
		"ajax"	: "<?= base_url('guru/mengajar/index?nip='.$this->session->userdata('sesi')['nip']) ?>",
		"ordering" : false,
		"processing" : true
	});
	// detail_mengajar
	<?php if($this->uri->segment(3) == 'daftarsiswabymapel'){ ?>
		$('#detail_mengajar').DataTable({
			"ajax"	: "<?= base_url('guru/mengajar/show_siswabymapel/'.$kode_mapel) ?>",
			"ordering" : false,
			"processing" : true
		});
	<?php } ?>
	// perwalian
	$('#table_perwalian').DataTable({
		"ajax"	: "<?= base_url('guru/perwalian/index?nip='.$this->session->userdata('sesi')['nip']) ?>",
		"ordering" : false,
		"processing" : true
	});
	// table nilai
	<?php if($this->uri->segment(2) == 'daftar_nilai'){ ?>
		$(".cardnilai").hide();
		var nip = "<?= $this->session->userdata('sesi')['nip'] ?>";
		var link = "";
		$.ajax({
			type : "GET",
			datatype : "json",
			data : {nip : nip},
			url : "<?= base_url('guru/daftar_nilai/get_mapel') ?>",
			success : function(data){
				data = JSON.parse(data);
				var isi = '<option hidden value="">-- Pilih Mapel --</option>';
				for(var i in data){
					isi += '<option value="'+data[i].kode_mapel+'">'+data[i].nama_mapel+'</option>';
				}
				$("#select_mapel").html(isi);
			}
		});
		$("#select_mapel").on('change', function(){
			var kode_mapel = String($(this).val());
			if(kode_mapel){
				setTable(kode_mapel);
				$(".cardnilai").show();
				kode_mapel='';
			}else{
				$(".cardnilai").hide();
			}
		});
		function setTable(kode_mapel){
			var table = $('#table_nilai').DataTable({
				"ajax"	: "<?= base_url('guru/daftar_nilai/show') ?>?mapel="+kode_mapel,
				"ordering" : false,
				"processing" : true,
				"destroy" : true,
			});
		}
	<?php } ?>
	// daftarnilai
	$("#table_daftarnilai").on('click', '.tombol_nilai', function(){
		var id = $(this).data('id');
		$.ajax({
			type :"get",
			datatype : "json",
			data : {id : id},
			url : "<?= base_url('guru/daftar_nilai/showedit') ?>",
			success : function(data){
				data = JSON.parse(data);
				// console.log(data);
				$(".nama").val(data.nama_siswa);
				$(".nisn").val(data.nisn);
				$(".kelas").val(data.kelas+" "+data.kode_kelas);
				$(".tgs").val(data.nilai_tugas);
				$(".uts").val(data.nilai_uts);
				$(".uas").val(data.nilai_uas);
			}
		});
	});
</script>
	
</body>
</html>