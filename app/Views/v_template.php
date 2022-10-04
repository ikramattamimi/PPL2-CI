<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $title; ?></title>
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
            <?php echo anchor('', 'Home') ?>
            <?php echo anchor('mahasiswa', 'Mahasiswa') ?>
            <a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a>
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