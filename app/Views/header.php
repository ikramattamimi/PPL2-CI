  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <h1>Ikram's Task</h1>
      </a>
      <div class="position-relative">
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="/">Home</a></li>
            <li class="dropdown"><a href="#"><span>Mahasiswa</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/data-mhs">Data Mahasiswa</a></li>
                <li><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/nilai">Data Nilai</a></li>
                <li><a class="nav-link" href="<?= base_url(); ?>/mahasiswa/grafik-tinggi-badan">Grafik Tinggi Badan</a></li>
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