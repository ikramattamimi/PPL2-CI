<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Home</title>
</head>

<body>
  <table border=1 align="center" width="100%">
    <thead>
      <tr>
        <th height=100>
          <h3> HEADER </h3>
        </th>
      </tr>
      <tr>
        <th>
          <h3 align="left" ,>
            <a href="/"> HOME </a>
            <a href="/mahasiswa/table" style="margin: 20px;">MAHASISWA</a>
          </h3>
        </th>
      </tr>
    </thead>
    <tbody>
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
          <form action="/mahasiswa/store" method="POST">
            <?= csrf_field(); ?>
            <table width="25%" border="0" align="center">
              <tr>
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
              </tr>
              <tr>
                <td>Umur</td>
                <td><input type="number" name="umur"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="submit"></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr height=100 align="center">
        <td>
          <h3>FOOTER</h3>
        </td>
      </tr>
    </tfoot>
  </table>
</body>

</html>