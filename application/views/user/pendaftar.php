<style>
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    th {
        text-align: center;
    }
    .tengah {
        text-align: center;
    }
    .kanan {
        text-align: right;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <p id="tanggal" style="display:none"></p>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home</a>
            </li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan');?>">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Pendaftar</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table
                            id="example1"
                            class="table table-bordered table-hover display nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Sekolah Asal</th>
                                    <th>Alamat</th>
                                    <th>Jarak</th>
                                    <th>Pilihan Ke</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                  $no = 1;
                  foreach ($pendaftar as $key ) {
                  ?>
                                <tr>
                                    <td class="kanan"><?= $no++ ?></td>
                                    <td class="tengah"><?= $key['nisn'] ?></td>
                                    <td><?= $key['nama_siswa'] ?></td>
                                    <td></td>
                                    <td><?= $key['sekolah_asal'] ?></td>
                                    <td><?= $key['alamat'] ?></td>
                                    <td class="tengah"><?= $key['jarak'] ?></td>
                                    <td class="tengah"><?= $key['pilihan_ke'] ?></td>
                                    <td class="tengah">
                                        <button
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#modal-ubah<?=$key['no'];?>"
                                            class="btn btn-warning btn-xs btn-flat">
                                            <i class="fa fa-edit"></i>
                                            Ubah</button>
                                        |
                                        <a href="<?=base_url();?>user/proseshapuspendaftar/<?=$key['no'];?>" class="btn btn-danger btn-xs btn-flat tombol-hapus" data-nama="<?=$key['nama_siswa'];?>">
                                                <i class="fa fa-trash">
                                                    Hapus</i>
                                        </a>
                                        |
                                        <a href="">
                                            <button class="btn btn-primary btn-xs btn-flat">
                                                <i class="fa fa-print"></i>
                                                Bukti</button>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal ubah data -->
                                <div class="modal fade" id="modal-ubah<?=$key['no'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Default Modal</h4>
                                            </div>
                                                <form class="form-horizontal" action="<?=base_url('user/prosesubah');?>" method="POST">
                                                <input type="hidden" name="no" value="<?php echo $key['no'];?>">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="nisn" class="col-sm-4 control-label">NISN</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="nisn" placeholder="NISN" value="<?= $key['nisn'];?>" readonly
                                                                required>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                            <label for="nama_siswa" class="col-sm-4 control-label">Nama Siswa</label>
                                                            <div class="col-sm-8">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="nama_siswa"
                                                                    placeholder="Nama Siswa"
                                                                    value="<?=$key['nama_siswa'];?>"
                                                                    readonly
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                            <label for="sekolah_asal" class="col-sm-4 control-label">Sekolah Asal</label>
                                                            <div class="col-sm-8">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="sekolah_asal"
                                                                    placeholder="Sekolah Asal"
                                                                    value="<?=$key['sekolah_asal'];?>"
                                                                    readonly
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                            <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                                                            <div class="col-sm-8">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="alamat"
                                                                    id="alamat"
                                                                    placeholder="Alamat"
                                                                    value="<?=$key['alamat'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="form-group">
                                                            <label for="jarak" class="col-sm-4 control-label">Jarak</label>
                                                            <div class="col-sm-8">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="jarak"
                                                                    id="jarak"
                                                                    placeholder="Jarak"
                                                                    value="<?=$key['jarak'];?>"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-default btn-flat">Batal</button>
                                                        <button type="submit" class="btn btn-info pull-right btn-flat">Simpan</button>
                                                    </div>
                                                    <!-- /.box-footer -->
                                                </form>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir modal ubah data -->

                                <?php
                  }
                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->