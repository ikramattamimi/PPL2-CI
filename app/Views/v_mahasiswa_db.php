<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPL 2 P1</title>
</head>

<body>
  <h1>Latihan 5</h1>
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

  <!-- Latihan 6 -->
  <?php if (session()->getFlashdata('pesan')) : ?>
    <script>
      alert('<?= session()->getFlashdata('pesan'); ?>')
    </script>
  <?php endif ?>
  <h1>Latihan 6</h1>
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
</body>

</html>