            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Laporan Legalisir</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="laporan_legalisir" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>NIM</td>
                                            <td>Nama</td>
                                            <td>No. HP</td>
                                            <td>Jumlah Ijazah</td>
                                            <td>Jumlah Transkrip</td>
                                            <td>Waktu Legalisir</td>
                                            <td>Status Legalisir</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($legalisir as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nim']; ?></td>
                                            <td><?php echo $value['nama_mahasiswa']; ?></td>
                                            <td><?php echo $value['no_hp']; ?></td>
                                            <td><?php echo $value['jumlah_ijazah']; ?></td>
                                            <td><?php echo $value['jumlah_transkrip']; ?></td>
                                            <td><?php echo $value['waktu_buat']; ?></td>
                                            <td>
                                                <?php if($value['status_legalisir'] == 'Menunggu Konfirmasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Selesai'): ?>
                                                    <span class='badge badge-primary'><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Ditolak'): ?>
                                                    <span class="badge badge-danger"><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Legalisir Sudah Bisa Diambil'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_legalisir']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>No.</td>
                                            <td>NIM</td>
                                            <td>Nama</td>
                                            <td>No. HP</td>
                                            <td>Jumlah Ijazah</td>
                                            <td>Jumlah Transkrip</td>
                                            <td>Waktu Legalisir</td>
                                            <td>Status Legalisir</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>