<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?= APP_NAME." | ".$judul ?></title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/toastr/build/toastr.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?= base_url('homer') ?>/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/styles/style.css">
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />

</head>
<body>

<!-- Simple splash screen-->
<?php $this->load->view('komponen/loading') ?>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<?php $this->load->view('komponen/header') ?>

<!-- Navigation -->
<?php $this->load->view('komponen/sidebar') ?>

<!-- Main Wrapper -->
<div id="wrapper">
  <!-- panel -->    
  <div class="normalheader transition animated fadeIn small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-down"></i>
                </div>
            </a>
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                  <li>
                      <a href="<?= base_url('admin'); ?>">
                          <i class="pe pe-7s-home fa-fw"></i>
                          Dashboard
                      </a>
                  </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                <?= $sub_judul ?>
            </h2>
            <small> kjbsfj alfkn </small>
        </div>
    </div>
  </div>
  <!--  -->
  <div class="content animate-panel">
  <!-- isi -->
    <?php $this->load->view($file) ?>
  <!--  -->
  </div>
  <footer class="footer hidden-print">
    <span class="pull-right">
        SiaKar by <a href="" target="_blank">aminous</a>
    </span>
    Copyright © 2019
  </footer>
</div>

<!-- Vendor scripts -->
<script src="<?= base_url('homer') ?>/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/peity/jquery.peity.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/sparkline/index.js"></script>
<script src="<?= base_url('homer') ?>/vendor/sweetalert/lib/sweet-alert.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/toastr/build/toastr.min.js"></script>
<!-- App scripts -->
<script src="<?= base_url('homer') ?>/scripts/homer.js"></script>
<script>
$(document).ready(function(){
    $('#tabledata').dataTable({
        "ajax"    : "<?= base_url('admin/main/get_guru') ?>",
        "ordering": false
    });
    $('#tablesiswa').dataTable({
        "ajax"    : "<?= base_url('admin/main/get_siswa') ?>",
        "ordering": false
    });
    // table kelas
    $('#kelas').dataTable({
        "ajax"    : "<?= base_url('admin/main/get_kelas') ?>",
        "ordering": false,
        "searching": false
    });
    // table jurusan
    $('#jurusan').dataTable({
        "ajax"    : "<?= base_url('admin/main/get_jurusan') ?>",
        "ordering": false,
        "paging"  : false,
        "searching": false,
        "select"   : false
    });
    toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-top-center",
        "closeButton": true,
        "debug": false,
        "toastClass": "animated fadeInDown",
    };
    var alert_s = "<?= $this->session->flashdata('alert_success') ?>";
    if(alert_s){
        toastr.success(alert_s);
    }
    var alert_g ="<?= $this->session->flashdata('alert_gagal') ?>";
    if(alert_g){
        toastr.error(alert_g);
    }
});
</script>

</body>
</html>