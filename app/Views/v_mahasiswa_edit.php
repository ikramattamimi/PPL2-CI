<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <h2>Edit Mahasiswa</h2>
          <div class="table-responsive">
            <form action="<?php echo '/mahasiswa/update/' . $mahasiswa['id'] ?>" method="POST">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?php echo ($mahasiswa['nim']) ?>" required>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo ($mahasiswa['nama']) ?>" required>
              </div>
              <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="<?php echo ($mahasiswa['umur']) ?>" required>
              </div>
              <div class="input-group mb-3">
                <a class="btn btn-secondary" href="/mahasiswa">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>