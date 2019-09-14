<?php 
$menu  = strtolower($this->uri->segment(1));
$sub_1 = strtolower($this->uri->segment(2));
$sub_2 = strtolower($this->uri->segment(3));
?>

<div class="wrapper">
<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo base_url()?>" class="navbar-brand"><b>PPDB_</b>Kalsel</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php if ($menu == '' | $menu == 'home') { echo "class=active"; } ?>><a href="<?=base_url();?>">Home <span class="sr-only">(current)</span></a></li>
          <li <?php if ($menu == 'petunjuk') { echo "class=active"; } ?>><a href="<?=base_url('petunjuk');?>">Petunjuk dan Jadwal</a></li>
          <li <?php if ($menu == 'sekolah') { echo "class=active"; } ?>><a href="<?=base_url('sekolah');?>">Penyelenggara</a></li>
          <li <?php if ($menu == 'hasil') { echo "class=active"; } ?>><a href="<?=base_url('hasil');?>">Hasil Sementara</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            <?php if ($menu == '' | $menu == 'home') {
                echo "Halaman Utama";
            } elseif ($menu == 'petunjuk') {
                echo "Petunjuk dan Jadwal Pendaftaran";
            } elseif ($menu == 'sekolah') {
              echo "Sekolah Penyelenggara";
            }  elseif ($menu == 'hasil') {
              echo "Hasil Seleksi Sementara";
            }
             ?>
        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>