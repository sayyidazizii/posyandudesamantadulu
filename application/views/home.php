<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Data Balita Card Example -->
    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $balita ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"></span>
                  <div class="text-xs font-weight-bold text-uppercase mb-1">
                    <?php if ($_SESSION['level'] == 1) { ?>
                      Data
                    <?php } elseif ($_SESSION['level'] == 2) { ?>
                      laporan
                    <?php } ?>
                    Balita</div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-child fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- Data Kader Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kader ?></div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"></span>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Data Kader</div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-female fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Data Kematian Card Example -->
    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kematian ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"></span>
                  <div class="text-xs font-weight-bold text-uppercase mb-1">
                    <?php if ($_SESSION['level'] == 1) { ?>
                      Data
                    <?php } elseif ($_SESSION['level'] == 2) { ?>
                      laporan
                    <?php } ?>
                    Kematian
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-danger"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- Data Penimbangan Card Example -->
    <?php if ($_SESSION['level'] == 1) { ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $penimbangan ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"></span>
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Penimbangan</div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Data Imunisasi Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $imunisasi ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"></span>
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Data Imunisasi</div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>


  </div>
  <!--Row-->

  <div class="row">
    <div class="col-lg-12 text-left">
      <p>Selamat Datang, <?php echo $_SESSION['nama'] ?> </p>
    </div>
  </div>

</div>
<!---Container Fluid-->
</div>