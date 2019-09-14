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
              <button type="button"  class="btn btn-large pull-right btn-danger" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah Pengguna</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NPSN</th>
                  <th>Nama Sekolah</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Level</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <?php 
                $no = 1;
                foreach ($pengguna as $pengguna ) {
                ?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $pengguna->nama_pengguna; ?></td>
    <td><?php echo $pengguna->npsn; ?></td>
    <td><?php echo $pengguna->nama_sekolah; ?></td>
    <td><?php echo $pengguna->email; ?></td>
    <td>
        <?php if ($pengguna->status == '1') {
        ?>
            <a href="<?= base_url('')?>superuser/ubahstatus/<?= $pengguna->no;?>"><button class="btn btn-xs btn-success">Aktif</button></a>
        <?php
        } else {
        ?>
            <a href="<?= base_url('')?>superuser/ubahstatus/<?= $pengguna->no;?>"><button class="btn btn-xs btn-warning">NonAktif</button></a>
        <?php
        } ?>
        
    </td>
    <td>
        <?php if ($pengguna->level == '1') {
            echo "SuperUser";
        } elseif ($pengguna->level == '2') {
            echo "Kepala Sekolah";
        } elseif ($pengguna->level == '3') {
          echo "Operator Zonasi";
        } elseif ($pengguna->level == '4') {
          echo "Operator Prestasi";
        } elseif ($pengguna->level == '5') {
          echo "Operator Perpindahan Ortu";
        } ?>
    </td>
    <td>
        <a href="#"><button data-toggle="modal" href='#modal-id<?= $pengguna->no?>' class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</button></a> | <a href="<?= base_url()?>superuser/hapuspengguna/<?= $pengguna->no;?>" class="tombol-hapus btn btn-xs btn-danger " data-nama="<?= $pengguna->nama_pengguna;?>"><i class="fa fa-trash"></i> Hapus</a>
    </td>
</tr>


<div class="modal fade" id="modal-id<?= $pengguna->no?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ubah data <?= $pengguna->nama_pengguna?></h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>superuser/ubahdatapengguna" method="post">
      <input type="hidden" name="q" value="<?= $pengguna->no?>">
              <div class="box-body">
              <div class="form-group">
                  <label for="nama_pengguna" class="col-sm-4 control-label">Nama Pengguna</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pengguna" placeholder="Nama Pengguna" name="nama_pengguna" value="<?= $pengguna->nama_pengguna;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="npsn" class="col-sm-4 control-label">NPSN</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="npsn" placeholder="NPSN" name="npsn" value="<?= $pengguna->npsn;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="nama_sekolah" class="col-sm-4 control-label">Nama Sekolah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_sekolah" placeholder="Nama Sekolah" name="nama_sekolah" value="<?= $pengguna->nama_sekolah;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $pengguna->email;?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="level" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-8">
                    <select name="level" id="level" class="form-control">
                      <?php 
                      if ($pengguna->level == '1') {
                      ?>
                        <option value="1">SuperUser</option>
                      <?php
                      } elseif ($pengguna->level == '2') { ?>
                        <option value="2">Kepala Sekolah</option>
                     <?php } elseif ($pengguna->level == '3') { ?>
                        <option value="3">Operator Zonasi</option>
                     <?php } elseif ($pengguna->level == '4') { ?>
                        <option value="4">Operator Prestasi</option>
                     <?php } elseif ($pengguna->level == '5') { ?>
                        <option value="5">Operator Perpindahan Ortu</option>
                     <?php } ?>
                     <option value="1">SuperUser</option>
                     <option value="2">Kepala Sekolah</option>
                     <option value="3">Operator Zonasi</option>
                     <option value="4">Operator Prestasi</option>
                     <option value="5">Operator Perpindahan Ortu</option>
                    </select>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="password" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" required class="form-control" id="password" name="password" placeholder="Password">
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

<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah data pengguna</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?=base_url()?>superuser/tambahdatapengguna" method="post">
              <div class="box-body">
              <div class="form-group">
                  <label for="nama_pengguna" class="col-sm-4 control-label">Nama Pengguna</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pengguna" placeholder="Nama Pengguna" name="nama_pengguna" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="nama_sekolah" class="col-sm-4 control-label">Nama Sekolah</label>
                  <div class="col-sm-8">
                    <select name="npsn" id="npsn" class="form-control select2" style="width:100%" required>
                    <option value="">-- Pilih Sekolah --</option>
                    <?php 
                        foreach ($sekolah as $sklh) {
                          ?>
                            <option value="<?= $sklh->npsn;?>"><?= $sklh->nama_sekolah;?></option>
                          <?php
                        }
                    ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="level" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-8">
                    <select name="level" id="level" class="form-control" required>
                      <option value="">-- Pilih Level --</option>
                     <option value="1">SuperUser</option>
                     <option value="2">Kepala Sekolah</option>
                     <option value="3">Operator Zonasi</option>
                     <option value="4">Operator Prestasi</option>
                     <option value="5">Operator Perpindahan Ortu</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="password" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" required class="form-control" id="password" name="password" placeholder="Password">
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


