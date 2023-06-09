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

                <?php if(form_error('fileURL')) {?>    
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= form_error('fileURL'); ?>
                    </div>       
                <?php } ?>

                <blockquote class="blockquote">
                    <p class="mb-2 lead">Silahkan <i>download</i> template excel terlebih dahulu agar meminimalisir kesalahan dalam proses <i>import</i> data.</p>
                    <footer class="blockquote-footer">download template <cite title="Source Title"><a href="<?= base_url('assets/excel/template_data_peserta.xlsx'); ?>">disini</a></cite></footer>
                </blockquote>

                <form method="post" action="<?= base_url('admin/peserta/import') ?>" enctype="multipart/form-data">
                    <div class="bt-wizard" id="besicwizard">
                        <div class="tab-content">

                            <div class="tab-pane active show" id="b-w-tab1">
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="form-group row align-items-center">
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control-file" name="fileURL">
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)) ?>" class="btn btn-secondary"><i class="fas fa-undo-alt"></i> Kembali</a>
                                                <button class="btn btn-secondary" name="simpan"><i class="fas fa-file-import"></i> Import</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row justify-content-between btn-page">
                                <div class="col-sm-12 text-md-right">
                                
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