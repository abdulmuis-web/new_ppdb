<!-- Main content -->

<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Pilih Sekolah</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">

                    <?php 
                echo form_open('hasil', 'post');
                ?>
 <div class="input-group">
                        <select class="form-control select2" name="npsn" style="width: 100%;" required="required">
                            <option value="">-- Pilih Sekolah --</option>
                            <?php 
                  foreach ($sekolah as $sekolah) {
                    ?>
                            <option value="<?= $sekolah['npsn']?>"><?= $sekolah['nama_sekolah']?></option>
                            <?php
                  }
                  ?>
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Go!</button>
                        </span>
                    </div>
                    <?php
                
                echo form_close();
                
                ?>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->