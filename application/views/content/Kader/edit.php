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
          <form action="<?= base_url() ?>kader/process-edit" method="post">
            <table style="width: 100%">
              <td><input type="text" required hidden name="id_kader" id="id_kader" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->id_kader ?>"></td>
              <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" required oninput="validateText(this)" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->nama_lengkap ?>"></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><input type="text" required oninput="validateText(this)" name="tempat_lahir" id="tempat_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->tempat_lahir ?>"></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->tanggal_lahir ?>"></td>
              </tr>
              <!-- <tr>
                <th>Jabatan</th>
                <td><input type="text" required oninput="validateText(this)" name="jabatan" id="jabatan" class="form-control form-control-sm my-2 border-dark"></td>
              </tr> -->
              <tr>
                <th>Jabatan</th>
                <td>
                  <select name="jabatan" class="form-control form-select">
                    <option value="kader" <?php echo ($kader->type == 'kader') ? 'selected' : ''; ?>>Kader</option>
                    <option value="ketua" <?php echo ($kader->type == 'ketua') ? 'selected' : ''; ?>>Ketua</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Lama Kerja</th>
                <td><input type="decimal" required oninput="validateNumber(this)" name="lama_kerja" id="lama_kerja" class="form-control form-control-sm my-2 border-dark" value="<?php echo $kader->lama_kerja ?>"></td>
              </tr>
              <tr>
                <th>Kategori</th>
                <td>
                  <select name="type" class="form-control form-select">
                    <option value="bulan" <?php echo ($kader->type == 'bulan') ? 'selected' : ''; ?>>Bulan</option>
                    <option value="tahun" <?php echo ($kader->type == 'tahun') ? 'selected' : ''; ?>>Tahun</option>
                  </select>
                </td>
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