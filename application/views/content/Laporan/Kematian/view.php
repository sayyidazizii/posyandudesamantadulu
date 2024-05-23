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
    <a href="<?= base_url() ?>report/kematian" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
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
          <form action="<?= base_url() ?>report/kematian/cetak" method="get">
            <td><input type="text" required hidden name="id_balita" id="id_balita" class="form-control form-control-sm my-2 border-dark" value="<?php echo $id_balita ?>" required readonly></td>
            <h3>
              <center>LAPORAN DATA KEMATIAN</center>
            </h3>
            <table border="1" cellspacing="0" cellpadding="5" width="100%" class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Kematian</th>
                  <th>NIB</th>
                  <th>Nama Lengkap</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Keterangan</th>
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
                  </tr>
                <?php } ?>
                <?php
                if ($kematian < 0) {
                  echo  "<td colspan='8' class='text-center'>tidak ada data</td>";
                } ?>

              </tbody>
            </table>
            <!-- Tombol aksi -->
            <div class="d-flex justify-content-end">
              <a href="<?php echo base_url() ?>report/kematian/cetak?id_balita=<?= $id_balita ?>" target="_blank" class="btn btn-primary mx-2 my-2">Unduh Pdf</a>
              <a href="<?php echo base_url() ?>report/kematian/export?id_balita=<?= $id_balita ?>" target="_blank" class="btn btn-primary mx-2 my-2">Export Excel</a>
              <a href="<?php echo base_url() ?>report/kematian/print?id_balita=<?= $id_balita ?>" target="_blank" class="btn btn-primary mx-2 my-2">Print</a>
            </div>
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
  //id_balita
  $('#id_balita').change(function() {
    // Mendapatkan nilai yang dipilih
    var idBalita = $(this).val();

    $.ajax({
      url: '<?= base_url() ?>report/dataBalita',
      type: 'POST',
      data: {
        id_balita: idBalita
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