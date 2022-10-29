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
                <th>Foto</th>
                <th>Id</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok</th>
                <th class="col-2">Action</th>
              </tr>
              <!-- Latihan 5 -->
              <?php foreach ($barang as $brg) { ?>
                <tr>
                  <td><img src="<?= '/uploads/gambar/' . $brg['gambar']; ?>" alt="" width="50px"></td>
                  <td><?= $brg['id']; ?></td>
                  <td><?= $brg['nama_barang']; ?></td>
                  <td><?= $brg['harga_barang']; ?></td>
                  <td><?= $brg['stok']; ?></td>
                  <td>
                    <a href="/barang/detail/<?= $brg['id']; ?>" class="px-1" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></a>
                    <a href="/barang/edit/<?= $brg['id']; ?>" class="px-1" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pencil"></i></a>
                    <a href="/barang/delete" class="px-1" title="Edit" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $brg['id']; ?>">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <?php foreach ($barang as $brg) { ?>
    <div class="modal fade" id="modal-delete-<?= $brg['id']; ?>" tabindex="-1" aria-labelledby="modal-delete-label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-delete-label">Apakah anda yakin?</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah anda benar-benar ingin menghapus data ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="/barang/delete/<?= $brg['id']; ?>" class="delete" title="Delete" data-toggle="tooltip">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</section>