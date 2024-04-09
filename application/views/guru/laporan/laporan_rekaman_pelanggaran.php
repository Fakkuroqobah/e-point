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
                            <?php if(isset($nama_kelas)) : ?>
                                <div class="text-left">Laporan Pelanggaran Siswa Kelas <?php echo $nama_kelas; ?></div>
                            <?php endif; ?>
                            <div class="text-left">Laporan Pelanggaran Siswa berdasarkan " <?php echo $nama_pelanggaran; ?>"</div>
                            <div class="text-left mb-3">Tertanggal "<?php echo $keterangan_tanggal; ?>"</div>
                            <button data-bs-toggle="modal" data-bs-target="#modal_cari" class="btn btn-primary">cari laporan</button>
                            <div class="table-responsive" style="padding-top:20px;">
                                <table class="table" id="datatables8">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>No Induk</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Pelanggaran</th>
                                            <th>Pelanggaran</th>
                                            <th>Nama Pelapor</th>
                                            <th>Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pelanggaran_detail as $p) {

                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $p->nama_siswa; ?></td>
                                                <td><?php echo $p->no_induk; ?></td>
                                                <td><?php echo $p->nama_kelas; ?></td>
                                                <td><?php echo $p->tanggal_pelanggaran; ?></td>
                                                <td><?php echo $p->nama_pelanggaran; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($guru as $g) {
                                                        if ($g->id_guru == $p->id_pelapor) {
                                                            echo $g->nama_guru;
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $p->point; ?></td>
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

<!-- modal tambah -->
<div class="modal fade" id="modal_cari">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cari Laporan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>laporan/pelanggaran" method="get">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Pelanggaran:</label>
                        <select class="form-control" name="p" required>
                            <option value="semua">-- semua pelanggaran --</option>
                            <?php foreach ($pelanggaran as $g) { ?>
                                <option value="<?php echo $g->id_pelanggaran; ?>"><?php echo $g->nama_pelanggaran; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Tanggal Awal:</label>
                        <input type="date" class="form-control" name="taw" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Point Tinggi:</label>
                        <input type="date" class="form-control" name="tak" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cari</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah -->
