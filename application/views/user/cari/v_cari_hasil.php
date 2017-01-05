
    <!-- Full Width Column -->
    <div class="content-wrapper">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $page ?>
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> <?php echo $page ?> </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Semua User</h3>
            </div>
            <div class="row">
                <div class="col-sm-offset-1 col-xs-10">

            <div class="margin">
                <?php echo $this->session->flashdata('message') ?>
                <?php echo $this->session->flashdata('message1') ?>
            </div>

        <?php  if(empty($cari)){ 
                echo "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Cek kembali nama yang anda masukkan. Nama anda tidak terdaftar di Database!!! </div> ";
        }else{ ?>
            
        <div class="box-body table-responsive">                   
                <table id="example2" class="table table-bordered table-hover dataTable table-striped">
                <thead >                    
                    <tr>
                        <th >ID</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th width="10%">Foto</th>
                        <th width="17%">Lihat User</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cari as $data) { ?>
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
                        <form action="<?php echo site_url('user/dashboard/detail_user') ?>" method="post">
                        <input type="hidden" class="form-control"  name="id_user" id="id_user" value="<?php echo $data->id;?>"/>
                        <input type="hidden" class="form-control"  name="nama_lengkap" value="<?php echo $data->nama_lengkap;?>"/>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button></form>
                        </td>
                    </tr>
                    </div>
                    <?php } ;?>    
                    </tbody>        
                </table>
                </div>
                <?php } ?>

                <hr> 
        <!-- /.box-body -->
        </div>


        <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


    