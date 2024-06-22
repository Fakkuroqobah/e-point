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
                            <form action="<?php echo base_url(); ?>siswa/cari_kelas" method="post">
                                <div class="form-group">
                                    <label for="kelas" class="form-label">Nama Kelas:</label>
                                    <select class="selectpicker form-control" name="kelas" required>
                                        <option>-- pilih kelas --</option>
                                        <?php foreach ($kelas as $k) { ?>
                                            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
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
                                }elseif($this->session->userdata('pesan') == 'errNis') {
                                    $pesan = "Terdapat No induk siswa yang sama";
                                    $warna = "alert-danger";
                                    $this->session->set_userdata('pesan', '');
                                }elseif($this->session->userdata('pesan') == 'errUsernameOrtu') {
                                    $pesan = "Terdapat Username orang tua yang sama";
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
                            <div class="table-responsive" style="padding-top:20px;">
                                <table class="table" id="datatables8">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>No Induk</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Ortu</th>
                                            <th>No Hp Ortu</th>
                                            <th>Tanggal Input</th>
                                            <th>Opsi</th>
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
                                                <td><?php echo $k->kelas; ?></td>
                                                <td><?php echo $k->jenis_kelamin; ?></td>
                                                <td><?php echo $k->nama_ortu; ?></td>
                                                <td><?php echo $k->no_hp; ?></td>
                                                <td><?php echo date('d F Y', strtotime($k->tanggal_input)); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>siswa/hapus/<?php echo $k->id_siswa; ?>" class="btn btn-xs btn-danger">hapus</a>
                                                    <button type="button" class="btn btn-xs btn-warning view_detail" relid="<?php echo $k->id_siswa;  ?>">edit</button>
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

<!-- modal tambah -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo base_url(); ?>siswa/tambah" method="post">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email">Nama Siswa :</label>
                        <input type="text" class="form-control" id="" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">NIS :</label>
                        <input type="text" class="form-control" id="" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat :</label>
                        <input type="text" class="form-control" id="" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option  value="Laki-laki">LAKI - LAKI</option>
                            <option  value="Perempuan">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="selectpicker-modal" data-show-subtext="true" data-live-search="true" name="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php foreach ($kelas as $k) { ?>
                                <option data-subtext="<?php echo $k; ?>" value="<?php echo $k; ?>"><?php echo $k; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="email">Nama Ortu :</label>
                        <input type="text" class="form-control" id="" name="nama_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin:</label>
                        <select name="jenis_kelamin_ortu" id="" class="form-control" required>
                            <option  value="Laki-laki">LAKI - LAKI</option>
                            <option  value="Perempuan">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">No Telepon :</label>
                        <input type="number" class="form-control" id="" name="no_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat :</label>
                        <input type="text" class="form-control" id="" name="alamat_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Username :</label>
                        <input type="text" class="form-control" id="" name="username_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Password :</label>
                        <input type="text" class="form-control" id="" name="password_ortu" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah -->

<!-- modal import -->
<div class="modal fade" id="import">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Import Data</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo base_url(); ?>siswa/import_data" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="form-control selectpicker-modal-import" data-show-subtext="true" data-live-search="true" name="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php
                            foreach ($kelas as $k) {
                                $where = "kelas='$k'";
                                $data = $this->m_point_pelanggaran->select('siswa', '*', $where, 'kelas', 'desc')->num_rows();

                            ?>
                                <option value="<?php echo $k; ?>"><?php echo $k; ?> ( <?php echo $data; ?> )</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">File :</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal import -->

<!-- modal tambah -->
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Siswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo base_url(); ?>siswa/edit" method="post">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Nama Siswa :</label>
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" required>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">NIS :</label>
                        <input type="text" class="form-control" id="nis" name="nis" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option  value="Laki-laki">LAKI - LAKI</option>
                            <option  value="Perempuan">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php foreach ($kelas as $k) { ?>
                                <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="email">Nama Ortu :</label>
                        <input type="hidden" class="form-control" id="id_ortu" name="id_ortu" required>
                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin:</label>
                        <select name="jenis_kelamin_ortu" id="jenis_kelamin_ortu" class="form-control" required>
                            <option  value="Laki-laki">LAKI - LAKI</option>
                            <option  value="Perempuan">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">No Telepon :</label>
                        <input type="number" class="form-control" id="no_ortu" name="no_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat :</label>
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Username :</label>
                        <input type="text" class="form-control" id="username_ortu" name="username_ortu" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Password :</label>
                        <input type="text" class="form-control" id="password_ortu" name="password_ortu" required>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tambah -->

<script type="text/javascript">
    // load data for edit
    $(document).ready(function() {
        $('.view_detail').click(function() {
            var id = $(this).attr('relid');
            $.ajax({
                url: "<?php echo base_url(); ?>siswa/get_data_siswa_edit",
                data: {
                    id: id
                },
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(i, item) {
                        $('#id_siswa').val(response[i].id_siswa);
                        $('#nama').val(response[i].nama_siswa);
                        $('#nis').val(response[i].no_induk);
                        $('#alamat').val(response[i].alamat);
                        $('#kelas').val(response[i].kelas);
                        $('#jenis_kelamin').val(response[i].jenis_kelamin);

                        $('#nama_ortu').val(response[i].nama_ortu);
                        $('#jenis_kelamin_ortu').val(response[i].jk_ortu);
                        $('#no_ortu').val(response[i].no_hp);
                        $('#alamat_ortu').val(response[i].alamat_ortu);
                        $('#username_ortu').val(response[i].username_ortu);
                        $('#password_ortu').val(response[i].password_ortu);

                        $('#modal_edit').modal('show');
                    });
                }
            });
        });
    });
</script>