
<div class="row">
  <div class="col-md-6">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="row">
                <div class="col-md-6">
                   <strong>Kumpulan siswa mengampu mata pelajaran dan diajar oleh siapa</strong> 
                </div>
                <div class="col-md-6">
                    <button id="tambah_classroom" class="btn btn-success pull-right m-b" data-toggle="modal" data-target="#room_">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
        <div class="panel-body">
          <table id="classroom" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Kode room</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="panel-footer">
            <?= APP_NAME ?>
        </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="row">
                <div class="col-md-6">
                   <strong>Kumpulan siswa dalam sebuah kelas, rows kelas</strong> 
                </div>
                <div class="col-md-6">
                    <button id="tambah_grub_kelas" class="btn btn-success pull-right m-b" data-toggle="modal" data-target="#grup_">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
        <div class="panel-body">
          <table id="grup_kelas" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Wali kelas</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="panel-footer">
            <?= APP_NAME ?>
        </div>
    </div>
  </div>
</div>
<!-- MODAL TAMBAH CLASSROOM-->
<div class="modal fade hmodal-info" id="room_" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/classroom/tambah_classroom') ?>
                <div class="modal-header">
                  <h6 class="modal-title">Insert Classroom</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Kelas</label>
                        <div class="col-sm-9">
                            <select class="js-source-states" name="kode_wali" id="select_siswa_room" style="width: 100%">
                                <option value="">-- Pilih Siswa --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Mapel</label>
                        <div class="col-sm-9">
                            <select name="id_mapel" class="form-control" id="select_mapel_class">
                              <option value="">-- Pilih Mata Pelajaran --</option>
                            </select>
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
<!-- MODAL TAMBAH GRUP KELAS -->
<div class="modal fade hmodal-info" id="grup_" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/classroom/tambah_siswa_kegrup_kelas') ?>
                <div class="modal-header">
                  <h6 class="modal-title">Insert Grup Kelas</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih siswa</label>
                        <div class="col-sm-9">
                            <select class="siswa_select_grup" name="nisn" id="siswa_select_grup" style="width: 100%;">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Wali Kelas</label>
                        <div class="col-sm-9">
                            <select name="id_kelas" class="form-control" id="select_kelas_grup">
                              <option value="">-- Pilih Kelas --</option>
                            </select>
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
