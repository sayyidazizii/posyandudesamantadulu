<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Rekap Imunisasi</title>
</head>

<body>
    <form action="<?= base_url() ?>report/balita/cetak" method="get">
        <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
        <h3>
            <center>LAPORAN REKAP IMUNISASI</center>
        </h3>
        <table border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIB</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Tanggal Imunisasi</th>
                    <th>Usia</th>
                    <th>Imunisasi</th>
                    <th>Vitamin A</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($imunisasi as $val) {
                    $no++
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $val->nib ?></td>
                        <td><?= $val->nama_lengkap ?></td>
                        <td><?= $val->tanggal_lahir ?></td>
                        <td><?= $val->tgl_imunisasi ?></td>
                        <td><?= $val->usia ?> Bulan</td>
                        <td><?= $val->imunisasi ?></td>
                        <td><?= $val->vitamin ?></td>
                        <td><?= $val->keterangan ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

</body>

</html>