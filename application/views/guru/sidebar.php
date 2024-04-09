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
            <h5 class="mt-4 mb-0"><?php echo $this->session->userdata('nama_akun');  ?></h5>
        </div>
        <div class="sidebar-menu">
            <ul class="menu mt-0">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-journal-check"></i>
                        <span>Kelola Data Master</span>
                    </a>
                    <ul class="submenu submenu-closed" style="--submenu-height: 43px;">
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>siswa/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-person-badge" aria-hidden="true"></i><span>Siswa</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>guru/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-person-check" aria-hidden="true"></i><span>Guru</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>kelas/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-backpack" aria-hidden="true"></i><span>Kelas</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>jenis_Pelanggaran/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-exclamation-circle" aria-hidden="true"></i><span>Jenis Pelanggaran</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>pelanggaran/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-exclamation-triangle" aria-hidden="true"></i><span>Pelanggaran</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?php echo base_url();?>ketentuan/index" class='submenu-link d-flex'>
                                <i class="me-3 bi bi-question-octagon" aria-hidden="true"></i><span>Ketentuan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>aktifitas_guru/pilihan" class='sidebar-link'>
                    <i class="bi bi-people" aria-hidden="true"></i><span>Aktifitas</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>siswa_guru/index" class='sidebar-link'>
                    <i class="bi bi-person-badge" aria-hidden="true"></i><span>Pelanggaran Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>pelanggaran_siswa_guru/index" class='sidebar-link'>
                    <i class="bi bi-cone-striped" aria-hidden="true"></i><span>Input Pelanggaran Siswa</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>surat_pemanggilan/index" class='sidebar-link'>
                    <i class="bi bi-envelope" aria-hidden="true"></i><span>Surat Pemanggilan</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url();?>laporan_guru/index" class='sidebar-link'>
                    <i class="bi bi-card-checklist" aria-hidden="true"></i><span>Laporan</span></a>
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