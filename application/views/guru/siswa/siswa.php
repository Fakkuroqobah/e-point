<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cari Kelas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>siswa_guru/cari_kelas" method="post">
                                <div class="form-group">
                                    <label for="kelas" class="form-label">Nama Kelas:</label>
                                    <select class="selectpicker form-control" name="kelas" required>
                                        <option>-- pilih kelas --</option>
                                        <?php foreach ($kelas as $k) { ?>
                                            <option value="<?php echo $k->id_kelas; ?>"><?php echo $k->nama_kelas; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pelanggaran Siswa</h4>
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
                                            <th>Keputusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $k) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $k->nama_siswa; ?></td>
                                                <td><?php echo $k->no_induk; ?></td>
                                                <td><?php echo $k->nama_kelas; ?></td>
                                                <td><?php echo $k->jumlah_point; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($ketentuan_point as $kp) {
                                                        if ($k->jumlah_point >= $kp->point_pelanggaran_rendah and $k->jumlah_point <= $kp->point_pelanggaran_tinggi) {
                                                            echo $kp->nama_ketentuan;
                                                        } else {
                                                            echo " ";
                                                        }
                                                    }
                                                    ?>
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