<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Silsilah KELUARGA</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-blue fixed layout-top-nav">
<div class="wrapper">
    <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
        <div class="navbar-header">
            <a href="<?php echo site_url('user/dashboard') ?>" class="navbar-brand">Silsilah<b>KELUARGA</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
		<?php  foreach ($result as $row) { 
			if($row->level=='1'){?>
            <ul class="nav navbar-nav">
                <li class="<?php if($page == 'Dashboard'){echo 'active';} ?>">
                    <a href="<?php echo site_url('user/dashboard') ?>">Dashboard</a></li>
                <li class="<?php if($page == 'Profil'){echo 'active';} ?>">
                    <a href="<?php echo site_url('user/profil/aboutme') ?>">Profil</a></li>
                <li class="<?php if($page == 'Keluarga'){echo 'active';} ?>">
                    <a href="<?php echo site_url('user/keluarga') ?>">Keluarga</a></li>
            </ul>
		<?php } else{ ?>
			<ul class="nav navbar-nav">
                <li class="<?php if($page == 'Dashboard'){echo 'active';} ?>">
                    <a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
                <li class="<?php if($page == 'Profil'){echo 'active';} ?>">
                    <a href="<?php echo site_url('admin/profil/aboutme') ?>">Profil</a></li>
            </ul>
		<?php } }?>
		<?php  foreach ($result as $row) { 
			if($row->level=='1'){?>
            <form action="<?php echo site_url('user/dashboard/cari_user'); ?>"class="navbar-form navbar-left" role="search" method = "GET">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cari" name="cari" id="cari">
                </div>
            </form>
		<?php } else{ ?>
            <form action="<?php echo site_url('admin/cari/cari_user'); ?>"class="navbar-form navbar-left" role="search" method = "GET">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cari" name="cari" id="cari">
                </div>
            </form>
		  <?php } }?>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php  foreach ($result as $row) { ?>
                    <?php if($row->foto == ''){?>
                        <img class="user-image" alt="User Image"
                            src="<?php echo base_url();?>assets/img/avatar.png" >      
                    <?php } else {?>
                        <img class="user-image" alt="User Image"
                            src="<?php echo base_url();?>assets/uploads/<?php echo $row->foto;?>" >
                    <?php } ?>
                <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('nama_lengkap')); ?></span>
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li class="user-header">
                <?php if($row->foto == ''){?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>assets/img/avatar.png" >      
                <?php } else {?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>assets/uploads/<?php echo $row->foto;?>" >
                    <?php } ?>
                <?php } ?>
                <p><?php echo ucfirst($this->session->userdata('nama_lengkap')); ?></p>
                </li>
                <li class="user-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#"></a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#"></a>
                    </div>
                </div>
                </li>
                <li class="user-footer">
                <?php foreach ($result as $row) {
                if($row->level=='1'){?>
                    <div class="pull-left">
                        <a href="<?php echo site_url('user/profil/aboutme') ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                <?php }else{ ?>
                    <div class="pull-left">
                        <a href="<?php echo site_url('admin/profil/aboutme') ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                <?php }} ?>
                <div class="pull-right">
                    <a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>




