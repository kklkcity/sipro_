
        <div class="col-md-9">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Cari Orang Tua</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">              
                <form action="<?php echo site_url('user/profil/cari_orang_tua_ibu')?>" method = "GET">
                <div class="form-group">
                    <label for="cari">Masukkan Nama Ibu</label>
                    <div class="input-group margin">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pasangan" name="cari" id="cari" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"> Cari Ibu</i></button>
                        </span>
                    </div>          
                </div>
                </form>
                </div>

                <?php if(empty($cari)){ 
                echo "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Oppps... Masukkan Nama Orang Tua Anda. <br>
                                Mungkin Orang Tua Anda belum mempunyai Akun? Silahkan daftarkan Orang Tua Anda pada form dibawah ini!!!</div>";
                                ?>
                <div>
                    <?php echo $this->session->flashdata('message') ; ?>
                </div>
                <!-- <div class="row">
                <div class="col-sm-offset-2 col-sm-12">
                    <form action="<?php echo site_url('user/profil/proses_tambah_orang_tua_manual'); ?>" method="POST">
                    <div class="col-xs-8">
                        <button class="btn btn-default btn-block btn-flat">Masukkan Biodata Ayah Anda</button>
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>ID </h5></td>
                            <td>
                            <input type="text" class="form-control" name="id_ayah" placeholder="ID">
                            </td>
                        </tr>
                        <tr>
                            <td><h5>NO KTP</h5></td>
                            <td>
                            <input type="text" class="form-control" name="no_ktp_ayah" placeholder="NO KTP" required/>
                            </h5>
                        </tr>
                        <tr>
                            <td><h5>Nama Lengkap </h5></td>
                            <td> 
                            <input type="text" class="form-control" name="nama_lengkap_ayah" placeholder="Nama Lengkap" required/>
                            </td>
                        </tr>
                        <tr>
                            <td><h5>Tempat Lahir</h5></td>
                            <td>
                            <input type="text" class="form-control" name="tempat_lahir_ayah" placeholder="Tempat Lahir" required/>
                            </td>
                        </tr>
                        <tr>
                            <td><h5>Tempat Lahir</h5></td>
                            <td>
                            <input type="date" class="form-control" name="tanggal_lahir_ayah" id="datepicker">
                            </td>
                        </tr>
                            <input type="hidden" class="form-control" name="level" value="1">

                        </table>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                    <h5><input type="checkbox" name="data_ayah"> Check jika tidak ada ayah.</h5>
                    </div>
                        <div class="col-sm-offset-6 col-sm-2">
                            <button type="submit" class="btn btn-default btn-block">Selanjutnya</button>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>   -->
                <?php }else{?>
                <hr>

                <div class="box-body table-responsive">                   
                <table id="example" class="table table-bordered table-hover dataTable table-striped">
                <thead >                    
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Lahir</th>
                        <th>Jenis Kelamin</th>                      
                        <th>Aksi</th>                      
                    </tr>
                </thead>
                <tbody>
                
                <?php foreach ($cari as $data) { ?>
                    <tr>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data->id; ?>">
                        <td width="5%"><?php echo $data->id;?></td> 
                        <td><?php echo $data->nama_lengkap;?></td>
                        <td><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                        <td><?php echo $data->jenis_kelamin;?></td>
                        <form action="<?php echo site_url('user/profil/proses_tambah_orang_tua'); ?>" method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data->id; ?>">
                        <input type="hidden" class="form-control" name="jenis_permintaan_ibu" value="Ibu">
                        <td width="10%"><button class="btn btn-default btn-sm"></i><i class="fa fa-plus"></i> Tambah Ibu </button></td>
                        </form>
                    </tr>
                    </div>
                    <?php  } } ;?>    
                    </tbody>        
                    </table>
                </div>
                </form>
                <hr>
        </div>
        </div>
        </section>
        </div>
        </div>
