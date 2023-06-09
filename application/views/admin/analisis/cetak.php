<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $judul; ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logo-stiki.png'); ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/bootstrap.min.css'); ?>">
</head>
<body>


    <div class="row">
        <div class="col-sm-4 text-right">
            <img src="<?= base_url('assets/images/logo-stiki.png'); ?>" height="100px">
        </div>
        <div class="col-sm-5 text-center"><strong>
            ANALISIS CALON MAHASISWA <br>
            PENERIMA BANTUAN KIP KULIAH STIKI MALANG </strong>
        </div>
        <div class="col-sm-2"></div>
    </div>


    <hr>
    

<?php
    $totalData          = COUNT($TotalData);
    $totalLayak         = COUNT($this->Model_analisis->getLabel("Layak"));
    $totalTidakLayak    = COUNT($this->Model_analisis->getLabel("Tidak Layak"));

    $totalDataLC        = COUNT($TotalData) + 2;
    $totalLayakLC       = COUNT($this->Model_analisis->getLabel("Layak")) + 1;
    $totalTidakLayakLC  = COUNT($this->Model_analisis->getLabel("Tidak Layak")) + 1;
    $probLayakLC        = $totalLayakLC / $totalDataLC;
    $probTidakLayakLC   = $totalTidakLayakLC / $totalDataLC;


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
    endforeach;


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
    endforeach;


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
        endforeach; 

        
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
        endforeach; 


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
        endforeach; 
       

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
        endforeach;


    $o_1 = COUNT($this->Model_analisis->getJumlahTanggungan("1 Orang", "Layak")) + 1;
    $o_2 = COUNT($this->Model_analisis->getJumlahTanggungan("2 Orang", "Layak")) + 1;
    $o_3 = COUNT($this->Model_analisis->getJumlahTanggungan("3 Orang", "Layak")) + 1;
    $o_4 = COUNT($this->Model_analisis->getJumlahTanggungan("4 Orang", "Layak")) + 1;
    $o_5 = COUNT($this->Model_analisis->getJumlahTanggungan("5 Orang", "Layak")) + 1;
    $o_6 = COUNT($this->Model_analisis->getJumlahTanggungan("6 Orang", "Layak")) + 1;
    $o_7 = COUNT($this->Model_analisis->getJumlahTanggungan("7 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("8 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("9 Orang", "Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("10 Orang", "Layak")) + 1;
    $totalTanggunganLayak = $o_1 + $o_2 + $o_3 + $o_4 + $o_5 + $o_6 +  $o_7 ;

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
    $o_7t = COUNT($this->Model_analisis->getJumlahTanggungan("7 Orang", "Tidak Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("8 Orang", "Tidak Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("9 Orang", "Tidak Layak")) + COUNT($this->Model_analisis->getJumlahTanggungan("10 Orang", "Tidak Layak")) + 1;
    $totalTanggunganTidak = $o_1t + $o_2t + $o_3t + $o_4t + $o_5t + $o_6t + $o_7t ;

    $po_1t = $o_1t / $totalTanggunganTidak;
    $po_2t = $o_2t / $totalTanggunganTidak;
    $po_3t = $o_3t / $totalTanggunganTidak;
    $po_4t = $o_4t / $totalTanggunganTidak;
    $po_5t = $o_5t / $totalTanggunganTidak;
    $po_6t = $o_6t / $totalTanggunganTidak;
    $po_7t = $o_7t / $totalTanggunganTidak;
    $totalProbabilitasTanggunganTidak = $po_1t + $po_2t + $po_3t + $po_4t + $po_5t + $po_6t + $po_7t;



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
        endforeach;


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
        endforeach;


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
        endforeach;


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
        endforeach;


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
        endforeach;


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
        endforeach;

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
        endforeach;    

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
        endforeach; 

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
        endforeach;
    ?>

    <div class="card-body table-border-style">
        <div class="dt-responsive table-responsive">
            <table id="alt-pg-dt" class="table table-pendaftar table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="100">Kode Pendaftaran</th>
                        <th>Nama Siswa</th>
                        <th>L/P</th>
                        <th>Sekolah Asal</th>
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

                    // //ambil nilai ujian dari table ujian kirim
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
                                <?= $no++; ?>
                            </td>
                            <td><?= $dtes->kode_pendaftaran; ?></td>
                            <td><?= $dtes->nama_lengkap; ?></td>
                            <td><?= $dtes->jenis_kelamin; ?></td>
                            <td><?= $dtes->sekolah_asal; ?></td>
                            <td align="center"><?= number_format($totProbLayak, 10); ?></td>
                            <td align="center"><?= number_format($totProbTidak, 10); ?></td>
                            <td class="text-center"><?= $statusKel ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<script type="text/javascript">
    window.print();
</script>

</body>
</html>