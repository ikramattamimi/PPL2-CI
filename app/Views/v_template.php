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
            <!-- <a href="/"> HOME </a>
            <a href="/mahasiswa/table" style="margin: 20px;">MAHASISWA</a> -->
            <?php echo anchor('', 'Home') ?>
            <?php echo anchor('mahasiswa', 'Mahasiswa') ?>
          </h3>
        </th>
      </tr>
    </thead>
    <tbody align="center">
      <?php
      echo view($content_view);
      ?>
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