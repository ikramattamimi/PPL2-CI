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
    <a href="/mahasiswa"><button>Kembali</button></a>
    <br>
    <br>
  </td>
</tr>