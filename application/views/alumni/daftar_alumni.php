            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('alumni/tambah_alumni')?>'"><i class="fa fa-plus"></i> Tambah Alumni</button>
                    </div>
                    <div class="col-lg-8">
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
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>NIM</td>
                                            <td>Nama</td>
                                            <td>Prodi</td>
                                            <td>Strata</td>
                                            <td>Tahun Lulus</td>
                                            <td>Yudisium Ke-</td>
                                            <td>No. Ijazah</td>
                                            <td>No. Seri Transkrip</td>
                                            <td>No. HP</td>
                                            <td>Alamat</td>
                                            <td>Waktu Buat</td>
                                            <?php if($title == 'Daftar Alumni Bekerja') { ?>
                                            <td>Waktu Lulus - Bekerja</td>
                                            <?php } ?>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($alumni as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nim']; ?></td>
                                            <td><?php echo $value['nama_mahasiswa']; ?></td>
                                            <td><?php echo $value['prodi']; ?></td>
                                            <td><?php echo $value['strata']; ?></td>
                                            <td><?php echo $value['tahun_lulus']; ?></td>
                                            <td><?php echo $value['yudisium_ke']; ?></td>
                                            <td><?php echo $value['no_ijazah']; ?></td>
                                            <td><?php echo $value['no_seri_transkrip']; ?></td>
                                            <td><?php echo $value['no_hp']; ?></td>
                                            <td><?php echo $value['alamat']; ?></td>
                                            <td><?php echo $value['waktu_buat']; ?></td>
                                            <?php if($title == 'Daftar Alumni Bekerja') { ?>
                                            <td>
                                                <?php 
                                                    $selisih = $value['tahun_bekerja'] - $value['tahun_lulus'];
                                                    if($selisih < 1) {
                                                        echo '< 1 Tahun';
                                                    } else {
                                                        echo $selisih.' Tahun';
                                                    }
                                                ?>
                                            </td>
                                            <?php } ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('alumni/profil/'.$value['id_alumni'])?>'" type="button"><i class="fa fa-user"></i></button>
                                                    <button class="btn btn-success dim" onclick="location.href='<?php echo site_url('alumni/riwayat_legalisir/'.$value['id_alumni'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('alumni/riwayat_pekerjaan/'.$value['id_alumni'])?>'" type="button"><i class="fa fa-briefcase"></i></button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data Alumni akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('alumni/hapus_alumni/'.$value['id_alumni'])?>'" type="button"><i class="fa fa-trash"></i></button>
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
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Keterangan</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary dim" type="button"><i class="fa fa-user"></i></button> : Profil Alumni
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-success dim" type="button"><i class="fa fa-edit"></i></button> : Pendataan Legalisir
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-info dim" type="button"><i class="fa fa-briefcase"></i></button> : Pendataan Pekerjaan
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-danger dim" type="button"><i class="fa fa-trash"></i></button> : Hapus Alumni
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>