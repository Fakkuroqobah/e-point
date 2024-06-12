<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Pemanggilan Orang Tua Siswa</h4>
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

                            <form action="<?php echo base_url() ?>surat_pemanggilan/input_pelanggaran_siswa" method="POST">
                                <input type="hidden" value="<?php echo $siswa->id_ortu ?>" name="id_ortu">
                                <div class="form-group">
                                    <label for="nama_siswa" class="mb-2">Nama Siswa</label>
                                    <input type="text" class="form-control" value="<?php echo $siswa->nama_siswa ?>" name="nama_siswa" id="nama_siswa" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kelas" class="mb-2">Kelas</label>
                                    <input type="text" class="form-control" value="<?php echo $siswa->kelas ?>" name="kelas" id="kelas" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_ortu" class="mb-2">Nama Orang Tua Siswa</label>
                                    <input type="text" class="form-control" value="<?php echo $siswa->nama_ortu ?>" name="nama_ortu" id="nama_ortu" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_surat" class="mb-2">Nomor Surat</label>
                                    <input type="text" class="form-control" name="no_surat" id="no_surat" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tanggal" class="mb-2">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jam" class="mb-2">Jam</label>
                                            <input type="time" class="form-control" name="jam" id="jam" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>