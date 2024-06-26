<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Kematian</title>
    <style>
        .logo {
            width: 50px;
            /* Mengatur ukuran logo menjadi lebih kecil */
            height: auto;
            position: absolute;
            top: 10px;
        }

        .logo-left {
            left: 10px;
            width: 40px;
        }

        .logo-right {
            right: 10px;
            /* Atur posisi logo kanan */
        }

        .header-text {
            text-align: center;
            margin-top: 10px;
            /* Atur margin atas */
            position: absolute;
            top: 10px;
            /* Sesuaikan dengan posisi logo */
            left: 50%;
            transform: translateX(-50%);
        }

        .sub-header-text {
            text-align: center;
            margin-top: 40px;
            /* Sesuaikan margin-top agar ada jarak antara header text dan sub-header text */
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body onload="printPage()">
    <img src="<?php echo $logo1 ?>" class="logo logo-left">
    <img src="<?php echo $logo2 ?>" class="logo logo-right">
    <br><br><br>
    <!-- <form action="<?= base_url() ?>report/balita/cetak" method="get"> -->
    <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
    <h3 class="header-text">
        LAPORAN DATA KEMATIAN
    </h3>
    <h3 class="sub-header-text">
        POSYANDU DESA MANTADULU
    </h3>
    <br>
    <hr>
    <br>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
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
    <!-- </form> -->

    <script>
        function printPage() {
            window.print();
        }
    </script>

</body>

</html>