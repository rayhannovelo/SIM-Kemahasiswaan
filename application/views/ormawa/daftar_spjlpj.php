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
                                            <td>Nama Ormawa</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lampiran (SPJ & LPJ)</td>
                                            <td>Status SPJ & LPJ</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($spjlpj as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_ormawa']; ?></td>
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
                                            <td>
                                                <?php if($value['status_spjlpj'] == 'Belum Divalidasi' || $value['status_spjlpj'] == 'Sudah Diperbaiki'): ?>
                                                <button class="btn btn-primary dim" type="button" onclick="if (confirm('Data SPJ & LPJ akan diproses valid, apakah Anda yakin?')) location.href='<?php echo site_url('spjlpj/valid/'.$value['id_kegiatan'])?>'"><i class="fa fa-undo"></i> Valid</button>
                                                <button class="btn btn-warning dim" type="button" data-toggle="modal" data-target="#perbaiki_spjlpj" data-id-kegiatan="<?php echo $value['id_kegiatan']; ?>"><i class="fa fa-wrench"></i> Perlu Diperbaiki</button>
                                                <?php elseif ($value['status_spjlpj'] == 'Perlu Diperbaiki'): ?>
                                                <button class="btn btn-primary dim" type="button" onclick="if (confirm('Data SPJ & LPJ akan diproses valid, apakah Anda yakin?')) location.href='<?php echo site_url('spjlpj/valid/'.$value['id_kegiatan'])?>'" disabled><i class="fa fa-undo"></i> Valid</button>
                                                <button class="btn btn-warning dim" type="button" data-toggle="modal" data-target="#perbaiki_spjlpj" data-id-kegiatan="<?php echo $value['id_kegiatan']; ?>" disabled><i class="fa fa-wrench"></i> Perlu Diperbaiki</button>
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
                                            <td>Nama Ormawa</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lampiran (SPJ & LPJ)</td>
                                            <td>Status (SPJ & LPJ)</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($spjlpj_valid as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_ormawa']; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
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
            <div class="modal inmodal fade" id="perbaiki_spjlpj" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Perbaikan SPJ & LPJ</h4>
                        </div>
                        <form class="" role="form" action="<?php echo site_url('spjlpj/perbaiki/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data spjlpj akan diperbarui. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <input type="hidden" name="id_kegiatan" class="form-control" value="">
                            <div class="form-group">
                                <label>Keterangan Kesalahan :</label>
                                <textarea id="kesalahan_spjlpj" name="kesalahan_spjlpj" class="form-control" placeholder="Keterangan Kesalahan" required=""></textarea>
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