<tr>
  <td>
    <form action="<?php echo '/mahasiswa/update/' . $mahasiswa['id'] ?>" method="POST">
      <?= csrf_field() ?>
      <br>
      <h1><?= $title; ?></h1>
      <table width="25%" border="0" align="center">
        <tr>
          <td>NIM</td>
          <td><input type="text" name="nim" value="<?php echo ($mahasiswa['nim']) ?>"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" value="<?php echo ($mahasiswa['nama']) ?>"></td>
        </tr>
        <tr>
          <td>Umur</td>
          <td><input type="number" name="umur" value="<?php echo ($mahasiswa['umur']) ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="simpan" value="submit"></td>
        </tr>
        <tr height="40">
          <td></td>
          <td><a href="/mahasiswa"><button>Kembali</button></a></td>
        </tr>

      </table>
    </form>
  </td>
</tr>