<?php foreach ($data as $data); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan_sukses');?>">
      <form action="<?=base_url('superuser/simpaninformasi');?>" method="POST">
      <div class="row">
        <div class="col-md-12">
        <button type="submit" class="btn btn-success btn-flat pull-right">
          Simpan
        </button>
        </div>
      </div>
      <br>
      <div class="row">
       
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Dasar Hukum
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea name="dasar_hukum" class="textarea" placeholder="Dasar hukum pelaksanaan kegiatan"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data->dasar_hukum; ?></textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->

        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Sambutan Kepala Dinas
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea name="sambutan_dinas" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data->sambutan_dinas; ?></textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Tujuan Kegiatan
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea name="tujuan" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data->tujuan; ?></textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
       
      </div>
      <!-- ./row -->
      </form>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


