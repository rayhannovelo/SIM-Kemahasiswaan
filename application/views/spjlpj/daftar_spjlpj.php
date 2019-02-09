            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar SPJ & LPJ</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lampiran (SPJ & LPJ)</td>
                                            <td>Status SPJ & LPJ</td>
                                            <td>Kesalahan</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($spjlpj as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td>
                                                <?php if($value['file_spjlpj'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_spjlpj']); ?>" download><i class="fa fa-download"></i> <?php echo $value['file_spjlpj']; ?></a><?php } else { echo 'Belum Diupload'; } ?>
                                            </td>
                                            <td>
                                                <?php if($value['status_spjlpj'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Ditolak'): ?>
                                                    <span class="badge badge-danger"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Sudah Diperbaiki'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Belum Diupload'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $value['kesalahan_spjlpj']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if ($value['status_spjlpj'] == 'Belum Diupload'): ?>
                                                    <button class="btn btn-primary dim" type="button" data-toggle="modal" data-target="#tambah_spjlpj" data-id-kegiatan="<?php echo $value['id_kegiatan']; ?>" data-nama-kegiatan="<?php echo $value['nama_kegiatan']; ?>"><i class="fa fa-upload"></i> Upload</button>
                                                    <?php elseif($value['status_spjlpj'] == 'Belum Divalidasi'): ?>
                                                    <button class="btn btn-primary dim" type="button" data-toggle="modal" data-target="#tambah_spjlpj" data-id-kegiatan="<?php echo $value['id_kegiatan']; ?>" data-nama-kegiatan="<?php echo $value['nama_kegiatan']; ?>" data-nama-file="<?php echo $value['file_spjlpj']; ?>"><i class="fa fa-undo"></i> Upload Ulang</button>
                                                    <?php elseif($value['status_spjlpj'] == 'Perlu Diperbaiki' || $value['status_spjlpj'] == 'Sudah Diperbaiki'): ?>
                                                    <button class="btn btn-warning dim" type="button" data-toggle="modal" data-target="#perbaiki_spjlpj" data-id-kegiatan="<?php echo $value['id_kegiatan']; ?>" data-nama-kegiatan="<?php echo $value['nama_kegiatan']; ?>" data-nama-file="<?php echo $value['file_spjlpj']; ?>" <?php echo $value['status_spjlpj'] == 'Sudah Diperbaiki' ? 'disabled' : ''; ?>><i class="fa fa-wrench"></i> Perbaiki</button>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Riwayat SPJ & LPJ</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lokasi Kegiatan</td>
                                            <td>Tanggal Kegiatan</td>
                                            <td>Jumlah Peserta</td>
                                            <td>Jumlah Dana</td>
                                            <td>Lampiran</td>
                                            <td>Status spjlpj</td>
                                            <td>Status LPJ</td>
                                            <td>Keterangan Kegiatan</td>
                                            <td>Tanggal Pelaksanaan</td>
                                            <td>Biaya Dari Keuangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($spjlpj_valid as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td><?php echo $value['lokasi_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_kegiatan']; ?></td>
                                            <td><?php echo $value['jumlah_peserta']; ?></td>
                                            <td><?php echo $value['jumlah_dana']; ?></td>
                                            <td><a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a></td>
                                            <td>
                                                <?php if($value['status_spjlpj'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Sudah Diperbaiki'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($value['status_spjlpj'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Ditolak'): ?>
                                                    <span class="badge badge-danger"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Sudah Diperbaiki'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php elseif ($value['status_spjlpj'] == 'Belum Diupload'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_spjlpj']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $value['keterangan_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_pelaksanaan']; ?></td>
                                            <td><?php echo 'Rp'.number_format($value['biaya_dari_keuangan'], 2, ',', '.');; ?></td>
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
                </div>
            </div>
            <div class="modal inmodal fade" id="tambah_spjlpj" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload SPJ & LPJ</h4>
                        </div>
                        <form class="" role="form" action="<?php echo site_url('spjlpj/tambah_spjlpj_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data spjlpj akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <input type="hidden" name="id_kegiatan" class="form-control" value="">
                            <input type="hidden" name="nama_file" class="form-control" value="">
                            <div class="form-group">
                                <label>Lampiran (.pdf Max 2MB) :</label>
                                <input type="file" accept=".pdf,application/pdf" name="lampiran" required="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                            <button class="btn btn-w-m btn-primary" type="submit">Upload</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal inmodal fade" id="perbaiki_spjlpj" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Upload Perbaikan SPJ & LPJ</h4>
                        </div>
                        <form class="" role="form" action="<?php echo site_url('spjlpj/perbaiki_spjlpj_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data spjlpj akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <input type="hidden" name="id_kegiatan" class="form-control" value="">
                            <input type="hidden" name="nama_file" class="form-control" value="">
                            <div class="form-group">
                                <label>Lampiran (.pdf Max 2MB) :</label>
                                <input type="file" accept=".pdf,application/pdf" name="lampiran" required="">
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