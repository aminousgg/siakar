<button class="btn btn-success pull-right m-b" title="Tambahkan Siswa ke kelas" data-toggle="modal" data-target="#room_">
  Tambah
</button>
<div class="row">
  <div class="col-md-12">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
            <div class="row">
                <div class="col-md-6">
                    Panel with search form
                </div>
            </div>
        </div>
        <div class="panel-body">
          <table id="classroom" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Kode room</th>
                <th>Nama Siswa</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
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
</div>

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
                        <label class="col-sm-3 col-form-label">Nisn</label>
                        <div class="col-sm-9">
                            <select class="js-source-states" name="siswa" id="select_siswa" style="width: 100%">
                                <option value="1">alsnfd</option>
                                <option value="1">blsnfd</option>
                                <option value="1">flsnfd</option>
                                <option value="1">glsnfd</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Kelas</label>
                        <div class="col-sm-9">
                            <select name="kode_kelas" class="form-control" id="select_kelas">
                              <option value="">-- Pilih Kelas --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Mapel</label>
                        <div class="col-sm-9">
                            <select name="mapel" class="form-control" id="select_mapel">
                              <option value="">-- Pilih Mata Pelajaran --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Guru</label>
                        <div class="col-sm-9">
                            <select name="kode_mapel" class="form-control" id="select_guru">
                              <option value="">-- Pilih Guru pengajar --</option>
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