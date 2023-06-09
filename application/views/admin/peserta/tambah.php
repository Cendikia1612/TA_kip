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
</style>

<!-- [ Main Content ] start -->
<div class="row">
    <!-- Alternative Pagination table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <div class="col-sm-8 pl-0 pr-2">
                    <?= $this->session->flashdata('pesan'); ?>
                </div>
                    
<form method="post" action="<?= base_url('admin/peserta/tambah') ?>" enctype="multipart/form-data">

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
                    <img class="img-fluid" id="poto" src="<?= base_url('assets/images/user/default.png') ?>" alt="...">
                    <div align="center" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new1" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>pilih poto</b></label>
                    </div>
                    <input type="file" name="poto" id="upload-new1" style="display: none" onchange="previewPoto()">
                    <div class="mt-2">
                        <strong>Keterangan:</strong><br>
                        - ukuran poto maksimal 2mb <br>
                        - ektensi poto jpg, jpeg atau png
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nomor Induk Siswa Nasional (NISN)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nisn">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nomor Induk Kependudukan (NIK)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nomor_nik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No. Kartu Indnesia Pintar (KIP)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nomor_kip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No. Kartu Keluarga Sejahtera</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nomor_kks">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="sekolah_asal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat Sekolah</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" spellcheck="false" name="alamat_sekolah"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun Lulus</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tahun_lulus">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tempat Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Agama</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="agama">
                                <option value="">Pilih</option>
                                <?php 
                                    foreach ($agama as $agama) { ?>
                                        <option value='<?= $agama ?>'><?= $agama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" spellcheck="false" name="alamat_peserta"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="provinsi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kabupaten">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kode POS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kode_pos">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">E-Mail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No. Handphone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nomor_hp">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="b-w-tab2">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" id="poto_keluarga" src="<?= base_url('assets/images/user/default.png') ?>" alt="...">
                    <div align="center" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new2" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>pilih poto keluarga</b></label>
                    </div>
                    <input type="file" name="poto_keluarga" id="upload-new2" style="display: none" onchange="previewPoto_keluarga()">
                    <div class="mt-2">
                        <strong>Keterangan:</strong><br>
                        - ukuran poto maksimal 2mb <br>
                        - ektensi poto jpg, jpeg atau png
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nomor Kartu Keluarga (KK)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nomor_kk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NIK Kepala Keluarga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nik_kepala_keluarga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_ayah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status_ayah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Status Ayah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Hubungan dengan Ayah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="hubungan_ayah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pendidikan Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pendidikan_ayah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pekerjaan Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pekerjaan_ayah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Pekerjaan Ayah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Detail Ayah</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" spellcheck="false" name="detail_ayah"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Ibu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status Ibu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status_ibu">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Status Ibu";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pendidikan Ibu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pendidikan_ibu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pekerjaan_ibu">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Pekerjaan Ibu";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Detail Ibu</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" spellcheck="false" name="detail_ibu"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jumlah Tanggungan</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="jumlah_tanggungan">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Jumlah Tanggungan";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="b-w-tab3">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" id="gambar_sktm" src="<?= base_url('assets/images/user/default.png') ?>" alt="...">
                    <div align="center" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new3" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>pilih SKTM</b></label>
                    </div>
                    <input type="file" name="gambar_sktm" id="upload-new3" style="display: none" onchange="previewGambar_sktm()">
                    <div class="mt-2">
                        <strong>Keterangan:</strong><br>
                        - ukuran poto maksimal 2mb <br>
                        - ektensi poto jpg, jpeg atau png
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pekerjaan Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pekerjaan_ayah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Pekerjaan Ayah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Penghasilan Ayah/ Wali</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="penghasilan_ayah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Penghasilan Ayah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pekerjaan_ibu">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Pekerjaan Ibu";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pengasilan Ibu</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="penghasilan_ibu">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Penghasilan Ibu";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="b-w-tab4">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" id="poto_rumah_tampak_depan" src="<?= base_url('assets/images/user/default.png') ?>" alt="...">
                    <div align="center" class="mb-4" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new4" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>pilih poto rumah tampak depan</b></label>
                    </div>
                    <input type="file" name="poto_rumah_tampak_depan" id="upload-new4" style="display: none" onchange="previewPoto_rumah_tampak_depan()">

                    <img class="img-fluid" id="poto_ruang_keluarga" src="<?= base_url('assets/images/user/default.png') ?>" alt="...">
                    <div align="center" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new5" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>pilih pto ruang keluarga</b></label>
                    </div>
                    <input type="file" name="poto_ruang_keluarga" id="upload-new5" style="display: none" onchange="previewPoto_ruang_keluarga()">
                    <div class="mt-2">
                        <strong>Keterangan:</strong><br>
                        - ukuran poto maksimal 2mb <br>
                        - ektensi poto jpg, jpeg atau png
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kepemilikan Rumah</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="kepemilikan_rumah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Kepemilikan Rumah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Sumber Listrik</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sumber_listrik">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Sumber Listrik";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Sumber Air</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sumber_air">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Sumber Air";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Luas Tanah</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="luas_tanah">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Luas Tanah";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Luas Bangunan</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="luas_bangunan">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Luas Bangunan";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="b-w-tab5">
            <div class="row">
            <div class="col-md-3">
                    <img class="img-fluid" id="bukti_prestasi" src="<?= base_url('assets/images/bukti/').$peserta->bukti_prestasi ?>" alt="<?= $peserta->bukti_prestasi ?>">
                    <div align="center" style="padding-top: 5px; background: #d5d9dc">
                        <label for="upload-new6" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>Upload Prestasi</b></label>
                    </div>
                    <input type="file" name="bukti_prestasi" id="upload-new6" style="display: none" onchange="previewBukti_prestasi()">
                    <div class="mt-2">
                        <strong>Keterangan:</strong><br>
                        - ukuran poto maksimal 2mb <br>
                        - ektensi poto jpg, jpeg atau png
                    </div>
                                    
                <div class="col-md-9">
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading"><i class="feather icon-alert-circle"></i> Perhatian!</h4>
                        <p>Anda diperkenankan untuk mengisi 1 prestasi. Hanya isikan prestasi yang menurut Anda merupakan yang terbaik.</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="prestasi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Prestasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jenis_prestasi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tingkat Prestasi</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="tingkat_prestasi">
                                <option value="">Pilih</option>
                                <?php
                                    $kategori = "Prestasi";
                                    $kriteria = $this->Model_kriteria->getKriteria($kategori);
                                    foreach ($kriteria as $kri) { ?>
                                        <option value='<?= $kri->nama_kriteria ?>'><?= $kri->nama_kriteria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun Prestasi</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="tahun_prestasi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pencapaian Prestasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pencapaian_prestasi">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <hr>
        <div class="row justify-content-between btn-page">
            <div class="col-sm-12 text-md-right">
                <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)) ?>" class="btn btn-danger">Batal</a>
                <button class="btn btn-secondary" name="simpan">Simpan</button>
            </div>
        </div>
        
    </div>
</div>

</form>

            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->

<script type="text/javascript">
function previewPoto() {
   poto.src=URL.createObjectURL(event.target.files[0]);
}
function previewPoto_keluarga() {
   poto_keluarga.src=URL.createObjectURL(event.target.files[0]);
}
function previewGambar_sktm() {
   gambar_sktm.src=URL.createObjectURL(event.target.files[0]);
}
function previewPoto_rumah_tampak_depan() {
   poto_rumah_tampak_depan.src=URL.createObjectURL(event.target.files[0]);
}
function previewPoto_ruang_keluarga() {
   poto_ruang_keluarga.src=URL.createObjectURL(event.target.files[0]);
}
function previewBukti_prestasi() {
   bukti_prestasi.src=URL.createObjectURL(event.target.files[0]);
}
</script>