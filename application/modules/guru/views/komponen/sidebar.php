        <div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url('assets') ?>/assets/img/user.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $this->session->userdata('sesi')['nama'] ?>
									<span class="user-level">
									  <?= $this->session->userdata('sesi')['nip'] ?>
									</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<?php if(!$this->uri->segment(2)){ ?>
						<li class="nav-item active">
						<?php }else{ ?>
						<li class="nav-item">
						<?php } ?>
							<a href="<?= base_url('guru') ?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
						<?php if($this->uri->segment(2)=="mengajar" || $this->uri->segment(2)=="perwalian" || $this->uri->segment(2)=="daftar_nilai"){ ?>
						<li class="nav-item active submenu">
						<?php }else{ ?>
						<li class="nav-item">
						<?php } ?>
							<a data-toggle="collapse" href="#akademik">
								<i class="fas fa-bookmark"></i>
								<p>Akademik</p>
								<span class="caret"></span>
							</a>
							<?php if($this->uri->segment(2)=="mengajar" || $this->uri->segment(2)=="perwalian" || $this->uri->segment(2)=="daftar_nilai"){ ?>
							<div class="collapse show" id="akademik">
							<?php }else{ ?>
							<div class="collapse" id="akademik">
							<?php } ?>
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('guru/mengajar') ?>">
											<span class="sub-item">Mengajar</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('guru/perwalian') ?>">
											<span class="sub-item">Perwalian</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('guru/daftar_nilai') ?>">
										  <span class="sub-item">Daftar Nilai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#dokumen">
								<i class="fas fa-book"></i>
								<p>Dokumen</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dokumen">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Absensi</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Materi Ajar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#profile">
								<i class="fas fa-address-card"></i>
								<p>Profile | Biodata</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="profile">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Datadiri</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Data Akademik</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>