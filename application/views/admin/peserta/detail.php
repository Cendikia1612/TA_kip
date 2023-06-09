<style type="text/css">
    .menu{
        background-color: #eee;
        border-bottom: 2px solid #4680ff;
    }

    .nav-pills .nav-link {
        border-radius: 0.25rem 0.25rem 0 0;
    }

    .col-form-label{
        font-weight: bold;
    }

    table td{
        vertical-align: middle !important;
        padding: 5px 10px !important;
    }
</style>

<!-- [ Main Content ] start -->
<div class="row">
    <!-- Alternative Pagination table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
                <div class="card-header-right mr-2">
                    <div class="btn-group card-option">
                        <a class="btn btn-secondary btn-sm" href="<?= base_url($this->uri->segment(1)."/peserta") ?>"><i class="fas fa-reply"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-sm-12 pl-0 pr-0">
                    <?= $this->session->flashdata('pesan'); ?>
                </div>

                <div class="bt-wizard" id="besicwizard">
                    <ul class="nav nav-pills nav-fill mb-3">
                        <li class="nav-item menu"><a href="#b-w-tab1" class="nav-link" data-toggle="tab">Biodata</a></li>
                        <li class="nav-item menu"><a href="#b-w-tab2" class="nav-link" data-toggle="tab">Keluarga</a></li>
                        <li class="nav-item menu"><a href="#b-w-tab3" class="nav-link" data-toggle="tab">Ekonomi</a></li>
                        <li class="nav-item menu"><a href="#b-w-tab4" class="nav-link" data-toggle="tab">Rumah</a></li>
                        <li class="nav-item menu"><a href="#b-w-tab5" class="nav-link" data-toggle="tab">Prestasi</a></li>
                    </ul>
                    <div class="tab-content">


                        <div class="tab-pane active show" id="b-w-tab1">

                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid" id="poto" src="<?= base_url('assets/images/user/').$peserta->poto ?>" alt="<?= $peserta->poto ?>">
                                </div>
                                <div class="col-md-9">
                                    <table class="table">
                                        <tr>
                                            <td width="200px">Kode Pendaftaran</td>
                                            <td><b><?= $peserta->kode_pendaftaran ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td><b><?= $peserta->nisn ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td><b><?= $peserta->nama_lengkap ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><b><?= ($peserta->jenis_kelamin=='L')?'Laki-laki':'Perempuan'; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor NIK</td>
                                            <td><b><?= $peserta->nomor_nik ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Pendaftaran</td>
                                            <td><b><?= $peserta->nomor_pendaftaran ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor KIP</td>
                                            <td><?= $peserta->nomor_kip ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor KKS</td>
                                            <td><?= $peserta->nomor_kks ?></td>
                                        </tr>
                                        <tr>
                                            <td>Asal Sekolah</td>
                                            <td><?= $peserta->sekolah_asal ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Lulus</td>
                                            <td><?= $peserta->tahun_lulus ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Tanggal Lahir</td>
                                            <td><?= $peserta->tempat_lahir ?>, <?= $peserta->tanggal_lahir ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td><?= $peserta->agama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Peserta</td>
                                            <td><?= $peserta->alamat_peserta ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td><?= $peserta->provinsi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten/Kota</td>
                                            <td><?= $peserta->kabupaten ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode POS</td>
                                            <td><?= $peserta->kode_pos ?></td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail</td>
                                            <td><?= $peserta->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Handphone</td>
                                            <td><?= $peserta->nomor_hp ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="b-w-tab2">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid" id="poto_keluarga" src="<?= base_url('assets/images/poto_keluarga/').$peserta->poto_keluarga ?>" alt="<?= $peserta->poto_keluarga ?>">
                                </div>
                                <div class="col-md-9">
                                    <table class="table">
                                        <tr>
                                            <td width="200px">Nomor Kartu Keluarga (KK)</td>
                                            <td><b><?= $peserta->nomor_kk ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>NIK Kepala Keluarga</td>
                                            <td><b><?= $peserta->nik_kepala_keluarga ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ayah</td>
                                            <td><b><?= $peserta->nama_ayah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Status Ayah</td>
                                            <td><b><?= $peserta->status_ayah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Hubungan Ayah/ Wali</td>
                                            <td><?= $peserta->hubungan_ayah ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Ayah/ Wali</td>
                                            <td><?= $peserta->pendidikan_ayah ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ayah/ Wali</td>
                                            <td><?= $peserta->pekerjaan_ayah ?></td>
                                        </tr>
                                        <tr>
                                            <td>Detail Ayah</td>
                                            <td><?= $peserta->detail_ayah ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu</td>
                                            <td><?= $peserta->nama_ibu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Ibu</td>
                                            <td><?= $peserta->status_ibu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Ibu</td>
                                            <td><?= $peserta->pendidikan_ibu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td><?= $peserta->pekerjaan_ibu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Detail Ibu</td>
                                            <td><?= $peserta->detail_ibu ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Tanggungan</td>
                                            <td><?= $peserta->jumlah_tanggungan ?></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="b-w-tab3">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid" id="gambar_sktm" src="<?= base_url('assets/images/sktm/').$peserta->gambar_sktm ?>" alt="<?= $peserta->gambar_sktm ?>">
                                </div>
                                <div class="col-md-9">
                                    <table class="table">
                                        <tr>
                                            <td width="200px">Pekerjaan Ayah</td>
                                            <td><b><?= $peserta->pekerjaan_ayah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan Ayah</td>
                                            <td><b><?= $peserta->penghasilan_ayah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td><b><?= $peserta->pekerjaan_ibu ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan Ibu</td>
                                            <td><b><?= $peserta->penghasilan_ibu ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="b-w-tab4">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid" id="poto_rumah_tampak_depan" src="<?= base_url('assets/images/rumah/').$peserta->poto_rumah_tampak_depan ?>" alt="$peserta->poto_rumah_tampak_depan">
                                    
                                    <img class="img-fluid mt-4" id="poto_ruang_keluarga" src="<?= base_url('assets/images/rumah/').$peserta->poto_ruang_keluarga ?>" alt="<?= $peserta->poto_ruang_keluarga ?>">
                                </div>
                                <div class="col-md-9">
                                    <table class="table">
                                        <tr>
                                            <td width="200px">Kepemilikan Rumah</td>
                                            <td><b><?= $peserta->kepemilikan_rumah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Listrik</td>
                                            <td><b><?= $peserta->sumber_listrik ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Air</td>
                                            <td><b><?= $peserta->sumber_air ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Luas Tanah</td>
                                            <td><b><?= $peserta->luas_tanah ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Luas Bangunan</td>
                                            <td><?= $peserta->luas_bangunan ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="b-w-tab5">
                            <div class="row">
                                <div class="col-md-3">                              
                                    <img class="img-fluid" id="bukti_prestasi" src="<?= base_url('assets/images/bukti/').$peserta->bukti_prestasi ?>" alt="<?= $peserta->bukti_prestasi ?>">
                                </div>                   
                                <div class="col-md-9">
                                    <table class="table">
                                    <tr>
                                            <th>No</th>
                                            <th>Prestasi</th>
                                            <th>Tingkat Prestasi</th>
                                            <th>Minat Program Studi</th>
                                            <th>Wawasan ICT</th>
                                            <th>Predikat Ujian</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><?= $peserta->prestasi ?></td>
                                            <td><?= $peserta->tingkat_prestasi ?></td>
                                            <td><?= $peserta->minat_ps ?></td>
                                            <td><?= $peserta->wawasan_ict ?></td>
                                            <td><?= $peserta->predikat_ujian?></td>
                                        </tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->