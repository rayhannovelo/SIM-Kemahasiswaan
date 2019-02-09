            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary btn-rounded btn-block dim" data-toggle="modal" data-target="#tambah_legalisir">Tambah Legalisir</button>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
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
                                            <td>Jumlah Ijazah</td>
                                            <td>Jumlah Transkrip</td>
                                            <td>Waktu Legalisir</td>
                                            <td>Status Legalisir</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($legalisir as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['jumlah_ijazah']; ?></td>
                                            <td><?php echo $value['jumlah_transkrip']; ?></td>
                                            <td><?php echo $value['waktu_buat']; ?></td>
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
                                                <?php if($value['status_legalisir'] == 'Menunggu Konfirmasi' || $value['status_legalisir'] == 'Tidak Memenuhi Syarat'): ?>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data legalisir akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('legalisir/hapus_legalisir/'.$value['id_legalisir'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                                <?php else: ?>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data legalisir akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('legalisir/hapus_legalisir/'.$value['id_legalisir'])?>'" type="button"disabled><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
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
                                - Pastikan file scan ijazah dan transkrip sudah diupload. <a href="<?php echo site_url('profil');?>">(Upload)</a><br> 
                                - Data profil dan pekerjaan (jika sudah bekerja) wajib diisi.<br>
                                - Jumlah legalisir ijazah dan transkrip masing-masing maksimal 7 lembar.<br>
                                - Jika tidak memenuhi syarat diatas legalisir tidak akan diproses.
                            </div>
                        </div>
                        <form class="m-t" role="form" action="<?php echo site_url('legalisir/tambah_legalisir_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data legalisir akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Jumlah Legalisir Ijazah :</label>
                                <input type="number" name="jumlah_ijazah" class="form-control" placeholder="Jumlah Legalisir Ijazah" min="0" max="7" value="0" required="">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Legalisir Transkrip :</label>
                                <input type="number" name="jumlah_transkrip" class="form-control" placeholder="Jumlah Legalisir Transkrip" min="0" max="7" value="0" required="">
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