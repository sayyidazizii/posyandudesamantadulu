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
                    <form action="<?= base_url() ?>penimbangan/process-add" method="post">
                        <table style="width: 100%">
                            <tr>
                                <th>NIB</th>
                                <td>
                                    <select class="select2-single-placeholder form-control" name="id_balita" id="id_balita" required>
                                        <option value=""></option>
                                        <?php foreach ($balita as $val) { ?>
                                            <option value="<?= $val->id_balita ?>"><?= $val->nib ?> - <?= $val->nama_lengkap ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <td><input type="text" required hidden name="nib" id="nib" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><input type="text" required oninput="validateText(this)" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" required readonly></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><input type="text" required oninput="validateText(this)" name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-sm my-2 border-dark" readonly></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><input type="text" required oninput="validateText(this)" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" readonly></td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td><input type="text" required oninput="validateText(this)" name="nama_ayah" id="nama_ayah" class="form-control form-control-sm my-2 border-dark" readonly></td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td><input type="text" required oninput="validateText(this)" name="nama_ibu" id="nama_ibu" class="form-control form-control-sm my-2 border-dark" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <h2>Penimbangan</h2>
                                </td>
                            </tr>

                            <tr>
                                <th>Tanggal Penimbangan</th>
                                <td><input type="date" name="tgl_penimbangan" id="tgl_penimbangan" class="form-control form-control-sm my-2 border-dark" required></td>
                            </tr>
                            <tr>
                                <th>Usia (Bln)</th>
                                <td><input type="decimal" required oninput="validateNumber(this)" name="usia" id="usia" class="form-control form-control-sm my-2 border-dark" placeholder="Bulan" required></td>
                            </tr>
                            <tr>
                                <th>Berat Badan (kg)</th>
                                <td><input type="decimal" oninput="validateNumber(this)" name="berat_badan" id="berat_badan" class="form-control form-control-sm my-2 border-dark" placeholder="Kg" required></td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan (cm)</th>
                                <td><input type="decimal" oninput="validateNumber(this)" name="tinggi_badan" id="tinggi_badan" class="form-control form-control-sm my-2 border-dark" placeholder="cm" required></td>
                            </tr>
                            <tr>
                                <th>Lingkar Kepala (cm)</th>
                                <td><input type="decimal" oninput="validateNumber(this)" name="lingkar_kepala" id="lingkar_kepala" class="form-control form-control-sm my-2 border-dark" placeholder="cm" required></td>
                            </tr>
                            <tr>
                                <th>Lingkar Perut (cm)</th>
                                <td><input type="decimal" oninput="validateNumber(this)" name="lingkar_perut" id="lingkar_perut" class="form-control form-control-sm my-2 border-dark" placeholder="cm" required></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><input type="text" oninput="validateText(this)" name="keterangan" id="keterangan" class="form-control form-control-sm my-2 border-dark"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><button type="submit" class="btn btn-primary my-2">Simpan</button>
                                    <button type="reset" onclick="cancel()" class="btn btn-primary my-2">cancel</button>
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

    function cancel() {
        $('#id_balita').select2('val', 0);
    }

    function validateNumber(input) {
        // Menghapus semua karakter yang bukan angka, koma, atau titik
        input.value = input.value.replace(/[^0-9.,]/g, '');
    }
    // $('#usia').maskMoney({
    //     thousands: '.',
    //     decimal: ',',
    //     precision: 0
    // });
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

    function hitungUsia() {
        var tanggalLahir = new Date($('#tanggal_lahir').val());
        var tanggalPenimbangan = new Date($('#tgl_penimbangan').val());

        var diff = (tanggalPenimbangan.getFullYear() - tanggalLahir.getFullYear()) * 12;
        diff -= tanggalLahir.getMonth() + 1;
        diff += tanggalPenimbangan.getMonth();

        $('#usia').val(diff);
    }
    $('#tgl_penimbangan').change(function() {
        hitungUsia();
    });

    $('.select2-single').select2();

    // Select2 Single  with Placeholder
    $('.select2-single-placeholder').select2({
        placeholder: "Select ",
        allowClear: true
    });
    //id_balita
    $('#id_balita').change(function() {
        // Mendapatkan nilai yang dipilih
        var idBalita = $(this).val();

        $.ajax({
            url: '<?= base_url() ?>penimbangan/dataBalita',
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

    // // Event listener untuk setiap input yang digunakan dalam perhitungan keterangan
    // $('#usia, #berat_badan, #tinggi_badan, #lingkar_kepala, #lingkar_perut').on('input', function() {
    //     // Mendapatkan nilai dari setiap input
    //     // var usia = parseFloat($('#usia').val());
    //     var berat_badan = parseFloat($('#berat_badan').val());
    //     var tinggi_badan = parseFloat($('#tinggi_badan').val());
    //     var lingkar_kepala = parseFloat($('#lingkar_kepala').val());
    //     var lingkar_perut = parseFloat($('#lingkar_perut').val());

    //     // Menyusun keterangan
    //     var keterangan = "Hasil Penimbangan "
    //         // ", Usia = " + usia + " bulan, " 
    //         +
    //         "BB = " + berat_badan + " kg, " +
    //         "TB = " + tinggi_badan + " cm, " +
    //         "LK = " + lingkar_kepala + " cm, " +
    //         "LP = " + lingkar_perut + " cm.";

    //     // Isi input keterangan dengan nilai yang sudah disusun
    //     $('#keterangan').val(keterangan);
    // });
</script>

</body>

</html>