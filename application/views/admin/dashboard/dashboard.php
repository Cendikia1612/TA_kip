<?php
    $data_layak       = COUNT($this->Model_analisis->getLabel("Layak"));
    $data_tidak_layak = COUNT($this->Model_analisis->getLabel("Tidak Layak"));
    $data_training    = COUNT($this->Model_analisis->getDataTraining());
    $data_testing     = COUNT($this->Model_analisis->getDataTesting());
    $data_semua       = $data_testing + $data_training;
?>

<!-- [ Main Content ] start -->
<div class="row">

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="feather icon-user text-secondary d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-secondary"><?= $data_testing ?></span> Peserta</h4>
                <p class="m-b-20">proses seleksi</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="feather icon-user text-c-green d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-green"><?= COUNT($this->Model_analisis->getLabel("Layak")); ?></span> Peserta</h4>
                <p class="m-b-20">layak menerima</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="feather icon-user text-c-red d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-red"><?= COUNT($this->Model_analisis->getLabel("Tidak Layak")); ?></span> Peserta</h4>
                <p class="m-b-20">tidak layak menerima</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <i class="feather icon-user text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue"><?= $data_semua ?></span> Peserta</h4>
                <p class="m-b-20">total peserta</p>
                <!-- <button class="btn btn-secondary btn-sm btn-round">Manage List</button> -->
            </div>
        </div>
    </div>

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h5>Selamat datang <i><?= $admin->level ?></i></h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <h5 class="text-center">
                    Selamat Datang di Menu Utama Aplikasi Seleksi Penerima KIP Kuliah <br> STIKI Malang</h5>
                </p>
            </div>
        </div>

    </div>


</div>
<!-- [ Main Content ] end -->
