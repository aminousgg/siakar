<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control form-control" id="select_mapel">
                
            </select>
        </div>
    </div>
</div>
<!--  -->
<div class="row cardnilai">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $sub_judul ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_nilai" class="display table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>Nisn</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tugas</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table_daftarnilai">
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade w3-animate-top" id="set_nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Set Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="hidden" name="id" value="" class="form-control id_daftar">
                    <input type="text" class="form-control nama" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control nisn" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="tgs" class="form-control kelas" disabled>
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
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>