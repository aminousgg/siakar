<div class="row">
    <div class="col-md-3">
        <div class="hpanel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                          <th colspan="2" class="text-center">Teknik Komputer Jaringan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-success font-bold">Kelas</span>
                            </td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-success font-bold">Kelas</span>
                            </td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-success font-bold">Kelas</span>
                            </td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="hpanel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">Administrasi Perkantoran</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-info font-bold">Kelas</span>
                            </td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-info font-bold">Kelas</span>
                            </td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-info font-bold">Kelas</span>
                            </td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="hpanel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">Pemasaran</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-warning font-bold">Kelas</span>
                            </td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-warning font-bold">Kelas</span>
                            </td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-warning font-bold">Kelas</span>
                            </td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="hpanel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">Akuntasi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-danger font-bold">Kelas</span>
                            </td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-danger font-bold">Kelas</span>
                            </td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="text-danger font-bold">Kelas</span>
                            </td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!--  -->
<div class="row">
  <div class="col-md-6">
    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#jurusan_m">
      Tambah Jurusan
    </a>
    <div class="hpanel">
        <div class="panel-heading">
          <div class="panel-tools">
            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            <a class="closebox"><i class="fa fa-times"></i></a>
          </div>
          Jurusan
        </div>
        <div class="panel-body">
            <table id="jurusan" cellpadding="1" cellspacing="1" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Jurusan</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="col-md-6">
    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kelas_m">
      Tambah Kelas
    </a>
    <div class="hpanel">
        <div class="panel-heading">
          <div class="panel-tools">
            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            <a class="closebox"><i class="fa fa-times"></i></a>
          </div>
          Kelas
        </div>
        <div class="panel-body">
            <table id="kelas" cellpadding="1" cellspacing="1" class="table table-condensed table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Kelas</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<!--  -->

<div class="modal fade hmodal-info" id="jurusan_m" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/kelas/tambah_jurusan') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Jurusan</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Jurusan</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="jurusan" placeholder="Pemasaran">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Jurusan</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="kode" placeholder="PE">
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
<!--  -->
<div class="modal fade hmodal-info" id="kelas_m" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/kelas/tambah_kelas') ?>
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Kelas</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Jurusan</label>
                        <div class="col-sm-9">
                        <select name="jurusan" class="form-control" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <?php $jur=$this->db->get('jurusan')->result_array();
                                foreach($jur as $row){
                                    echo '<option value="'.$row['kode_jurusan'].'">'.$row['jurusan'].'</option>';
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah kelas</label>
                        <div class="col-sm-9">
                        <input type="number" required class="form-control" name="jml_kelas" placeholder="Masukan Jumlah kelas">
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