            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($kegiatan as $key => $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('ormawa/perbarui_proposal_form/'.$value['id_kegiatan']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data proposal akan diproses. Apakah Anda yakin?');">
                                        <div class="form-group">
                                            <label>Nama Kegiatan :</label>
                                            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" value="<?php echo $value['nama_kegiatan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi Kegiatan :</label>
                                            <input type="text" name="lokasi_kegiatan" class="form-control" placeholder="Lokasi Kegiatan" value="<?php echo $value['lokasi_kegiatan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Kegiatan :</label>
                                            <input type="text" name="tanggal_kegiatan" class="form-control" placeholder="Tanggal Kegiatan" value="<?php echo $value['tanggal_kegiatan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Peserta :</label>
                                            <input type="text" name="jumlah_peserta" class="form-control" placeholder="Jumlah Peserta" value="<?php echo $value['jumlah_peserta']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Proposal :</label>
                                            <input type="text" name="status_proposal" class="form-control" placeholder="Status Proposal" value="<?php echo $value['status_proposal']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lampiran <?php echo $value['status_proposal'] == 'Sudah Diperbaiki' ? 'Perbaikan' : ''; ?> :</label>
                                            <a href="<?php echo base_url('assets/lampiran/'.$value['lampiran']); ?>" download><i class="fa fa-download"></i> <?php echo $value['lampiran']; ?></a>
                                        </div>
                                        <div class="form-group">
                                            <label>Status LPJ :</label>
                                            <input type="text" name="status_lpj" class="form-control" placeholder="Status LPJ" value="<?php echo $value['status_spjlpj']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lampiran SPJ & LPJ : <?php if($value['file_spjlpj'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_spjlpj']); ?>" download><i class="fa fa-download"></i> <?php echo $value['file_spjlpj']; ?></a><?php } else { echo 'Belum Diupload'; } ?></label>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Keterangan Kegiatan :</label>
                                            <input type="text" name="keterangan_kegiatan" class="form-control" placeholder="Keterangan Kegiatan" value="<?php echo $value['keterangan_kegiatan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pelaksanaan :</label>
                                            <input type="date" name="tanggal_pelaksanaan" class="form-control" placeholder="Tanggal Pelaksanaan" value="<?php echo $value['tanggal_pelaksanaan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Biaya Dari Keuangan :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span> 
                                                <input type="number" name="biaya_dari_keuangan" placeholder="Biaya Dari Keuangan" class="form-control" value="<?php echo $value['biaya_dari_keuangan']; ?>">
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>