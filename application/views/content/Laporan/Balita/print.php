<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Balita</title>
</head>

<body onload="printPage()">
    <!-- <form action="<?= base_url() ?>report/balita/cetak" method="get"> -->
    <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
    <h3>
        <center>LAPORAN BALITA</center>
    </h3>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIB</th>
                <th>Nama Lengkap</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($balita as $val) {
                $no++
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $val->nib ?></td>
                    <td><?= $val->nama_lengkap ?></td>
                    <td><?= $val->tempat_lahir ?> , <?= $val->tanggal_lahir ?></td>
                    <td><?= $val->jenis_kelamin ?></td>
                    <td><?= $val->usia ?> bulan</td>
                    <td><?= $val->nama_ayah ?></td>
                    <td><?= $val->nama_ibu ?></td>
                </tr>
            <?php } ?>
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