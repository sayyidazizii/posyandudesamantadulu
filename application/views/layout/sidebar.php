
<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url() ?>assets/img/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">Posyandu Desa Mantadulu</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">master data</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>balita">Data Balita</a>
            <a class="collapse-item" href="<?php echo base_url() ?>kader">Data Kader</a>
            <a class="collapse-item" href="<?php echo base_url() ?>kematian">Data Kematian</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Layanan</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">layanan</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>penimbangan">Penimbangan Balita</a>
            <a class="collapse-item" href="<?php echo base_url() ?>imunisasi">Imunisasi Balita</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">laporan</h6>
            <a class="collapse-item" href="<?php echo base_url() ?>">Laporan Balita</a>
            <a class="collapse-item" href="<?php echo base_url() ?>">Laporan Kematian</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>home/logout">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Keluar</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
