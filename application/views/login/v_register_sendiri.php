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

    <div class="col-sm-offset-1 col-sm-10">
        <form class="form-horizontal" action="<?php echo site_url('login/register_sendiri'); ?>" method="post">     
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
                        <form class="form" action="" enctype="multipart/form-data" method="post">
                            <input type="hidden" class="form-control" name="id" id="regular1" value="">
                            <input type="hidden" class="form-control" name="foto" id="regular1" value="">
                            <input type="file" class="form-control" name="filefoto" />
                            <h6>*pilih Choose File kemudian ganti foto</h6>
                            <button class="btn btn-default btn-flat" type="submit">Simpan</button>
                        </form>
                </div>
                </div>

                <div class="col-xs-9">
                <?php foreach ($result as $data) { ?>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data->id; ?>">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Data Pribadi</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Orang Tua</a></li>
                    </ul>
                    <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="id_anggota" id="regular1">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Agama</label>
                            <div class="col-sm-10">
                            <select class="form-control " style="width: 100%;" name="agama">
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
                            <label for="inputName" class="col-sm-2 control-label">Golongan Darah</label>
                            <div class="col-sm-10">
                                <select class="form-control " style="width: 100%;" name="golongan_darah">
                                <option selected="selected"></option>
                                <option>A</option>
                                <option>B</option>
                                <option>AB</option>
                                <option>O</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telepon" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Pendidikan</label>
                            <div class="col-sm-10">
                            <select class="form-control " style="width: 100%;" name="pendidikan">
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
                            <label for="inputName" class="col-sm-2 control-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pekerjaan" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <a href="tab_2" class="btn btn-warning" data-toggle="tab">Selanjutnya <i class="fa fa-arrow-right"></i></a>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id_anggota" id="regular1">
                            </div>
                        </div>
                        <hr>
                        <h4 align="center">Data Ayah</h4>
                        <hr>                        
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Nama Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lengkap" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tanggal_lahir"  id="datepicker">
                            </div>
                        </div>
                        <hr>
                        <h4 align="center">Data Ibu</h4>
                        <hr>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lengkap" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tanggal_lahir"  id="datepicker">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>


                                

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