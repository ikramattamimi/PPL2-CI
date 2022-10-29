<section id="posts" class="posts">
  <div class="container" data-aos="fade-up">
    <h1 class="text-center">Berita</h1>
    <?php foreach ($berita as $brt) { ?>
      <div class="row mb-4">
        <div class="col-8">
          <div class="">
            <img style="position: absolute; right:10px; " src="<?= '/uploads/gambar/' . $brt['gambar']; ?>" alt="" width="100vw">
            <h3><?= $brt['judul']; ?></h3>
            <div class="post-meta"><span class="date"><?= $brt['kategori']; ?></span> <span class="mx-1">&bullet;</span> <span><?= $brt['date']; ?></span></div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>