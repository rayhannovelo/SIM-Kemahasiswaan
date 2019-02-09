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
                                        <?php foreach ($proposal as $key => $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('proposal/perbaiki_proposal_form/'.$value['id_kegiatan']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data proposal akan diproses. Apakah Anda yakin?');">
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
                                            <label>Jumlah Dana :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span> 
                                                    <input type="number" name="jumlah_dana" class="form-control" placeholder="Jumlah Dana" value="<?php echo $value['jumlah_dana']; ?>" readonly>
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Proposal :</label>
                                            <input type="text" name="status_proposal" class="form-control" placeholder="Status Proposal" value="<?php echo $value['status_proposal']; ?>" readonly>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Keterangan Kesalahan :</label>
                                            <textarea id="keterangan_kesalahan" name="keterangan_kesalahan" class="form-control" placeholder="Keterangan Kesalahan" readonly=""><?php echo $value['keterangan_kesalahan'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Lampiran Perbaikan (.pdf Max 2MB) :</label>
                                            <input type="file" accept=".pdf,application/pdf" name="lampiran" class="form-control" required="">
                                        </div>
                                        <hr>
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