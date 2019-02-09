            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <!--<button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('ormawa/tambah_ormawa')?>'"><i class="fa fa-plus"></i> Tambah Ormawa</button> -->
                        <button type="button" class="btn btn-primary btn-rounded btn-block dim" data-toggle="modal" data-target="#tambah_ormawa">Tambah Ormawa</button>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar ormawa</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Username</td>
                                            <td>Nama Organisasi</td>
                                            <td>Ketua Organisasi</td>
                                            <td>Wakil Ketua</td>
                                            <td>Profil</td>
                                            <td>E-mail</td>
                                            <td>No. HP</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($ormawa as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['username']; ?></td>
                                            <td><?php echo $value['nama_ormawa']; ?></td>
                                            <td><?php echo $value['ketua_organisasi']; ?></td>
                                            <td><?php echo $value['wakil_ketua']; ?></td>
                                            <td><?php echo $value['profil_organisasi']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['no_hp']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('ormawa/riwayat_kegiatan/'.$value['id_ormawa'])?>'" type="button"><i class="fa fa-book"></i> Riwayat Kegiatan</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data ormawa akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('ormawa/hapus_ormawa/'.$value['id_pengguna'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
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
            </div>
            <div class="modal inmodal fade" id="tambah_ormawa" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Form Tambah Ormawa</h4>
                        </div>
                        <form class="m-t" role="form" action="<?php echo site_url('ormawa/tambah_ormawa_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data ormawa akan ditambahkan. Apakah Anda yakin?');">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Username :</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Ormawa :</label>
                                <input type="text" name="nama_ormawa" class="form-control" placeholder="Nama Ormawa" required="">
                            </div>
                            <div class="form-group">
                                <label>Ketua Ormawa :</label>
                                <input type="text" name="ketua_organisasi" class="form-control" placeholder="Ketua Ormawa" required="">
                            </div>
                            <div class="form-group">
                                <label>Wakil Ketua Ormawa :</label>
                                <input type="text" name="wakil_ketua" class="form-control" placeholder="Wakil Ketua Ormawa" required="">
                            </div>
                            <div class="form-group">
                                <label>Profil Organisasi :</label>
                                <textarea name="profil_organisasi" class="form-control" placeholder="Profil Organisasi"></textarea>
                            </div>
                            <div class="form-group">
                                <label>E-mail :</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
                            </div>
                            <div class="form-group">
                                <label>No. HP :</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="No. HP" required="">
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