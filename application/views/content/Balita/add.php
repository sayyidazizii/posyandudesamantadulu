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
          <form action="<?= base_url() ?>/balita/process-add" method="post">
            <table style="width: 100%">
              <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" required name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" oninput="validateText(this)"></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><input type="text" required name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" oninput="validateText(this)"></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark"></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  <div class="my-2">
                    <div class="d-flex flex-nowrap">
                      <div class="custom-control custom-radio">
                        <input type="radio" id="laki_laki" name="jenis_kelamin" value="laki-laki" class="custom-control-input">
                        <label class="custom-control-label" for="laki_laki">laki- Laki</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="custom-control-input">
                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th>Usia</th>
                <td><input type="decimal" placeholder="bulan" required name="usia" id="usia" class="form-control form-control-sm my-2 border-dark"></td>
              </tr>
              <tr>
                <th>Nama Ayah</th>
                <td><input type="text" required name="nama_ayah" id="nama_ayah" class="form-control form-control-sm my-2 border-dark" oninput="validateText(this)"></td>
              </tr>
              <tr>
                <th>Nama Ibu</th>
                <td><input type="text" required name="nama_ibu" id="nama_ibu" class="form-control form-control-sm my-2 border-dark" oninput="validateText(this)"></td>
              </tr>
              <tr>
                <th></th>
                <td><button title="simpan" type="submit" class="btn btn-primary my-2">Simpan</button>
                  <button type="reset" title="Batal" onclick="cancel()" class="btn btn-primary my-2">Batal</button>
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
    // Menghapus semua karakter yang bukan huruf atau spasi
    input.value = input.value.replace(/[^A-Za-z\s]/g, '');
  }

  function validateNumber(input) {
    input.value = input.value.replace(/\D/g, '');
  }
</script>