<?php if (session()->getFlashdata('pesan')) : ?>
  <script>
    alert('<?= session()->getFlashdata('pesan'); ?>')
  </script>
<?php endif ?>
<tr>
  <td>
    <br>
    <h2>List Mahasiswa</h2>
    <a href="mahasiswa/input"><button>Input</button></a>
    <br>
    <br>
    <form action="<?= route_to('mahasiswa.search'); ?>" method="POST">
      <?= csrf_field(); ?>
      <input type="text" placeholder="Search.." name="nama">
      <button type="submit">Search</button>
    </form>
    <br>
    <table border="1">
      <tr align="center">
        <td>NIM</td>
        <td>Nama</td>
        <td>Umur</td>
        <td>Action</td>
      </tr>
      <!-- Latihan 5 -->
      <?php foreach ($mahasiswa as $mhs) { ?>
        <tr align="center">
          <td><?= $mhs['nim']; ?></td>
          <td><?= $mhs['nama']; ?></td>
          <td><?= $mhs['umur']; ?></td>
          <td>
            <a href="mahasiswa/detail/<?= $mhs['id']; ?>"><button>Detail</button></a>
            <a href="mahasiswa/edit/<?= $mhs['id']; ?>"><button>Edit</button></a>
            <a href="mahasiswa/delete/<?= $mhs['id']; ?>"><button onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Hapus</button></a>
          </td>
        </tr>
      <?php } ?>
    </table>
    <br>
  </td>
</tr>