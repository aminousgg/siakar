        <div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<img src="<?= base_url('assets') ?>/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
				  <button class="btn btn-toggle toggle-sidebar">
				    <i class="icon-menu"></i>
				  </button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					  <h5>Kelengkapan Data</h5>
					  <div class="progress progress-sm">
					  	<div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" title="75%" style="cursor:pointer"></div>
					  </div>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							  <div class="avatar-sm">
							  	<img src="<?= base_url('assets') ?>/assets/img/user.png" alt="..." class="avatar-img rounded-circle">
							  </div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= base_url('assets') ?>/assets/img/user.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $this->session->userdata('sesi')['nama'] ?></h4>
												<p class="text-muted">
												  <?= $this->session->userdata('sesi')['email'] ?>
												</p>
												<a href="profile.html" class="btn btn-xs btn-secondary btn-sm">
												  View Profile
												</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('siswa/main/logout') ?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>