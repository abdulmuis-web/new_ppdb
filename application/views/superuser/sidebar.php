<?php 
$menu  = strtolower($this->uri->segment(1));
$sub_1 = strtolower($this->uri->segment(2));
$sub_2 = strtolower($this->uri->segment(3));
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if ($menu == 'superuser' && $sub_1 == '') { echo "class=active"; } ?>>
                <a href="<?=base_url('superuser')?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'informasi') { echo "class=active"; } ?>>
                <a href="<?=base_url('superuser/informasi')?>">
                    <i class="fa fa-bullhorn"></i>
                    <span>Informasi</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'daftarsekolah') { echo "class=active"; } ?>>
                <a href="<?=base_url('superuser/daftarsekolah')?>">
                    <i class="fa fa-building"></i>
                    <span>Daftar Sekolah</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'daftarpengguna') { echo "class=active"; } ?>>
                <a href="<?=base_url('superuser/daftarpengguna')?>">
                    <i class="fa fa-users"></i>
                    <span>Daftar Pengguna</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'backupdb') { echo "class=active"; } ?>>
                <a target="_blank" href="<?=base_url('superuser/backupdb')?>">
                    <i class="fa fa-database"></i>
                    <span>Backup Database</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'importcalon') { echo "class=active"; } ?>>
                <a href="<?=base_url('superuser/importcalon')?>">
                    <i class="fa fa-users"></i>
                    <span>Import Data</span>
                </a>
            </li>
            <li <?php if ($menu == 'superuser' && $sub_1 == 'buktidaftar' || $sub_1 == 'pendaftar') { echo "class=active treeview menu"; } ?> class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i>
                    <span>Print</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?php if ($sub_1 == 'buktidaftar') {
                        echo "class=active";
                    } ?>>
                        <a href="<?=base_url('superuser/buktidaftar')?>">
                            <i class="fa fa-circle-o"></i>
                            Bukti Pendaftaran</a>
                    </li>
                    <li <?php if ($sub_1 == 'pendaftar') {
                        echo "class=active";
                    } ?>>
                        <a href="<?=base_url('superuser/pendaftar')?>">
                            <i class="fa fa-circle-o"></i>
                            Pendaftar</a>
                    </li>
                </ul>
            </li>
            <li class="header"></li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Documentation</span></a>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>