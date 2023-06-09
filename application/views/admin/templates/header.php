<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $judul; ?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/images/logo-stiki.png'); ?>" type="image/png">

    <!-- data tables css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap4.min.css'); ?>">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/trumbowyg.min.css'); ?>">
</head>
<style>
    .img-profil-peserta {
        border-radius: 100px;
        margin: 0 auto;
        position: relative;
        height: 60px;
        width: 60px;
        overflow: hidden;
    }

    .img-peserta {
        width: 100%;
        height: auto;
        overflow: hidden;
    }
</style>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

        <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <div class="img-profil-peserta img-radius">
                            <img class="img-peserta" src="<?= base_url('assets/images/user/'.$admin->poto); ?>" alt="User-Profile-Image">
                        </div>

                        <div class="user-name">
                            <div class="mt-2"><b><?= $admin->nama_lengkap ?></b></div>
                            <span class="badge badge-dark"><?= $admin->level ?></span>
                        </div>
                    </div>
                </div>

                <br>
                <ul class="nav pcoded-inner-navbar mt-2">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    
                    <li class="nav-item pcoded-menu-caption">
                        <label>Manajemen</label>
                    </li>


                    <li class="nav-item"><a href="<?= base_url('admin/peserta') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Pendaftaran</span></a></li>

                    <li class="nav-item"><a href="<?= base_url('admin/kriteria') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Kriteria</span></a></li>

                    <!-- <li class="nav-item"><a href="<?= base_url('admin/ujian') ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-chalkboard"></i></span><span class="pcoded-mtext">Ujian Online</span></a></li> -->



                    <li class="nav-item pcoded-menu-caption">
                        <label>Informasi</label>
                    </li>

                    <li class="nav-item"><a href="<?= base_url('admin/analisis') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Analisis Peserta</span></a></li>
                    
                    <li class="nav-item"><a href="<?= base_url('admin/laporan') ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-file-alt"></i></span><span class="pcoded-mtext">Lihat Laporan</span></a></li>

                    <li class="nav-item"><a href="<?= base_url('admin/profil') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profil</span></a></li>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="" class="logo">

            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a href="#" class="btn" data-toggle="modal" data-target="#logoutModal">
                        <i class="feather icon-log-out"></i> Logout
                    </a>
                </li>
            </ul>
        </div>


    </header>
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10"><?= $nav; ?></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a><?= $nav; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
