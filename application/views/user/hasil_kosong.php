<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pencarian Peserta Didik</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form
                        class="form-horizontal"
                        action="<?php echo base_url('user/daftar');?>"
                        method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputNISN" class="col-sm-2 control-label">NISN</label>
                                <div class="col-sm-10">
                                    <input
                                        type="text"
                                        name="nisn"
                                        class="form-control"
                                        id="inputNISN"
                                        placeholder="NISN">
                                    <small style="color:red"><?php echo form_error('nisn') ?></small>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Cari</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>

            </div>
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil Pencarian Peserta Didik</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                      <h3 style="color:red">NISN "<?= $nisn ?>" tidak ditemukan..!</h3>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->