
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
                       <form action="<?= base_url() ?>report/balita/view" method="get">
                            <table style="width: 100%">
                                <tr>
                                    <th>NIB</th>
                                    <td>
                                        <select class="select2-single-placeholder form-control" name="id_balita" id="id_balita" required>
                                            <option value="0">Select</option>
                                            <?php foreach($balita as $val){ ?>
                                            <option value="<?= $val->id_balita ?>"><?= $val->nib ?> - <?= $val->nama_lengkap ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                               
                                    <td><input type="text" hidden id="nib" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><input type="text"  id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                                </tr>
                                 <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><input type="text"  id="jenis_kelamin" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><input type="text"  id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><input type="date" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                 <tr>
                                    <th>Nama Ayah</th>
                                    <td><input type="text"  id="nama_ayah" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                 <tr>
                                    <th>Nama Ibu</th>
                                    <td><input type="text"  id="nama_ibu" class="form-control form-control-sm my-2 border-dark" readonly></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                      <button type="submit" class="btn btn-primary my-2">Lihat</button> 
                                        <button type="reset" class="btn btn-primary my-2">Cetak</button>
                                      </td>
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
  
    <!-- Page level custom scripts -->
    <script>
      $(document).ready(function () {
        $("#dataTable").DataTable(); // ID From dataTable
        $("#dataTableHover").DataTable(); // ID From dataTable with Hover
      });

       $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
      });      
         //id_balita
        $('#id_balita').change(function() {
        // Mendapatkan nilai yang dipilih
        var idBalita = $(this).val();
        
            $.ajax({
                url: '<?= base_url() ?>report/dataBalita',
                type: 'POST',
                data: {
                    id_balita : idBalita
                },
                success: function(response) {
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
                        // If data is null or not found, empty the input fields
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
                error: function() {
                    // console.log('Terjadi kesalahan saat menyimpan data jasa.');
                   
                }
            });
        }); 
      
    </script>

</body>

</html>