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
    <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
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
          <div id="notifDataTidakAda" class="alert alert-danger" style="display: none;">
            Data Kematian tidak ditemukan. Cek di data kematian
          </div>
          <form action="<?= base_url() ?>report/kematian/view" method="get">
            <table style="width: 100%">
              <input type="hidden" id="id_balita_hidden" name="id_balita" value="">
              <tr>
                <th>NIB</th>
                <td>
                  <select class="select2-single-placeholder form-control" name="id_balita" id="id_balita" required>
                    <option value="0">Select</option>
                    <?php foreach ($balita as $val) { ?>
                      <option value="<?= $val->id_balita ?>"><?= $val->nib ?> - <?= $val->nama_lengkap ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Tanggal kematian</th>
                <td><input type="text" required id="tgl_kematian" class="form-control form-control-sm my-2 border-dark" required readonly></td>
              </tr>
              <td><input type="text" required hidden id="nib" class="form-control form-control-sm my-2 border-dark" required readonly></td>
              <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" required id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" required readonly></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td><input type="text" required id="jenis_kelamin" class="form-control form-control-sm my-2 border-dark" readonly></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><input type="text" required id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><input type="date" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
              </tr>
              <tr>
                <th>Nama Ayah</th>
                <td><input type="text" required id="nama_ayah" class="form-control form-control-sm my-2 border-dark" readonly></td>
              </tr>
              <tr>
                <th>Nama Ibu</th>
                <td><input type="text" required id="nama_ibu" class="form-control form-control-sm my-2 border-dark" readonly></td>
              </tr>
              <tr>
                <th></th>
                <td>
                  <button type="submit" class="btn btn-primary my-2">Lihat</button>
                  <a href="#" id="printButton" class="btn btn-primary mx-2 my-2">cetak</a>
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

  $('#id_balita').change(function() {
    var idBalita = $(this).val();
    $('#id_balita_hidden').val(idBalita); // Set the value of hidden input
    // Rest of your code
  });

  //id_balita
  $('#id_balita').change(function() {
    // Mendapatkan nilai yang dipilih
    var idBalita = $(this).val();

    // console.log(idBalita);

    $.ajax({
      url: '<?= base_url() ?>report/dataKematian',
      type: 'POST',
      data: {
        id_balita: idBalita
      },
      success: function(response) {
        // console.log(response);
        var data = JSON.parse(response);
        if (data) {
          $('#nib').val(data.nib);
          $('#tgl_kematian').val(data.tgl_kematian);
          $('#nama_lengkap').val(data.nama_lengkap);
          $('#tempat_lahir').val(data.tempat_lahir);
          $('#tanggal_lahir').val(data.tanggal_lahir);
          $('#jenis_kelamin').val(data.jenis_kelamin);
          $('#nama_ayah').val(data.nama_ayah);
          $('#nama_ibu').val(data.nama_ibu);
          $('#usia').val(data.usia);
          // Sembunyikan notifikasi jika data ditemukan
          $('#notifDataTidakAda').hide();

        } else {
          // If data is null or not found, empty the input fields
          $('#nib').val('');
          $('#tgl_kematian').val('');
          $('#nama_lengkap').val('');
          $('#tempat_lahir').val('');
          $('#tanggal_lahir').val('');
          $('#jenis_kelamin').val('');
          $('#nama_ayah').val('');
          $('#nama_ibu').val('');
          $('#usia').val('');
          // Tampilkan notifikasi jika data tidak ditemukan
          $('#notifDataTidakAda').show();
        }
      },
      error: function() {
        // Tampilkan notifikasi jika terjadi kesalahan
        $('#notifDataTidakAda').text('Terjadi kesalahan saat memuat data.').show();

      }
    });
  });

  $('#printButton').click(function() {
    var idBalita = $('#id_balita_hidden').val();
    var printUrl = "<?php echo base_url() ?>report/kematian/print?id_balita=" + idBalita;
    window.open(printUrl, '_blank'); // Open print URL in a new tab
  });
</script>

</body>

</html>