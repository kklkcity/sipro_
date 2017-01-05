 
        <div class="col-md-9">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Pasangan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div>
                    <?php echo $this->session->flashdata('message') ; ?>
                    <?php echo $this->session->flashdata('message1') ; ?>
                </div>
                
                <br>
                <hr>
                <h4 style="margin-left:10px">Biodata Pasangan dan Pernikahan</h4>
                <hr>

                <?php foreach ($pasangan as $row) { ?>
                <div class="row">
                <div class="col-sm-offset-0 col-sm-12">
                    <div class="col-xs-6">
                        <a href="<?php echo site_url('user/profil/pasangan_detail') ?>"><button class="btn btn-default btn-block btn-flat">Lihat Biodata Data Pasangan</button></a>
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>ID </h5></td>
                            <td width="1%"><h5> : </h5></td>
                            <td><h5><?php echo $row->id;?> </h5></td>
                        </tr>
                        <tr>
                            <td><h5>NO KTP</h5></td>
                            <td><h5> : </h5></td>
                            <td><h5><?php echo $row->no_ktp;?> </h5></td>
                        </tr>
                        <tr>
                            <td><h5>Nama Lengkap </h5></td>
                            <td><h5> : </h5></td>
                            <td><h5><?php echo $row->nama_lengkap;?> </h5></td>
                        </tr>
                        <tr>
                            <td><h5>Tempat Lahir</h5></td>
                            <td><h5> : </h5></td>
                            <td><h5><?php echo $row->tempat_lahir;?> </h5></td>
                        </tr>
                        <tr>
                            <td><h5>Tanggal Lahir</h5></td>
                            <td><h5> : </h5></td>
                            <td><h5><?php echo $row->tanggal_lahir;?> </h5></td>
                        </tr>
                        </table>
                    </div>
                    <div class="col-xs-6">
                    <form action="<?php echo site_url('user/profil/proses_edit_pernikahan') ?>" method="post">
                        <button class="btn btn-default btn-block btn-flat ">Simpan</button>
                        
                        <table class="table table-striped">
                        <input type="hidden" class="form-control" name="id_nikah" value="<?php echo $row->id_nikah?>">
                        <tr>
                            <td width="35%"><h5>Tanggal Nikah</h5></td>
                            <td width="1%"><h5> : </h5></td>
                            <td><input type="date" class="form-control" name="tanggal_nikah" id="datepicker" value="<?php echo $row->tanggal_nikah ?>"></td>
                        </tr>
                        <tr>
                            <td><h5>Tanggal Cerai</h5></td>
                            <td><h5> : </h5></td>
                            <td><input type="date" class="form-control" name="tanggal_cerai" id="datepicker" value="<?php echo $row->tanggal_cerai ?>"></td>
                            
                        </tr>
                        <tr>
                            <td><h5>Status Pernikahan</h5></td>
                            <td><h5> : </h5></td>
                            <td>
                                <select class="form-control " style="width: 100%;" name="status_nikah">
                                    <option selected="selected"> <?php echo $row->status_nikah ?> </option>
                                    <option>Aktif</option>
                                    <option>Cerai Hidup</option>
                                    <option>Cerai Mati</option>
                                    <option>Tidak Resmi</option>
                                </select>
                            </td>
                        </tr>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
        </section>
        </div>
        </div>
