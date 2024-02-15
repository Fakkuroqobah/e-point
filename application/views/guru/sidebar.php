<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href=""><img src="<?php echo base_url();?>assets/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>dashboard_guru/" class='sidebar-link'>
                    <i class="bi bi-grid" aria-hidden="true"></i><span>Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>siswa_guru/index" class='sidebar-link'>
                    <i class="bi bi-person-badge" aria-hidden="true"></i><span>Pelanggaran Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>point_pelanggaran_guru/index" class='sidebar-link'>
                    <i class="bi bi-exclamation-triangle" aria-hidden="true"></i><span>Point Pelanggaran</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>pelanggaran_siswa_guru/index" class='sidebar-link'>
                    <i class="bi bi-cone-striped" aria-hidden="true"></i><span>Input Pelanggaran Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>laporan_guru/index" class='sidebar-link'>
                    <i class="bi bi-card-checklist" aria-hidden="true"></i><span>Laporan</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>aktifitas_guru/pilihan" class='sidebar-link'>
                    <i class="bi bi-people" aria-hidden="true"></i><span>Aktifitas</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>login_guru/logout" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>