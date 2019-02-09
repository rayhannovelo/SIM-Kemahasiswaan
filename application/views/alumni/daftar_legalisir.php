            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Legalisir</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>NIM</td>
                                            <td>Nama</td>
                                            <td>No. HP</td>
                                            <td>Jumlah Ijazah</td>
                                            <td>Jumlah Transkrip</td>
                                            <td>Waktu Legalisir</td>
                                            <td>File Ijazah</td>
                                            <td>File Transkrip</td>
                                            <td>Status Legalisir</td>
                                            <td>Aksi</td>
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
                                                <?php if($value['file_ijazah'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_ijazah']); ?>" download><i class="fa fa-download"></i></a><?php } else { echo 'Belum Diupload'; } ?>
                                            </td>
                                            <td>
                                                <?php if($value['file_transkrip'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_transkrip']); ?>" download><i class="fa fa-download"></i></a><?php } else { echo 'Belum Diupload'; } ?>
                                            </td>
                                            <td>
                                                <?php if($value['status_legalisir'] == 'Menunggu Konfirmasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Selesai'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Tidak Memenuhi Syarat'): ?>
                                                    <span class="badge badge-danger"><?php echo $value['status_legalisir']; ?></span>
                                                <?php elseif ($value['status_legalisir'] == 'Legalisir Sudah Bisa Diambil'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_legalisir']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                <?php if($value['status_legalisir'] == 'Menunggu Konfirmasi'): ?>
                                                <button class="btn btn-primary dim" onclick="if (confirm('Data legalisir akan diproses dan siap diambil oleh alumni, apakah Anda yakin?')) location.href='<?php echo site_url('legalisir/proses/'.$value['id_legalisir'])?>'" type="button"><i class="fa fa-check"></i> Proses</button>
                                                <button class="btn btn-warning dim" onclick="if (confirm('Data legalisir akan ditolak, apakah Anda yakin?')) location.href='<?php echo site_url('legalisir/tolak/'.$value['id_legalisir'])?>'" type="button"><i class="fa fa-times"></i> Tolak</button>
                                                <?php elseif($value['status_legalisir'] == 'Legalisir Sudah Bisa Diambil'): ?>
                                                <button class="btn btn-primary dim" onclick="if (confirm('Legalisir telah diambil oleh alumni, apakah Anda yakin?')) location.href='<?php echo site_url('legalisir/selesai/'.$value['id_legalisir'])?>'" type="button"><i class="fa fa-check"></i> Selesai</button>
                                                <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal inmodal fade" id="tambah_legalisir" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Form Tambah legalisir</h4>
                            <hr>
                            <span class="text-danger"><h3>Catatan!</h3></span><br>
                            <div class="text-left">
                                - Nomor rekening pembayaran : 123 456 789<br>
                                - Biaya legalisir : Rp30.000 (7 legalisir ijazah dan transkrip)<br>
                                - Pastikan file ijazah dan transkrip sudah diupload. Jika belum tidak akan diproses.<br>
                            </div>
                        </div>
                        <form class="m-t" role="form" action="<?php echo site_url('legalisir/tambah_legalisir_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data legalisir akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Bank Pengirim :</label>
                                <input type="text" name="bank_pengirim" class="form-control" placeholder="Bank Pengirim" required="">
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening :</label>
                                <input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Pengirim :</label>
                                <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Transfer :</label>
                                <input type="date" name="tanggal_transfer" class="form-control" placeholder="Tanggal Transfer" required="">
                            </div>
                            <div class="form-group">
                                <label>Total Pembayaran :</label>
                                <input type="text" name="total_bayar" class="form-control" placeholder="Total Pembayaran" required="">
                            </div>
                            <div class="form-group">
                                <label>Bukti Pembayaran (Max 2MB) :</label>
                                <input type="file" accept="image/*" name="bukti_pembayaran" required="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>