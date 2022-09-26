<!-- Latihan 6 -->
<?php if (session()->getFlashdata('pesan')) : ?>
  <script>
    alert('<?= session()->getFlashdata('pesan'); ?>')
  </script>
<?php endif ?>
<tr>
  <td>
    <h2>Form Input Mahasiswa</h2>
    <form action="/mahasiswa/store" method="POST">
      <?= csrf_field(); ?>
      <table>
        <tr>
          <td>NIM</td>
          <td><input type="number" id="nim" name="nim" placeholder="NIM"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" id="nama" name="nama" placeholder="Nama"></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td><input type="number" id="umur" name="umur" placeholder="Umur"></td>
        </tr>
      </table>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <button><?= anchor('mahasiswa', 'Kembali') ?></button>
  </td>
</tr>