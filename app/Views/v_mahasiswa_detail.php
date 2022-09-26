<tr>
  <td>
    <h2>Detail Mahasiswa</h2>
    <br>

    <table border="1" align="center">
      <tr>
        <th>NIM</th>
        <td><?= $mahasiswa['nim']; ?></td>
      </tr>
      <tr>
        <th>Nama</th>
        <td><?= $mahasiswa['nama']; ?></td>
      </tr>
      <tr>
        <th>Umur</th>
        <td><?= $mahasiswa['umur']; ?></td>
      </tr>
    </table>
    <button><?= anchor('mahasiswa', 'Kembali') ?></button>
    <br>
  </td>
</tr>