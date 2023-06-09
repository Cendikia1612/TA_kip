<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Ubah Password Administrator</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="row no-gutters">

                        <style type="text/css">
                            table tr td{
                                padding: 0.5rem 0.75rem !important;
                            }
                        </style>

                        <div class="col-md-10">
                            <div class="pl-4 pr-4">
                                <?= $this->session->flashdata('pesan'); ?>    
                            </div>
                            
                            <div class="col-md-12">
                                <div class="table-borderless">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="120">Password Lama</td>
                                                    <td><input type="password" class="form-control" name="password_lama"></td>
                                                </tr>
                                                <tr>
                                                    <td>Password Baru</td>
                                                    <td><input type="password" class="form-control" name="password_baru"></td>
                                                </tr>
                                                 <tr>
                                                    <td>Ulangi Password Baru</td>
                                                    <td><input type="password" class="form-control" name="ulangi_password_baru"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="3" align="right">
                                                        <a class="btn btn-secondary" href="<?= base_url('admin/profil') ?>"><i class="fas fa-undo-alt"></i> Kembali</a>
                                                        <button class="btn btn-secondary" name="simpan"><i class="feather icon-edit"></i> Ubah Password</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->