  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            Formulir Pendaftaran Peserta Didik Baru
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Beranda</a>
            </li>
            <li>
                <a href="#">Formulir</a>
            </li>
            <li class="active">Pendaftaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info" style="background: #A9F0E6">
            <div class="box-header with-border">
              <h3 class="box-title">Pencarian Peserta Didik</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('user/daftar');?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNISN" class="col-sm-2 control-label">NISN</label>
                  <div class="col-sm-10">
                    <input style="background: #AFD4A6" type="text" name="nisn" class="form-control" id="inputNISN" placeholder="NISN">
                    <small style="color:red"><?php echo form_error('nisn') ?></small>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="background: #A9F0E6">
                <button type="submit" class="btn btn-info pull-right">Cari</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          
        </div>
		<div class="col-md-6">
			<div class="alert alert-info alert-dismissible" style="text-align: justify">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-bullhorn"></i> Informasi!</h4>
                	Silahkan masukkan NISN peserta didik yang akan didaftarkan pada kolom disamping. Peserta didik hanya bisa melakukan pendaftaran satu kali, apabila terjadi kesalahan pada pilihan sekolah maka operator dinas provinsi yang berhak melakukan reset status pendaftaran peserta didik tersebut.
              </div>
		</div>
        <?php if ($this->session->flashdata('pesan')) {
        ?>
 <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('pesan');
             ?>
          </div>
        </div>
        <?php
        } ?>
       
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->