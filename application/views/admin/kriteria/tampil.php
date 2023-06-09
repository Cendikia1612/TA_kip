<style type="text/css">
	table td{
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
                <h5>Data Kriteria</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <a class="btn  btn-secondary btn-sm" href="<?= base_url('admin/kriteria/tambah') ?>"><i class="feather icon-plus-square"></i> Tambah Kriteria</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            	<?= $this->session->flashdata('pesan'); ?>

                <!-- <div class="dt-responsive table-responsive">
                    <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Kode Kriteria</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	$no = 1;
                        	foreach ($kriteria as $key) {
                        		?>
                        		<tr>
	                                <td><?= $no++; ?></td>
	                                <td><?= $key->kategori; ?></td>
	                                <td><?= $key->kode_kriteria; ?></td>
	                                <td><?= $key->nama_kriteria; ?></td>
	                                <td width="100">
	                                	<a href="" class="btn btn-outline-success btn-kriteria" data-toggle="tooltip" title="lihat detail"><i class="feather icon-eye"></i></a>
	                        			<a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$key->id_kriteria) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah kriteria"><i class="feather icon-edit-2"></i></a>


	                        			<a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$key->id_kriteria) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus kriteria"><i class="feather icon-trash-2"></i></a>
	                                </td>
	                            </tr>
                        		<?php
                        	}
                        	?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Kode Kriteria</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> -->



                <?php foreach ($kategori as $kat): ?>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="py-2 text-center">Kategori: <?= $kat ?></th>
                                    </tr>
                                    <tr>
                                        <th class="py-2"><center>#</center></th>
                                        <th class="py-2">Kode Kriteria</th>
                                        <th class="py-2">Keterangan</th>
                                        <th class="py-2"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data = $this->db->get_where('tbl_kriteria', ['kategori' => $kat])->result();
                                    foreach ($data as $key): ?>
                                        <tr>
                                            <td align="center" width="10"><?= $no++ ?></td>
                                            <td align="center" width="80"><?= $key->kode_kriteria ?></td>
                                            <td><?= $key->nama_kriteria ?></td>
                                            <td width="100">
                                                <a href="<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/ubah/".$key->id_kriteria) ?>" class="btn btn-outline-primary btn-kriteria" data-toggle="tooltip" title="ubah kriteria"><i class="feather icon-edit-2"></i></a>

                                                <a onclick="deleteConfirm('<?= base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/hapus/".$key->id_kriteria) ?>')" href="#" class="btn btn-outline-danger btn-kriteria" data-toggle="tooltip" title="hapus kriteria"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>    
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <hr style="margin-top: -14px; margin-bottom: 40px;">
                    
                <?php endforeach; ?>



            </div>
        </div>
    </div>
    <!-- Alternative Pagination table end -->

    


</div>
<!-- [ Main Content ] end -->