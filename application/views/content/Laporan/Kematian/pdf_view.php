<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Kematian</title>
</head>

<body>
    <form action="<?= base_url() ?>report/kematian/cetak" method="get">
        <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
        <h3>
            <center>LAPORAN KEMATIAN</center>
        </h3>
        <table border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th>No</th>
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
                        <td><?= $val->nib ?></td>
                        <td><?= $val->nama_lengkap ?></td>
                        <td><?= $val->tempat_lahir ?> , <?= $val->tanggal_lahir ?></td>
                        <td><?= $val->alamat ?></td>
                        <td><?= $val->keterangan ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

</body>

</html>