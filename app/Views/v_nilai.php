<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <h2 class="text-center">List Nilai Mahasiswa</h2>

      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <form action="<?= route_to('mahasiswa.nilai.search'); ?>" method="POST">
            <div class="input-group mb-3">
              <?= csrf_field(); ?>
              <input class="form-control" type="text" placeholder="Search.." name="nama">
              <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              <!-- <a class="btn btn-outline-secondary" href="mahasiswa/input"><i class="fa-solid fa-plus"></i></a> -->
            </div>
          </form>

          <?php
          if (session()->getFlashdata('message')) {
          ?>
            <div class="alert alert-info">
              <?= session()->getFlashdata('message') ?>
            </div>
          <?php
          }
          ?>
          <form method="post" action="/mahasiswa/store-nilai-excel" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label>File Excel</label>
              <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Upload</button>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>UTS</th>
                <th>UAS</th>
                <!-- <th class="col-2">Action</th> -->
              </tr>
              <!-- Latihan 5 -->
              <?php foreach ($mahasiswa as $mhs) { ?>
                <tr>
                  <td><?= $mhs['nim']; ?></td>
                  <td><?= $mhs['nama']; ?></td>
                  <td><?= $mhs['uts']; ?></td>
                  <td><?= $mhs['uas']; ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>

</section>