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
    <link rel="stylesheet" href="<?= base_url('homer') ?>/vendor/select2-3.5.2/select2.css" />

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
<script src="<?= base_url('homer') ?>/vendor/select2-3.5.2/select2.min.js"></script>
<!-- App scripts -->
<script src="<?= base_url('homer') ?>/scripts/homer.js"></script>
<script>
$(document).ready(function(){
    // dashboard
    $("#tahun_ajaran").dataTable({
        "ajax"    : "<?= base_url('admin/main/tahun_ajaran') ?>",
        "ordering": false
    });
    // guru
    var page = "<?= $judul ?>";
    $('#tabledata').dataTable({
        "ajax"    : "<?= base_url('admin/guru/get_guru') ?>",
        "ordering": false
    });
    $("#table_guru").on('click','.edit_guru', function(){
        var id =  $(this).data('id');
        $.ajax({
            type : 'get',
            datatype : 'json',
            data : {id:id},
            url : '<?= base_url('admin/guru/view_edit') ?>',
            success : function(data){
                data = JSON.parse(data);
                console.log(data);
                $("#nip_awal").val(data.nip);
                $("#nip_guru").val(data.nip);
                $("#nama_guru").val(data.nama);
                $("#tempat_lahir").val(data.tmp_lahir).trigger('change');
                $("#tgl_lahir_guru").val(data.tgl_lahir);
                $("#gender_guru").val(data.gender);
                $("#agama_guru").val(data.agama);
                $("#goldar_guru").val(data.golongan_darah);
                $("#no_hp_guru").val(data.no_hp);
                $("#email_guru").val(data.email);
                $("#alamat_guru").val(data.detail);
                $("#prov").val(data.provinsi).trigger('change');
                $("#kota").val(data.kota_kab).trigger('change');
                $("#kec").val(data.kecamatan).trigger('change');
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#jabatan").val(data.jabatan);
                $("#status_guru").val(data.status);
            }
        });
    });
    if(page=="Guru"){
        $('.tempat_lahir, .kota, .prov').select2({
            theme: "bootstrap"
        });
        $.ajax({
            type		: "GET",
            url			: "<?= base_url('admin/guru/get_kota') ?>",
            datatype 	: "JSON",
            success		: (data)=>{
                var res = JSON.parse(data);
                var isi = "<option value=''>-- Pilih Kota --</option>";
                for(var i in res){
                    // console.log(res[i].name);
                    isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
                }
                $('#tempat_lahir').html(isi);
            }
        });
        // prov
        $.ajax({
            type		: "GET",
            url			: "<?= base_url('admin/guru/get_prov') ?>",
            datatype 	: "JSON",
            success		: (data)=>{
                var res = JSON.parse(data);
                var isi = "<option value=''>-- Pilih Provinsi --</option>";
                for(var i in res){
                    // console.log(res[i].name);
                    isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
                }
                $('#prov').html(isi);
            }
        });

        $('.prov').on('change', function(){
            var id = $(this).val();
            $.ajax({
                type		: "GET",
                url			: "<?= base_url('admin/guru/kotaFromprov') ?>",
                datatype 	: "JSON",
                data		: {id:id},
                success		: (data)=>{
                    var res = JSON.parse(data);
                    var isi = "<option value=''>-- Pilih Kota --</option>";
                    for(var i in res){
                        // console.log(res[i].name);
                        isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
                    }
                    $('#kota').html(isi);
                    $('#kec').html("<option value=''>-- Pilih Kec --</option>");
                }
            });
        });
        $('.kota').on('change', function(){
            var id = $(this).val();
            $.ajax({
                type		: "GET",
                url			: "<?= base_url('admin/guru/kecFromkota') ?>",
                datatype 	: "JSON",
                data		: {id:id},
                success		: (data)=>{
                    var res = JSON.parse(data);
                    var isi = "<option value=''>-- Pilih Kecamatan --</option>";
                    for(var i in res){
                        // console.log(res[i].name);
                        isi += "<option value='"+res[i].id+"'>"+res[i].name+"</option>";
                    }
                    $('#kec').html(isi);
                }
            });
        });
    }
    
    // siswa
    $('#tablesiswa').dataTable({
        "ajax"    : "<?= base_url('admin/siswa/get_siswa') ?>",
        "ordering": false
    });
    // table kelas
    $('#kelas').dataTable({
        "ajax"    : "<?= base_url('admin/kelas/get_kelas') ?>",
        "ordering": false,
        "searching": false
    });
    // table jurusan
    $('#jurusan').dataTable({
        "ajax"    : "<?= base_url('admin/kelas/get_jurusan') ?>",
        "ordering": false,
        "paging"  : false,
        "searching": false,
        "bInfo" : false
    });
    // classroom
    $(".js-source-states").select2();
    $('#classroom').dataTable({
        "ajax"  : "<?= base_url('admin/classroom/view_classroom') ?>",
        "ordering": false,
        "processing" :true
    });
    $('#grup_kelas').dataTable({
        "ajax"    : "<?= base_url('admin/classroom/view_grupkelas') ?>",
        "ordering": false,
    });
    $("#tambah_classroom").on('click', function(){
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/classroom/terdaftarwali') ?>",
            success : function(data){
                data = JSON.parse(data);
                // console.log(data);
                var isi = '';
                for(var i in data){
                    isi += '<option value="'+data[i].kode_wali+'">'+data[i].kelas+' '+data[i].kode_kelas+'</option>';
                }
                $("#select_siswa_room").html(isi);
            }
        });
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/classroom/guru_mapel') ?>",
            success : function(data){
                data = JSON.parse(data);
                var isi = '<option value="">-- Pilih Mapel --</option>';
                for(var i in data){
                    isi += '<option value="'+data[i].id+'">'+data[i].nama_mapel+' - '+data[i].nama+'</option>';
                }
                $("#select_mapel_class").html(isi);
            }
        });
    });
     //kelas grup
    $(".siswa_select_grup").select2();
    $("#tambah_grub_kelas").on('click',function(){
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/classroom/get_siswa') ?>",
            success : function(data){
                data = JSON.parse(data);
                console.log(data);
                var isi = '';
                for(var i in data){
                    isi += '<option value="'+data[i].nisn+'">'+data[i].nama+'</option>';
                }
                $('#siswa_select_grup').html(isi);
            }
        });
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/classroom/get_walikelas') ?>",
            success : function(data){
                var isi = '<option value="">-- Pilih Kelas --</option>';
                data = JSON.parse(data);
                for(var i in data){
                    isi += '<option value="'+data[i].id+'">'+data[i].kelas+'-'+data[i].kode_kelas+'</option>';
                }
                $('#select_kelas_grup').html(isi);
            }
        });
    });

    // Mata Pelajaran
    $('#pelajaran').dataTable({
        "ajax"    : "<?= base_url('admin/matapelajaran/get_pelajaran') ?>",
        "ordering": false,
        "paging"  : false,
        "searching": false,
        "bInfo" : false
    });
    $('#mapel_diampu').dataTable({
        "ajax"    : "<?= base_url('admin/matapelajaran/mapelajar') ?>",
        "ordering": false,
    });
    $('.peng').on('click', function(){
        $('.l_pengajar').hide();
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/matapelajaran/get_mapel') ?>",
            success : function(data){
                data = JSON.parse(data);
                // console.log(data);
                var isi = '<option value="" hidden>-> Pilih Mata Pelajaran <-</option>';
                for(var i in data){
                    isi += '<option value="'+data[i].kode_pel+'">'+data[i].nama_mapel+'</option>';
                }
                $(".s_pelajaran").html(isi);
            }
        });
    });
    $('.s_pelajaran').on('change', function(){
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/matapelajaran/get_guru') ?>",
            success : function(data){
                $('.l_pengajar').show();
                data = JSON.parse(data);
                console.log(data);
                var isi = '<option value="" hidden>-> Pilih Mata Pelajaran <-</option>';
                for(var i in data){
                    isi += '<option value="'+data[i].nip+'">'+data[i].nama+'</option>';
                }
                $('.s_pengajar').html(isi);
            }
        });
    });

    // akun
    $('#tableakunsiswa').dataTable({
        "ajax"    : "<?= base_url('admin/akun/get_akun/siswa') ?>",
        "ordering": false
    });
    $('#tableakunguru').dataTable({
        "ajax"    : "<?= base_url('admin/akun/get_akun/guru') ?>",
        "ordering": false
    });

    // perwalian
    $('#tableperwalian').dataTable({
        "ajax"    : "<?= base_url('admin/perwalian/get_walikelas') ?>",
        "ordering": false
    });
    $(".guru_select").select2();
    $('#tambah_wali').on('click', function(){
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/perwalian/ajax_kelas') ?>",
            success : function(data){
                data = JSON.parse(data);
                var isi = '<option value="">-- Pilih Kelas --</option>';
                for(var i in data){
                    isi += '<option value="'+data[i].id+'">'+data[i].kelas+'-'+data[i].kode_kelas+'</option>';
                }
                $("#kelas_select").html(isi);
            }
        });
        $.ajax({
            type : "GET",
            datatype : "json",
            url : "<?= base_url('admin/perwalian/ajax_guru') ?>",
            success : function(data){
                data = JSON.parse(data);
                console.log(data);
                var isi = '<option value="">-- Pilih guru --</option>';
                for(var i in data){
                    isi += '<option value="'+data[i].nip+'">'+data[i].nama+'</option>';
                }
                $("#guru_pilih").html(isi);
            }
        });
    });

    // daftar nilai
    $('#daftarnilai').dataTable({
        "ajax"    : "<?= base_url('admin/nilai/view_daftarnilai') ?>",
        "ordering": false
    });
    $("#shownilai").on('click', '.edit', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type : "GET",
            datatype : "json",
            data : {id : id},
            url : "<?= base_url('admin/nilai/getbyid') ?>",
            success : function(data){
                data=JSON.parse(data);
                // console.log(data);
                $(".id_daftar").val(data.id);
                $(".nama").val(data.nama_siswa);
                $(".matkul").val(data.nama_mapel);
                $(".guru").val(data.nama_guru);
                $(".tgs").val(data.nilai_tugas);
                $(".uts").val(data.nilai_uts);
                $(".uas").val(data.nilai_uas);
            }

        });
    });

    // alert
    toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-top-center",
        "closeButton": true,
        "debug": false,
        "toastClass": "animated fadeInDown",
        "progressBar" : true
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