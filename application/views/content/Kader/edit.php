
          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800"> <?php echo $page ?></h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $page ?>
                </li>
              </ol>
            </div>

            <!-- Row -->
            <div class="row">
              <!-- DataTable with Hover -->
              <div class="col-lg-12">
                <div class="card mb-4">
                  <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                    </h6>
                  </div>
                  <div class="container">
                       <form action="<?= base_url() ?>kader/process-edit" method="post">
                            <table style="width: 100%">
                                    <td><input type="text" hidden name="id_kader" id="id_kader" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->id_kader ?>"></td>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->nama_lengkap ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->tempat_lahir ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->tanggal_lahir ?>"></td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td><input type="text" name="jabatan" id="jabatan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->jabatan ?>"></td>
                                </tr>
                                <tr>
                                    <th>Lama Kerja</th>
                                    <td><input type="text" name="lama_kerja" id="lama_kerja" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->lama_kerja ?>"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Row-->
          </div>
          <!---Container Fluid-->
        </div>