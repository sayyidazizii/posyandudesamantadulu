
<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> 
              <b></b>
            </span>
          </div>
        </div>
        </footer>
      <!-- Footer -->
    </div>
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
      
    </script>

</body>

</html>