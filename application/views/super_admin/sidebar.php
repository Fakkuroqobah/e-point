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
                    <a href="<?php echo base_url();?>dashboard/" class='sidebar-link'>
                    <i class="bi bi-grid" aria-hidden="true"></i><span>Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>siswa/index" class='sidebar-link'>
                    <i class="bi bi-person-badge" aria-hidden="true"></i><span>Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>guru/index" class='sidebar-link'>
                    <i class="bi bi-person-check" aria-hidden="true"></i><span>Guru</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>Kelas/index" class='sidebar-link'>
                    <i class="bi bi-backpack" aria-hidden="true"></i><span>Kelas</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>jenis_Pelanggaran/index" class='sidebar-link'>
                    <i class="bi bi-exclamation-circle" aria-hidden="true"></i><span>Jenis Pelanggaran</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>Pelanggaran/index" class='sidebar-link'>
                    <i class="bi bi-exclamation-triangle" aria-hidden="true"></i><span>Pelanggaran</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>Ketentuan/index" class='sidebar-link'>
                    <i class="bi bi-question-octagon" aria-hidden="true"></i><span>Ketentuan</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>pelanggaran_siswa/data_siswa" class='sidebar-link'>
                    <i class="bi bi-cone-striped" aria-hidden="true"></i><span>Data Pelanggaran Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>laporan/index" class='sidebar-link'>
                    <i class="bi bi-card-checklist" aria-hidden="true"></i><span>Laporan</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>admin/index" class='sidebar-link'>
                    <i class="bi bi-people" aria-hidden="true"></i><span>Pengguna</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>login/logout" class='sidebar-link'>
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