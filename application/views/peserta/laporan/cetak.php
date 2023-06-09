<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $judul; ?></title>
    <link rel="icon" href="<?= base_url('assets/images/logo-stiki.png'); ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/bootstrap.min.css'); ?>">
</head>
<body>
    <table class="w-50" align="center">
        <?php if ($peserta->label == 'Layak' || $peserta->label == 'Tidak Layak'){ ?>
            
        <tr>
            <th colspan="3" class="text-center" valign="top" style="height: 60px;">PENGUMUMAN HASIL SELEKSI KIP KULIAH</th>
        </tr>
        <tr>
            <td>Nomor Peserta</td>
            <td>:</td>
            <td><strong><?= $peserta->nomor_pendaftaran ?></strong></td>
        </tr>
        <tr>
            <td width="150px">Nama</td>
            <td width="15px">:</td>
            <td><strong><?= $peserta->nama_lengkap ?></strong></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?= $peserta->tanggal_lahir ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= ($peserta->jenis_kelamin=='P')?'Perempuan':'Laki-laki'; ?></td>
        </tr>
        <tr>
            <td valign="top">Alamat</td>
            <td valign="top">:</td>
            <td valign="top"><?= $peserta->alamat_peserta ?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>:</td>
            <td><?= $peserta->sekolah_asal ?></td>
        </tr>

        <tr>
            <td colspan="3" class="text-center" style="height: 160px;">
                <?= ($peserta->label=='Layak')?'Selamat':'Mohon Maaf'; ?> Anda dinyatakan <strong><?= $peserta->label; ?></strong> mendapatkan bantuan KIP Kuliah di <br>
                STIKI MALANG <br>
                Tahun <?= $peserta->tahun_pendaftaran ?>
            </td>
        </tr>

        <?php }else{ ?>

        <tr>
            <th colspan="3" class="text-center" valign="top" style="height: 60px;"><div class="alert alert-warning" role="alert">MOHON BERSABAR, PENGUMUMAN HASIL SELEKSI BELUM TERSEDIA!</div></th>
        </tr>

        <?php } ?>

    </table>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>