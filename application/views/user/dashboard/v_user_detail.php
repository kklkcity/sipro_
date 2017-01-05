
<div class="content-wrapper">
    <div class="container">
    
    <section class="content-header">
        <h1>
            <?php echo $page ?>
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#"></i>Detail Profil User</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-header">        
            </div>
            <div class="row">
                <div class="col-sm-offset-1 col-xs-10">
        <hr>
        <div class="nav-tabs-custom">
            <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <?php foreach ($detail as $row) { ?>
                    <h5 class="box-title">Detail Biodata Profil <?php echo $row->nama_lengkap; ?> </h5>
                    </div>
                </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="box-body box-profile">
                    <?php if($row->foto == ''){?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:200px; width:200px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $row->foto;?>"  
                        style="height:200px; width:200px" alt="User profile picture">
                    <?php } ?>
                    <hr>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-xs-6">
                <?php foreach ($detail as $row) { ?>
                <form class="form" action="<?php echo site_url('user/dashboard/proses_edit_foto') ?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" class="form-control" name="id_user" id="regular1" value="<?php echo $row->id; ?>">
                    <input type="hidden" class="form-control" name="foto" id="regular1" value="<?php echo $row->foto;?>">
                    <input type="file" class="form-control" name="filefoto" required>
                    <h6>*pilih Choose File kemudian ganti foto</h6>
                    <button class="btn btn-default btn-flat" type="submit">Ganti Foto</button>
                </form>
                </div>
                <div class="col-xs-6">
                <form action="<?php echo site_url('user/dashboard/ambil_user') ?>" method="post">
                    <input type="hidden" class="form-control"  name="id_user" id="id_user" value="<?php echo $row->id;?>">
                    <button class="btn btn-default btn-block btn-flat" >Edit Profil User</button>
                </form>
                </div>
                <?php } ?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-offset-1 col-xs-10">
                <div class="box-body table-responsive"> 
                <button class="btn btn-default btn-block btn-flat" >Biodata Profil User</button>
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
 