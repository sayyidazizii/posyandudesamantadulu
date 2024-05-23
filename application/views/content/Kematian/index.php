          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Data <?php echo $page ?></h1>

              <?php if ($this->session->flashdata('alert')) : ?>
                <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show" role="alert">
                  <?php echo $this->session->flashdata('alert'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

              <?php endif; ?>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                  Data <?php echo $page ?>
                </li>
              </ol>
            </div>

            <!-- Row -->
            <div class="row">
              <!-- DataTable with Hover -->
              <div class="col-lg-12">
                <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                      <a href="<?= base_url() ?>kematian/add" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data <?php echo $page ?></a>
                    </h6>
                  </div>
                  <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">

                      <!-- fetch data -->
                      <thead class="thead-light">
                        <tr>
                          <th>No</th>
                          <th>Tanggal Kematian</th>
                          <th>NIB</th>
                          <th>Nama Lengkap</th>
                          <th>Tempat Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $no = 0;
                        foreach ($kematian as $val) {
                          $no++
                        ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td><?= $val->tgl_kematian ?></td>
                            <td><?= $val->nib ?></td>
                            <td><?= $val->nama_lengkap ?></td>
                            <td><?= $val->tempat_lahir ?> , <?= $val->tanggal_lahir ?></td>
                            <td><?= $val->alamat ?></td>
                            <td><?= $val->keterangan ?></td>
                            <td>
                              <div class="d-flex flex-nowrap ">
                                <a href="<?= base_url() ?>kematian/edit/<?= $val->id_kematian ?>" title="Edit" class="btn btn-sm btn-warning mx-2"><i class="fas fa-pen"></i></a>
                                <a href="<?= base_url() ?>kematian/delete/<?= $val->id_kematian ?>" title="Hapus" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                      <!-- end fetch data -->

                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--Row-->
          </div>
          <!---Container Fluid-->
          </div>