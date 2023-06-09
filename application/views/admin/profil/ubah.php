<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Ubah Profil Administrator</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <?= $this->session->flashdata('pesan'); ?>
                    
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="row no-gutters">

                        <div class="col-md-2">
                            <img class="img-fluid" src="<?= base_url('assets/images/user/'.$admin->poto) ?>" alt="<?= $admin->poto ?>">
                            <div align="center" style="padding-top: 5px; background: #d5d9dc">
                                <label for="upload-new" style="cursor: pointer;"><i class="feather icon-upload-cloud mr-2"></i><b>ubah poto</b></label>
                            </div>
                            <input type="file" name="poto" id="upload-new" style="display: none">
                        </div>

                        <style type="text/css">
                            table tr td{
                                padding: 0.5rem 0.75rem !important;
                            }
                        </style>

                        <div class="col-md-10">
                            <div class="col-md-12">
                                <div class="table-borderless">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="120">E-Mail</td>
                                                    <td width="1">:</td>
                                                    <td><input type="text" class="form-control" readonly="" value="<?= $admin->email ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" name="nama_lengkap" value="<?= $admin->nama_lengkap ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><textarea rows="2" class="form-control" name="alamat"><?= $admin->alamat ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>TTL</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="row" style="width: 90%">
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" name="tempat_lahir" value="<?= $admin->tempat_lahir ?>">
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $admin->tanggal_lahir ?>">
                                                            </div>
                                                        </div> 
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Nomor Hp</td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" name="nomor_hp" value="<?= $admin->nomor_hp ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">
                                                        <a class="btn btn-secondary" href="<?= base_url('admin/profil') ?>"><i class="fas fa-undo-alt"></i> Kembali</a>
                                                        <button class="btn btn-secondary" name="simpan"><i class="feather icon-save"></i> Simpan</button>
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