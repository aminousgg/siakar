                <div class="panel-header bg-info-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"><?= $sub_judul ?></h2>
								<h5 class="text-white op-7 mb-2">Sistem Informasi Akademik</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
							</div>
						</div>
					</div>
				</div>

    <div class="row mt--4 mx-auto">
        <div class="col-md-4 animate-zoom">
            <div class="card card-stats card-round" style="cursor:pointer;" onclick="redirect('siswa')">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Data Siswa</p>
                                <h4 class="card-title">1,294</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 animate-zoom">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="flaticon-interface-6"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Daftar Nilai</p>
                                <h4 class="card-title">1303</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
function redirect(link){
    if(link=="siswa"){
        window.location = "<?= base_url('guru/perwalian') ?>?detail=siswa";
    }else{

    }
}
</script>