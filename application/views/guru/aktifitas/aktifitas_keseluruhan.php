<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Aktifitas Keseluruhan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-md-12" style="padding-bottom:10px;">
                                <a href="<?php echo base_url(); ?>aktifitas_guru/pilihan" class="btn btn-primary ">Aktifitas Pribadi</a>
                                <a href="<?php echo base_url(); ?>aktifitas_guru/keseluruhan" class="btn btn-primary ">Halaman Aktifitas Keseluruan</a>
                            </div>
                            <div class="table-responsive" style="padding-top:20px;">
                                <table class="table" id="datatables8">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal </th>
                                            <th>Nama Aktifitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($aktifitas as $a) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo date('d F Y H:m', strtotime($a->tanggal_pelanggaran)); ?></td>
                                                <td><?php echo $a->nama_guru; ?> berhasil menambahkan pelanggaran <?php echo $a->nama_pelanggaran; ?> dengan point <?php echo $a->point; ?> kepada siswa bernama <a href="<?php echo base_url(); ?>pelanggaran_siswa_guru/hasil_input/<?php echo $a->id_siswa; ?>"><?php echo $a->nama_siswa; ?></a> kelas <?php echo $a->nama_kelas; ?></td>
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