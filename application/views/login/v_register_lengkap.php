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
    <link href="<?php echo base_url(); ?>assets/new/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/new/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/new/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/new/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="register-logo" style="margin:15px">
        <a href="<?php echo site_url('login'); ?>">App<b>SilsilahKeluarga</b></a>
    </div>
    <div class="col-sm-offset-2 col-sm-8">
        <form class="form-horizontal" action="<?php echo site_url('login/proses_register_lengkap'); ?>" method="post">     
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Lengkapi Data Profilmu</b></div>
            <div class="panel-body">    
            <div>
                <?php echo $this->session->flashdata('message') ; ?> 
            </div>
            <div class="row">
                <div class="col-xs-3">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:150px; width:150px" alt="User profile picture">
                        <hr>
                        <h6>*Untuk mengganti Foto Profil silahkan lengkapi Data Anda dan Login</h6>
                </div>
                </div>
                <div class="col-xs-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Data Pribadi</a></li>
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php foreach ($result as $data) { ?>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data->id; ?>">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Agama</label>
                            <div class="col-sm-8">
                            <select class="form-control " style="width: 100%;" name="agama" required>
                                <option selected="selected"></option>
                                <option>Islam</option>
                                <option>Katholik</option>
                                <option>Hindhu</option>
                                <option>Budha</option>
                                <option>Konghuchu</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Golongan Darah</label>
                            <div class="col-sm-8">
                                <select class="form-control " style="width: 100%;" name="golongan_darah" required>
                                <option selected="selected"></option>
                                <option>A</option>
                                <option>B</option>
                                <option>AB</option>
                                <option>O</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">No Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telepon" placeholder="No Telepon" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Pendidikan</label>
                            <div class="col-sm-8">
                            <select class="form-control " style="width: 100%;" name="pendidikan" required>
                                <option selected="selected"></option>
                                <option>Tidak Sekolah</option>
                                <option>SD</option>
                                <option>SMP</option>
                                <option>SMA/SMK</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4</option>
                                <option>S1</option>
                                <option>S2</option>
                                <option>S3</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Pekerjaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="submit" class="btn btn-default btn-block">Simpan Data</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>   
            </div>
            </div>
        </form> 
    </div> 

</body>
</html>
                                 
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
    $(function () {
        $(".select2").select2();
        $('#datepicker').datepicker({
            autoclose: true
        });
    }
    </script>