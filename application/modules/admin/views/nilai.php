<div class="row">
    <div class="col-lg-12">
        <div class="hpanel hblue">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Daftar Nilai
            </div>
            <div class="panel-body">
              <table id="daftarnilai" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Kelas</th>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Pengajar</th>
                    <th>Mapel</th>
                    <th>Tugas</th>
                    <th>Uts</th>
                    <th>Uas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="shownilai">

                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade hmodal-info" id="myModal8" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <?= form_open('admin/nilai/ubah_nilai') ?>
          <div class="color-line"></div>
          <div class="modal-header">
              <h4 class="modal-title">Edit Nilai</h4>
          </div>
          <div class="modal-body" style="min-height:200px;">
            <div class="form-group row">
              <div class="col-sm-6">
                <input type="hidden" name="id" value="" class="form-control id_daftar">
                <input type="text" class="form-control nama" disabled>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control matkul" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="text" name="tgs" class="form-control guru" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai Tugas</label>
              <div class="col-sm-9">
                <input type="number" name="tgs" class="form-control tgs">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai Uts</label>
              <div class="col-sm-9">
                <input type="number" name="uts" class="form-control uts">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai Uas</label>
              <div class="col-sm-9">
                <input type="number" name="uas" class="form-control uas">
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