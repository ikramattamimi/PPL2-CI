<tr>
  <td>
    <br>
    <h2>List Mahasiswa</h2>
    <button><?= anchor('mahasiswa/input', 'Input') ?></button>
    <br>
    <br>
    <table border="1">
      <tr>
        <td>NIM</td>
        <td>Nama</td>
        <td>Umur</td>
        <td>Action</td>
      </tr>
      <!-- Latihan 5 -->
      <?php foreach ($mahasiswa as $mhs) { ?>
        <tr>
          <td><?= $mhs['nim']; ?></td>
          <td><?= $mhs['nama']; ?></td>
          <td><?= $mhs['umur']; ?></td>
          <td><button><?= anchor('mahasiswa/detail/' . $mhs['id'], 'Detail') ?></button></td>
        </tr>
      <?php } ?>
    </table>
    <br>
  </td>
</tr>