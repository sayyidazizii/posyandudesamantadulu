
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
                       <form action="<?= base_url() ?>/balita/process-edit" method="post">
                            <table style="width: 100%">
                                    <td><input type="text" hidden name="id_balita" id="id_balita" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->id_balita ?>"></td>
                                <tr>
                                    <th>NIB</th>
                                    <td><input type="text" name="nib" id="nib" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->nib ?>" readonly></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->nama_lengkap ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->tempat_lahir ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->tanggal_lahir ?>"></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>
                                        <div class="my-2">
                                            <div class="d-flex flex-nowrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="laki_laki" name="jenis_kelamin" value="laki-laki" class="custom-control-input" <?php if ($balita->jenis_kelamin == "laki-laki") {echo "checked";} ?>>
                                                    <label class="custom-control-label" for="laki_laki">laki- Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="custom-control-input" <?php if ($balita->jenis_kelamin == "perempuan") {echo "checked";} ?>>
                                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Usia</th>
                                    <td><input type="text" name="usia" id="usia" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->usia ?>"></td>
                                </tr>
                                <tr>
                                    <th>Nama Ayah</th>
                                    <td><input type="text" name="nama_ayah" id="nama_ayah" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->nama_ayah ?>"></td>
                                </tr>
                                <tr>
                                    <th>Nama Ibu</th>
                                    <td><input type="text" name="nama_ibu" id="nama_ibu" class="form-control form-control-sm my-2 border-dark" value="<?php echo $balita->nama_ibu ?>"></td>
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