<style type="text/css">
	table th, table td{
		vertical-align: middle !important;
		padding: 5px 10px !important;
	}

	.btn-kriteria{
		padding: 0px 10px !important;
	}
</style>

<!-- [ Main Content ] start -->
<div class="row">
    <!-- Alternative Pagination table start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $judul ?>an</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <!-- <a class="btn  btn-danger btn-sm mr-2" href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2).'/trash') ?>"><i class="feather icon-trash"></i></a> -->

                        
                        <!-- <a class="btn  btn-secondary btn-sm" href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2).'/tambah') ?>"><i class="feather icon-plus-square"></i> Tambah Pendaftar</a> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
            	<?= $this->session->flashdata('pesan'); ?>

                <form method="post" action="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" name="id" value="<?= $pendaftaran->id_pendaftaran ?>">
                                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="<?= $pendaftaran->tanggal_mulai_pendaftaran ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_selesai" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="<?= $pendaftaran->tanggal_selesai_pendaftaran ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="nama_kriteria" class="col-sm-4 col-form-label">Tahun Akademik</label>
                                <div class="col-sm-8">
                                    <select name="tahun_pendaftaran" class="form-control">
                                    <?php 
                                    for ($i=$tahun_sekarang = date('Y')-2 ; $i <= $tahun_sekarang = date('Y') + 1; $i++) { 
                                        ?>
                                            <option value="<?= $i ?>" <?php if($i == $pendaftaran->tahun_pendaftaran) { echo "selected"; } ?>><?= $i; ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_pendaftaran" class="col-sm-4 col-form-label">Status Pendaftaran</label>
                                <div class="col-sm-8">
                                    <?php 
                                        $sekarang = date('Y-m-d');
                                        if (($sekarang > $pendaftaran->tanggal_mulai_pendaftaran) && ($sekarang < $pendaftaran->tanggal_selesai_pendaftaran)) {
                                            $status = "Berlangsung";
                                        }else{
                                            $status = "Ditutup";
                                        }
                                    ?>
                                    <input type="text" readonly="" class="form-control" name="status_pendaftaran" id="status_pendaftaran" value="<?= $status ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-secondary" name="simpan_perubahan"><i class="feather icon-save"></i> Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="bt-wizard" id="tabswizard">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="#tabs-t-tab1" class="nav-link rounded-0" data-toggle="tab">Peserta Baru Yang Mengikuti Seleksi</a></li>
                        <li class="nav-item"><a href="#tabs-t-tab2" class="nav-link rounded-0" data-toggle="tab">Hasil Seleksi </a></li>
                        <li class="nav-item"><a href="#tabs-t-tab3" class="nav-link rounded-0" data-toggle="tab">Semua Data</a></li>
                    </ul>
                    <div class="tab-content card" style="box-shadow: none !important">
                        <div class="pt-1 bg-primary"></div>

                        <div class="tab-pane card-body pt-4 px-0 active show" id="tabs-t-tab1">
                            <div class="dt-responsive table-responsive">
                                <table id="alt-pg-dt" class="table table-pendaftar table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th width="70"><center>Tahun</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($daftar as $n): ?> 
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $n->kode_pendaftaran; ?></td>
                                                <td><?= $n->nama_lengkap; ?></td>
                                                <td class="text-center"><?= $n->jenis_kelamin; ?></td>
                                                <td><?= $n->sekolah_asal; ?></td>
                                                <td class="text-center"><?= $n->tahun_pendaftaran; ?></td>
                                                <td class="text-center" width="100">
                                                    <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/detail/".$n->id_peserta) ?>" class="btn btn-outline-success btn-kriteria" data-toggle="tooltip" title="lihat detail"><i class="feather icon-eye"></i></a>
                                                    <!-- <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$n->id_peserta) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah"><i class="feather icon-edit-2"></i></a> -->
                                                    <a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$n->id_peserta) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus"><i class="feather icon-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th width="70"><center>Tahun</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane card-body pt-4 px-0" id="tabs-t-tab2">
                            <div class="dt-responsive table-responsive">
                                <table id="alt-pg-dt" class="table table-ditetapkan table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th width="70"><center>Tahun</center></th>
                                            <th><center>Status<br>Kelayakan</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ditetapkan as $o): ?> 
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $o->kode_pendaftaran; ?></td>
                                                <td><?= $o->nama_lengkap; ?></td>
                                                <td class="text-center"><?= $o->jenis_kelamin; ?></td>
                                                <td><?= $o->sekolah_asal; ?></td>
                                                <td class="text-center"><?= $o->tahun_pendaftaran; ?></td>
                                                <td class="text-center">
                                                    <?php if($o->label == 'Layak'){ echo '<span class="badge badge-light-info">Layak</span>';
                                                    }else if($o->label == 'Tidak Layak'){ echo '<span class="badge badge-light-danger">Tidak Layak</span>';
                                                    }else{ echo ""; } ?>  
                                                </td>
                                                <td class="text-center" width="100">
                                                    <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/detail/".$o->id_peserta) ?>" class="btn btn-outline-success btn-kriteria" data-toggle="tooltip" title="lihat detail"><i class="feather icon-eye"></i></a>
                                                    <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$o->id_peserta) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah"><i class="feather icon-edit-2"></i></a> 
                                                    <a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$o->id_peserta) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus"><i class="feather icon-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th width="70"><center>Tahun</center></th>
                                            <th><center>Status<br>Kelayakan</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane card-body pt-4 px-0" id="tabs-t-tab3">
                            <div class="dt-responsive table-responsive">
                                <table id="alt-pg-dt" class="table table-semua-data table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th width="70"><center>Tahun</center></th>
                                            <th><center>Status<br>Kelayakan</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($peserta as $p): ?> 
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $p->kode_pendaftaran; ?></td>
                                                <td><?= $p->nama_lengkap; ?></td>
                                                <td class="text-center"><?= $p->jenis_kelamin; ?></td>
                                                <td><?= $p->sekolah_asal; ?></td>
                                                <td class="text-center"><?= $p->tahun_pendaftaran; ?></td>
                                                <td class="text-center">
                                                    <?php if($p->label == 'Layak'){ echo '<span class="badge badge-light-info">Layak</span>';
                                                    }else if($p->label == 'Tidak Layak'){ echo '<span class="badge badge-light-danger">Tidak Layak</span>';
                                                    }else{ echo ""; } ?>  
                                                </td>
                                                <td class="text-center" width="100">
                                                    <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/detail/".$p->id_peserta) ?>" class="btn btn-outline-success btn-kriteria" data-toggle="tooltip" title="lihat detail"><i class="feather icon-eye"></i></a>
                                                    <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$p->id_peserta) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah"><i class="feather icon-edit-2"></i></a> 
                                                    <a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$p->id_peserta) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus"><i class="feather icon-trash-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="10">No</th>
                                            <th width="120"><center>Kode Pendaftaran</center></th>
                                            <th><center>Nama Siswa</center></th>
                                            <th width="10"><center>Gender</center></th>
                                            <th>Asal Sekolah</th>
                                            <th><center>Tahun</center></th>
                                            <th><center>Status<br>Kelayakan</center></th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->
</div>
<!-- [ Main Content ] end -->