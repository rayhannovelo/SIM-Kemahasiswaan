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
                                <h5>Daftar Proposal Belum Valid</h5>
                            </div>
                            <div class="ibox-content">
                                <?php 
                                    /*
                                    echo '<pre>';
                                    echo print_r($proposal);
                                    echo '</pre>';
                                    */
                                ?>
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Ormawa</td>
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
                                        <td><?php echo $value['nama_ormawa']; ?></td>
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
                                                <?php if($value['status_proposal'] == 'Belum Divalidasi' || $value['status_proposal'] == 'Sudah Diperbaiki'): ?>
                                                <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('ormawa/validasi_proposal/'.$value['id_kegiatan'])?>'" type="button"><i class="fa fa-edit"></i> Validasi</button>
                                                <?php else: ?>
                                                <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('ormawa/validasi_proposal/'.$value['id_kegiatan'])?>'" type="button" disabled><i class="fa fa-edit"></i> Validasi</button>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Proposal Valid</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Ormawa</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lokasi Kegiatan</td>
                                            <td>Tanggal Kegiatan</td>
                                            <td>Jumlah Peserta</td>
                                            <td>Lampiran</td>
                                            <td>Status Proposal</td>
                                            <td>Status LPJ</td>
                                            <td>Keterangan Kegiatan</td>
                                            <td>Tanggal Pelaksanaan</td>
                                            <td>Biaya Dari Keuangan</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proposal_valid as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_ormawa']; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td><?php echo $value['lokasi_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_kegiatan']; ?></td>
                                            <td><?php echo $value['jumlah_peserta']; ?></td>
                                            <td><a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a></td>
                                            <td>
                                                <?php if($value['status_proposal'] == 'Belum Divalidasi'): ?>
                                                    <span class="badge badge-default"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Valid'): ?>
                                                    <span class="badge badge-primary"><?php echo $value['status_proposal']; ?></span>
                                                <?php elseif ($value['status_proposal'] == 'Perlu Diperbaiki'): ?>
                                                    <span class="badge badge-warning"><?php echo $value['status_proposal']; ?></span>
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
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('ormawa/perbarui_proposal/'.$value['id_kegiatan'])?>'" type="button"><i class="fa fa-refresh"></i> Perbarui</button>
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