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
                    <li><a href="<?= base_url('admin/guru') ?>">Guru</a></li>
                    <li><a href="<?= base_url('admin/siswa') ?>">Siswa</a></li>
                    <li><a href="<?= base_url('admin/kelas') ?>">Kelas</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">KBM</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= base_url('admin/matapelajaran') ?>">Mata pelajaran</a></li>
                    <li><a href="<?= base_url('admin/classroom') ?>">Kelas room</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('admin/akun') ?>"><span class="nav-label">Akun</span> </a>
            </li>
            <li>
                <a href="<?= base_url('admin/perwalian') ?>"><span class="nav-label">Perwalian</span> </a>
            </li>
            <li>
                <a href="<?= base_url('admin/nilai') ?>"><span class="nav-label">Nilai Siswa</span> </a>
            </li>
        </ul>
    </div>
</aside>