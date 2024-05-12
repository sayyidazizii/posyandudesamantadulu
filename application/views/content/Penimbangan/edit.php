
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
            <!-- Add Back button here, aligned to the right -->
            <div class="d-flex justify-content-end mb-4">
                <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
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
                       <form action="<?= base_url() ?>penimbangan/process-edit" method="post">
                            <table style="width: 100%">
                                    <td><input type="text" hidden name="id_timbangan" id="id_timbangan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->id_timbangan ?>" required readonly></td>
                                <tr>
                                    <th>NIB</th>
                                    <td>
                                        <select class="select2-single-placeholder form-control" name="id_balita" id="id_balita" required>
                                            <option value="0">Select</option>
                                            <?php foreach($balita as $val){ ?>
                                                <option value="<?= $val->id_balita ?>" <?= ($val->id_balita == ($penimbangan->id_balita ?? '')) ? 'selected' : '' ?>>
                                                    <?= $val->nib ?> - <?= $val->nama_lengkap ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                               
                                    <td><input type="text" hidden name="nib" id="nib" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                                </tr>
                                 <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark"  readonly></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark"  readonly></td>
                                </tr>
                                 <tr>
                                    <th>Nama Ayah</th>
                                    <td><input type="text" name="nama_ayah" id="nama_ayah" class="form-control form-control-sm my-2 border-dark"  readonly></td>
                                </tr>
                                 <tr>
                                    <th>Nama Ibu</th>
                                    <td><input type="text" name="nama_ibu" id="nama_ibu" class="form-control form-control-sm my-2 border-dark"  readonly></td>
                                </tr>
                                <tr>
                                    <td>
                                    <h2>Penimbangan</h2>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Tanggal Penimbangan</th>
                                    <td><input type="date" name="tgl_penimbangan" id="tgl_penimbangan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->tgl_penimbangan ?>" required ></td>
                                </tr>
                                <tr>
                                    <th>Usia</th>
                                    <td><input type="text" name="usia" id="usia" class="form-control form-control-sm my-2 border-dark"  required readonly></td>
                                </tr>
                                 <tr>
                                    <th>Berat Badan</th>
                                    <td><input type="text" name="berat_badan" id="berat_badan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->berat_badan ?>" required ></td>
                                </tr>
                                 <tr>
                                    <th>Tinggi Badan</th>
                                    <td><input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->tinggi_badan ?>" required ></td>
                                </tr>
                                <tr>
                                    <th>Lingkar Kepala</th>
                                    <td><input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->lingkar_kepala ?>" required ></td>
                                </tr>
                                <tr>
                                    <th>Lingkar Perut</th>
                                    <td><input type="text" name="lingkar_perut" id="lingkar_perut" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->lingkar_perut ?>" required ></td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td><input type="text" name="keterangan" id="keterangan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $penimbangan->keterangan ?>"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td><button type="submit" class="btn btn-primary my-2">Simpan</button> 
                                        <button type="reset" class="btn btn-primary my-2">cancel</button></td>
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
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
  <!-- Javascript for this page -->
 <!-- Select2 -->
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/js/ruang-admin.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/js/demo/chart-area-demo.js"></script>  
  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ruang-admin/vendor/select2/dist/js/select2.min.js"></script>
  
    <script>
        $(window).on('load', function () {
            $("#dataTable").DataTable(); 
            $("#dataTableHover").DataTable(); 

            $('.select2-single').select2();

            $('.select2-single-placeholder').select2({
                placeholder: "Select a Province",
                allowClear: true
            });

            var defaultBalitaId = <?= json_encode($penimbangan->id_balita ?? '') ?>;
            
            if (defaultBalitaId !== '') {
                fetchData(defaultBalitaId);
            }

            $('#id_balita').change(function () {
                var selectedBalitaId = $(this).val();
                if (selectedBalitaId !== '') {
                    fetchData(selectedBalitaId);
                }
            });

            function fetchData(balitaId) {
                $.ajax({
                    url: '<?= base_url() ?>penimbangan/dataBalita',
                    type: 'POST',
                    data: {
                        id_balita: balitaId
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data) {
                            $('#nib').val(data.nib);
                            $('#nama_lengkap').val(data.nama_lengkap);
                            $('#tempat_lahir').val(data.tempat_lahir);
                            $('#tanggal_lahir').val(data.tanggal_lahir);
                            $('#jenis_kelamin').val(data.jenis_kelamin);
                            $('#nama_ayah').val(data.nama_ayah);
                            $('#nama_ibu').val(data.nama_ibu);
                            $('#usia').val(data.usia);
                        } else {
                            $('#nib').val('');
                            $('#nama_lengkap').val('');
                            $('#tempat_lahir').val('');
                            $('#tanggal_lahir').val('');
                            $('#jenis_kelamin').val('');
                            $('#nama_ayah').val('');
                            $('#nama_ibu').val('');
                            $('#usia').val('');
                        }
                    },
                    error: function () {
                        // Handle error
                    }
                });
            }
        });
    </script>
</body>

</html>