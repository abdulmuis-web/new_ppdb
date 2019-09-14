<!-- Main content -->
<?php 
foreach ($provinsi as $prov );
foreach ($informasi as $info );
 ?>
<section class="content">
    <div
        class="text-center"
        style="padding: 10px 20px 20px 20px; margin:0px 20px 20px 20px; border-radius: 15px">
        <h1>Selamat datang !</h1>
        <p>Aplikasi Penerimaan Peserta Didik Baru
            <?= $prov['nama_prov'] ?>
            Jalur Zonasi</p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h3>Dasar Hukum</h3>
        <p style="text-align:justify"><?php echo substr($info['dasar_hukum'],0,180).".... " ?></p>
        <button type="button" class="btn btn-primary"class="btn btn-primary" data-toggle="modal" data-target="#dasarHukum">View details &raquo;</button>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h3>Sambutan Kepala Dinas</h3>
        <p style="text-align:justify"><?php echo substr($info['sambutan_dinas'],0,180).".... " ?></p>
        <button type="button" class="btn btn-primary"class="btn btn-primary" data-toggle="modal" data-target="#sambutan">View details &raquo;</button>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h3>Tujuan Kegiatan</h3>
        <p style="text-align:justify"><?php echo substr($info['tujuan'],0,180).".... " ?></p>
        <button type="button" class="btn btn-primary"class="btn btn-primary" data-toggle="modal" data-target="#tujuan">View details &raquo;</button>
    </div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<!-- Modal Dasar Hukum -->
<div class="modal fade" id="dasarHukum" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Dasar Hukum</h4>
        </div>
        <div class="modal-body">
          <p align="justify"><?php echo $info['dasar_hukum']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<!-- Modal  Sambutan -->
<div class="modal fade" id="sambutan" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sambutan Kepala Dinas</h4>
        </div>
        <div class="modal-body">
          <p align="justify"><?php echo $info['sambutan_dinas']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<!-- Modal Tujuan Pelaksanaan -->
<div class="modal fade" id="tujuan" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tujuan Pelaksanaan</h4>
        </div>
        <div class="modal-body">
          <p align="justify"><?php echo $info['tujuan']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>