<div class="page-heading">
    <div class="page-title mb-2">
        <div class="row">
            <div class="col-12">
                <h3>Kelas</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kelas</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-primary">Tambah</button>
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
                                            <th>Nama Kelas</th>
                                            <th>Nama Wali Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kelas as $k) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $k->nama_kelas; ?></td>
                                                <td><?php echo $k->nama_guru; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>kelas/hapus/<?php echo $k->id_kelas; ?>" class="btn btn-xs btn-danger">hapus</a>
                                                    <button class="btn btn-xs btn-warning view_detail" relid="<?php echo $k->id_kelas;  ?>">edit</button>
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
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>/kelas/tambah" method="post">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email">Nama Kelas:</label>
                        <input type="text" class="form-control" id="" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Nama Wali Kelas:</label>
                        <select class="form-control" name="wali_kelas" required>
                            <option>-- pilih wali kelas --</option>
                            <?php foreach ($guru as $g) { ?>
                                <option value="<?php echo $g->id_guru; ?>"><?php echo $g->nama_guru; ?></option>
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


<!-- modal tambah -->
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Kelas</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>/kelas/edit" method="post">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Nama Kelas:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Nama Wali Kelas:</label>
                        <select class="form-control" name="wali_kelas" id="wali_kelas" required>
                            <option>-- pilih wali kelas --</option>
                            <?php foreach ($guru as $g) { ?>
                                <option value="<?php echo $g->id_guru; ?>"><?php echo $g->nama_guru; ?></option>
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
                url: "<?php echo base_url(); ?>kelas/get_data_kelas_edit",
                data: {
                    id: id
                },
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(i, item) {
                        $('#id_kelas').val(response[i].id_kelas);
                        $('#nama').val(response[i].nama_kelas); //hold the response in id and show on popup
                        $('#wali_kelas').val(response[i].id_wali_kelas);
                        $("#modal_edit").modal('show');
                    });
                }
            });
        });
    });
</script>
