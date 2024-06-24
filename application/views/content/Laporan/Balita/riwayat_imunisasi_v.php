<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Riwayat Imunisasi</title>
    <style>
        .logo {
            width: 50px;
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
        }

        .header-text {
            text-align: center;
            margin-top: 10px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .sub-header-text {
            text-align: center;
            margin-top: 40px;
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

<body>
    <img src="<?php echo $logo1 ?>" class="logo logo-left">
    <img src="<?php echo $logo2 ?>" class="logo logo-right">
    <br><br><br>
    <form action="<?= base_url() ?>report/balita/cetak" method="get">
        <input type="hidden" name="id_balita" id="id_balita" value="<?php echo $id_balita ?>">
        <h3 class="header-text">
            LAPORAN RIWAYAT DATA IMUNISASI BALITA
        </h3>
        <h3 class="sub-header-text">
            POSYANDU DESA MANTADULU
        </h3>
        <br>
        <hr>
        <br>
        <h3 class="text-center mt-3">
                <?php echo $balita->nib . " - ". $balita->nama_lengkap . " - ". $balita->usia ." bulan" . " - ". $balita->tanggal_lahir . " - ". $balita->jenis_kelamin    ?>
        </h3>
        <table border="1" cellspacing="0" cellpadding="5" width="100%">
            
            <thead>
                <tr>
                    <th>Jenis Imunisasi</th>
                    <?php
                    // Collect unique ages of immunization
                    $ages = [];
                    foreach ($imunisasi as $val) {
                        if (!in_array($val->usia_imunisasi, $ages)) {
                            $ages[] = $val->usia_imunisasi;
                        }
                    }
                    sort($ages);

                    // Create a header for each unique age
                    foreach ($ages as $age) {
                        echo "<th>$age Bulan</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Group data by immunization type
                $imunisasiGrouped = [];
                foreach ($imunisasi as $val) {
                    $imunisasiGrouped[$val->imunisasi][] = $val;
                }

                // Generate table rows for each immunization type
                foreach ($imunisasiGrouped as $jenis => $records) {
                    echo "<tr>";
                    echo "<td>$jenis</td>";

                    // Create a cell for each unique age
                    foreach ($ages as $age) {
                        $found = false;
                        foreach ($records as $record) {
                            if ($record->usia_imunisasi == $age) {
                                echo "<td>{$record->tgl_imunisasi}, {$record->vitamin}, {$record->keterangan}</td>";
                                $found = true;
                                break;
                            }
                        }
                        if (!$found) {
                            echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>
