<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Analisis Stunting Balita</title>
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body onload="printPage()">
    <h2>Analisis Stunting Balita</h2>

    <p>Berikut adalah hasil analisis stunting berdasarkan data penimbangan balita:</p>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nama Balita</th>
                <th>Usia (Bulan)</th>
                <th>Berat Badan (Kg)</th>
                <th>Tinggi Badan (cm)</th>
                <th>Lingkar Kepala (cm)</th>
                <th>Lingkar Perut (cm)</th>
                <th>Status Gizi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($balita as $val) : ?>
                <tr>
                    <td><?= $val->nama_lengkap ?></td>
                    <td><?= $val->usia ?></td>
                    <td><?= $val->berat_badan ?></td>
                    <td><?= $val->tinggi_badan ?></td>
                    <td><?= $val->lingkar_kepala ?></td>
                    <td><?= $val->lingkar_perut ?></td>
                    <td>
                        <?php
                        // Analisis Stunting
                        $berat_badan_kg = $val->berat_badan;
                        $berat_badan_standar = 0.0; // Tidak menggunakan standar
                        $stunting_berat_badan = $berat_badan_kg - $berat_badan_standar;

                        if ($stunting_berat_badan < 0) {
                            echo "Stunting";
                        } else {
                            echo "Normal";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Keterangan:</strong></p>
    <ul>
        <li><strong>Stunting:</strong> Balita memiliki berat badan lebih rendah dari standar pertumbuhan normal.</li>
        <li><strong>Normal:</strong> Balita memiliki berat badan sesuai dengan standar pertumbuhan normal.</li>
    </ul>

    <!-- Canvas for Chart.js -->
    <canvas id="stuntingChart" width="800" height="400"></canvas>

    <script>
        // Data for Chart.js
        var labels = [];
        var stuntingData = [];
        var tanggalPenimbangan = [];

        <?php foreach ($balita as $val) : ?>
            labels.push('<?= $val->nama_lengkap ?>');
            stuntingData.push(<?= $val->berat_badan ?>); // Menggunakan berat badan aktual
            tanggalPenimbangan.push('<?= $val->tgl_penimbangan ?>');
        <?php endforeach; ?>

        // Create Chart
        var ctx = document.getElementById('stuntingChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Menggunakan diagram garis
            data: {
                labels: tanggalPenimbangan, // Gunakan tanggal penimbangan sebagai label
                datasets: [{
                    label: 'Stunting',
                    data: stuntingData,
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                    borderWidth: 1,
                    fill: false // Tidak diisi (garis)
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false // Dimulai dari nilai terendah
                    }
                }
            }
        });

        // Save Chart as Image
        var image = myChart.toBase64Image();

        // Pass the image data to your backend for PDF generation
        // You can use AJAX or form submission to send the data to your controller

        function printPage() {
            window.print();
        }
    </script>


</body>

</html>