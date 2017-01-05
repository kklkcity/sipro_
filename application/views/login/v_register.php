<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Register</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
  	<link rel="stylesheet" href="<?=base_url();?>/assets/bootstrap/css/bootstrap.min.css">
  	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  	<link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/AdminLTE.min.css">
</head>

<body class="login-page">
    <div class="register-logo" style="margin:15px">
    	<a href="<?php echo site_url('login'); ?>">App<b>SilsilahKeluarga</b></a>
  	</div>
    <div class="col-sm-offset-3 row col-sm-6">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Daftar Member Baru</b></div>
                <div class="panel-body">
                <div>
                    <?php echo $this->session->flashdata('message1') ; ?> 
                    <?php echo $this->session->flashdata('message2') ; ?> 
                </div>
                <div class="row" style="margin-top:15px">
                <form class="form-horizontal" action="<?php echo base_url();?>login/proses_register" method="post">  
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="id" placeholder="ID" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">NO KTP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_ktp" placeholder="NO KTP" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" required/>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal_lahir"  id="datepicker" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" placeholder="Username" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Status Nikah</label>
                        <div class="col-sm-8">
                        <select class="form-control" style="width: 100%;" name="status_nikah" required/>
                            <option>Nikah</option>
                            <option>Belum</option>
                        </select>  
                        </div>
                    </div>              
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="level" value="1">
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-default btn-block">Daftar</button>
                        </div>
                    </div>
                </form>   
                <div align="center" style="font-size:15px; margin:20px">  
        	       <a href="<?php echo site_url('login'); ?>">Login, untuk yang sudah menjadi Member</a> 
                </div>

	</div>

</div>
</body>
</html>

    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"> </script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"> </script>