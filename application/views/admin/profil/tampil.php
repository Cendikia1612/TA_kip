<!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Data Profil Administrator</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <a class="btn  btn-secondary btn-sm" href="<?= base_url('admin/profil/ubahdata') ?>">Ubah Profil</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="mb-3">
                          <div class="row no-gutters">
                            <div class="col-md-2">
                              <img class="img-fluid" src="<?= base_url('assets/images/user/'.$admin->poto) ?>" alt="<?= $admin->poto ?>">
                            </div>

                            <style type="text/css">
                                table tr td{
                                    padding: 0.5rem 0.75rem !important;
                                }
                            </style>

                            <div class="col-md-10">


                                <div class="col-md-12">
                                        <div class="table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td width="120">Nama Lengkap</td>
                                                            <td width="1">:</td>
                                                            <td><?= $admin->nama_lengkap ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td><?= $admin->alamat ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>TTL</td>
                                                            <td>:</td>
                                                            <td><?= $admin->tempat_lahir .", ".$admin->tanggal_lahir ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Hp</td>
                                                            <td>:</td>
                                                            <td><?= $admin->nomor_hp ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>:</td>
                                                            <td><?= $admin->email ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>:</td>
                                                            <td>********** <a href="<?= base_url('admin/profil/ubahpassword') ?>"><i>ubah password</i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
 

                               

                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->