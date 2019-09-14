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
        <div class="col-xs-12">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan_sukses');?>">
        </div>
          <?php 
          if ($this->session->flashdata('pesan_sukses')) {
          ?>
            
            <!-- <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= $this->session->flashdata('pesan_sukses');
               ?>
            </div> -->
            
          <?php
          } elseif ($this->session->flashdata('pesan_gagal')) {
          ?>
            <!-- <div class="alert alert-warnings">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= $this->session->flashdata('pesan_gagal');
               ?>
            </div> -->
          <?php
          }
          ?>
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
              <br>
              <button type="button"  class="btn btn-large pull-right btn-danger" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah Sekolah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kabupaten</th>
                  <th>NPSN</th>
                  <th>Nama Sekolah</th>
                  <th>Alamat</th>
                  <th>Kuota</th>
                  <th>Kontak</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <?php 
                $no = 1;
                foreach ($sekolah as $sekolah ) {
                ?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $sekolah->kabupaten; ?></td>
    <td><?php echo $sekolah->npsn; ?></td>
    <td><?php echo $sekolah->nama_sekolah; ?></td>
    <td><?php echo $sekolah->alamat; ?></td>
    <td><?php echo $sekolah->kuota; ?></td>
    <td><?php echo $sekolah->kontak; ?></td>
    <td>
        <a href="#"><button data-toggle="modal" href='#modal-id<?= $sekolah->no?>' class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</button></a> | <a href="<?= base_url('')?>superuser/hapussekolah/<?= $sekolah->no;?>" class="btn btn-xs btn-danger tombol-hapus" data-nama="<?= $sekolah->nama_sekolah;?>"><i class="fa fa-trash"></i> Hapus</a>
    </td>
</tr>


<div class="modal fade" id="modal-id<?= $sekolah->no?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ubah data <?= $sekolah->nama_sekolah?></h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>superuser/ubahdatasekolah" method="post">
      <input type="hidden" name="q" value="<?= $sekolah->no?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="kabupaten" class="col-sm-4 control-label">Kabupaten</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kabupaten" placeholder="Nama Pengguna" name="kabupaten" value="<?= $sekolah->kabupaten;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="npsn" class="col-sm-4 control-label">NPSN</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="npsn" placeholder="NPSN" name="npsn" value="<?= $sekolah->npsn;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="nama_sekolah" class="col-sm-4 control-label">Nama Sekolah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Nama Sekolah" name="nama_sekolah" value="<?= $sekolah->nama_sekolah;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?= $sekolah->alamat;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="kuota" class="col-sm-4 control-label">Kuota</label>
                  <div class="col-sm-8">
                    <input type="number" required class="form-control" id="kuota" name="kuota" placeholder="Kuota" value="<?= $sekolah->kuota;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="kontak" class="col-sm-4 control-label">Kontak</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kontak" placeholder="Kontak" name="kontak" value="<?= $sekolah->kontak;?>">
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

                <?php
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>      
      <!-- /.row -->
    </section>
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-tambah" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah data Sekolah</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>superuser/tambahdatasekolah" method="post">
      
              <div class="box-body">
              <div class="form-group">
                  <label for="kabupaten" class="col-sm-4 control-label">Kabupaten</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kabupaten" placeholder="Nama Kabupaten" name="kabupaten">
                  </div>
                </div>
                <div class="form-group">
                  <label for="npsn" class="col-sm-4 control-label">NPSN</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="npsn" placeholder="NPSN" name="npsn">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_sekolah" class="col-sm-4 control-label">Nama Sekolah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Nama Sekolah" name="nama_sekolah">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kuota" class="col-sm-4 control-label">Kuota</label>
                  <div class="col-sm-8">
                    <input type="number" required class="form-control" id="kuota" name="kuota" placeholder="Kuota">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kontak" class="col-sm-4 control-label">Kontak</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kontak" placeholder="Kontak" name="kontak">
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


