<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="<?= base_url('homer') ?>/images/<?= $this->session->userdata('admin')['gambar']; ?>" class="img-circle m-b" style="max-height:72px;">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase"><?= $this->session->userdata('admin')['nama']; ?></span>
                <div>
                    <small class="text-muted"><?= $this->session->userdata('admin')['jabatan']; ?></small>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li>
                <a href="<?= base_url('admin') ?>"> <span class="nav-label">Dashboard</span> </a>
            </li>
            <li>
                <a href="#"><span class="nav-label">Data Sekolah</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url('admin/main/guru') ?>">Guru</a></li>
                    <li><a href="<?= base_url('admin/main/siswa') ?>">Siswa</a></li>
                    <li><a href="<?= base_url('admin/main/kelas') ?>">Kelas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">KBM</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="#">Mata pelajaran</a></li>
                    <li><a href="">Kelas</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>