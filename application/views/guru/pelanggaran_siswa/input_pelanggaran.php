<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Proses Pelanggaran Siswa</h4>
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
                            } elseif ($this->session->userdata('pesan') == 'sd') {
                                $pesan = "pelanggaran sudah terdaftar pada tanggal sekarang";
                                $warna = "alert-success";
                                $this->session->set_userdata('pesan', '');
                            } elseif ($this->session->userdata('pesan') == 'errPoint') {
                                $pesan = "Poin pelanggaran siswa tidak bisa lebih dari 100";
                                $warna = "alert-danger";
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
                            <div>
                                <p>
                                    <?php
                                    foreach ($siswa as $s) {
                                        $kelas = $s->kelas;
                                    ?>
                                        Nama Siswa : <?php echo $s->nama_siswa; ?><br>
                                        No Induk Siswa : <?php echo $s->no_induk; ?><br>
                                        Kelas Siswa : <?php echo $s->kelas; ?><br>

                                    <?php } ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="search_text" class="mb-2">Masukkan Kata Kunci Pelanggaran Siswa :</label>
                                <input type="text" class="form-control" name="search_text" id="search_text" required>
                            </div>

                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>pelanggaran_siswa_guru/cari_pelanggaran/<?php echo $this->uri->segment('3'); ?>/<?php echo $kelas; ?>",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>