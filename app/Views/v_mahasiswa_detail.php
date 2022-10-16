<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <h2>Detail Mahasiswa</h2>
          <div class="table-responsive">
            <form action="" method="">
              <?= csrf_field(); ?>
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
            </form>
            <a href="/mahasiswa" type="button" class="btn btn-secondary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>