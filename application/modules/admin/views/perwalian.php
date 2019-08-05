                
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Daftar Walikelas
                <a id="tambah_wali" class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target="#wali" style="margin-top:-6px;">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="panel-body">
                <table id="tableperwalian" cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                This is standard panel footer
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade hmodal-info" id="wali" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/perwalian/tambah_wali') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Kelas</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pilih Jurusan</label>
                      <div class="col-sm-9">
                        <select name="id_kelas" id="kelas_select" class="form-control" required>
                          <option value="">-- Pilih Kelas --</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pilih Guru</label>
                      <div class="col-sm-9">
                        <select name="nip" id="guru_pilih" class="guru_select" style="width:100%;" required>
                          <option value="">-- Pilih guru --</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tahun Ajaran</label>
                      <div class="col-sm-9">
                        <select name="tahun_ajaran" id="siswa" class="form-control" required>
                          <option value="2019/2020">2019/2020</option>
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