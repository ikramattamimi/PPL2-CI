<tr>
  <td>
    <h2>Detail Mahasiswa</h2>
    <br>
    <?php foreach ($mahasiswa as $mhs) { ?>
      <table border="0">
        <tr>
          <th>NIM: </th>
          <td><?= $mhs['nim']; ?></td>
        </tr>
        <tr>
          <th>Nama: </th>
          <td><?= $mhs['nama']; ?></td>
        </tr>
        <tr>
          <th>Umur: </th>
          <td><?= $mhs['umur']; ?></td>
        </tr>
      </table>
    <?php } ?>
    <br>
    <a href="/mahasiswa"><button>Kembali</button></a>
    <br>
    <br>
  </td>
</tr>