<div class="page-heading">
    <div class="page-title mb-2">
        <div class="row">
            <div class="col-12">
                <h3>Pelanggaran Siswa</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Review Data Pelanggaran Siswa</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php
                            if ($this->session->userdata('pesan') == true) {
                                if ($this->session->userdata('pesan') == 't') {
                                    $pesan = "data berhasil ditambahkan";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan', '');
                                } elseif ($this->session->userdata('pesan') == 'e') {
                                    $pesan = "data berhasil diedit";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan', '');
                                } elseif ($this->session->userdata('pesan') == 'h') {
                                    $pesan = "data berhasil dihapus";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan', '');
                                } elseif ($this->session->userdata('pesan') == 'b') {
                                    $pesan = $this->session->userdata('jum_data') . " siswa kelas " . $this->session->userdata('nama_kelas') . " berhasil diupload ";
                                    $warna = "alert-success";
                                    $this->session->set_userdata('pesan', '');
                                    $this->session->set_userdata('jum_data', '');
                                    $this->session->set_userdata('nama_kelas', '');
                                }
                            ?>
                                <br>
                                <div class="alert <?php echo $warna; ?> alert-dismissible" style="margin-top:10px;">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <?php echo $pesan; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="mb-3">
                                <p>
                                    <?php
                                    foreach ($siswa as $s) {
                                        $id_kelas = $s->id_kelas;
                                    ?>
                                        <?php
                                        foreach ($ketentuan_point as $kp) {
                                            if ($s->total_point >= $kp->point_pelanggaran_rendah and $s->total_point <= $kp->point_pelanggaran_tinggi) {
                                                $ketentuan = $kp->nama_ketentuan;
                                            }
                                        }
                                        ?>
                                        Nama Siswa : <?php echo $s->nama_siswa; ?><br>
                                        No Induk Siswa : <?php echo $s->no_induk; ?><br>
                                        Kelas Siswa : <?php echo $s->nama_kelas; ?><br>
                                        Total Point Pelanggaran : <?php echo $s->jumlah_point; ?><br>
                                        Keputusan Pelanggaran : diberikan <?php echo $ketentuan; ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggaran</th>
                                        <th>Tanggal Pelanggaran</th>
                                        <th>Nama Pelapor</th>
                                        <th>Level Pelapor</th>
                                        <th>Point</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($pelanggaran_siswa as $ps) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $ps->nama_pelanggaran; ?></td>
                                            <td><?php echo date('d F Y', strtotime($ps->tanggal_pelanggaran)); ?></td>
                                            <td>
                                                <?php
                                                if ($ps->level_pelapor == 'guru') {
                                                    foreach ($guru as $g) {
                                                        if ($g->id_guru == $ps->id_pelapor) {
                                                            echo $g->nama_guru;
                                                            break;
                                                        }
                                                    }
                                                } elseif ($ps->level_pelapor == 'gds') {
                                                    foreach ($gds as $gd) {
                                                        if ($gd->id_admin == $ps->id_pelapor) {
                                                            echo $g->nama_admin;
                                                            break;
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $ps->level_pelapor; ?></td>
                                            <td><?php echo $ps->point; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>pelanggaran_siswa/hapus_pelanggaran/<?php echo $this->uri->segment('3'); ?>/<?php echo $ps->id_pelanggaran_siswa; ?>" class="btn btn-xs btn-danger">hapus</a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>