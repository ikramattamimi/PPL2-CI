<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-10">
        <div class="post-entry-1 lg">
          <h2 class="text-center">Detail Mahasiswa</h2>
          <div class="row g-5 d-flex justify-content-center">
            <div class="col-sm-4">
              <img src="<?= '/uploads/foto/' . $mahasiswa['foto']; ?>" class="rounded mx-auto d-block" style="width: 80%;" alt="Foto Mahasiswa">
            </div>
            <div class="col-sm-8">
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input disabled type="number" class="form-control" id="nim" name="nim" value="<?php echo ($mahasiswa['nim']) ?>">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input disabled type="text" class="form-control" id="nama" name="nama" value="<?php echo ($mahasiswa['nama']) ?>">
              </div>
              <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input disabled type="number" class="form-control" id="umur" name="umur" value="<?php echo ($mahasiswa['umur']) ?>">
              </div>
              <div class="mb-3">
                <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                <input disabled type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="<?php echo ($mahasiswa['tinggi_badan']) ?>">
              </div>
              <a href="/mahasiswa" type="button" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>