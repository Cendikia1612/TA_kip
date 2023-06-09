<style type="text/css">
    .btn-laporan{
        padding: 6px 10px !important;
        border-radius: 5px;
        width: 105px;
    }

    table th, table td{
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
            </div>
            <div class="card-body">
                <div class="col-sm-12 pl-0 pr-2">
                    <?php 
                        echo $this->session->flashdata('pesan'); 
                        $min = $tahun_min->tahun_pendaftaran;
                        $max = $tahun_max->tahun_pendaftaran;
                        $lbl = str_replace(" ", "_", $label);
                    ?>
                </div>
                
                <form method="post" action="<?= base_url('admin/laporan/tampil') ?>">
                    <table width="100%">
                        <tr>
                            <td width="15%"><label>Tahun Awal</label></td>
                            <td width="35px"></td>
                            <td width="15%"><label>Tahun Akhir</label></td>
                            <td width="15%"><label>Status Kelayakan</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="tahun_awal">
                                    <?php for ($i=$min; $i <= $max ; $i++) { ?>
                                        <option value='<?= $i ?>' <?= ($t_awal == $i)?'selected':''; ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="text-center">s/d</td>
                            <td>
                                <select class="form-control" name="tahun_akhir">
                                    <?php for ($i=$min; $i <= $max ; $i++) { ?>
                                        <option value='<?= $i ?>' <?= ($t_akhir == $i)?'selected':''; ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="label">
                                    <option value="" <?= ($label == "")?'selected':''; ?>>Tampil Semua</option>
                                    <option value="Layak" <?= ($label == "Layak")?'selected':''; ?>>Layak</option>
                                    <option value="Tidak Layak" <?= ($label == "Tidak Layak")?'selected':''; ?>>Tidak Layak</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-laporan" name="cari"><i class="feather icon-search"></i> Tampil</button>
                                <a class="btn btn-secondary btn-laporan" href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)) ?>"><i class="fas fa-undo-alt"></i> Kembali</a>
                                <a class="btn btn-secondary btn-laporan ml-2" target="_blank" href="<?= base_url('admin/laporan/cetak/'.$t_awal.'/'.$t_akhir.'/'.$lbl) ?>"><i class="fas fa-print"></i> Cetak</a>
                            </td>
                        </tr>
                    </table>
                </form>
                <hr>
                <div class="dt-responsive table-responsive">
                    <table id="alt-pg-dt" class="table table-pendaftar table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="150"><center>Kode Pendaftaran</center></th>
                                <th><center>Nama Siswa</center></th>
                                <th width="10"><center>Gender</center></th>
                                <th>Asal Sekolah</th>
                                <th>Alamat Peserta</th>
                                <th width="70"><center>Tahun</center></th>
                                <th><center>Status Kelayakan</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan as $n): ?> 
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $n->kode_pendaftaran; ?></td>
                                    <td><?= $n->nama_lengkap; ?></td>
                                    <td class="text-center"><?= $n->jenis_kelamin; ?></td>
                                    <td><?= $n->sekolah_asal; ?></td>
                                    <td><?= substr($n->alamat_peserta, 0, 30); ?></td>
                                    <td class="text-center"><?= $n->tahun_pendaftaran; ?></td>
                                    <td class="text-center" width="100">
                                        <?= $n->label; ?>
                                    </td>
                                    <!-- <td class="text-center" width="100">
                                        <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/detail/".$n->id_peserta) ?>" class="btn btn-outline-success btn-kriteria" data-toggle="tooltip" title="lihat detail"><i class="feather icon-eye"></i></a>
                                        <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$n->id_peserta) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah"><i class="feather icon-edit-2"></i></a>
                                        <a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$n->id_peserta) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus"><i class="feather icon-trash-2"></i></a>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10">No</th>
                                <th width="150"><center>Kode Pendaftaran</center></th>
                                <th><center>Nama Siswa</center></th>
                                <th width="10"><center>Gender</center></th>
                                <th>Asal Sekolah</th>
                                <th>Alamat Peserta</th>
                                <th width="70"><center>Tahun</center></th>
                                <th><center>Status Kelayakan</center></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->