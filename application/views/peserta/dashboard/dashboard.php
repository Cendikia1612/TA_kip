<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Hallo <?= $peserta->nama_lengkap ?></h5>
            </div>
            <div class="card-body">

                <?= $this->session->flashdata('pesan'); ?>

                <p><h5>
                    Selamat Datang di Aplikasi Seleksi Penerima KIP Kuliah </h5>
                    Halo para Peserta KIP-Kuliah! <br>

                    Untuk para peserta yang mendaftarkan menjadi penerima KIP-Kuliah silahkan lengkap berkas persyaratan KIP-Kuliah dengan lengkap.
                </p>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->