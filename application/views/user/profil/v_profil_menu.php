
    <!-- Full Width Column -->
    <div class="content-wrapper">
    <div class="container">
      
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $page ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('user/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> <?php echo $page ?> </li>
            <li class="active"> <?php echo $sub_page ?> </li>
            <li class="active"> <?php echo $sub_page_satu ?> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-solid">
            <div class="box-header with-border">
                <h5 class="box-title">Photo</h5>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body box-profile">

            <?php  foreach ($result as $row) { ?>
                <?php if($row->foto == ''){?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:100px; width:100px" alt="User profile picture">      
                    <?php } else{?>
                   <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/uploads/<?php echo $row->foto;?>"  
                        style="height:100px; width:100px" alt="User profile picture">
                    <?php } ?>
                    <?php } ?>
            <hr>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Menu</h4>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?php if($sub_page == 'About Me'){echo 'active';} ?>">
                        <a href="<?php echo site_url('user/profil/aboutme') ?>">
                        <i class="fa fa-user"></i> About Me</a>
                    </li>
                    <li class="<?php if($sub_page == 'Orang Tua'){echo 'active';} ?>">
                        <a href="<?php echo site_url('user/profil/orang_tua') ?>">
                        <i class="fa fa-users"></i> Orang Tua</a>
                    </li>
                    <li class="<?php if($sub_page == 'Pasangan'){echo 'active';} ?>">
                        <a href="<?php echo site_url('user/profil/pasangan') ?>">
                        <i class="fa fa-venus-mars"></i> Pasangan</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->

    