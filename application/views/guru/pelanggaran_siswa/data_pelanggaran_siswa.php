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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cari Kelas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>pelanggaran_siswa/cari_kelas" method="post">
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
                            <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">Tambah</button>
                            <button data-bs-toggle="modal" data-bs-target="#import" class="btn btn-sm btn-primary">Import data</button>
                            <a href="<?php echo base_url(); ?>siswa/download_file" class="btn btn-sm btn-primary">Download Format Import data</a>
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
                                                <td><?php echo $k->nama_kelas; ?></td>
                                                <td><?php echo $jumlah_point; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>pelanggaran_siswa/hasil_input/<?php echo $k->id_siswa; ?>" class="btn btn-xs btn-primary">lihat</a>

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