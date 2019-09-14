
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
                    <form
                        class="form-horizontal"
                        action="<?php echo base_url('user/daftar');?>"
                        method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputNISN" class="col-sm-3 control-label">NISN</label>
                                <div class="col-sm-9">
                                    <input
										style="background: #AFD4A6"
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
            <?php if ($siswa['status'] == '1') {
            ?>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <h3>Siswa atas nama
                        <?php echo $siswa['nama_siswa'] ?>
                        dengan NISN
                        <?php echo $siswa['nisn'] ?>
                        telah melakukan pendaftaran</h3>
                </div>
            </div>
        <?php
            } else {
            ?>
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil Pencarian Peserta Didik</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form
						onsubmit="return validate()"
                        class="form-horizontal"
                        action="<?php echo base_url('user/prosesdaftar');?>"
                        method="POST"
                        id="form-daftar">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nisn" class="col-sm-3 control-label">NISN</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nisn"
                                            class="form-control"
                                            id="nisn"
                                            placeholder="NISN"
                                            value="<?= $siswa['nisn']?>"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_un" class="col-sm-3 control-label">Nomor UN</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="no_un"
                                            class="form-control"
                                            id="no_un"
                                            placeholder="Nomor UN SMP"
                                            value="<?= $siswa['no_un']?>"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_siswa" class="col-sm-3 control-label">Nama Siswa</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nama_siswa"
                                            class="form-control"
                                            id="nama_siswa"
                                            placeholder="Nama Siswa"
                                            value="<?= $siswa['nama_siswa']?>"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-sm-3 control-label">Alamat Siswa</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="alamat"
                                            class="form-control"
                                            id="alamat"
                                            placeholder="Alamat Siswa"
                                            value="<?= $siswa['alamat']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="label_npsn1" for="npsn1" class="col-sm-3 control-label">Mendaftar Pilihan 1</label>
                                    <div class="col-sm-9">
                                        <select
                                            name="npsn1"
                                            class="select2 form-control"
                                            style="width: 100%;"
                                            id="npsn1">
                                            <option value="">-- Pilih Sekolah --</option>
                                            <option value="<?= $user['npsn']?>"><?= $user['nama_sekolah']?>
                                                [Lokasi Daftar]</option>
                                            <?php 
                                          foreach ($skl as $skl):
                                          ?>
                                            <option value="<?= $skl['npsn']?>"><?= $skl['nama_sekolah']?></option>
                                            <?php
                                          endforeach;
                                          ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="label_jarak1" for="jarak1" class="col-sm-3 control-label">Jarak Sekolah</label>
                                    <div class="col-sm-4">
                                        <input
                                            type="number"
                                            name="jarak1"
                                            class="form-control"
                                            id="jarak1"
                                            placeholder="Jarak sekolah pilihan 1 dengan tempat tinggal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="label_npsn2" for="npsn2" class="col-sm-3 control-label">Mendaftar Pilihan 2</label>
                                    <div class="col-sm-9">
                                        <select
                                            name="npsn2"
                                            class="select3 form-control"
                                            style="width: 100%;"
                                            id="npsn2">
                                            <option value="">-- Pilih Sekolah --</option>
                                            <?php 
                                          foreach ($skl1 as $skl1) {
                                          ?>
                                            <option value="<?= $skl1['npsn']?>"><?= $skl1['nama_sekolah']?></option>
                                            <?php
                                          }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="label_jarak2" for="jarak2" class="col-sm-3 control-label">Jarak Sekolah</label>
                                    <div class="col-sm-4">
                                        <input
                                            type="number"
                                            name="jarak2"
                                            class="form-control"
                                            id="jarak2"
                                            placeholder="Jarak sekolah pilihan 1 dengan tempat tinggal"
                                            value="<?= $siswa['alamat']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_ayah" class="col-sm-3 control-label">Nama Ayah</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nama_ayah"
                                            class="form-control"
                                            id="nama_ayah"
                                            placeholder="Nama Ayah"
                                            value="<?= $siswa['nama_ayah']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hp" class="col-sm-3 control-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="hp"
                                            class="form-control"
                                            id="hp"
                                            placeholder="Nomor HP"
                                            value="<?= $siswa['hp']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_bin" class="col-sm-3 control-label">Nilai B. IND</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nilai_bin"
                                            class="form-control"
                                            id="nilai_bin"
                                            placeholder="Nilai Bahasa Indonesia"
                                            value="<?= $siswa['nilai_bin']?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_mat" class="col-sm-3 control-label">Nilai MTK</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nilai_mat"
                                            class="form-control"
                                            id="nilai_mat"
                                            placeholder="Nilai Matematika"
                                            value="<?= $siswa['nilai_mat']?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_big" class="col-sm-3 control-label">Nilai B. Inggris</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nilai_big"
                                            class="form-control"
                                            id="nilai_big"
                                            placeholder="Nilai Bahasa Inggris"
                                            value="<?= $siswa['nilai_big']?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_ipa" class="col-sm-3 control-label">Nilai IPA</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="nilai_ipa"
                                            class="form-control"
                                            id="nilai_ipa"
                                            placeholder="Nilai Ipa"
                                            value="<?= $siswa['nilai_ipa']?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sekolah_asal" class="col-sm-3 control-label">Sekolah Asal</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            name="sekolah_asal"
                                            class="form-control"
                                            id="sekolah_asal"
                                            placeholder="Sekolah Asal"
                                            value="<?= $siswa['sekolah_asal']?>"
                                            readonly>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info" id="tombol-daftar"><i class="fa fa-refresh fa-spin"></i> Daftar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>

            </div>
            <?php
            }
             ?>

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
	var npsn1 = document.getElementById('npsn1');
	var jarak1 = document.getElementById('jarak1');
	var npsn2 = document.getElementById('npsn2');
	var jarak2 = document.getElementById('jarak2');
	var label_npsn1 = document.getElementById('label_npsn1');
	var label_jarak1 = document.getElementById('label_jarak1');
	var label_npsn2 = document.getElementById('label_npsn2');
	var label_jarak2 = document.getElementById('label_jarak2');
	
	function validate() {
		if (npsn1.value == '') {
			alert ('Pilihan sekolah 1 belum dilakukan');
			npsn1.focus();
			label_npsn1.style.color = 'red';
			return false;
		} else if (npsn1.value != '') {
			label_npsn1.style.color = 'black';
		}
		
		if (jarak1.value == '') {
			alert('Jarak pilihan sekolah belum diisi');
			jarak1.focus();
			label_jarak1.style.color = 'red';
			return false;
		} else if (jarak1.value != '') {
			label_jarak1.style.color = 'black';
		}
		
		if (npsn2.value !='' && jarak2.value == '') {
			alert ('Jarak pilihan 2 belum diisi');
			jarak2.focus();
			label_jarak2.style.color = 'red';
			return false;
		} else if (npsn1.value != '') {
			label_jarak2.style.color = 'black';
		}
		
		if (npsn1.value == npsn2.value) {
			alert ('Pilihan satu dan dua tidakboleh sama');
			npsn2.focus();
			label_npsn1.style.color = 'red';
			label_npsn2.style.color = 'red';
			return false;
		} 
	}
</script>
