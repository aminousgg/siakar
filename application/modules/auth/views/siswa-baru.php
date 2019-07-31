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
	<link rel="stylesheet" href="<?= base_url('assets') ?>/select2/dist/css/select2.min.css">
</head>
<body data-background-color="bg3">
	<div class="wrapper">
		<!-- header -->
		<?php $this->load->view('auth/komponen/header'); ?>
		<!-- end header -->
		<!-- Sidebar -->
		<?php $this->load->view('auth/komponen/sidebar'); ?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<?php $this->load->view('auth/komponen/panel-head'); ?>
				<?php  ?>
				<!-- isi -->
				<div class="page-inner mt--5">
				  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Isi Datadiri</h4>
                            </div>
                            <div class="card-body">
                                <div class="container">
								  <?= form_open('auth/siswa_baru/submit') ?>
								  	<!-- Nama -->
								  	<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Nama Depan</label>
								  	    <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan">
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Nama Belakang</label>
								  	    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
								  	  </div>
								  	</div>
									<!-- nama -->
									<!-- TTL -->
									<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Tempat Lahir</label>
										<select name="tmp_lahir" name="tmp_lahir" class="form-control tempat_lahir">
										  
										</select>
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Tgl Lahir</label>
								  	    <input type="date" name="tgl_lahir" class="form-control">
								  	  </div>
								  	</div>
									<!-- ttl -->
									<!-- gender/agama -->
									<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Jenis Kelamin</label>
										<select name="gender" class="form-control">
										  <option value="Laki-laki">Laki-laki</option>
										  <option value="Perempuan">Perempuan</option>
										</select>
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Agama</label>
										<select name="agama" class="form-control">
										  <option value="Islam">Islam</option>
										  <option value="Kristen">Kristen</option>
										  <option value="Katholik">Katholik</option>
										  <option value="Hindu">Hindu</option>
										  <option value="Budha">Budha</option>
										</select>
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Golongan Darah</label>
								  	    <input type="text" name="golongan_darah" class="form-control">
								  	  </div>
								  	</div>
									<!-- no hp/email -->
									<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">No Hp</label>
								  	    <input type="text" name="no_hp" class="form-control" placeholder="+62">
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Email</label>
								  	    <input type="text" name="email" class="form-control" placeholder="example@gmail.com">
								  	  </div>
								  	</div>
									<!--  -->
									<!-- alamat -->
									<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Alamat</label>
								  	    <input type="text" name="alamat" class="form-control" placeholder="Nama Jalan / Nama Desa RT/RW">
								  	  </div>
								  	</div>
									<!--  -->
									<!-- regional -->
									<div class="row mb-3">
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Provinsi</label>
										<select name="prov" class="form-control prov">
										  
										</select>
								  	  </div>
								  	  <div class="col">
										<label class="mb-2 font-weight-bold">Kota / Kab</label>
										<select name="kota" class="form-control kota">
										  <option value="">--Pilih--</option>
										  <option value="">pilih Provinsi dulu</option>
										</select>
									  </div>
									  <div class="col">
										<label class="mb-2 font-weight-bold">Kecamatan</label>
										<select name="kec" class="form-control kec">
										  <option value="">--Pilih--</option>
										  <option value="">pilih Kota dulu</option>
										</select>
								  	  </div>
								  	</div>
									<!-- end -->
									<div class="row mb-3">
								  	  <div class="col">
										<div class="form-check">
										  <label class="form-check-label">
										    <input class="form-check-input" type="checkbox" value="" required>
										    <span class="form-check-sign">Data ini di isi dengan sebenar benarnya</span>
										  </label>
										</div>
								  	  </div>
								  	</div>
									<div class="row mb-3">
								  	  <div class="col">
										<button type="submit" class="btn btn-info float-right">Submit</button>
								  	  </div>
								  	</div>
								  <?= form_close() ?>
								</div>
                            </div>
                        </div>
                    </div>
				  </div>
				</div>
				<!-- end isi -->
			</div>
			<!-- footer -->
			<?php $this->load->view('auth/komponen/footer'); ?>
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
	<script src="<?= base_url('assets') ?>/select2/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.tempat_lahir, .kota, .prov').select2({
		theme: "bootstrap"
	});
	$.ajax({
		type		: "GET",
		url			: "<?= base_url('auth/siswa_baru/get_kota') ?>",
		datatype 	: "JSON",
		success		: (data)=>{
			var res = JSON.parse(data);
			var isi = "<option value=''>-- Pilih Kota --</option>";
			for(var i in res){
				// console.log(res[i].name);
				isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
			}
			$('.tempat_lahir').html(isi);
		}
	});
	// prov
	$.ajax({
		type		: "GET",
		url			: "<?= base_url('auth/siswa_baru/get_prov') ?>",
		datatype 	: "JSON",
		success		: (data)=>{
			var res = JSON.parse(data);
			var isi = "<option value=''>-- Pilih Provinsi --</option>";
			for(var i in res){
				// console.log(res[i].name);
				isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
			}
			$('.prov').html(isi);
		}
	});

	$('.prov').on('change', function(){
		var id = $(this).val();
		$.ajax({
			type		: "GET",
			url			: "<?= base_url('auth/siswa_baru/kotaFromprov') ?>",
			datatype 	: "JSON",
			data		: {id:id},
			success		: (data)=>{
				var res = JSON.parse(data);
				var isi = "<option value=''>-- Pilih Kota --</option>";
				for(var i in res){
					// console.log(res[i].name);
					isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
				}
				$('.kota').html(isi);
				$('.kec').html("<option value=''>-- Pilih Kec --</option>");
			}
		});
	});
	$('.kota').on('change', function(){
		var id = $(this).val();
		$.ajax({
			type		: "GET",
			url			: "<?= base_url('auth/siswa_baru/kecFromkota') ?>",
			datatype 	: "JSON",
			data		: {id:id},
			success		: (data)=>{
				var res = JSON.parse(data);
				var isi = "<option value=''>-- Pilih Kecamatan --</option>";
				for(var i in res){
					// console.log(res[i].name);
					isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
				}
				$('.kec').html(isi);
			}
		});
	});
	// $('.tempat_lahir').append()
	
});

</script>
	
</body>
</html>