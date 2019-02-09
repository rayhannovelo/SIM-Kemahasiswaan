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
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($alumni as $key => $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('alumni/edit_profil_form/'.$value['id_alumni']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data Alumni akan diperbarui. Apakah Anda yakin?');">
                                        <center><h1>Data Alumni</h1></center>
                                        <hr>
                                        <div class="form-group">
                                            <label>NIM :</label>
                                            <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?php echo $value['nim']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama :</label>
                                            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama" value="<?php echo $value['nama_mahasiswa']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Program Studi :</label>
                                            <div class="form-group">
                                                <select name="prodi" class="form-control">
                                                    <option value="">-- Pilih Program Studi --</option>
                                                    <option value="Teknik Informatika (S1 Reguler)" <?php echo $value['prodi'] == 'Teknik Informatika (S1 Reguler)' ? 'selected' : ''; ?>>Teknik Informatika (S1 Reguler)</option>
                                                    <option value="Teknik Informatika (S1 Bilingual)" <?php echo $value['prodi'] == 'Teknik Informatika (S1 Bilingual)' ? 'selected' : ''; ?>>Teknik Informatika (S1 Bilingual)</option>
                                                    <option value="Sistem Komputer (S1 Reguler)" <?php echo $value['prodi'] == 'Sistem Komputer (S1 Reguler)' ? 'selected' : ''; ?>>Sistem Komputer (S1 Reguler)</option>
                                                    <option value="Sistem Komputer (S1 Profesional)" <?php echo $value['prodi'] == 'Sistem Komputer (S1 Profesional)' ? 'selected' : ''; ?>>Sistem Komputer (S1 Profesional)</option>
                                                    <option value="Teknik Komputer (D3)" <?php echo $value['prodi'] == 'Teknik Komputer (D3)' ? 'selected' : ''; ?>>Teknik Komputer (D3)</option>
                                                    <option value="Teknisi Komputer dan Jaringan (TKJ) (D3)" <?php echo $value['prodi'] == 'Teknisi Komputer dan Jaringan (TKJ) (D3)' ? 'selected' : ''; ?>>Teknisi Komputer dan Jaringan (TKJ) (D3)</option>
                                                    <option value="Sistem Informasi (S1 Reguler)" <?php echo $value['prodi'] == 'Sistem Informasi (S1 Reguler)' ? 'selected' : ''; ?>>Sistem Informasi (S1 Reguler)</option>
                                                    <option value="Sistem Informasi (S1 Profesional)" <?php echo $value['prodi'] == 'Sistem Informasi (S1 Profesional)' ? 'selected' : ''; ?>>Sistem Informasi (S1 Profesional)</option>
                                                    <option value="Sistem Informasi (S1 Bilingual)" <?php echo $value['prodi'] == 'Sistem Informasi (S1 Bilingual)' ? 'selected' : ''; ?>>Sistem Informasi (S1 Bilingual)</option>
                                                    <option value="Manajemen Informatika (D3)" <?php echo $value['prodi'] == 'Manajemen Informatika (D3)' ? 'selected' : ''; ?>>Manajemen Informatika (D3)</option>
                                                    <option value="Komputer Akuntansi (D3)" <?php echo $value['prodi'] == 'Komputer Akuntansi (D3)' ? 'selected' : ''; ?>>Komputer Akuntansi (D3)</option>
                                                    <option value="Magister Informatika (S2)" <?php echo $value['prodi'] == 'Magister Informatika (S2)' ? 'selected' : ''; ?>>Magister Informatika (S2)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Strata :</label>
                                            <div class="form-group">
                                                <select name="strata" class="form-control">
                                                    <option value="">-- Pilih Strata --</option>
                                                    <option value="D3" <?php echo $value['strata'] == 'D3' ? 'selected' : ''; ?>>D3</option>
                                                    <option value="S1" <?php echo $value['strata'] == 'S1' ? 'selected' : ''; ?>>S1</option>
                                                    <option value="S2" <?php echo $value['strata'] == 'S2' ? 'selected' : ''; ?>>S2</option>
                                                    <option value="S3" <?php echo $value['strata'] == 'S3' ? 'selected' : ''; ?>>S2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Lulus :</label>
                                            <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="<?php echo $value['tahun_lulus']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Yudisium Ke- :</label>
                                            <input type="number" name="yudisium_ke" class="form-control" placeholder="Yudisium Ke-" value="<?php echo $value['yudisium_ke']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Ijazah :</label>
                                            <input type="text" name="no_ijazah" class="form-control" placeholder="No. Ijazah" value="<?php echo $value['no_ijazah']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File Scan Ijazah (.pdf 2MB) (<?php if($value['file_ijazah'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_ijazah']); ?>" download><i class="fa fa-download"></i> <?php echo $value['file_ijazah']; ?></a><?php } else { echo 'Belum Diupload'; } ?>) : </label>
                                            <input type="hidden" name="ijazah" value="<?php echo $value['file_ijazah']; ?>">
                                            <input type="file" accept=".pdf,application/pdf" name="file_ijazah">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Seri Transkrip :</label>
                                            <input type="text" name="no_seri_transkrip" class="form-control" placeholder="No. Seri Transkrip" value="<?php echo $value['no_seri_transkrip']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File Scan Transkrip (.pdf 2MB) (<?php if($value['file_transkrip'] != ''){ ?><a href="<?php echo base_url('assets/lampiran/'.$value['file_transkrip']); ?>" download><i class="fa fa-download"></i> <?php echo $value['file_transkrip']; ?></a><?php } else { echo 'Belum Diupload'; } ?>) :</label>
                                            <input type="hidden" name="transkrip" value="<?php echo $value['file_transkrip']; ?>">
                                            <input type="file" accept=".pdf,application/pdf" name="file_transkrip">
                                        </div>
                                        <div class="form-group">
                                            <label>No. HP :</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="No. HP" value="<?php echo $value['no_hp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat :</label>
                                            <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $value['alamat']; ?></textarea>
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