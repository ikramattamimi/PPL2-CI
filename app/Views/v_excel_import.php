<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <h2 class="text-center">List Barang</h2>

      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <form action="<?= route_to('barang.search'); ?>" method="POST">
            <div class="input-group mb-3">
              <?= csrf_field(); ?>
              <input class="form-control" type="text" placeholder="Search.." name="nama_barang">
              <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              <a class="btn btn-outline-secondary" href="/barang/input"><i class="fa-solid fa-plus"></i></a>
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
          <form method="post" action="/barang/simpanExcel" enctype="multipart/form-data">
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
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
              </tr>
              <?php for ($i = 1; $i < 5; $i++) { ?>
                <tr>
                  <td><?= $excel[$i][0]; ?></td>
                  <td><?= $excel[$i][1]; ?></td>
                  <td><?= $excel[$i][2]; ?></td>
                </tr>
              <?php } ?>
              <!-- Latihan 5 -->
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->


</section>