<div class="row">
    <div class="col-lg-4">
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mapel_m">
          Tambah mapel
        </button>
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Daftar Mata Pelajaran
            </div>
            <div class="panel-body">
                <table id="pelajaran" cellpadding="1" cellspacing="1" class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Mapel</th>
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
    <div class="col-lg-8">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Daftar Mata pelajaran yang diampu
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Street Address</th>
                        <th>City</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
                </div>

            </div>
            <div class="panel-footer">
                Table - 6 rows
            </div>
        </div>
    </div>
</div>

<div class="modal fade hmodal-info" id="mapel_m" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/matapelajaran/tambah_pelajaran') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Mata Pelajaran</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Mapel</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_mapel" placeholder="Nama Pelajaran">
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