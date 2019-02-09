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
                                        <form class="m-t" role="form" action="<?php echo $this->session->userdata('level') == 1 ? site_url('alumni/tambah_pekerjaan_form/'.$id_alumni) : site_url('pekerjaan/tambah_pekerjaan_form/'.$id_alumni); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data pekerjaan akan ditambahkan. Apakah Anda yakin?');">
                                        <center><h1>Form Tambah Pekerjaan</h1>
                                        <?php echo $this->session->userdata('level') == 3 ? ' (Data pekerjaan diisi dari pekerjaan pertama hingga terakhir)' : ''; ?>
                                        </center>
                                        <hr>
                                        <div class="form-group">
                                            <label>Bulan Bekerja :</label>
                                            <input id="bulan_bekerja" type="number" name="bulan_bekerja" min="1" max="12" class="form-control" placeholder="Bulan Bekerja">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Bekerja :</label>
                                            <input id="tahun_bekerja" type="number" name="tahun_bekerja" class="form-control" placeholder="Tahun Bekerja" min="2000" max="9999" value="2000">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Perusahaan :</label>
                                            <input id="nama_perusahaan" type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Perusahaan :</label>
                                            <textarea id="alamat_perusahaan" name="alamat_perusahaan" class="form-control" placeholder="Alamat Perusahaan"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit Kerja :</label>
                                            <input id="unit_kerja" type="text" name="unit_kerja" class="form-control" placeholder="Unit Kerja">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan :</label>
                                            <input id="jabatan" type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Gaji :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span> 
                                                <input id="jumlah_gaji" type="number" name="jumlah_gaji" placeholder="Jumlah Gaji" class="form-control" >
                                                <span class="input-group-addon">,00</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                        <hr>
                                        <center><h1>Riwayat Pekerjaan</h1></center>
                                        <div class="table-responsive">
                                        <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Bulan Bekerja</td>
                                                    <td>Tahun Bekerja</td>
                                                    <td>Nama Perusahaan</td>
                                                    <td>Alamat Perusahaan</td>
                                                    <td>Unit Kerja</td>
                                                    <td>Jabatan</td>
                                                    <td>Jumlah Gaji</td>
                                                    <td>Waktu Buat</td>
                                                    <td>Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pekerjaan as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    <td><?php echo $value['bulan_bekerja']; ?></td>
                                                    <td><?php echo $value['tahun_bekerja']; ?></td>
                                                    <td><?php echo $value['nama_perusahaan']; ?></td>
                                                    <td><?php echo $value['alamat_perusahaan']; ?></td>
                                                    <td><?php echo $value['unit_kerja']; ?></td>
                                                    <td><?php echo $value['jabatan']; ?></td>
                                                    <td><?php echo 'Rp'.number_format($value['jumlah_gaji'], 2, ',', '.'); ?></td>
                                                    <td><?php echo $value['waktu_buat']; ?></td>
                                                    <td>
                                                        <button class="btn btn-danger dim" onclick="if (confirm('Data pekerjaan akan dihapus, apakah Anda yakin?')) location.href='<?php echo $this->session->userdata('level') == 1 ? site_url('alumni/hapus_pekerjaan/'.$value['id_pekerjaan'].'/'.$value['id_alumni']) : site_url('pekerjaan/hapus_pekerjaan/'.$value['id_pekerjaan'].'/'.$value['id_alumni']);?>'" type="button"><i class="fa fa-trash"></i></button>
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