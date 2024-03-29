<div class="page-heading">
    <div class="page-title mb-2">
        <div class="row">
            <div class="col-12">
                <h3>Siswa</h3>
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
                            <form action="<?php echo base_url(); ?>siswa/cari_kelas" method="post">
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
                        <h4 class="card-title">Data Siswa</h4>
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
                                            <th>Jenis Kelamin</th>
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
                                                <td><?php echo $k->nama_kelas; ?></td>
                                                <td><?php echo $k->jenis_kelamin; ?></td>
                                                <td><?php echo date('d F Y', strtotime($k->tanggal_input)); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>siswa/hapus/<?php echo $k->id_siswa; ?>" class="btn btn-xs btn-danger">hapus</a>
                                                    <button class="btn btn-xs btn-warning view_detail" relid="<?php echo $k->id_siswa;  ?>">edit</button>
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>/siswa/tambah" method="post">
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
                            <option value="L">LAKI - LAKI</option>
                            <option value="P">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="selectpicker-modal" name="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php foreach ($kelas as $k) { ?>
                                <option data-subtext="<?php echo $k->nama_kelas; ?>" value="<?php echo $k->id_kelas; ?>"><?php echo $k->nama_kelas; ?></option>
                            <?php } ?>
                        </select>
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>siswa/import_data" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="form-control selectpicker-modal" name="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php
                            foreach ($kelas as $k) {
                                $where = "id_kelas='$k->id_kelas'";
                                $data = $this->m_point_pelanggaran->select('siswa', '*', $where, 'id_kelas', 'desc')->num_rows();

                            ?>
                                <option value="<?php echo $k->id_kelas; ?>"><?php echo $k->nama_kelas; ?> ( <?php echo $data; ?> )</option>
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
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>/siswa/edit" method="post">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Nama Siswa :</label>
                        <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" required>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">NIS :</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="L">LAKI - LAKI</option>
                            <option value="P">PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Kelas :</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option>-- pilih kelas --</option>
                            <?php foreach ($kelas as $k) { ?>
                                <option value="<?php echo $k->id_kelas; ?>" <?php if ($s->id_kelas == $k->id_kelas) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $k->nama_kelas; ?></option>
                            <?php } ?>
                        </select>
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
            var id = $(this).attr('relid'); //get the attribute value
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
                        $('#nama').val(response[i].nama_siswa); //hold the response in id and show on popup
                        $('#nis').val(response[i].nis);
                        $('#alamat').val(response[i].alamat);
                        $('#kelas').val(response[i].id_kelas);
                        $('#jenis_kelamin').val(response[i].jenis_kelamin);
                        $("#modal_edit").modal('show');
                    });
                }
            });
        });
    });
</script>
