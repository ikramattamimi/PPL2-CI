<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-10">
        <div class="post-entry-1 lg">
          <h2 class="text-center">Detail Barang</h2>
          <div class="row g-5 d-flex justify-content-center">
            <div class="col-sm-4">
              <img src="<?= '/uploads/gambar/' . $barang['gambar']; ?>" class="rounded mx-auto d-block" style="width: 80%;" alt="Foto Mahasiswa">
            </div>
            <div class="col-sm-8">
              <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama barang</label>
                <input disabled type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo ($barang['nama_barang']) ?>">
              </div>
              <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input disabled type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo ($barang['harga_barang']) ?>">
              </div>
              <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input disabled type="number" class="form-control" id="stok" name="stok" value="<?php echo ($barang['stok']) ?>">
              </div>
              <a href="/barang/data-barang" type="button" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>