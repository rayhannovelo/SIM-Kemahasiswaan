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
                                        <?php foreach ($profil_ormawa as $key => $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('profil/edit_profil_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data profil akan diperbarui. Apakah Anda yakin?');">
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $value['username']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Akun :</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password Baru (kosongkan jika tidak mengganti password baru)">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ormawa :</label>
                                            <input type="text" name="nama_ormawa" class="form-control" placeholder="Nama Ormawa" value="<?php echo $value['nama_ormawa']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Ketua Ormawa :</label>
                                            <input type="text" name="ketua_organisasi" class="form-control" placeholder="Ketua Organisasi" value="<?php echo $value['ketua_organisasi']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Wakil Ketua :</label>
                                            <input type="text" name="wakil_ketua" class="form-control" placeholder="Wakil Ketua" value="<?php echo $value['wakil_ketua']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Profil Organisasi :</label>
                                            <textarea name="profil_organisasi" class="form-control" placeholder="Profil Organisasi"><?php echo $value['profil_organisasi'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail :</label>
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $value['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>No. HP :</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="No. HP" value="<?php echo $value['no_hp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Foto :</label>
                                            <div class="col-lg-9">
                                                <div class="fileinput fileinput-new col-sm-9" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                      <img src="<?php echo $value['thumbnail'] == '' ? base_url('assets/img/default.png') : base_url('assets/img/profil/'.$value['thumbnail'])?>" alt="Image 1">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    </div>
                                                    <div>
                                                      <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span>
                                                        <span class="fileinput-exists">Ganti</span>
                                                        <input type="hidden" value="<?php echo $value['foto'] ?>" name="foto">
                                                        <input type="hidden" value="<?php echo $value['thumbnail'] ?>" name="thumbnail">
                                                        <input type="file" name="foto_baru" accept="image/*">
                                                      </span>
                                                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                    </div>
                                                  </div>
                                            </div>
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