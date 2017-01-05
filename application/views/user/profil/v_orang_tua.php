 
        <div class="col-md-9">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Orang Tua</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div>
                    <?php echo $this->session->flashdata('message') ; ?>
                    <?php echo $this->session->flashdata('message1') ; ?>
                </div>
                <div class="col-sm-offset-0 col-sm-12 margin">
                    <a href="<?php echo base_url(); ?>user/profil/tambah_orang_tua_ayah">
                    <button class="btn btn-default" style="width:17%; margin-right:2%"> <i class="fa fa-plus"> Tambah Ayah</i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>user/profil/tambah_orang_tua_ibu"> 
                    <button class="btn btn-default" style="width:17%"> <i class="fa fa-plus"> Tambah Ibu</i></button>
                    </a>
                </div>
                <br>
                <br>
                <hr>
                <h4 style="margin-left:10px">Biodata Ayah dan Ibu</h4>
                <hr>
               <div class="row">
                <div class="col-sm-offset-0 col-sm-12">
                <?php foreach ($ayah as $row) { ?>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url('user/profil/detail_ayah') ?>"><button class="btn btn-default btn-block btn-flat">
                        <i class="fa fa-eye"> Lihat Biodata Data Ayah</i></button></a>
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>ID </h5></td>
                            <td width="1%"><h5> : </h5></td>
                            <td><h5><?php echo $row->id_diminta;?> </h5></td>
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

                        <input type="hidden" name="id_permintaan" value="<?php echo $row->id_permintaan; ?>">
                        <a href="<?php echo site_url('user/profil/hapus_orangtua/'.$row->id_permintaan); ?>" onclick="javascript: return confirm('Apakah anda yakin menghapus pernikahan?')">
                            <button class="btn btn-default btn-block btn-flat "> <i class="fa fa-trash"> Hapus Hubungan Ayah</i></button>
                        </a>

                    </div>
                <?php } ?>
                    
                <?php foreach ($ibu as $row) { ?>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url('user/profil/detail_ibu') ?>"><button class="btn btn-default btn-block btn-flat">
                        <i class="fa fa-eye"> Lihat Biodata Data Ibu</i></button></a>
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>ID </h5></td>
                            <td width="1%"><h5> : </h5></td>
                            <td><h5><?php echo $row->id_diminta;?> </h5></td>
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

                        <input type="hidden" name="id_permintaan" value="<?php echo $row->id_permintaan; ?>">
                        <a href="<?php echo site_url('user/profil/hapus_orangtua/'.$row->id_permintaan); ?>" onclick="javascript: return confirm('Apakah anda yakin menghapus pernikahan?')">
                            <button class="btn btn-default btn-block btn-flat "> <i class="fa fa-trash"> Hapus Hubungan Ibu</i></button>
                        </a>
                        <hr>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        </div>
        </section>
        </div>
        </div>
