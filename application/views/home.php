
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
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"></span>
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Balita</div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-child fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Data Kader Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
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
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"></span>
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Kematian</div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Data Penimbangan Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
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

            
          </div>
          <!--Row-->

          <div class="row">
            <div class="col-lg-12 text-left">
              <p>Selamat Datang, Admin </p>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="<?php echo base_url() ?>Login/logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      