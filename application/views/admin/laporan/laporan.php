<style type="text/css">
    .btn-laporan{
        padding: 6px 15px !important;
        border-radius: 5px;
        width: 110px;
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
                <div class="col-sm-12 pl-0">
                    <?php 
                        echo $this->session->flashdata('pesan'); 
                        $min = $tahun_min->tahun_pendaftaran;
                        $max = $tahun_max->tahun_pendaftaran;
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
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="text-center">s/d</td>
                            <td>
                                <select class="form-control" name="tahun_akhir">
                                    <?php for ($i=$min; $i <= $max ; $i++) { ?>
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="label">
                                    <option value="">Tampil Semua</option>
                                    <option value="Layak">Layak</option>
                                    <option value="Tidak Layak">Tidak Layak</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-secondary btn-laporan" name="cari"><i class="feather icon-search"></i> Tampil</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->