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
            <li <?php if ($menu == 'user' && $sub_1 == '') { echo "class=active"; } ?>>
                <a href="<?=base_url('user')?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li <?php if ($menu == 'user' && $sub_1 == 'daftar') { echo "class=active"; } ?>>
                <a href="<?=base_url('user/daftar')?>">
                    <i class="fa fa-users"></i>
                    <span>Daftar</span>
                </a>
            </li>
            <li <?php if ($menu == 'user' && $sub_1 == 'pendaftar') { echo "class=active"; } ?>>
                <a href="<?=base_url('user/pendaftar')?>">
                    <i class="fa fa-user"></i>
                    <span>Data Pendaftar</span>
                </a>
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