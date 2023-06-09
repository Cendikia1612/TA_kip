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
                <form method="post" action="">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-6">
                            <select class="form-control" name="kategori">
                                <option value="">- Pilih- </option>
                                <?php 
                                    foreach ($kategori as $kat) {?>
                                        <option value='<?= $kat ?>'><?= $kat ?></option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label for="kode_kriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="kode_kriteria" id="kode_kriteria">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria">
                        </div>
                    </div>
                    <div class="col-sm-8 text-right">
                        <a class="btn btn-secondary" href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)) ?>"><i class="fas fa-undo-alt"></i> Kembali</a>
                        <button class="btn btn-secondary" name="simpan"><i class="feather icon-save"></i> Simpan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->