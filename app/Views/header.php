  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <h1>Ikram's ETS</h1>
      </a>
      <div class="position-relative">
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/berita">Berita</a></li>
            <li class="dropdown"><a href="#"><span>Barang</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a class="nav-link" href="<?= base_url(); ?>/barang/data-barang">Data Barang</a></li>
                <li><a class="nav-link" href="<?= base_url(); ?>/barang/grafik-harga-barang">Grafik Harga Barang</a></li>
                <li><a class="nav-link" href="<?= base_url(); ?>/barang/excel">Excel</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a class="nav-link" href="<?= base_url(); ?>/logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </div>
    </div>
  </header>