<div class="row">
  <div class="col-md-3">
    <img src="<?= base_url('assets/images/user/'.$peserta->poto); ?>" alt="..." class="img-thumbnail">
  </div>
  <div class="col-md-9">
    <table width="100%">
      <tr>
        <td width="180">Nomor Pendaftaran</td>
        <td width="20">:</td>
        <td><?= $peserta->nomor_pendaftaran ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $peserta->nama_lengkap ?></td>
      </tr>
      <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td><?= $peserta->sekolah_asal ?></td>
      </tr>
    </table>

    <table width="100%">
      <tr>
        <td>Keterangan</td>
        <td width="100">Layak</td>
        <td width="100">Tidak Layak</td>
      </tr>
      <tr>
        <td>Pekerjaan Ayah</td>
        <td><?= $pekerjaanAyahA ?></td>
        <td><?= $pekerjaanAyahB ?></td>
      </tr>
      <tr>
        <td>Pendapatan Ayah</td>
        <td>Layak</td>
        <td>Tidak Layak</td>
      </tr>
      <tr>
        <td>Status Ayah</td>
        <td>Layak</td>
        <td>Tidak Layak</td>
      </tr>
    </table>
  </div>
</div>