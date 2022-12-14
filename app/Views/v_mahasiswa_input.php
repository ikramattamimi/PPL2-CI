<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <h2>Tambah Mahasiswa</h2>
          <div class="table-responsive">
            <form action="/mahasiswa/store" method="POST" enctype="multipart/form-data">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" required>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" required>
              </div>
              <div class="mb-3">
                <label for="tinggi_badan" class="form-label">Tiggi Badan (cm)</label>
                <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" required>
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto">
              </div>
              <div class="input-group mb-3">
                <a class="btn btn-secondary" href="/mahasiswa">Kembali</a>
                <button type="submit" class="btn btn-primary" value="upload">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>