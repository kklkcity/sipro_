

    <div class="content-wrapper">
    <div class="container">
    
    <section class="content-header">
        <h1>
            <?php echo $page ?>
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        </ol>
    </section>

    <section class="content">
    <div>
        <?php echo $this->session->flashdata('message') ?>
        <?php echo $this->session->flashdata('message1') ?>
    </div>

        <?php foreach ($notifikasi as $data) { 
            if($data->status_permintaan=='Belum') {
            ?>

            <div class='alert alert-danger callout'>
            <form action="<?php echo site_url('user/dashboard/konfirmasi_pasangan'); ?>" method="POST">
                <div class="box-body table-responsive">                   
                <button type='button' class='close' data-dismiss='alert'>x</button> 
                <class='fa fa-thumbs-up'>
                <h4>Pemberitahuan Permintaan</h4>
                <hr>
                Hai <?php echo ucfirst($this->session->userdata('nama_lengkap')); ?> kamu mendapat pemberitahuan permintaan.
                <?php echo $data->nama_lengkap; ?>
                meminta anda sebagai 
                <?php echo $data->jenis_permintaan; ?>.<br>
                Apakah anda ingin menerima?
                <br>
                <input type="hidden" class="form-control" name="id_peminta" value="<?php echo $data->id_peminta; ?>">
                <input type="hidden" class="form-control" name="id_diminta" value="<?php echo $data->id_diminta; ?>">
                <input type="hidden" class="form-control" name="jenis_permintaan" value="<?php echo $data->jenis_permintaan; ?>">
                <input type="hidden" class="form-control" name="status_permintaan_terima" value="Terima">
                <input type="hidden" class="form-control" name="id_nikah">
             
                <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-1">
                            <button type="submit" class="btn btn-success">Terima</button>
                        </div>
                    </div>
                </form>
                <form action="<?php echo site_url('user/dashboard/konfirmasi_pasangan_tolak'); ?>" method="POST">
                <button type="submit" class="btn btn-warning" style="margin-left:15px">Tolak</button>
                <input type="hidden" class="form-control" name="id_peminta" value="<?php echo $data->id_peminta; ?>">
                <input type="hidden" class="form-control" name="status_permintaan_tolak" value="Tolak">
                </form>
           
            </div>
            </div>

        <?php }else{

            echo "";
            }
        } ?>

        <div class='alert alert-info callout'>
            <button type='button' class='close' data-dismiss='alert'>x</button> 
            <class='fa fa-thumbs-up'>
            <h4>Selamat Datang <?php echo ucfirst($this->session->userdata('nama_lengkap')); ?> !!!</h4>
            di Aplikasi SILSILAH KELUARGA
        </div>

      
        <div class="box box-default">
        <div class="box-header">
        <div class="row">
            <div class="col-sm-12">
            <div class="col-xs-offset-1 col-xs-10">
            <div class="box box-solid margin">
            <div class="box-header with-border" align="center">
                <h5 class="box-title">Daftar Akun Dikelola </h5>
            </div>
            <div class="margin">
                <?php echo $this->session->flashdata('msg') ?>
            </div>
                <div class="box-body table-responsive margin">                   
                <table id="example1" class="table table-bordered table-hover dataTable table-striped">
                <thead >                    
                    <tr>
                        <th >ID</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th width="10%">Foto</th>
                        <th width="17%">Lihat User</th>
                        <th width="17%">Hapus User</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($user as $data) { ?>
                    <tr>
                        <td input width="5%" name="id" method="post"><?php echo $data->id;?></td>
                        <td><?php echo $data->nama_lengkap;?></td>
                        <td><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                        <td><?php if($data->foto == ''){?>
                            <img class="pimg-circle" 
                                src="<?php echo base_url();?>assets/img/avatar.png" 
                                style="height:40px; width:40px" alt="User profile picture">      
                            <?php } else{?>
                            <img class="img-circle" 
                                src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                                style="height:40px; width:40px" alt="User profile picture">
                            <?php } ?>
                        </td>
                        <td>
                        <form action="<?php echo site_url('user/dashboard/detail') ?>" method="post">
                        <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>"/>
                        <input type="hidden" class="form-control"  name="nama_lengkap" value="<?php echo $data->nama_lengkap;?>"/>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                        </form>
                        </td>
                        <td>
                        <input type="hidden" name="id" method="post" value="<?php echo $data->id; ?>">
                        <a href="<?php echo site_url('user/dashboard/hapus_user/'.$data->id); ?>" onclick="javascript: return confirm('Apakah anda yakin menghapus pernikahan?')">
                            <button class="btn btn-default" style="width:100%"><i class="fa fa-trash"> Hapus User</i></button>
                        </a>
                        </td>
                    </tr>
                    </div>
                    <?php } ;?>    
                </tbody>         
                </table>
        </div>
        <br>
        <br>
    </section>
    </div>
    </div>
