            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary btn-rounded btn-block dim" data-toggle="modal" data-target="#tambah_proposal">Tambah Proposal</button>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Proposal</h5>
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
                                            <td>Status Proposal</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proposal as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td><?php echo $value['lokasi_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_kegiatan']; ?></td>
                                            <td><?php echo $value['jumlah_peserta']; ?></td>
                                            <td><?php echo 'Rp'.number_format($value['jumlah_dana'], 2, ',', '.'); ?></td>
                                            <td><a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a></td>
                                            <td>
                                                <?php if($value['status_proposal'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Ditolak'): ?>
                                                    <span class="badge badge-danger"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Sudah Diperbaiki'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_proposal']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if($value['status_proposal'] == 'Perlu Diperbaiki') { ?>
                                                    <button class="btn btn-warning dim" onclick="location.href='<?php echo site_url('proposal/perbaiki_proposal/'.$value['id_kegiatan'])?>'" type="button"><i class="fa fa-wrench"></i> Perbaiki</button>
                                                    <?php } ?>
                                                    <?php if($value['status_proposal'] != 'Valid') { ?>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data proposal akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('proposal/hapus_proposal/'.$value['id_kegiatan'].'/'.$value['lampiran'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
                                                    <?php } ?>
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
                                <h5>Riwayat Proposal</h5>
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
                                            <td>Status Proposal</td>
                                            <td>Status LPJ</td>
                                            <td>Keterangan Kegiatan</td>
                                            <td>Tanggal Pelaksanaan</td>
                                            <td>Biaya Dari Keuangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proposal_valid as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td><?php echo $value['lokasi_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_kegiatan']; ?></td>
                                            <td><?php echo $value['jumlah_peserta']; ?></td>
                                            <td><?php echo $value['jumlah_dana']; ?></td>
                                            <td><a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a></td>
                                            <td>
                                                <?php if($value['status_proposal'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Sudah Diperbaiki'): ?>
                                                    <span class="badge badge-info"><?php echo $value['status_proposal']; ?></span>
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
            <div class="modal inmodal fade" id="tambah_proposal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Form Tambah Proposal</h4>
                        </div>
                        <form class="m-t" role="form" action="<?php echo site_url('proposal/tambah_proposal_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data proposal akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kegiatan :</label>
                                <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" required="">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Kegiatan :</label>
                                <input type="text" name="lokasi_kegiatan" class="form-control" placeholder="Lokasi Kegiatan" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kegiatan :</label>
                                <input type="date" name="tanggal_kegiatan" class="form-control" placeholder="Tanggal Kegiatan" required="">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Peserta :</label>
                                <input type="text" name="jumlah_peserta" class="form-control" placeholder="Jumlah Peserta" required="">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Dana :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span> 
                                        <input type="number" name="jumlah_dana" class="form-control" placeholder="Jumlah Dana" required="">
                                    <span class="input-group-addon">,00</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lampiran (.pdf Max 2MB):</label>
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