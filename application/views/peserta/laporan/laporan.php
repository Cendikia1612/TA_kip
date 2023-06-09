<!-- [ Main Content ] start -->
<div class="row">
    <!-- Alternative Pagination table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Form <?= $judul ?></h5>
            </div>
            <div class="card-body">
                <div class="col-sm-12 pl-0 pr-2">
                    
                    <?php if ($peserta->label == 'Layak' || $peserta->label == 'Tidak Layak'){ ?>
                    <div class="w-100 text-right">
                        <a class="btn btn-secondary btn-laporan ml-3" target="_blank" href="<?= base_url('laporan/cetak') ?>"><i class="fas fa-print"></i> Cetak</a>
                    </div>
                    <?php } ?>

                    <table class="w-50" align="center">
                        <?php if ($peserta->label == 'Layak' || $peserta->label == 'Tidak Layak'){ ?>
                            
                        <tr>
                            <th colspan="3" class="text-center" valign="top" style="height: 60px;">PENGUMUMAN HASIL SELEKSI KIP KULIAH</th>
                        </tr>
                        <tr>
                            <td>Kode Pendaftaran</td>
                            <td>:</td>
                            <td><strong><?= $peserta->kode_pendaftaran ?></strong></td>
                        </tr>
                        <tr>
                            <td width="150px">Nama</td>
                            <td width="15px">:</td>
                            <td><strong><?= $peserta->nama_lengkap ?></strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $peserta->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= ($peserta->jenis_kelamin=='P')?'Perempuan':'Laki-laki'; ?></td>
                        </tr>
                        <tr>
                            <td valign="top">Alamat</td>
                            <td valign="top">:</td>
                            <td valign="top"><?= $peserta->alamat_peserta ?></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>:</td>
                            <td><?= $peserta->sekolah_asal ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" class="text-center" style="height: 160px;">
                                <?= ($peserta->label=='Layak')?'Selamat':'Mohon Maaf'; ?> Anda dinyatakan <strong><?= ($peserta->label=='Layak')?'<span class="badge badge-light-info">Layak</span>':'<span class="badge badge-light-danger">Tidak Layak</span>'; ?></strong> mendapatkan bantuan KIP Kuliah di <br>
                                STIKI MALANG <br>
                                Tahun <?= $peserta->tahun_pendaftaran ?>
                            </td>
                        </tr>

                        <?php }else{ ?>

                        <tr>
                            <th colspan="3" class="text-center" valign="top" style="height: 60px;"><div class="alert alert-warning" role="alert">MOHON BERSABAR, PENGUMUMAN HASIL SELEKSI BELUM TERSEDIA!</div></th>
                        </tr>

                        <?php } ?>

                    </table>

                </div>
                
                
            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->