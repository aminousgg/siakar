<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Daftar Guru
            </div>
            <div class="panel-body">
              <table id="tabledata" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="table_guru">
                </tbody>
              </table>
            </div>
            
        </div>
    </div>
</div>
<!-- modal edit -->
<div class="modal fade" id="edit_guru_m" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="color-line"></div>
            <?= form_open('admin/guru/in_edit') ?>
                <div class="modal-header">
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row m-b">
                        <div class="col-sm-6">
                            <label>NIP</label>
                            <input name="nip" id="nip_guru" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Nama</label>
                            <input name="nama" id="nama_guru" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-4">
                            <label>Tempat Lahir</label>
                            <select name="tmp_lahir" id="tempat_lahir" class="tempat_lahir" id="tempat_lahir" style="width:100%;">

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Tanggal Lahir</label>
                            <input name="tgl_lahir" id="tgl_lahir_guru" type="date" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-6">
                            <label>Agama</label>
                            <select name="agama" id="agama_guru" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Golongan Darah</label>
                            <input name="goldar" id="goldar_guru" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-6">
                            <label>No HP</label>
                            <input name="no_hp" id="no_hp_guru" type="text" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Email</label>
                            <input name="email" id="email_guru" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-12">
                            <label>Alamat</label>
                            <input name="detail" id="alamat_guru" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-4">
                            <label>Provinsi</label>
                            <select name="prov" class="prov" id="prov" style="width:100%;">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Kota</label>
                            <select name="kota" class="kota" id="kota" style="width:100%;">
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Kecamatan</label>
                            <select name="kec" id="kec" class="form-control kec">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-b">
                        <div class="col-sm-4">
                            <label>Tanggal Masuk</label>
                            <input name="tgl_masuk" id="tgl_masuk" type="date" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Jabatan</label>
                            <input name="jabatan" type="text" id="jabatan" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Status</label>
                            <select name="status" id="status_guru" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Keluar">Keluar</option>
                                <option value="Pensiun">Pensiun</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <input type="hidden" name="nip_awal" id="nip_awal">
            <?= form_close() ?>
        </div>
    </div>
</div>