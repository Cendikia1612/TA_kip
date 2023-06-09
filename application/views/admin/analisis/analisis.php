<style type="text/css">
	table td{
		vertical-align: middle !important;
		padding: 5px 10px !important;
	}

    table th{
        vertical-align: middle !important;
        padding: 5px 10px !important;
        text-align: center;
    }


	.btn-kriteria{
		padding: 0px 10px !important;
	}
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
                <h5>Proses Analisis Data</h5>
            </div>
            <div class="card-body">
            	<?= $this->session->flashdata('pesan'); ?>


<div class="bt-wizard" id="besicwizard">
    <ul class="nav nav-pills nav-fill mb-3">
        <li class="nav-item menu"><a href="#b-w-tab1" class="nav-link" data-toggle="tab">Data Training</a></li>
        <li class="nav-item menu"><a href="#b-w-tab2" class="nav-link" data-toggle="tab">Proses klasifikasi</a></li>
        <li class="nav-item menu"><a href="#b-w-tab3" class="nav-link" data-toggle="tab">Data Testing</a></li>
        <li class="nav-item menu"><a href="#b-w-tab4" class="nav-link" data-toggle="tab">Hasil Pengujian</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active show" id="b-w-tab1">

            <div class="row">

                <div class="card-body table-border-style">
                    <div class="dt-responsive table-responsive">
                        <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th width="100">Kode Pendaftaran</th>
                                    <th>Nama Siswa</th>
                                    <th width="10">Gender</th>
                                    <th>Asal Sekolah</th>
                                    <th>Status Kelayakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($TotalData as $p): ?> 
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $p->kode_pendaftaran; ?></td>
                                        <td><?= $p->nama_lengkap; ?></td>
                                        <td class="text-center"><?= $p->jenis_kelamin; ?></td>
                                        <td><?= $p->sekolah_asal; ?>
                                        <td class="text-center"><?= ($p->label=='Layak')?'<span class="badge badge-light-info">Layak</span>':'<span class="badge badge-light-danger">Tidak Layak</span>'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pendaftaran</th>
                                    <th>Nama Lengkap</th>
                                    <th>Gender</th>
                                    <th>Asal Sekolah</th>
                                    <th>Status Kelayakan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


            </div>
        </div>

        <div class="tab-pane" id="b-w-tab2">

            <div class="row">

                <div class="col-md-5">
                    <?php
                        $totalData          = COUNT($TotalData);
                        $totalLayak         = COUNT($this->Model_analisis->getLabel("Layak"));
                        $totalTidakLayak    = COUNT($this->Model_analisis->getLabel("Tidak Layak"));
                        // $probLayak          = $totalLayak / $totalData;
                        // $probTidakLayak     = $totalTidakLayak / $totalData;

                        $totalDataLC        = COUNT($TotalData) + 2;
                        $totalLayakLC       = COUNT($this->Model_analisis->getLabel("Layak")) + 1;
                        $totalTidakLayakLC  = COUNT($this->Model_analisis->getLabel("Tidak Layak")) + 1;
                        $probLayakLC        = $totalLayakLC / $totalDataLC;
                        $probTidakLayakLC   = $totalTidakLayakLC / $totalDataLC;
                    ?>
                    <table class="table mb-3">
                        <thead>
                            <tr>
                                <th>Jumlah Data Training</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $totalData; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table mb-3">
                        <thead>
                            <tr>
                                <th colspan="2"><center>Jumlah Kejadian Label</center></th>
                                <th colspan="2"><center>Nilai Probabilitas</center></th>
                            </tr>
                            <tr>
                                <th><center>Layak</center></th>
                                <th><center>Tidak Layak</center></th>
                                <th><center>Layak</center></th>
                                <th><center>Tidak Layak</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center"><?= $totalLayakLC; ?></td>
                                <td align="center"><?= $totalTidakLayakLC; ?></td>
                                <td align="center"><?= number_format($probLayakLC, 10); ?></td>
                                <td align="center"><?= number_format($probTidakLayakLC, 10); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="col-md-12">
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Pekerjaan Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Pekerjaan Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Pekerjaan Ayah'])->result();
                                    $totPekerjaanAyahA  = COUNT($this->Model_analisis->getTotalKriteria("Pekerjaan Ayah")) + $totalLayak;
                                    $totPekerjaanAyahB  = COUNT($this->Model_analisis->getTotalKriteria("Pekerjaan Ayah")) + $totalTidakLayak;
                                    $probPekerjaanAyahA  = 0;
                                    $probPekerjaanAyahB  = 0;
                                    foreach ($data as $key1):
                                        $PAL    = COUNT($this->Model_analisis->getPekerjaanAyah($key1->nama_kriteria, "Layak")) + 1;
                                        $PATL   = COUNT($this->Model_analisis->getPekerjaanAyah($key1->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $PAL / $totPekerjaanAyahA;
                                        $PKB    = $PATL / $totPekerjaanAyahB;
                                        $probPekerjaanAyahA   += $PKA;
                                        $probPekerjaanAyahB   += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key1->nama_kriteria ?></td>
                                            <td align="center"><?= $PAL; ?></td>
                                            <td align="center"><?= $PATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPekerjaanAyahA; ?></td>
                                            <td align="center"><?= $totPekerjaanAyahB; ?></td>
                                            <td align="center"><?= $probPekerjaanAyahA; ?></td>
                                            <td align="center"><?= $probPekerjaanAyahB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Penghasilan Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Penghasilan Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data2 = $this->db->get_where('tbl_kriteria', ['kategori' => 'Penghasilan Ayah'])->result();
                                    $totPenghasilanAyahA = COUNT($this->Model_analisis->getTotalKriteria("Penghasilan Ayah")) + $totalLayak;
                                    $totPenghasilanAyahB = COUNT($this->Model_analisis->getTotalKriteria("Penghasilan Ayah")) + $totalTidakLayak;
                                    $probPenghasilanAyahA  = 0;
                                    $probPenghasilanAyahB  = 0;
                                    foreach ($data2 as $key2):
                                        $PenghasilanAL    = COUNT($this->Model_analisis->getPenghasilanAyah($key2->nama_kriteria, "Layak")) + 1;
                                        $PenghasilanATL   = COUNT($this->Model_analisis->getPenghasilanAyah($key2->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $PenghasilanAL / $totPenghasilanAyahA;
                                        $PKB    = $PenghasilanATL / $totPenghasilanAyahB;
                                        $probPenghasilanAyahA   += $PKA;
                                        $probPenghasilanAyahB   += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key2->nama_kriteria ?></td>
                                            <td align="center"><?= $PenghasilanAL; ?></td>
                                            <td align="center"><?= $PenghasilanATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPenghasilanAyahA; ?></td>
                                            <td align="center"><?= $totPenghasilanAyahB; ?></td>
                                            <td align="center"><?= $probPenghasilanAyahA; ?></td>
                                            <td align="center"><?= $probPenghasilanAyahB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Status Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Status Ayah</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Status Ayah'])->result();
                                    $totStatusAyahA  = COUNT($this->Model_analisis->getTotalKriteria("Status Ayah")) + $totalLayak;
                                    $totStatusAyahB  = COUNT($this->Model_analisis->getTotalKriteria("Status Ayah")) + $totalTidakLayak;
                                    $probStatusAyahA = 0;
                                    $probStatusAyahB = 0;
                                    foreach ($data as $key3):
                                        $StatusAL    = COUNT($this->Model_analisis->getStatusAyah($key3->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getStatusAyah($key3->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totStatusAyahA;
                                        $PKB    = $StatusATL / $totStatusAyahB;
                                        $probStatusAyahA += $PKA;
                                        $probStatusAyahB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key3->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totStatusAyahA; ?></td>
                                            <td align="center"><?= $totStatusAyahB; ?></td>
                                            <td align="center"><?= $probStatusAyahA; ?></td>
                                            <td align="center"><?= $probStatusAyahB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">


                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Pekerjaan Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Pekerjaan Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Pekerjaan Ibu'])->result();
                                    $totPekerjaanIbuA  = COUNT($this->Model_analisis->getTotalKriteria("Pekerjaan Ibu")) + $totalLayak;
                                    $totPekerjaanIbuB  = COUNT($this->Model_analisis->getTotalKriteria("Pekerjaan Ibu")) + $totalTidakLayak;
                                    $probPekerjaanIbuA = 0;
                                    $probPekerjaanIbuB = 0;
                                    foreach ($data as $key4):
                                        $PAL    = COUNT($this->Model_analisis->getPekerjaanIbu($key4->nama_kriteria, "Layak")) + 1;
                                        $PATL   = COUNT($this->Model_analisis->getPekerjaanIbu($key4->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $PAL / $totPekerjaanIbuA;
                                        $PKB    = $PATL / $totPekerjaanIbuB;
                                        $probPekerjaanIbuA += $PKA;
                                        $probPekerjaanIbuB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key4->nama_kriteria ?></td>
                                            <td align="center"><?= $PAL; ?></td>
                                            <td align="center"><?= $PATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPekerjaanIbuA; ?></td>
                                            <td align="center"><?= $totPekerjaanIbuB; ?></td>
                                            <td align="center"><?= $probPekerjaanIbuA; ?></td>
                                            <td align="center"><?= $probPekerjaanIbuB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Penghasilan Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Penghasilan Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data2 = $this->db->get_where('tbl_kriteria', ['kategori' => 'Penghasilan Ibu'])->result();
                                    $totPenghasilanIbuA  = COUNT($this->Model_analisis->getTotalKriteria("Penghasilan Ibu")) + $totalLayak;
                                    $totPenghasilanIbuB  = COUNT($this->Model_analisis->getTotalKriteria("Penghasilan Ibu")) + $totalTidakLayak;
                                    $probPenghasilanIbuA = 0;
                                    $probPenghasilanIbuB = 0;
                                    foreach ($data2 as $key5):
                                        $PenghasilanAL    = COUNT($this->Model_analisis->getPenghasilanIbu($key5->nama_kriteria, "Layak")) + 1;
                                        $PenghasilanATL   = COUNT($this->Model_analisis->getPenghasilanIbu($key5->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $PenghasilanAL / $totPenghasilanIbuA;
                                        $PKB    = $PenghasilanATL / $totPenghasilanIbuB;
                                        $probPenghasilanIbuA += $PKA;
                                        $probPenghasilanIbuB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key5->nama_kriteria ?></td>
                                            <td align="center"><?= $PenghasilanAL; ?></td>
                                            <td align="center"><?= $PenghasilanATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPenghasilanIbuA; ?></td>
                                            <td align="center"><?= $totPenghasilanIbuB; ?></td>
                                            <td align="center"><?= $probPenghasilanIbuA; ?></td>
                                            <td align="center"><?= $probPenghasilanIbuB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Status Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Status Ibu</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Status Ibu'])->result();
                                    $totStatusIbuA  = COUNT($this->Model_analisis->getTotalKriteria("Status Ibu")) + $totalLayak;
                                    $totStatusIbuB  = COUNT($this->Model_analisis->getTotalKriteria("Status Ibu")) + $totalTidakLayak;
                                    $probStatusIbuA = 0;
                                    $probStatusIbuB = 0;
                                    foreach ($data as $key6):
                                        $StatusAL   = COUNT($this->Model_analisis->getStatusIbu($key6->nama_kriteria, "Layak")) + 1;
                                        $StatusATL  = COUNT($this->Model_analisis->getStatusIbu($key6->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totStatusIbuA;
                                        $PKB    = $StatusATL / $totStatusIbuB;
                                        $probStatusIbuA += $PKA;
                                        $probStatusIbuB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key6->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totStatusIbuA; ?></td>
                                            <td align="center"><?= $totStatusIbuB; ?></td>
                                            <td align="center"><?= $probStatusIbuA; ?></td>
                                            <td align="center"><?= $probStatusIbuB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">


                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Jumlah Tanggungan</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Jumlah Tanggungan</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
<tbody>
    <?php
    
    $o_1 = COUNT($this->Model_analisis->getJumlahTanggungan("1 Orang", "Layak")) + 1;
    $o_2 = COUNT($this->Model_analisis->getJumlahTanggungan("2 Orang", "Layak")) + 1;
    $o_3 = COUNT($this->Model_analisis->getJumlahTanggungan("3 Orang", "Layak")) + 1;
    $o_4 = COUNT($this->Model_analisis->getJumlahTanggungan("4 Orang", "Layak")) + 1;
    $o_5 = COUNT($this->Model_analisis->getJumlahTanggungan("5 Orang", "Layak")) + 1;
    $o_6 = COUNT($this->Model_analisis->getJumlahTanggungan("6 Orang", "Layak")) + 1;
    $o_7 = COUNT($this->Model_analisis->getJumlahTanggungan("7 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("8 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("9 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("10 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("11 Orang", "Layak")) + 1;
    $totalTanggunganLayak = $o_1 + $o_2 + $o_3 + $o_4 + $o_5 + $o_6 + $o_7;

    
    $po_1 = $o_1 / $totalTanggunganLayak;
    $po_2 = $o_2 / $totalTanggunganLayak;
    $po_3 = $o_3 / $totalTanggunganLayak;
    $po_4 = $o_4 / $totalTanggunganLayak;
    $po_5 = $o_5 / $totalTanggunganLayak;
    $po_6 = $o_6 / $totalTanggunganLayak;
    $po_7 = $o_7 / $totalTanggunganLayak;
    $totalProbabilitasTanggunganLayak = $po_1 + $po_2 + $po_3 + $po_4 + $po_5 + $po_6 + $po_7;

    $o_1t = COUNT($this->Model_analisis->getJumlahTanggungan("1 Orang", "Tidak Layak")) + 1;
    $o_2t = COUNT($this->Model_analisis->getJumlahTanggungan("2 Orang", "Tidak Layak")) + 1;
    $o_3t = COUNT($this->Model_analisis->getJumlahTanggungan("3 Orang", "Tidak Layak")) + 1;
    $o_4t = COUNT($this->Model_analisis->getJumlahTanggungan("4 Orang", "Tidak Layak")) + 1;
    $o_5t = COUNT($this->Model_analisis->getJumlahTanggungan("5 Orang", "Tidak Layak")) + 1;
    $o_6t = COUNT($this->Model_analisis->getJumlahTanggungan("6 Orang", "Tidak Layak")) + 1;
    $o_7t = COUNT($this->Model_analisis->getJumlahTanggungan("7 Orang", "Tidak Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("8 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("9 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("10 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("11 Orang", "Layak")) + 1;
    $totalTanggunganTidak = $o_1t + $o_2t + $o_3t + $o_4t + $o_5t + $o_6t + $o_7t;

    $po_1t = $o_1t / $totalTanggunganTidak;
    $po_2t = $o_2t / $totalTanggunganTidak;
    $po_3t = $o_3t / $totalTanggunganTidak;
    $po_4t = $o_4t / $totalTanggunganTidak;
    $po_5t = $o_5t / $totalTanggunganTidak;
    $po_6t = $o_6t / $totalTanggunganTidak;
    $po_7t = $o_7t / $totalTanggunganTidak;
    $totalProbabilitasTanggunganTidak = $po_1t + $po_2t + $po_3t + $po_4t + $po_5t + $po_6t + $po_7t;
    ?>

    <tr>
        <td>1 Orang</td>
        <td align="center"><?= $o_1 ?></td>
        <td align="center"><?= $o_1t ?></td>
        <td align="center"><?= number_format($po_1, 10); ?></td>
        <td align="center"><?= number_format($po_1t, 10); ?></td>
    </tr>
    <tr>
        <td>2 Orang</td>
        <td align="center"><?= $o_2 ?></td>
        <td align="center"><?= $o_2t ?></td>
        <td align="center"><?= number_format($po_2, 10); ?></td>
        <td align="center"><?= number_format($po_2t, 10); ?></td>
    </tr>
    <tr>
        <td>3 Orang</td>
        <td align="center"><?= $o_3 ?></td>
        <td align="center"><?= $o_3t ?></td>
        <td align="center"><?= number_format($po_3, 10); ?></td>
        <td align="center"><?= number_format($po_3t, 10); ?></td>
    </tr>
    <tr>
        <td>4 Orang</td>
        <td align="center"><?= $o_4 ?></td>
        <td align="center"><?= $o_4t ?></td>
        <td align="center"><?= number_format($po_4, 10); ?></td>
        <td align="center"><?= number_format($po_4t, 10); ?></td>
    </tr>
    <tr>
        <td>5 Orang</td>
        <td align="center"><?= $o_5 ?></td>
        <td align="center"><?= $o_5t ?></td>
        <td align="center"><?= number_format($po_5, 10); ?></td>
        <td align="center"><?= number_format($po_5t, 10); ?></td>
    </tr>
    <tr>
        <td>6 Orang</td>
        <td align="center"><?= $o_6 ?></td>
        <td align="center"><?= $o_6t ?></td>
        <td align="center"><?= number_format($po_6, 10); ?></td>
        <td align="center"><?= number_format($po_6t, 10); ?></td>
    </tr>
    <tr>
        <td>>= 7 Orang</td>
        <td align="center"><?= $o_7 ?></td>
        <td align="center"><?= $o_7t ?></td>
        <td align="center"><?= number_format($po_7, 10); ?></td>
        <td align="center"><?= number_format($po_7t, 10); ?></td>
    </tr>

    <tr>
        <td></td>
        <td align="center"><?= $totalTanggunganLayak; ?></td>
        <td align="center"><?= $totalTanggunganTidak; ?></td>
        <td align="center"><?= $totalProbabilitasTanggunganLayak; ?></td>
        <td align="center"><?= $totalProbabilitasTanggunganTidak; ?></td>
    </tr>
</tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">


                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Kepemilikan Rumah</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Kepemilikan Rumah</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Kepemilikan Rumah'])->result();
                                    $totKepemilikanRumahA = COUNT($this->Model_analisis->getTotalKriteria("Kepemilikan Rumah")) + $totalLayak;
                                    $totKepemilikanRumahB = COUNT($this->Model_analisis->getTotalKriteria("Kepemilikan Rumah")) + $totalTidakLayak;
                                    $probKepemilikanRumahA= 0;
                                    $probKepemilikanRumahB= 0;
                                    foreach ($data as $key8):
                                        $StatusAL    = COUNT($this->Model_analisis->getKepemilikanRumah($key8->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getKepemilikanRumah($key8->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totKepemilikanRumahA;
                                        $PKB    = $StatusATL / $totKepemilikanRumahB;
                                        $probKepemilikanRumahA += $PKA;
                                        $probKepemilikanRumahB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key8->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totKepemilikanRumahA; ?></td>
                                            <td align="center"><?= $totKepemilikanRumahB; ?></td>
                                            <td align="center"><?= $probKepemilikanRumahA; ?></td>
                                            <td align="center"><?= $probKepemilikanRumahB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Sumber Listrik</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Sumber Listrik</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Sumber Listrik'])->result();
                                    $totSumberListrikA  = COUNT($this->Model_analisis->getTotalKriteria("Sumber Listrik")) + $totalLayak;
                                    $totSumberListrikB  = COUNT($this->Model_analisis->getTotalKriteria("Sumber Listrik")) + $totalTidakLayak;
                                    $probSumberListrikA = 0;
                                    $probSumberListrikB = 0;
                                    foreach ($data as $key9):
                                        $StatusAL    = COUNT($this->Model_analisis->getSumberListrik($key9->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getSumberListrik($key9->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totSumberListrikA;
                                        $PKB    = $StatusATL / $totSumberListrikB;
                                        $probSumberListrikA += $PKA;
                                        $probSumberListrikB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key9->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totSumberListrikA; ?></td>
                                            <td align="center"><?= $totSumberListrikB; ?></td>
                                            <td align="center"><?= $probSumberListrikA; ?></td>
                                            <td align="center"><?= $probSumberListrikB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Luas Tanah</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Luas Tanah</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Luas Tanah'])->result();
                                    $totLuasTanahA  = COUNT($this->Model_analisis->getTotalKriteria("Luas Tanah")) + $totalLayak;
                                    $totLuasTanahB  = COUNT($this->Model_analisis->getTotalKriteria("Luas Tanah")) + $totalTidakLayak;
                                    $probLuasTanahA = 0;
                                    $probLuasTanahB = 0;
                                    foreach ($data as $key10):
                                        $StatusAL    = COUNT($this->Model_analisis->getLuasTanah($key10->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getLuasTanah($key10->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totLuasTanahA;
                                        $PKB    = $StatusATL / $totLuasTanahB;
                                        $probLuasTanahA += $PKA;
                                        $probLuasTanahB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key10->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totLuasTanahA; ?></td>
                                            <td align="center"><?= $totLuasTanahB; ?></td>
                                            <td align="center"><?= $probLuasTanahA; ?></td>
                                            <td align="center"><?= $probLuasTanahB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Luas Bangunan</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Luas Bangunan</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Luas Bangunan'])->result();
                                    $totLuasBangunanA  = COUNT($this->Model_analisis->getTotalKriteria("Luas Bangunan")) + $totalLayak;
                                    $totLuasBangunanB  = COUNT($this->Model_analisis->getTotalKriteria("Luas Bangunan")) + $totalTidakLayak;
                                    $probLuasBangunanA = 0;
                                    $probLuasBangunanB = 0;
                                    foreach ($data as $key11):
                                        $StatusAL    = COUNT($this->Model_analisis->getLuasBangunan($key11->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getLuasBangunan($key11->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totLuasBangunanA;
                                        $PKB    = $StatusATL / $totLuasBangunanB;
                                        $probLuasBangunanA += $PKA;
                                        $probLuasBangunanB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key11->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totLuasBangunanA; ?></td>
                                            <td align="center"><?= $totLuasBangunanB; ?></td>
                                            <td align="center"><?= $probLuasBangunanA; ?></td>
                                            <td align="center"><?= $probLuasBangunanB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria dan Sumber Air</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Sumber Air</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Sumber Air'])->result();
                                    $totSumberAirA  = COUNT($this->Model_analisis->getTotalKriteria("Sumber Air")) + $totalLayak;
                                    $totSumberAirB  = COUNT($this->Model_analisis->getTotalKriteria("Sumber Air")) + $totalTidakLayak;
                                    $probSumberAirA = 0;
                                    $probSumberAirB = 0;
                                    foreach ($data as $key12):
                                        $StatusAL   = COUNT($this->Model_analisis->getSumberAir($key12->nama_kriteria, "Layak")) + 1;
                                        $StatusATL  = COUNT($this->Model_analisis->getSumberAir($key12->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totSumberAirA;
                                        $PKB    = $StatusATL / $totSumberAirB;
                                        $probSumberAirA += $PKA;
                                        $probSumberAirB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key12->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totSumberAirA; ?></td>
                                            <td align="center"><?= $totSumberAirB; ?></td>
                                            <td align="center"><?= $probSumberAirA; ?></td>
                                            <td align="center"><?= $probSumberAirB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria Prestasi</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Prestasi</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'prestasi'])->result();
                                    $totPrestasiA  = COUNT($this->Model_analisis->getTotalKriteria("Prestasi")) + $totalLayak;
                                    $totPrestasiB  = COUNT($this->Model_analisis->getTotalKriteria("Prestasi")) + $totalTidakLayak;
                                    $probPrestasiA = 0;
                                    $probPrestasiB = 0;
                                    foreach ($data as $key13):
                                        $StatusAL    = COUNT($this->Model_analisis->getPrestasi($key13->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getPrestasi($key13->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totPrestasiA;
                                        $PKB    = $StatusATL / $totPrestasiB;
                                        $probPrestasiA += $PKA;
                                        $probPrestasiB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key13->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPrestasiA; ?></td>
                                            <td align="center"><?= $totPrestasiB; ?></td>
                                            <td align="center"><?= $probPrestasiA; ?></td>
                                            <td align="center"><?= $probPrestasiB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria Predikat Ujian</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Ujian</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Predikat Ujian'])->result();
                                    $totPredikatA  = COUNT($this->Model_analisis->getTotalKriteria("Predikat Ujian")) + $totalLayak;
                                    $totPredikatB  = COUNT($this->Model_analisis->getTotalKriteria("Predikat Ujian")) + $totalTidakLayak;
                                    $probPrestasiA = 0;
                                    $probPrestasiB = 0;
                                    foreach ($data as $key14):
                                        $StatusAL    = COUNT($this->Model_analisis->getPredikatUjian($key14->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getPredikatUjian($key14->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totPredikatA;
                                        $PKB    = $StatusATL / $totPredikatB;
                                        $probPrestasiA += $PKA;
                                        $probPrestasiB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key14->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totPredikatA; ?></td>
                                            <td align="center"><?= $totPredikatB; ?></td>
                                            <td align="center"><?= $probPrestasiA; ?></td>
                                            <td align="center"><?= $probPrestasiB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>                        

                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria Minat Program Studi</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Minat Program Studi</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Minat Program Studi'])->result();
                                    $totMinatpsA  = COUNT($this->Model_analisis->getTotalKriteria("Minat Program Studi")) + $totalLayak;
                                    $totMinatpsB  = COUNT($this->Model_analisis->getTotalKriteria("Minat Program Studi")) + $totalTidakLayak;
                                    $probPrestasiA = 0;
                                    $probPrestasiB = 0;
                                    foreach ($data as $key15):
                                        $StatusAL    = COUNT($this->Model_analisis->getMinatProgramStudi($key15->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getMinatProgramStudi($key15->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totMinatpsA;
                                        $PKB    = $StatusATL / $totMinatpsB;
                                        $probPrestasiA += $PKA;
                                        $probPrestasiB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key15->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totMinatpsA; ?></td>
                                            <td align="center"><?= $totMinatpsB; ?></td>
                                            <td align="center"><?= $probPrestasiA; ?></td>
                                            <td align="center"><?= $probPrestasiB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                               
                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Probabilitas Kriteria Wawasan ICT</th>
                                        <th colspan="2" class="py-2 text-center">Jumlah kejadian Wawasan ICT</th>
                                        <th colspan="2" class="py-2 text-center">Nilai Probabilitas</th>
                                    </tr>
                                    <tr>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                        <th class="py-2" width="130"><center>Layak</center></th>
                                        <th class="py-2" width="130"><center>Tidak Layak</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => 'Wawasan ICT'])->result();
                                    $totWawasanA  = COUNT($this->Model_analisis->getTotalKriteria("Wawasan ICT")) + $totalLayak;
                                    $totWawasanB  = COUNT($this->Model_analisis->getTotalKriteria("Wawasan ICT")) + $totalTidakLayak;
                                    $probPrestasiA = 0;
                                    $probPrestasiB = 0;
                                    foreach ($data as $key16):
                                        $StatusAL    = COUNT($this->Model_analisis->getWawasanICT($key16->nama_kriteria, "Layak")) + 1;
                                        $StatusATL   = COUNT($this->Model_analisis->getWawasanICT($key16->nama_kriteria, "Tidak Layak")) + 1;
                                        $PKA    = $StatusAL / $totWawasanA;
                                        $PKB    = $StatusATL / $totWawasanB;
                                        $probPrestasiA += $PKA;
                                        $probPrestasiB += $PKB;
                                        ?>
                                        <tr>
                                            <td><?= $key16->nama_kriteria ?></td>
                                            <td align="center"><?= $StatusAL; ?></td>
                                            <td align="center"><?= $StatusATL; ?></td>
                                            <td align="center"><?= number_format($PKA, 10); ?></td>
                                            <td align="center"><?= number_format($PKB, 10); ?></td>
                                        </tr>    
                                    <?php endforeach; ?>
                                        <tr>
                                            <td></td>
                                            <td align="center"><?= $totWawasanA; ?></td>
                                            <td align="center"><?= $totWawasanB; ?></td>
                                            <td align="center"><?= $probPrestasiA; ?></td>
                                            <td align="center"><?= $probPrestasiB; ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr style="margin-top: -14px; margin-bottom: 40px;">

                </div>
            </div>
        </div>

        <div class="tab-pane" id="b-w-tab3">
            <div class="row">

                <div class="card-body table-border-style">
                    <div class="dt-responsive table-responsive">
                        <table id="alt-pg-dt" class="table table-data-testing table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th width="100">Kode Pendaftaran</th>
                                    <th>Nama Siswa</th>
                                    <th width="10">Gender</th>
                                    <th>Asal Sekolah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataTes as $dtes): ?> 
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $dtes->kode_pendaftaran; ?></td>
                                        <td><?= $dtes->nama_lengkap; ?></td>
                                        <td class="text-center"><?= $dtes->jenis_kelamin; ?></td>
                                        <td><?= $dtes->sekolah_asal; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pendaftaran</th>
                                    <th>Nama Lengkap</th>
                                    <th>Gender</th>
                                    <th>Asal Sekolah</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="tab-pane" id="b-w-tab4">
            <form method="post" action="<?= base_url('admin/analisis/tetapkan'); ?>" onsubmit="return confirm('Apakah anda yakin?')">
                <div class="row">
                    <!-- <h5 class="m-3"> 
                        Berdasarkan tabel dibawah, dari 10 peserta yang mengikuti seleksi, terdapat 6 peserta yang masuk pada kategori layak dan 4 peserta masuk kedalam kategori tidak layak.
                    </h5> -->
                    <div class="col-sm-12 text-right">
                        <a class="btn btn-secondary btn-laporan ml-3" target="_blank" href="<?= base_url('admin/analisis/cetak/'); ?>"><i class="fas fa-print"></i> Cetak</a>
                        <button class="btn btn-secondary btn-laporan" name="tetapkan"><i class="fas fa-clipboard-check"></i> Tetapkan</button>
                    </div>

                    <hr>
                    <div class="card-body table-border-style">
                        <div class="dt-responsive table-responsive">
                            <table id="alt-pg-dt" class="table table-data-result table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th width="100">Kode Pendaftaran</th>
                                        <th>Nama Siswa</th>
                                        <th width="100">Probabilitas<br>Layak</th>
                                        <th width="100">Probabilitas<br>Tidak Layak</th>
                                        <th width="120" colspan="2">Kelayakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no    = 1;
                                    $nilai = 0;
                                    foreach ($dataTes as $dtes): 

                                    //Pekerjaan Ayah //A = Layak //B = Tidak Layak
                                    $pekerjaanA_A    = COUNT($this->Model_analisis->getPekerjaanAyah($dtes->pekerjaan_ayah, "Layak")) + 1;
                                    $pekerjaanA_B    = COUNT($this->Model_analisis->getPekerjaanAyah($dtes->pekerjaan_ayah, "Tidak Layak")) + 1;
                                    $pekerjaanAyahA  = $pekerjaanA_A / $totPekerjaanAyahA;
                                    $pekerjaanAyahB  = $pekerjaanA_B / $totPekerjaanAyahB;

                                    //Penghasilan Ayah //A = Layak //B = Tidak Layak
                                    $penghasilanA_A  = COUNT($this->Model_analisis->getPenghasilanAyah($dtes->penghasilan_ayah, "Layak")) + 1;
                                    $penghasilanA_B  = COUNT($this->Model_analisis->getPenghasilanAyah($dtes->penghasilan_ayah, "Tidak Layak")) + 1;
                                    $penghasilanAyahA= $penghasilanA_A / $totPenghasilanAyahA;
                                    $penghasilanAyahB= $penghasilanA_B / $totPenghasilanAyahB;

                                    //Status Ayah //A = Layak //B = Tidak Layak
                                    $statusA_A       = COUNT($this->Model_analisis->getStatusAyah($dtes->status_ayah, "Layak")) + 1;
                                    $statusA_B       = COUNT($this->Model_analisis->getStatusAyah($dtes->status_ayah, "Tidak Layak")) + 1;
                                    $statusAyahA     = $statusA_A / $totStatusAyahA;
                                    $statusAyahB     = $statusA_B / $totStatusAyahB;

                                    //Pekerjaan Ibu //A = Layak //B = Tidak Layak
                                    $pekerjaanI_A    = COUNT($this->Model_analisis->getPekerjaanIbu($dtes->pekerjaan_ibu, "Layak")) + 1;
                                    $pekerjaanI_B    = COUNT($this->Model_analisis->getPekerjaanIbu($dtes->pekerjaan_ibu, "Tidak Layak")) + 1;
                                    $pekerjaanIbuA   = $pekerjaanI_A / $totPekerjaanIbuA;
                                    $pekerjaanIbuB   = $pekerjaanI_B / $totPekerjaanIbuB;

                                    //Penghasilan Ibu //A = Layak //B = Tidak Layak
                                    $penghasilanI_A  = COUNT($this->Model_analisis->getPenghasilanIbu($dtes->penghasilan_ibu, "Layak")) + 1;
                                    $penghasilanI_B  = COUNT($this->Model_analisis->getPenghasilanIbu($dtes->penghasilan_ibu, "Tidak Layak")) + 1;
                                    $penghasilanIbuA = $penghasilanI_A / $totPenghasilanIbuA;
                                    $penghasilanIbuB = $penghasilanI_B / $totPenghasilanIbuB;

                                    //Status Ibu //A = Layak //B = Tidak Layak
                                    $statusI_A       = COUNT($this->Model_analisis->getStatusIbu($dtes->status_ibu, "Layak")) + 1;
                                    $statusI_B       = COUNT($this->Model_analisis->getStatusIbu($dtes->status_ibu, "Tidak Layak")) + 1;
                                    $statusIbuA      = $statusI_A / $totStatusIbuA;
                                    $statusIbuB      = $statusI_B / $totStatusIbuB;

                                    //Jumlah Tanggungan //A = Layak //B = Tidak Layak
                                    if ($dtes->jumlah_tanggungan == '1 Orang') {
                                        $jumlahTanggunganA = $o_1  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_1t / $totalTanggunganTidak;
                                    }elseif($dtes->jumlah_tanggungan == '2 Orang') {
                                        $jumlahTanggunganA = $o_2  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_2t / $totalTanggunganTidak;
                                    }elseif($dtes->jumlah_tanggungan == '3 Orang') {
                                        $jumlahTanggunganA = $o_3  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_3t / $totalTanggunganTidak;
                                    }elseif($dtes->jumlah_tanggungan == '4 Orang') {
                                        $jumlahTanggunganA = $o_4  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_4t / $totalTanggunganTidak;
                                    }elseif($dtes->jumlah_tanggungan == '5 Orang') {
                                        $jumlahTanggunganA = $o_5  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_5t / $totalTanggunganTidak;
                                    }elseif($dtes->jumlah_tanggungan == '6 Orang') {
                                        $jumlahTanggunganA = $o_6  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_6t / $totalTanggunganTidak;
                                    }else{
                                        $jumlahTanggunganA = $o_7  / $totalTanggunganLayak;
                                        $jumlahTanggunganB = $o_7t / $totalTanggunganTidak;
                                    }

                                    //Kepemilikan Rumah //A = Layak //B = Tidak Layak
                                    $kepemilikanRumah_A = COUNT($this->Model_analisis->getKepemilikanRumah($dtes->kepemilikan_rumah, "Layak")) + 1;
                                    $kepemilikanRumah_B = COUNT($this->Model_analisis->getKepemilikanRumah($dtes->kepemilikan_rumah, "Tidak Layak")) + 1;
                                    $kepemilikanRumahA  = $kepemilikanRumah_A / $totKepemilikanRumahA;
                                    $kepemilikanRumahB  = $kepemilikanRumah_B / $totKepemilikanRumahB;

                                    //Sumber Listrik //A = Layak //B = Tidak Layak
                                    $sumberListrik_A = COUNT($this->Model_analisis->getSumberListrik($dtes->sumber_listrik, "Layak")) + 1;
                                    $sumberListrik_B = COUNT($this->Model_analisis->getSumberListrik($dtes->sumber_listrik, "Tidak Layak")) + 1;
                                    $sumberListrikA  = $sumberListrik_A / $totSumberListrikA;
                                    $sumberListrikB  = $sumberListrik_B / $totSumberListrikB;

                                    //Luas Tanah //A = Layak //B = Tidak Layak
                                    $luasTanah_A = COUNT($this->Model_analisis->getLuasTanah($dtes->luas_tanah, "Layak")) + 1;
                                    $luasTanah_B = COUNT($this->Model_analisis->getLuasTanah($dtes->luas_tanah, "Tidak Layak")) + 1;
                                    $luasTanahA  = $luasTanah_A / $totLuasTanahA;
                                    $luasTanahB  = $luasTanah_B / $totLuasTanahB;

                                    //Luas Bangunan //A = Layak //B = Tidak Layak
                                    $luasBangunan_A = COUNT($this->Model_analisis->getLuasBangunan($dtes->luas_bangunan, "Layak")) + 1;
                                    $luasBangunan_B = COUNT($this->Model_analisis->getLuasBangunan($dtes->luas_bangunan, "Tidak Layak")) + 1;
                                    $luasBangunanA  = $luasBangunan_A / $totLuasBangunanA;
                                    $luasBangunanB  = $luasBangunan_B / $totLuasBangunanB;

                                    //Sumber Air //A = Layak //B = Tidak Layak
                                    $sumberAir_A = COUNT($this->Model_analisis->getSumberAir($dtes->sumber_air, "Layak")) + 1;
                                    $sumberAir_B = COUNT($this->Model_analisis->getSumberAir($dtes->sumber_air, "Tidak Layak")) + 1;
                                    $sumberAirA  = $sumberAir_A / $totSumberAirA;
                                    $sumberAirB  = $sumberAir_B / $totSumberAirB;

                                    //Prestasi //A = Layak //B = Tidak Layak
                                    $prestasi_A = COUNT($this->Model_analisis->getPrestasi($dtes->tingkat_prestasi, "Layak")) + 1;
                                    $prestasi_B = COUNT($this->Model_analisis->getPrestasi($dtes->tingkat_prestasi, "Tidak Layak")) + 1;
                                    $prestasiA  = $prestasi_A / $totPrestasiA;
                                    $prestasiB  = $prestasi_B / $totPrestasiB;

                                    //PredikatUjian //A = Layak //B = Tidak Layak
                                    $predikatUjian_A = COUNT($this->Model_analisis->getPredikatUjian($dtes->predikat_ujian, "Layak")) + 1;
                                    $predikatUjian_B = COUNT($this->Model_analisis->getPredikatUjian($dtes->predikat_ujian, "Tidak Layak")) + 1;
                                    $predikatUjianA  = $predikatUjian_A / $totPredikatA;
                                    $predikatUjianB  = $predikatUjian_B / $totPredikatB;

                                    //Minat Program Studi //A = Layak //B = Tidak Layak
                                    $minatProgram_A = COUNT($this->Model_analisis->getMinatProgramStudi($dtes->minat_ps, "Layak")) + 1;
                                    $minatProgram_B = COUNT($this->Model_analisis->getMinatProgramStudi($dtes->minat_ps, "Tidak Layak")) + 1;
                                    $minatProgramA  = $minatProgram_A / $totMinatpsA;
                                    $minatProgramB  = $minatProgram_B / $totMinatpsB;

                                    //Wawasan ICT //A = Layak //B = Tidak Layak
                                    $wawasanICT_A = COUNT($this->Model_analisis->getWawasanICT($dtes->wawasan_ict, "Layak")) + 1;
                                    $wawasanICT_B = COUNT($this->Model_analisis->getWawasanICT($dtes->wawasan_ict, "Tidak Layak")) + 1;
                                    $wawasanICTA  = $wawasanICT_A / $totWawasanA;
                                    $wawasanICTB  = $wawasanICT_B / $totWawasanB;

  

                                    // //ambil nilai ujian dari table ujian peserta
                                    // $data_ujian = $this->Model_ujian->getSkorAll($dtes->id_peserta);
                                    // if ($data_ujian != NULL) {
                                    //     $nilai = $data_ujian->nilai;
                                    // }else{
                                    //     $nilai = 0;
                                    // }

                                    // if(($nilai >= 80) && ($nilai <= 100)){
                                    //     $predikatUjian = "Baik";
                                    //     $probUjian     = $prob_ujianBaik;
                                    //     $probUjiant    = $prob_ujianBaikt;
                                    // }else if(($nilai >= 60) && ($nilai < 80)){
                                    //     $predikatUjian = "Cukup";
                                    //     $probUjian     = $prob_ujianCukup;
                                    //     $probUjiant    = $prob_ujianCukupt;
                                    // }else{
                                    //     $predikatUjian = "Kurang";
                                    //     $probUjian     = $prob_ujianKurang;
                                    //     $probUjiant    = $prob_ujianKurangt;
                                    // }

                                    
                                    //Jumlah nilai ujian //A = Layak //B = Tidak Layak
                                    // if ($dtes->ujian == 80 | 100 ) {
                                    //     $jumlahPredikatA = $ujianBaik / $totalUjianLayak;
                                    //     $jumlahPredikatB = $ujianBaikt / $totalUjianTidak;
                                    // }elseif($dtes->ujian == 60 | 80) {
                                    //     $jumlahPredikatA = $ujianCukup / $totalUjianLayak;
                                    //     $jumlahPredikatB = $ujianCukupt / $totalUjianTidak;
                                    // }elseif($dtes->ujian == 0 | 60) {
                                    //     $jumlahPredikatA = $ujianKurang / $totalUjianLayak;
                                    //     $jumlahPredikatB = $ujianKurangt / $totalUjianTidak;    
                                    // }

                                    $totProbLayak = $pekerjaanAyahA * $penghasilanAyahA * $statusAyahA * $pekerjaanIbuA * $penghasilanIbuA * $statusIbuA * $jumlahTanggunganA * $kepemilikanRumahA * $sumberListrikA * $luasTanahA * $luasBangunanA * $sumberAirA * $prestasi_A * $predikatUjian_A * $minatProgram_A * $wawasanICT_A * $probLayakLC;
                                    $totProbTidak = $pekerjaanAyahB * $penghasilanAyahB * $statusAyahB * $pekerjaanIbuB * $penghasilanIbuB * $statusIbuB * $jumlahTanggunganB * $kepemilikanRumahB * $sumberListrikB * $luasTanahB * $luasBangunanB * $sumberAirB * $prestasi_B * $predikatUjian_B * $minatProgram_B * $wawasanICT_B * $probTidakLayakLC;

                                    if ($totProbLayak > $totProbTidak) {
                                        $statusKelayakan = '<span class="badge badge-light-info">Layak</span>';
                                        $statusKel       = 'Layak';
                                    }else{
                                        $statusKelayakan = '<span class="badge badge-light-danger">Tidak Layak</span>';
                                        $statusKel       = 'Tidak Layak';
                                    }

                                    ?> 
                                        <tr>
                                            <td class="text-center">
                                                <input type="hidden" name="id_peserta[]" value="<?= $dtes->id_peserta ?>">
                                                <input type="hidden" name="label[]" value="<?= $statusKel ?>">
                                                <!-- <input type="hidden" name="ujian[]" value="<?= $ujian ?>"> -->
                                                <?= $no++; ?>
                                            </td>
                                            <td><?= $dtes->kode_pendaftaran; ?></td>
                                            <td><?= $dtes->nama_lengkap; ?></td>
                                            <td align="center"><?= number_format($totProbLayak, 10); ?></td>
                                            <td align="center"><?= number_format($totProbTidak, 10); ?></td>
                                            <td class="text-center"><?= $statusKelayakan ?></td>
                                            <!-- <td width="20" class="text-center">
                                                <a href="#" class="btn btn-sm btn-outline-info btn-analisis-detail" data-toggle="tooltip" title="lihat detail" data-id="<?php echo $dtes->id_peserta; ?>" ><i class="fas fa-search"></i></a>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pendaftaran</th>
                                        <th>Nama Lengkap</th>
                                        <th width="100">Probabilitas<br>Layak</th>
                                        <th width="100">Probabilitas<br>Tidak Layak</th>
                                        <th colspan="2">Kelayakan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




                



            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->