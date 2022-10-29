<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <h2 class="text-center">Edit Barang</h2>
          <div class="row d-flex justify-content-center">
            <div class="col-sm-4">
              <img src="<?= '/uploads/gambar/' . $barang['gambar']; ?>" class="rounded mx-auto d-block" style="width: 80%;" alt="Foto Mahasiswa">
            </div>
            <div class="col-sm-8">
              <div class="table-responsive">
                <form action="<?php echo '/barang/update/' . $barang['id'] ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo ($barang['nama_barang']) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo ($barang['harga_barang']) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo ($barang['stok']) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar">
                  </div>
                  <div class="input-group mb-3">
                    <a class="btn btn-secondary" href="/barang/data-barang">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>