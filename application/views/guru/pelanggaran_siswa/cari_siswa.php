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
                            <form action="<?php echo base_url(); ?>pelanggaran_siswa_guru/cari_kelas" method="post">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>No Induk</th>
                                        <th>Kelas</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($siswa as $row) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->nama_siswa; ?></td>
                                            <td><?php echo $row->no_induk; ?></td>
                                            <td><?php echo $row->nama_kelas; ?></td>
                                            <td><a href="<?php echo base_url(); ?>pelanggaran_siswa_guru/input_pelanggaran/<?php echo $row->id_siswa; ?>" class="btn btn-danger btn-sm">proses</a></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>