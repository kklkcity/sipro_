
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#keluarga" data-toggle="tab">Edit Profil</a></li>
                </ul>
            <div class="tab-content">
            <div class="active tab-pane" id="keluarga">
            <div class="post">   
            <hr>
            <?php foreach ($result as $row) { ?>
                <form class="form-horizontal" method="post" action="<?php echo site_url('user/profil/proses_edit_user') ?>" >
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id_anggota" id="regular1" value="<?php echo $row->id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">NO KTP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_ktp" value="<?php echo $row->no_ktp ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row->nama_lengkap ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-7">
                        <select class="form-control " style="width: 100%;" name="jenis_kelamin">
                            <option selected="selected"> <?php echo $row->jenis_kelamin ?> </option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tempat Lahir</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row->tempat_lahir ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" name="tanggal_lahir" id="datepicker" value="<?php echo $row->tanggal_lahir ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Agama</label>
                        <div class="col-sm-7">
                        <select class="form-control " style="width: 100%;" name="agama">
                            <option selected="selected"> <?php echo $row->agama ?> </option>
                            <option>Islam</option>
                            <option>Katholik</option>
                            <option>Hindhu</option>
                            <option>Budha</option>
                            <option>Konghuchu</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Golongan Darah</label>
                        <div class="col-sm-7">
                        <select class="form-control " style="width: 100%;" name="golongan_darah">
                            <option selected="selected"> <?php echo $row->golongan_darah ?> </option>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">No Telepon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_telepon" value="<?php echo $row->no_telepon ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $row->email ?>">                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Pendidikan</label>
                        <div class="col-sm-7">
                        <select class="form-control " style="width: 100%;" name="pendidikan">
                            <option selected="selected"> <?php echo $row->pendidikan ?> </option>
                            <option>Tidak Sekolah</option>
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA/SMK</option>
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4</option>
                            <option>S1</option>
                            <option>S2</option>
                            <option>S3</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Pekerjaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $row->pekerjaan ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-7">
                        <select class="form-control " style="width: 100%;" name="status">
                            <option selected="selected"> <?php echo $row->status ?> </option>
                            <option>Hidup</option>
                            <option>Meninggal</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tanggal Meninggal</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" name="tanggal_meninggal" id="datepicker" value="<?php echo $row->tanggal_meninggal ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <?php } ?>
        </div>
    </section>
    </div>
    </div>
