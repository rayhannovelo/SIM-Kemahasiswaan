            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Laporan Kegiatan</h5>
                            </div>
                            <div class="ibox-content">
                                <form method="post" role="form" action="<?php echo site_url('laporan/cari')?>">
                                    <div class="input-group">
                                        <label></label>
                                            <select name="tahun" class="form-control">
                                                <option value="">-- Pilih Tahun Laporan --</option>
                                                <?php foreach($tahun as $ky => $value) { ?>
                                                    <option value="<?php echo substr($value['tanggal_pelaksanaan'], 0, 4) ?>"><?php echo substr($value['tanggal_pelaksanaan'], 0, 4); ?></option>
                                                <?php } ?>
                                            </select>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                                <hr>
                                <div class="table-responsive">
                                <table id="laporan_kegiatan" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Ormawa</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Lokasi Kegiatan</td>
                                            <td>Tanggal Kegiatan</td>
                                            <td>Jumlah Peserta</td>
                                            <td>Keterangan Kegiatan</td>
                                            <td>Tanggal Pelaksanaan</td>
                                            <td>Biaya Dari Keuangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total = 0;
                                            foreach($proposal as $key => $value) { 
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_ormawa']; ?></td>
                                            <td><?php echo $value['nama_kegiatan']; ?></td>
                                            <td><?php echo $value['lokasi_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_kegiatan']; ?></td>
                                            <td><?php echo $value['jumlah_peserta']; ?></td>
                                            <td><?php echo $value['keterangan_kegiatan']; ?></td>
                                            <td><?php echo $value['tanggal_pelaksanaan']; ?></td>
                                            <td><?php echo 'Rp'.number_format($value['biaya_dari_keuangan'], 2, ',', '.'); ?></td>
                                        </tr>
                                    <?php $total += $value['biaya_dari_keuangan'];} ?>
                                        <tr>
                                            <td><span style="opacity: 0"><?php echo count($proposal) + 1; ?></span></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><?php echo 'Rp'.number_format($total, 2, ',', '.'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>