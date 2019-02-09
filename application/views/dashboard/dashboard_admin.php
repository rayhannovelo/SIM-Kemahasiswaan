            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <center><h2>Selamat Datang Di Sistem Informasi Kemahasiswaan</h2></center>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-3" onclick="location.href='<?php echo site_url('ormawa/proposal'); ?>';" style="cursor: pointer;">
                                        <div class="widget style1 navy-bg" style="color: white">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-book fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Proposal</h3>
                                                    <span>Jumlah Request Proposal: <?php echo $jumlah_request; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="widget style1 lazur-bg" onclick="location.href='<?php echo site_url('alumni/seluruh'); ?>';" style="cursor: pointer;">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-graduation-cap fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Alumni</h3>
                                                    <span>Jumlah Alumni: <?php echo $jumlah_alumni; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="cursor: pointer;">
                                        <div class="widget style1 yellow-bg">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-briefcase fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Alumni</h3>
                                                    <a onclick="location.href='<?php echo site_url('alumni/bekerja'); ?>';">Bekerja: <?php echo $jumlah_alumni_bekerja; ?></a><br>
                                                    <a onclick="location.href='<?php echo site_url('alumni'); ?>';">Belum Bekerja: <?php echo $jumlah_alumni_belum_bekerja; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="widget style1 red-bg" onclick="location.href='<?php echo site_url('ormawa'); ?>';" style="cursor: pointer;">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <i class="fa fa-users fa-5x"></i>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h3 class="font-bold">Data Ormawa</h3>
                                                    <span>Jumlah Ormawa: <?php echo $jumlah_ormawa; ?></span>
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