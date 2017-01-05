
        <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
            </ul>
            <div class="tab-content">
            <div class="active tab-pane" id="activity">
            <div>
                <?php echo $this->session->flashdata('message') ; ?>
                <?php echo $this->session->flashdata('message1') ; ?>
            </div>
                <?php foreach ($cek_ktp as $row2){?>
                    <?php if($row2->no_ktp==0)
                    { 
                        echo "  <div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> NO KTP Kosong, lengkapi data anda! </div>";
                    }?>
                <?php }?>   
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <?php foreach ($result as $row) { ?>
                    <h5 class="box-title">Hallo,  <?php echo $row->nama_lengkap; ?> </h5>
                    </div>
                </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="box-body box-profile">
                    <?php foreach ($result as $row) { ?>
                    <?php if($row->foto == ''){?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:200px; width:200px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $row->foto;?>"  
                        style="height:200px; width:200px" alt="User profile picture">
                    <?php } ?>
                    <?php } ?>
                    <hr>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-xs-6">
                <?php foreach ($result as $row) { ?>
                <form class="form" action="<?php echo site_url('user/profil/proses_edit_foto') ?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" class="form-control" name="id" id="regular1" value="<?php echo $row->id; ?>">
                    <input type="hidden" class="form-control" name="foto" id="regular1" value="<?php echo $row->foto;?>">
                    <input type="file" class="form-control" name="filefoto" required>
                    <h6>*pilih Choose File kemudian ganti foto</h6>
                    <button class="btn btn-default btn-flat" type="submit">Ganti Foto</button>
                </form>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url('user/profil/ambil_user/'.$row->id) ?>" 
                    class="btn btn-default btn-block btn-flat">Edit Data </i></a>
                </div>
                <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-1 col-xs-10">
                <hr>
                <div class="box-body table-responsive"> 
                <button class="btn btn-default btn-block btn-flat" >Biodata Profil</button>
                <table id="example1" class="table dataTable table-striped">
                    <tr>
                        <td width="25%"><h5>ID </h5></td>
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
                        <td><h5>Jenis Kelamin </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->jenis_kelamin;?> </h5></td>
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
                    <tr>
                        <td><h5>Alamat</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->alamat;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Agama</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->agama;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Golongan Darah</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->golongan_darah;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>No Telepon</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->no_telepon;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Email</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->email;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Pendidikan</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->pendidikan;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Pekerjaan</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->pekerjaan;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Status</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->status;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Tanggal Meninggal</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->tanggal_meninggal;?> </h5></td>
                    </tr>       
                </table>
                <?php  } ?>
                <hr>
                </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    </div>