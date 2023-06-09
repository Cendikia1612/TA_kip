<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $judul; ?></title>
	<link rel="icon" href="<?= base_url('assets/images/logo-stiki.png'); ?>" type="image/png">
	<link rel="stylesheet" href="<?= base_url('assets/css/plugins/bootstrap.min.css'); ?>">
</head>
<body>


	<div class="row">
		<div class="col-sm-4 text-right">
			<img src="<?= base_url('assets/images/logo-stiki.png'); ?>" height="100px">
		</div>
		<div class="col-sm-5 text-center"><strong>
			DATA CALON MAHASISWA DITETAPKAN <br>
			PENERIMA BANTUAN KIP KULIAH DI STIKI MALANG <br>
			TAHUN <?= ($t_awal == $t_akhir) ? $t_awal : $t_awal.' - '.$t_akhir;  ?></strong>
		</div>
		<div class="col-sm-2"></div>
	</div>


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
	                </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	</div>

<script type="text/javascript">
	window.print();
</script>

</body>
</html>