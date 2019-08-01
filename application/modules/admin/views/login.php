<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?= APP_NAME." | Login" ?></title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?= base_url('homer') ?>/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?= base_url('homer') ?>/styles/style.css">

</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash">
  <div class="color-line"></div>
  <div class="splash-title">
    <h1>Welcome to Admin Siakar</h1>
    <p>Sistem Informasi Akademik <?= smekar ?></p>
    <img src="<?= base_url('homer') ?>/images/loading-bars.svg" width="64" height="64" />
  </div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>


<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Akses Admin</h3>
                <small><?= smekar ?></small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <?= form_open('admin/auth/login') ?>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username" title="Please enter you username" required name="username" class="form-control">
                                <span class="help-block small">Menggunakan Nip</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="******" required name="password" class="form-control">
                            </div>
                            <input type="hidden" name="level" value="admin">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong><?= smekar ?></strong> - <?= APP_NAME ?> <br/> 2019 Copyright aminous
        </div>
    </div>
</div>


<!-- Vendor scripts -->
<script src="<?= base_url('homer') ?>/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?= base_url('homer') ?>/vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?= base_url('homer') ?>/scripts/homer.js"></script>

</body>
</html>