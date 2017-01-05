
    <div class="content-wrapper">
    <div class="container">
    <section class="content-header">
        <h1>
            <?php echo $page ?>
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Edit Username dan Password</a></li>
        </ol>
    </section>
    <section class="content">
    <div>
        <?php echo $this->session->flashdata('message') ?>
        <?php echo $this->session->flashdata('message1') ?>
    </div>
    <div class="tab-content">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#keluarga" data-toggle="tab">Ubah Username dan Password</a></li>
                </ul>
            <div class="tab-content">
            <div class="active tab-pane" id="keluarga">
            <div class="post"> 
            <hr>  
            <?php foreach ($result as $row) { ?>
                <form class="form-horizontal" action="<?php echo site_url('admin/profil/proses_edit_admin') ?>" method="post">  
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="id_anggota" id="regular1" value="<?php echo $row->id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $row->username ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" value="" placeholder="Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                           <button type="submit" class="btn btn-default"><i class="fa fa-save"> Simpan Perubahan</i></button>
                        </div>
                    </div>
                </form>
            <?php } ?>
            <hr>
        </div>
    </section>
    </div>
    </div>
    </section>
    </div>
    </div>
