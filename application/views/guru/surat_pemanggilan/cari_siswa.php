<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cari Siswa</h4>
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
                            <div class="form-group">
                                <label for="search_text" class="mb-2">Nama Siswa / No Induk / Nama Kelas :</label>
                                <input type="text" class="form-control" name="search_text" id="search_text" required>
                            </div>

                            <div id="result"></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                            <h4 class="card-title">Data Pemanggilan Orang Tua Siswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive" style="padding-top:20px;">
                                    <table class="table" id="datatables8">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Surat</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Dibuat oleh</th>
                                                <th>Tanggal Pemanggilan</th>
                                                <th>Tanggal Surat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($surat as $s) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $s->no_surat; ?></td>
                                                    <td><?php echo $s->nama_siswa; ?></td>
                                                    <td><?php echo $s->nama_kelas; ?></td>
                                                    <td><?php echo $s->nama_guru; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($s->tanggal_pemanggilan)) . ' ' . date('H:i', strtotime($s->jam_pemanggilan)) ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($s->tanggal_surat)) ?></td>
                                                    <td>
                                                        <div style="width: 150px">
                                                            <a href="<?php echo base_url(); ?>surat_pemanggilan/download/<?php echo $s->id_surat; ?>" target="__BLANK" class="btn btn-sm btn-success">Download</a>
                                                        </div>
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
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>surat_pemanggilan/cari_siswa",
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