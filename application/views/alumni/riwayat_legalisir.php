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
                                        <form class="m-t" role="form" action="<?php echo site_url('alumni/tambah_legalisir_form/'.$id_alumni); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data legalisir akan ditambahkan. Apakah Anda yakin?');">
                                        <center><h1>Form Tambah Legalisir</h1></center>
                                        <hr>
                                        <div id="1">
                                        <div class="form-group">
                                            <label>Jumlah Ijazah :</label>
                                            <input id="jumlah_ijazah" type="number" name="jumlah_ijazah" class="form-control" placeholder="Jumlah Ijazah">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Transkrip :</label>
                                            <input id="jumlah_transkrip" type="number" name="jumlah_transkrip" class="form-control" placeholder="Jumlah Transkrip">
                                        </div>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                        <hr>
                                        <center><h1>Riwayat Legalisir</h1></center>
                                        <div class="table-responsive">
                                        <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Jumlah Ijazah</td>
                                                    <td>Jumlah Transkrip</td>
                                                    <td>Waktu Legalisir</td>
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
                                                        <button class="btn btn-danger dim" onclick="if (confirm('Data legalisir akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('alumni/hapus_legalisir/'.$value['id_legalisir'].'/'.$value['id_alumni'])?>'" type="button"><i class="fa fa-trash"></i></button>
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