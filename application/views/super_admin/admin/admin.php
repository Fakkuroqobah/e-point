<div class="page-heading">
    <div class="page-title mb-2">
        <div class="row">
            <div class="col-12">
                <h3>Akun</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Akun</h4>
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
                                            <th>Nama Akun</th>
                                            <th>Level Akun</th>
                                            <th>Status Akun</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach($admin as $k){
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $k->nama_admin; ?></td>
                                            <td><?php echo $k->level_akun; ?></td>
                                            <td><?php echo $k->status_akun; ?></td>
                                            <td>
                                            <a href="<?php echo base_url();?>admin/hapus/<?php echo $k->id_admin; ?>" class="btn btn-xs btn-danger">hapus</a>
                                            <button data-bs-toggle="modal" data-bs-target="#edit<?php echo $no; ?>" class="btn btn-xs btn-warning">edit</button>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
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
                    <h4 class="modal-title">Tambah Akun</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                </div>
                <form action="<?php echo base_url();?>/admin/tambah" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="email">Nama Akun :</label>
                            <input type="text" class="form-control" id="" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Username :</label>
                            <input type="text" class="form-control" id="" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Password :</label>
                            <input type="text" class="form-control" id="" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Level Akun :</label>
                            <select class="form-control" name="level" >
                                <option value="guru bk">Guru BK</option>
                                <option value="gds">Tim GDS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Status Akun :</label>
                            <select class="form-control" name="status" >
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                                
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

        <?php
        $no=1;
        foreach($admin as $a){
        ?>
         <!-- modal tambah -->
         <div class="modal fade" id="edit<?php echo $no; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Akun</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                </div>
                <form action="<?php echo base_url();?>/admin/edit/<?php echo $a->id_admin; ?>" method="post">
                <!-- Modal body -->
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="email">Nama Akun :</label>
                            <input type="text" class="form-control" id="" value="<?php echo $a->nama_admin; ?>" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Username :</label>
                            <input type="text" class="form-control" id="" value="<?php echo $a->username; ?>" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Password :</label>
                            <input type="text" class="form-control" id="" value="<?php echo $a->password; ?>" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Level Akun :</label>
                            <select class="form-control" name="level" >
                                <option value="guru bk" <?php if($a->level_akun=='guru bk'){ echo 'selected';}?>>guru bk</option>
                                <option value="tim gds" <?php if($a->level_akun=='tim gds'){ echo 'selected';}?>>GDS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Status Akun :</label>
                            <select class="form-control" name="status" >
                                <option value="aktif" <?php if($a->status_akun=='aktif'){ echo 'selected';}?>>Aktif</option>
                                <option value="tidak aktif" <?php if($a->status_akun=='tidak aktif'){ echo 'selected';}?>>Tidak Aktif</option>
                                
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
        <?php  $no++; } ?>