<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Rekap Penimbangan</title>
</head>

<body>
    <form action="<?= base_url() ?>report/balita/cetak" method="get">
        <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
        <h3>
            <center>LAPORAN REKAP PENIMBANGAN</center>
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
                    <th>Tgl Penimbangan</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Lingkar Kepala</th>
                    <th>Lingkar Perut</th>
                    <th>Keterangan</th>
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
                        <td><?= $val->usia ?> Bulan</td>
                        <td><?= $val->nama_ayah ?></td>
                        <td><?= $val->nama_ibu ?></td>
                        <td><?= $val->tgl_penimbangan ?></td>
                        <td><?= $val->berat_badan ?>Kg</td>
                        <td><?= $val->tinggi_badan ?>cm</td>
                        <td><?= $val->lingkar_kepala ?>cm</td>
                        <td><?= $val->lingkar_perut ?>cm</td>
                        <td><?= $val->keterangan ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

</body>

</html>