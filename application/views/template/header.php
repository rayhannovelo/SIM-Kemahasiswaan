<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIM | <?php echo $title ?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css')?>" rel="stylesheet">
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe.css'>
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/js/plugins/photoswipe/default-skin/default-skin.css'>
    <link href="<?php echo base_url('assets/css/plugins/jasny/jasny-bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote-bs3.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    
</head>

<body class="md-skin">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img alt="image" class="img-circle" width="48" height="48" src="<?php echo $this->session->userdata('thumbnail') != '' ?  base_url('assets/img/profil/'.$this->session->userdata('thumbnail')) : base_url('assets/img/avatar.png'); ?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold"><?php echo $this->session->userdata('nama'); ?></strong>
                                </span>
                            </span>
                            <?php echo $this->session->userdata('jabatan'); ?>
                        </a>
                    </div>
                    <div class="logo-element">
                        SIM
                    </div>
                </li>
                <li>
                    <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                </li>
                <!-- Admin -->
                <?php if($this->session->userdata('level') == 1): ?>
                <li <?php echo $active == 'dashboard' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php echo $active == 'ormawa/proposal' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('ormawa/proposal')?>"><i class="fa fa-book"></i> <span class="nav-label">Request Proposal</span><span class="label label-info pull-right"><?php echo $jumlah_request; ?></span></a>
                </li>
                <li <?php echo $active == 'spjlpj' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('spjlpj')?>"><i class="fa fa-paste"></i> <span class="nav-label">Data SPJ & LPJ</span><span class="label label-info pull-right"><?php echo $jumlah_spjlpj; ?></span></a>
                </li>
                <li <?php echo $active == 'legalisir' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('legalisir')?>"><i class="fa fa-edit"></i> <span class="nav-label">Data Legalisir</span><span class="label label-info pull-right"><?php echo $jumlah_legalisir; ?></span></a>
                </li>
                <li <?php echo $active == 'alumni' ? 'class="active"' : ''; ?>>
                    <a href="#"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Daftar Alumni</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
                        <li><a href="<?php echo site_url('alumni/seluruh')?>">Seluruh Alumni</a></li>
                        <li><a href="<?php echo site_url('alumni')?>">Belum Bekerja</a></li>
                        <li><a href="<?php echo site_url('alumni/bekerja')?>">Sudah Bekerja</a></li>
                    </ul>
                </li>
                <li <?php echo $active == 'ormawa' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('ormawa')?>"><i class="fa fa-users"></i> <span class="nav-label">Daftar Ormawa</span></a>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Ormawa -->
                <?php elseif ($this->session->userdata('level') == 2): ?>
                <li <?php echo $active == 'dashboard' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li <?php echo $active == 'proposal' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('proposal')?>"><i class="fa fa-book"></i> <span class="nav-label">Request Proposal</span></a>
                </li>
                <li <?php echo $active == 'spjlpj' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('spjlpj')?>"><i class="fa fa-paste"></i> <span class="nav-label">Data SPJ & LPJ</span></a>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Alumni -->
                <?php elseif ($this->session->userdata('level') == 3): ?>
                <li <?php echo $active == 'legalisir' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('legalisir')?>"><i class="fa fa-edit"></i> <span class="nav-label">Data Legalisir</span></a>
                </li>
                <li <?php echo $active == 'pekerjaan' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('pekerjaan')?>"><i class="fa fa-book"></i> <span class="nav-label">Data Pekerjaan</span></a>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Kasubbag -->
                <?php elseif ($this->session->userdata('level') == 4): ?>
                <li <?php echo $active == 'laporan' ? 'class="active"' : ''; ?>>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Data Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
                        <li><a href="<?php echo site_url('laporan')?>">Laporan Legalisir</a></li>
                        <li><a href="<?php echo site_url('laporan/kegiatan')?>">Laporan Kegiatan</a></li>
                    </ul>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <!-- Kajur -->
                <?php elseif ($this->session->userdata('level') == 5): ?>
                <li <?php echo $active == 'laporan' ? 'class="active"' : ''; ?>>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Data Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
                        <li><a href="<?php echo site_url('laporan')?>">Laporan Legalisir</a></li>
                        <li><a href="<?php echo site_url('laporan/kegiatan')?>">Laporan Kegiatan</a></li>
                    </ul>
                </li>
                <li <?php echo $active == 'profil' ? 'class="active"' : ''; ?>>
                    <a href="<?php echo site_url('profil')?>"><i class="fa fa-user"></i> <span class="nav-label"> Profil</span></a>
                </li>

                <?php endif; ?>   
                <li>
                    <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Log out</span></a>
                </li>
            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo $this->session->userdata('nama') ?></span>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>