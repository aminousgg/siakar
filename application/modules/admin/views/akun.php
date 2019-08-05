<div class="row">
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Akun Siswa
                <button class="btn btn-primary btn-sm pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#tambah_siswa">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="panel-body">
                <table cellpadding="1" cellspacing="1" id="tableakunsiswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Device</th>
                            <th>Last Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                Table - 6 rows
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Akun Guru
                <button class="btn btn-primary btn-sm pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#tambah_guru">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="panel-body">
                <table cellpadding="1" cellspacing="1" id="tableakunguru" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Device</th>
                            <th>Last Login</th>
                            <th>Aksi</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                Table - 6 rows
            </div>
        </div>
    </div>
</div>
<!-- MODAL TAMBAH SISWA -->
<div class="modal fade hmodal-info" id="tambah_siswa" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/akun/tambah') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Akun Siswa</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NISN Siswa</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" name="nisn" placeholder="Daftarkan NISN siswa">
                        <input type="hidden" name="level" value="siswa">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH GURU -->
<div class="modal fade hmodal-info" id="tambah_guru" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/akun/tambah') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Akun Guru</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIP Guru</label>
                      <div class="col-sm-9">
                        <input type="text" required class="form-control" name="nip" placeholder="Daftarkan Nip Guru">
                        <input type="hidden" name="level" value="guru">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>