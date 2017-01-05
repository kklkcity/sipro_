
        <div class="col-md-9">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Cari Pasangan</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">              
                <form action="<?php echo site_url('user/profil/cari_pasangan_suami')?>" method = "GET">
                <input type="hidden" class="form-control" name="jenis_permintaan" value="Suami">
                <div class="form-group">
                    <label for="cari">Masukkan Nama Suami</label>
                    <div class="input-group margin">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Suami" name="cari" id="cari" required>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"> Cari Suami</i></button>
                        </span>
                    </div>          
                </div>
                </form>
            </div>
    
            <?php if(empty($cari)){ 
                echo "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Oppps... Masukkan Nama Pasangan Anda. <br>
                                Mungkin Pasangan Anda belum mempunyai Akun? Silahkan daftarkan Pasangan Anda pada from dibawah ini!!! </div>";
                                ?>
                <div>
                    <?php echo $this->session->flashdata('message') ; ?>
                </div>
                <div class="row">
                <div class="col-sm-offset-2 col-sm-12">
                    <div class="col-xs-8">
                    <hr>
                    <form action="<?php echo site_url('user/profil/proses_tambah_pasangan_manual'); ?>" method="POST">
                        <button class="btn btn-default btn-block btn-flat">Masukkan Biodata Suami Anda</button>
                        <input type="hidden" class="form-control" name="jenis_permintaan" value="Suami">
                        <table class="table table-striped">
                        <tr>
                            <td width="35%"><h5>ID </h5></td>
                            <td>
                            <input type="text" class="form-control" name="id_pasangan" placeholder="ID" required/>
                            </td>
                        </tr>
                        <tr>
                            <td><h5>NO KTP</h5></td>
                            <td>
                            <input type="text" class="form-control" name="no_ktp" placeholder="NO KTP" required/>
                            </h5>
                        </tr>
                        <tr>
                            <td><h5>Nama Lengkap </h5></td>
                            <td> 
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required/>
                            </h5>
                        </tr>
                        <tr>
                            <td><h5>Tempat Lahir</h5></td>
                            <td>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required/>
                            </td>
                        </tr>
                        <tr>
                            <td><h5>Tempat Lahir</h5></td>
                            <td>
                            <input type="date" class="form-control" name="tanggal_lahir" id="datepicker">
                            </td>
                        </tr>
                            <input type="hidden" class="form-control" name="level" value="1">

                        <tr>
                            <td><h5></h5></td>
                            <td>
                            <button class="btn btn-default btn-sm"><i class="fa fa-plus"> Tambah Suami</i> </button>
                            </td>
                        </tr>
                        </table>
                    </form>
                    </div>
                    </div>
                    </div>  
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
                        <form action="<?php echo site_url('user/profil/proses_tambah_pasangan'); ?>" method="POST">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data->id; ?>">
                        <input type="hidden" class="form-control" name="jenis_permintaan_suami" value="Suami">
                        <td width="10%"><button class="btn btn-default btn-sm"><i class="fa fa-plus"> Tambah Suami</i> </button>
                        </td>
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
