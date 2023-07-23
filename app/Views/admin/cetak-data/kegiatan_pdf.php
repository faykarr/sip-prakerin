<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bulanan Kegiatan Prakerin</title>
    <style>
        /* Tambahkan gaya CSS untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        <img src="<?php echo base_url('assets/images/logo/logo-upt.png'); ?>" alt="Logo UPTKOMP" width="64px">
        <h2>Laporan Bulanan Kegiatan Prakerin</h2>
        <?php if ($start_date && $end_date): ?>
            <p>Periode:
                <?= date('F Y', strtotime($start_date)) . ' - ' . date('F Y', strtotime($end_date)); ?>
            </p>
        <?php else: ?>
            <p>Periode:
                <?= date('F Y'); ?>
            </p>
        <?php endif; ?>
    </header>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Asisten</th>
                <th>Asisten Pembantu</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Ruang Lab</th>
                <th>Detail Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            <!-- Foreach data -->
            <?php $i = 1; ?>
            <?php foreach ($kegiatan as $k): ?>
                <tr>
                    <td>
                        <?= $i++; ?>
                    </td>
                    <td>
                        <?= $k['nama_asisten']; ?>
                    </td>
                    <td>
                        <?= $k['asisten_pembantu']; ?>
                    </td>
                    <td>
                        <?= date('d-m-Y', strtotime($k['tanggal'])); ?>
                    </td>
                    <td>
                        <?= date('H:i', strtotime($k['waktu'])) . ' WIB'; ?>
                    </td>
                    <td>
                        <?= $k['ruang_lab']; ?>
                    </td>
                    <td>
                        <?= $k['detail_kegiatan']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>