            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <center><h2>Selamat Datang Di Sistem Informasi Kemahasiswaan</h2></center>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-6" onclick="location.href='<?php echo site_url('proposal'); ?>';" style="cursor: pointer;">
                                        <div class="widget style1 navy-bg" style="color: white">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-book fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Proposal</h3>
                                                    <span>Jumlah Request Proposal: <?php echo $jumlah_proposal; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="widget style1 lazur-bg" onclick="location.href='<?php echo site_url('proposal'); ?>';" style="cursor: pointer;">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-star fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Kegiatan</h3>
                                                    <span>Jumlah Kegiatan: <?php echo $jumlah_kegiatan; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>