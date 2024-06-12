<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Pelanggaran Siswa</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-sm-12" style="padding-bottom:20px;">
                                <a href="<?php echo base_url(); ?>laporan_guru/index" class="btn btn-danger">10 siswa point tertinggi</a>
                                <a href="<?php echo base_url(); ?>laporan_guru/siswa" class="btn btn-success">laporan rekap siswa</a>
                                <a href="<?php echo base_url(); ?>laporan_guru/pelanggaran?p=semua&taw=<?php echo date('Y-m-d'); ?>&tak=<?php echo date('Y-m-d'); ?>" class="btn btn-info">laporan pelanggaran</a>
                            </div>
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
                            <div class="table-responsive" style="padding-top:20px;">
                                <table class="table" id="datatables8">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>No Induk</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Point</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $k) {
                                            if ($k->jumlah_point == null or $k->jumlah_point == 0) {
                                                $jumlah_point = 0;
                                            } else {
                                                $jumlah_point = $k->jumlah_point;
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $k->nama_siswa; ?></td>
                                                <td><?php echo $k->no_induk; ?></td>
                                                <td><?php echo $k->kelas; ?></td>
                                                <td><?php echo $jumlah_point; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>pelanggaran_siswa_guru/hasil_input/<?php echo $k->id_siswa; ?>" class="btn btn-xs btn-primary">lihat</a>

                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>