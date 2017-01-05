 
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
                <div class="col-sm-offset-0 col-sm-6">
                    <form action="<?php echo base_url(); ?>user/profil/tambah_pasangan" method="POST">
                    <div class="form-group">
                    <div class="input-group margin">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-plus"> Tambah Pasangan</i></button>
                        </span>
                        <?php foreach ($result as $row) { 
                        if($row->jenis_kelamin=='Laki-laki'){?>
                            <input type="hidden" class="form-control" name="jenis_permintaan" value="Istri">
                        <?php }else{ ?>
                            <input type="hidden" class="form-control" name="jenis_permintaan" value="Suami">
                        <?php } } ?>
                    </div>          
                    </div>
                    </form>
                </div>
                <br>
                <br>
                <hr>
                <h4 style="margin-left:10px">Biodata Pasangan dan Pernikahan</h4>
                <hr>

                <?php foreach ($pasangan as $row) { ?>
                <div class="row">
                <div class="col-sm-offset-0 col-sm-12">
                    <div class="col-xs-6">
                        <a href="<?php echo site_url('user/profil/detail_pasangan') ?>">
                        <?php if($row->jenis_kelamin=='Laki-laki') { ?>
                        <button class="btn btn-default btn-block btn-flat">
                        <i class="fa fa-eye"> Lihat Biodata Data Suami</i></button>
                        <?php }else{ ?>
                        <button class="btn btn-default btn-block btn-flat">
                        <i class="fa fa-eye"> Lihat Biodata Data Istri</i></button>
                        <?php } ?>
                        </a>
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
                        <a href="<?php echo site_url('user/profil/edit_pernikahan'); ?>">
                            <button class="btn btn-default btn-block btn-flat "><i class="fa fa-pencil"> Edit Data Pernikahan</i></button>
                        </a>
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>Tanggal Nikah</h5></td>
                            <td width="1%"><h5> : </h5></td>
                            <td><h5><?php echo $row->tanggal_nikah;?></h5></td>
                        </tr>
                        <tr>
                            <td><h5>Tanggal Cerai</h5></td>
                            <td><h5> : </h5></td>
                            <td><h5> <?php echo $row->tanggal_cerai;?> </h5></td>
                        </tr>
                        <tr>
                            <td><h5>Status Pernikahan</h5></td>
                            <td><h5> : </h5></td>
                            <td><h5> <?php echo $row->status_nikah;?>  </h5></td>
                        </tr>
                        </table>
                        <input type="hidden" name="id_nikah" value="<?php echo $row->id_nikah; ?>">
                        <a href="<?php echo site_url('user/profil/hapus_pernikahan/'.$row->id_nikah); ?>" onclick="javascript: return confirm('Apakah anda yakin menghapus pernikahan?')">
                            <button class="btn btn-default btn-block btn-flat "> <i class="fa fa-trash"> Hapus Pernikahan</i></button>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
        </section>
        </div>
        </div>
