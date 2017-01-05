
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
                <h3 class="box-title">Anggota Keluarga</h3>
                
                <br/>
                <br/>
                <br/>
                <div class="row">
                <div class="col-sm-offset-1 col-sm-12">
                <div class="col-xs-10">   
                <h4 class="box-title">Orang Tua</h4>
                <div class="box-body table-responsive">                   
                <table id="example1" class="table table-bordered table-hover dataTable table-striped">
                <tbody>
                <?php foreach ($ayah as $data) { ?>
                <tr>
                <form action="<?php echo site_url('user/keluarga/detail_user') ?>" method="post"> 
                <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>">                    
                    <td width=30%><?php echo $data->nama_lengkap;?></td>
                    <td width=30%><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                    <td width=15% align="center"><?php if($data->foto == ''){?>
                    <img class="pimg-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:50px; width:50px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                        style="height:50px; width:50px" alt="User profile picture">
                    <?php   } ;?>
                    </td>
                    <td width=15%>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                    </td>
                </form>
                </tr>
                <?php } ;?>
                <?php foreach ($ibu as $data) { ?>
                <tr>
                <form action="<?php echo site_url('user/keluarga/detail_user') ?>" method="post"> 
                <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>">                    
                    <td><?php echo $data->nama_lengkap;?></td>
                    <td><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                    <td align="center"><?php if($data->foto == ''){?>
                    <img class="pimg-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:50px; width:50px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                        style="height:50px; width:50px" alt="User profile picture">
                    <?php   } ;?>
                    </td>
                    <td>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                    </td>
                </form>
                </tr>
                <?php   } ;?>
                </tbody>        
                </table>
                </div>
                </div>
                </div>

                <div class="col-sm-offset-1 col-sm-12">
                <div class="col-xs-10">   
                <h4 class="box-title">Pasangan</h4>
                <div class="box-body table-responsive">                   
                <table id="example1" class="table table-bordered table-hover dataTable table-striped">
                <tbody>
                <?php foreach ($pasangan as $data) { ?>
                <tr>
                <form action="<?php echo site_url('user/keluarga/detail_user') ?>" method="post"> 
                <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>">                    
                    <td width=30%><?php echo $data->nama_lengkap;?></td>
                    <td width=30%><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                    <td width=15% align="center"><?php if($data->foto == ''){?>
                    <img class="pimg-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:50px; width:50px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                        style="height:50px; width:50px" alt="User profile picture">
                    <?php   } ;?>
                    </td>
                    <td width=15%>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                    </td>
                </form>
                </tr>
                <?php   } ;?>    
                </tbody>        
                </table>
                </div>
                </div>
                </div>

                <div class="col-sm-offset-1 col-sm-12">
                <div class="col-xs-10">   
                <h4 class="box-title">Saudara</h4>
                <div class="box-body table-responsive">                   
                <table id="example1" class="table table-bordered table-hover dataTable table-striped">
                <tbody>
                <?php foreach ($saudara as $data) { ?>
                <tr>
                <form action="<?php echo site_url('user/keluarga/detail_user') ?>" method="post"> 
                <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>">                    
                    <td width=30%><?php echo $data->nama_lengkap;?></td>
                    <td width=30%><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                    <td width=15% align="center"><?php if($data->foto == ''){?>
                    <img class="pimg-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:50px; width:50px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                        style="height:50px; width:50px" alt="User profile picture">
                    <?php   } ;?>
                    </td>
                    <td width=15%>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                    </td>
                </form>
                </tr>
                <?php   } ;?>    
                </tbody>        
                </table>
                </div>
                </div>
                </div>

                <div class="col-sm-offset-1 col-sm-12">
                <div class="col-xs-10">   
                <h4 class="box-title">Anak</h4>
                <div class="box-body table-responsive">                   
                <table id="example1" class="table table-bordered table-hover dataTable table-striped">
                <tbody>
                <?php foreach ($anak as $data) { ?>
                <tr>
                <form action="<?php echo site_url('user/keluarga/detail_user') ?>" method="post"> 
                <input type="hidden" class="form-control"  name="iduser" id="iduser" value="<?php echo $data->id;?>">                    
                    <td width=30%><?php echo $data->nama_lengkap;?></td>
                    <td width=30%><?php echo $data->tempat_lahir;?> <?php echo $data->tanggal_lahir;?></td>
                    <td width=15% align="center"><?php if($data->foto == ''){?>
                    <img class="pimg-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:50px; width:50px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $data->foto;?>"  
                        style="height:50px; width:50px" alt="User profile picture">
                    <?php   } ;?>
                    </td>
                    <td width=15%>
                        <button class="btn btn-default" style="width:100%"><i class="fa fa-eye"> Lihat User </i></button>
                    </td>
                </form>
                </tr>
                <?php  } ;?>    
                </tbody>        
                </table>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
