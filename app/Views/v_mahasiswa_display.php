<?= $this->extend('v_template'); ?>

<?= $this->section('content'); ?>
<tr height=350 align="center">
  <td>
    <br>
    <table border="1">
      <tr>
        <td>NIM</td>
        <td>Nama</td>
        <td>Umur</td>
      </tr>
      <!-- Latihan 5 -->
      <?php foreach ($mahasiswa as $mhs) { ?>
        <tr>
          <td><?= $mhs['nim']; ?></td>
          <td><?= $mhs['nama']; ?></td>
          <td><?= $mhs['umur']; ?></td>
        </tr>
      <?php } ?>
    </table>
    <br>
  </td>
</tr>
<?= $this->endSection(); ?>