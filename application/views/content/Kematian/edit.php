<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
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
    <a title="Kembali" href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
          </h6>
        </div>
        <div class="container">
          <form action="<?= base_url() ?>kematian/process-edit" method="post">
            <table style="width: 100%">

              <input type="hidden" name="id_kematian" id="id_kematian" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->id_kematian ?>" required readonly>
              <input type="hidden" name="id_balita" id="id_balita" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->id_balita ?>" required readonly>
              <tr>
                <th>NIB</th>
                <td>
                  <input type="text" name="nib" id="nib" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->nib ?>" required readonly>
                </td>
              </tr>
              <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" required oninput="validateText(this)" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->nama_lengkap ?>" required readonly></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><input type="text" required oninput="validateText(this)" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->tempat_lahir ?>" readonly></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->tanggal_lahir ?>" readonly></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td><input type="text" required oninput="validateText(this)" name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->jenis_kelamin ?>" readonly></td>
              </tr>
              <tr>
                <th>Tanggal kematian</th>
                <td><input type="date" name="tgl_kematian" id="tgl_kematian" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->tgl_kematian ?>" required></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td><textarea type="text" oninput="validateText(this)" name="alamat" id="alamat" class="form-control form-control-sm my-2 border-dark"> <?php echo $kematian->alamat; ?></textarea></td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td><input type="text" required name="keterangan" id="keterangan" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kematian->keterangan ?>"></td>
              </tr>
              <tr>
                <th></th>
                <td><button title="Update" type="submit" class="btn btn-primary my-2">Update</button>
                  <a type="reset" title="Batal" href="javascript:history.back()" class="btn btn-primary my-2">Batal</a>
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
<script>
  function validateText(input) {
    input.value = input.value.replace(/[^A-Za-z\s]/g, '');
  }

  function validateNumber(input) {
    input.value = input.value.replace(/\D/g, '');
  }
</script>
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
  $(document).ready(function() {
    $("#dataTable").DataTable(); // ID From dataTable
    $("#dataTableHover").DataTable(); // ID From dataTable with Hover
  });

  $('.select2-single').select2();

  // Select2 Single  with Placeholder
  $('.select2-single-placeholder').select2({
    placeholder: "Select a Province",
    allowClear: true
  });
  //nib
  $('#nib').change(function() {
    // Mendapatkan nilai yang dipilih
    var nib = $(this).val();

    $.ajax({
      url: '<?= base_url() ?>kematian/dataBalita',
      type: 'POST',
      data: {
        nib: nib
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data) {
          $('#nama_lengkap').val(data.nama_lengkap);
          $('#tempat_lahir').val(data.tempat_lahir);
          $('#tanggal_lahir').val(data.tanggal_lahir);
          $('#jenis_kelamin').val(data.jenis_kelamin);
        } else {
          // If data is null or not found, empty the input fields
          $('#nama_lengkap').val('');
          $('#tempat_lahir').val('');
          $('#tanggal_lahir').val('');
          $('#jenis_kelamin').val('');
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