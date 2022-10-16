<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 d-flex justify-content-center">
      <div class="col-lg-8">
        <div class="post-entry-1 lg">
          <h2>List Mahasiswa</h2>
          <form action="<?= route_to('mahasiswa.search'); ?>" method="POST">
            <div class="input-group mb-3">
              <?= csrf_field(); ?>
              <input class="form-control" type="text" placeholder="Search.." name="nama">
              <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              <a class="btn btn-outline-secondary" href="mahasiswa/input"><i class="fa-solid fa-plus"></i></a>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th class="col-2">Action</th>
              </tr>
              <!-- Latihan 5 -->
              <?php foreach ($mahasiswa as $mhs) { ?>
                <tr>
                  <td><?= $mhs['nim']; ?></td>
                  <td><?= $mhs['nama']; ?></td>
                  <td><?= $mhs['umur']; ?></td>
                  <td>
                    <a href="mahasiswa/detail/<?= $mhs['id']; ?>" class="px-1" title="View" data-toggle="tooltip"><i class="fa-solid fa-eye"></i></a>
                    <a href="mahasiswa/edit/<?= $mhs['id']; ?>" class="px-1" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pencil"></i></a>
                    <a href="mahasiswa/delete/" class="px-1" title="Edit" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $mhs['id']; ?>">
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
  <?php foreach ($mahasiswa as $mhs) { ?>
    <div class="modal fade" id="modal-delete-<?= $mhs['id']; ?>" tabindex="-1" aria-labelledby="modal-delete-label" aria-hidden="true">
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
            <a class="btn btn-primary" href="mahasiswa/delete/<?= $mhs['id']; ?>" class="delete" title="Delete" data-toggle="tooltip">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</section>