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
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        </ol>
    </section>

<section class="content">
       
     <div class="nav-tabs-custom">
            
            <div class="tab-content">
            <div class="active tab-pane" id="activity">
            <div class="margin">
                <?php echo $this->session->flashdata('message') ; ?>
                <?php echo $this->session->flashdata('message1') ; ?>
            </div>
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <?php foreach ($result as $row) { ?>
                    <h5 class="box-title">Hallo,  <?php echo $row->nama_lengkap; ?> </h5>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-offset-1 col-xs-10">
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
                <div class="col-sm-offset-1 col-sm-10">
                <div class="col-xs-6">
                <?php foreach ($result as $row) { ?>
                <form class="form" action="<?php echo site_url('admin/profil/proses_edit_foto') ?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" class="form-control" name="id" id="regular1" value="<?php echo $row->id; ?>">
                    <input type="hidden" class="form-control" name="foto" id="regular1" value="<?php echo $row->foto;?>">
                    <input type="file" class="form-control" name="filefoto" required>
                    <h6>*pilih Choose File kemudian ganti foto</h6>
                    <button class="btn btn-default btn-flat" type="submit">Ganti Foto</button>
                </form>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url('admin/profil/ambil_admin/'.$row->id) ?>" 
                    class="btn btn-default btn-block btn-flat"><i class="fa fa-pencil"></i> Edit Username dan Password </i></a>
                </div>
                <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-offset-2 col-xs-8">
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
                        <td><h5>Nama Lengkap </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->nama_lengkap;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Username </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->username;?> </h5></td>
                    </tr>
                    
                    
                </table>
                <?php  } ?>
                <hr>
                </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->